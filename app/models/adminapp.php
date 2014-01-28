<?php 

class Adminapp extends AppModel {
	var $name = 'Adminapp';
	
	var $validate = array(
		'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid e-mail address'
		)
	);
}