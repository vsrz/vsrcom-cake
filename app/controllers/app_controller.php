<?php 

class AppController extends Controller {
	
	var $helpers = array('Form', 'Html', 'Session', 'Time', 'Decoda');
	var $components = array('Auth');
	function beforeFilter() {
		$this->Auth->allow(array('display', 'restart'));
	}
}