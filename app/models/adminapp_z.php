<?php 

class Adminapp extends AppModel {

	var $validate = array(
		'name' => array(
			'rule' => array('minLength', 2),
			'allowEmpty' => false,
			'message' => 'Name is required.'
		),
		'location' => array(
			'rule' => array('minLength', 1),
			'allowEmpty' => false,
			'message' => 'Please enter a city and state'
		),
		'email' => array(
			'rule' => array('minLength', 2),
			'allowEmpty' => false,
			'message' => 'Please enter a valid e-mail address'
		),
		'birthdate' => array(			
			'rule' => array('minLength', 4),
			'allowEmpty' => false,
			'message' => 'Birthdate required'
		),
		'steamid' => array(
			'rule' => array('minLength', 4),
			'allowEmpty' => false,
			'message' => 'Please Enter your SteamID'
		),
		'nickname' => array(
			'rule' => array('minLength', 1),
			'message' => 'Please enter your nickname'
		),
		'compxp' => array(
			'rule' => 'comp_xp_rule',
			'allowEmpty' => true,
			'message' => 'No computer experience entered'
		),
		'adminxp' => array(
			'rule' => 'admin_xp_rule',
			'allowEmpty' => true,
			'message' => 'No admin experience entered'
		),
		'csxp' => array(
			'rule' => 'cs_xp_rule',
			'allowEmpty' => true,
			'message' => 'No CS experience entered'
		),
		'why' => array(
			'rule' => 'why_rule',
			'allowEmpty' => true,
			'message' => 'Why you should be chosen not entered'
		),
		'hours' => array(
			'rule' => 'play_rule',
			'message' => 'Please describe how often you play'
		),			
		'ipaddr' => array(
			'rule' => 'ipaddr_rule',
			'message' => 'Invalid Client IP Address'
		),			
		'other' => array(
			'rule' => 'other_rule',
			'allowEmpty' => true,
		)
	);
}