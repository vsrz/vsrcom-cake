<?php 

class Link extends AppModel {
	
	var $name = 'Link';
	
	var $validate = array(
		'url' => array (
			'rule' => array('minLength' => 1),
			'allowEmpty' => false
		),
		'details' => array(
			'rule' => array('minLength' => 1),
			'allowEmpty' => false
		)
	);
	
}