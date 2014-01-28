<?php 

class Contact extends AppModel {
	var $name = 'Contact';
	var $useTable = false;
	
	var $validate = array(
		'Name' => array(
			'rule' => array('minLength', 2),
			'required' => true,
			'message' => 'Name is required.'
		),
		'E-Mail Address' => array(
			'rule' => 'email',
			'required' => true,
			'message' => 'Please enter a valid e-mail address'
		),
		'Message' => array(
			'rule' => array('minLength', 10),
			'message' => 'Please enter a message'
		)
	);
}