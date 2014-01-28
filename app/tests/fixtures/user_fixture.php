<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2010-04-18 20:11:17 : 1271646677*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 32),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 64),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'username'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-04-18 20:11:17',
		'modified'  => '2010-04-18 20:11:17'
	));
}
?>