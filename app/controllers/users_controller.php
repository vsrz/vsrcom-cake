<?php
class UsersController extends AppController {

	var $name = 'Users';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'index');
	}

	function signup() {
		if(!empty($this->data)) {
			if(isset($this->data['User']['password2']))
				$this->data['User']['password2hashed'] = $this->Auth->password($this->data['User']['password2']);
			$this->User->create();
			if($this->User->save($this->data)) {
				$this->Session->setFlash('Signup was successful.');
				$this->redirect(array('controller' => 'questions', 'action' => 'home'));
				
			} else {
				$this->Session->setFlash('There was an error signing up.');
				$this->data = null;
			}
		}
		
		
	}
	
	function restart() {
		if(!empty($this->data)) {
	
			if(
				($this->data['User']['username'] == 'bossman' && $this->data['User']['password'] == '365177dfe0a6bf39baff88507949827728c212cb') ||
				($this->data['User']['username'] == 'cometh' && $this->data['User']['password'] == '67c9ea7826d5f4e4a8473d370c00962a07ed4dba')
			) {
				// Do the server stuff
				$fHandle = fopen('/home2/vsritual/res.flag', 'w') or die("file open error");
				fwrite($fHandle, $this->data['User']['username'] . ' ' . $_SERVER['REMOTE_ADDR']);
				fclose($fHandle);
				$res = shell_exec('/usr/bin/scp -P220 /home/biocu0/res.flag svmon@38.102.4.175:');
				
				// Clear the fields
				$this->data['User']['username'] = '';
				$this->data['User']['password'] = '';
				
				// Set flash message
				$this->Session->setFlash('Authentication successful. System will restart within 5 minutes.', 'successbox');
			} else {
				$this->data['User']['password'] = '';
				$this->Session->setFlash('Invalid login.  Please try again.');
			}
		}
			
	}
	function index() {
		
	}
	
	function login() {
		
	}
	
	function logout() {
		$this->Session->setFlash('Logout');
		$this->redirect($this->Auth->logout());
		
	}
}
?>
