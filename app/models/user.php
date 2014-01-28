<?php
class User extends AppModel {

	var $name = 'User';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Photo' => array(
			'className' => 'Photo',
			'foreignKey' => 'user_id',
			'fields' => array('User.username', 'User.id')
		)
	);
	
	var $validate = array(
		'username' => array(
			'checkEmpty' => array(
				'rule' => array('minLength' => 1),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Please enter a username'
			),
			'checkUnique' => array(
				'rule' => array('checkUnique', 'username'),
				'message' => 'Username is already taken.  Please use another.'
			)
		),
		'password' => array(
			'checkEmpty' => array(
				'rule' => array('minLength', 1),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Please enter a password'
			),
			'passwordRepeatCheck' => array(
				'rule' => 'checkPasswords',
				'message' => 'Password do not match!'
			)
		),
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please enter a valid e-mail address'
		),
	);

	function checkUnique($data, $fieldName) {
		$valid = false;
		if(isset($fieldName) && $this->hasField($fieldName)) {
			$valid = $this->isUnique(array($fieldName => $data));
	
		}
		return $valid;
	}
	
	function checkPasswords($data) {
		if($data['password'] == $this->data['User']['password2hashed'])
			return true;
		return false;
	}
}
?>