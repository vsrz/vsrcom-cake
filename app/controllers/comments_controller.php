<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	var $helpers = array('Html', 'Form', 'Decoda');
	var $uses = array('Post', 'Comment');

	function beforeFilter() {
		$this->Auth->allow('view', 'add');
		$this->pageTitle = 'Comments - vsrituaL.com';
	}
	function index() {
		$this->redirect('/');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Comment.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function add($postid = null) {								
		if (!empty($this->data)) {
			if(empty($this->data['Comment']['author'])) $this->data['Comment']['author'] = 'Anonymous';
			if(empty($this->data['Comment']['body']) || $this->data['Comment']['test'] != '6') {
				$this->redirect(array('controller' => 'posts', 'action' => 'view', $this->data['Comment']['post_id']));
			}
			$this->Comment->create();			
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The Comment has been saved', true));
				$this->redirect(array('controller' => 'posts', 'action' => 'view', $this->data['Comment']['post_id']));
			} else {
				$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true));
			}
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

}
?>
