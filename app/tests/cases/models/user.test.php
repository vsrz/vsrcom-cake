<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2010-04-18 20:11:20 : 1271646680*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user', 'app.post');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-04-18 20:11:17',
			'modified'  => '2010-04-18 20:11:17'
		));
		$this->assertEqual($results, $expected);
	}
}
?>