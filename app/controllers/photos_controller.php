<?php 

class PhotosController extends AppController {
	
	var $name = 'Photos';
	var $uses = array('Photo', 'Album', 'User');	
	
	// Will paginate one photo from the current album at a time
	var $paginate = array(
		'Photo' => array(
			'limit' => 1,
			'order' => array(			
				'Photo.created' => 'asc',
				'Photo.album_id' => 'asc'
			),
		)		
	);
	
	function beforeFilter() {
		
		// Remove ADD before moving to production
		$this->Auth->allow('index', 'view');
		$this->pageTitle = 'Photos - vsrituaL.com';
		parent::beforeFilter();
	}
	
	function index($id = null, $photo = null) {
		
		// Redirect to view
		$this->redirect(array('controller' => 'photos', 'action' => 'view'));
								
	}
	
	function view($album = null, $photo = null) {
		
		// If no album ID is passed, use the default album (put the public album's uuid here)
		if(!empty($album)) {
			if($this->Album->find('count', array('conditions' => array('Album.shortcut' => $album)))) {
				$album=$this->Album->field('id', array('Album.shortcut' => $album));
			} else $this->redirect(array('controller' => 'photos', 'action' => 'add'));
		} else {
			$album=Configure::read('Album.public');				
		} 
		
		// Pagination parameters
		$p = array(
			'controller' => 'photos',
			'action' => $this->action,
			'album' => $album
		);
		
		// Get all photos with the album id specified
		$data = $this->paginate('Photo', array('Photo.album_id' => $album));
		if(!empty($photo)) $data = $this->paginate('Photo', array(
				'Photo.album_id' => $album, 
				'Photo.id' => $photo,
				'url' => array('url' => $p)
			)
		);		

		
		// Page Title set to current pic
		$this->pageTitle = $data[0]['Photo']['title'] . ' - vsrituaL.com';
		
		// Setup the photos array
		$this->set('photos', $data);
		
		// Setup the photo store
		$photo_store = Configure::read('Photo.storage');
		$this->set('photo_store', $photo_store);
		
		// Get dimensions of photo, resize if necessary
		$photoDims = $this->Photo->imgResize(WWW_ROOT . '/img/'.$photo_store . '/' . $data[0]['Photo']['url']);
		$this->set('photo_dims', $photoDims);
	}
	
	function add() {
		$this->set('data', $this->data);
		
		if(!empty($this->data)) {		
			$this->Photo->set($this->data);	
			if($this->Photo->validates()) {
				
				// Set Userid - ritual, need to update when auth is implemented
				$this->data['Photo']['user_id'] = '4bcbcd50-f934-499c-bbc9-18fe4499f0d9';
				
				// Save the original filename for back reference
				$this->data['Photo']['oldname'] = $this->data['Photo']['Upload']['name'];
				
				$newFn = uniqid();
				$fileExt = end(explode('.', $this->data['Photo']['oldname']));

				// Copy file into img/ directory and then set image url
				$imgStore = Configure::read('Photo.storage');
				$copied = copy($this->data['Photo']['Upload']['tmp_name'], IMAGES.$imgStore.DS.$newFn.'.'.$fileExt);
				$this->data['Photo']['url'] = $newFn.'.'.$fileExt;
				
				// Grab the proper album_id using the shortcut, otherwise assign Album.public
				if($this->data['Photo']['Album Code']) {
					$this->data['Photo']['album_id'] = $this->Album->field('id', array(
						'Album.shortcut' => $this->data['Photo']['Album Code'])
					);	
				} else $this->data['Photo']['album_id'] = Configure::read('Album.public');
				
				// Assign data to model
				$this->Photo->set($this->data);
				
				// Attempt a save
				if($this->Photo->save()) {
					$this->Session->setFlash('Your photo was successfully uploaded!', 'successbox');
					$this->redirect(
						array(
							'controller' => 'photos', 
							'action' => 'view', 
							$this->data['Photo']['album_id'] 
						)
					);
				} else {
					$this->Session->setFlash('There was a problem saving your data.', 'errorbox');
				}
			} else
				$this->Session->setFlash($this->Photo->invalidFields(), 'error_list');
		}
		
	}
}
