<?php

class Album extends AppModel {
	
	var $hasMany = array(
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'album_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Photo.created ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);			
	

}