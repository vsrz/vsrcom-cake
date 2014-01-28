<?php
class PostsController extends AppController {

	var $name = 'Posts';	
	var $uses = array('Post', 'Comment');
	var $paginate = array(
		'limit' => 5,
		'order' => array(
			'Post.created' => 'desc'					
		)
	);
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
		$this->pageTitle = 'Posts - vsrituaL.com';
	}
	
	function index() {		
		$this->Post->recursive = 1;
		$posts = $this->paginate();		
		$this->set('posts', $posts);	
		$this->pageTitle = $posts[0]['Post']['title'].' - vsrituaL.com';
				
	}

	function view($id = null) {		
		$this->set('comments', $this->Comment->find(
			'all', array(
				'conditions' => array(
					'Comment.post_id' => $id
					),
				'order' => 'Comment.created DESC'
				)
			)
		);
		if (!$id) {
			$this->Session->setFlash(__('Invalid Post.', true));
			$this->redirect(array('action'=>'index'));
		}
		$postdata = $this->Post->read(null, $id);
		$this->pageTitle = $postdata['Post']['title'] . ' - vsrituaL.com';
		$this->set('post', $postdata);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The Post has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Post', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The Post has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->del($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>