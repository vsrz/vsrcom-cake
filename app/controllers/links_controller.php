<?php 

class LinksController extends AppController {
	
	var $name = 'Links';
	
	function beforeFilter() {
		$this->pageTitle = 'vsrituaL.com - Links';
		parent::beforeFilter();
		$this->Auth->allow('index');
		
	}
	function index() {
		$this->set('links', $this->Link->find('all'));
	}
	
	function add() {
		if(!empty($this->data)) {
			if($this->Link->save($this->data)) {
				$this->Session->setFlash('Link was added successfully.');
				$this->redirect(array('action' => 'index'));
			} else $this->Session->setFlash('There was an error adding your link.');
		}
	}
}