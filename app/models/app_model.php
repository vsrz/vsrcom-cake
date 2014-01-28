<?php

class AppModel extends Model {
	var $specific = false;
	var $useDbConfig = null;
	
	function __construct($id = false, $table = null, $ds = null) {
		$this->useDbConfig = Configure::read('UseDb');
        parent::__construct($id, $table, $ds);
    } 
}