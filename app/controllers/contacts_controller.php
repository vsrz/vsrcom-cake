<?php 

class ContactsController extends AppController {
	
	var $name = 'Contacts';
	var $components = array('Email');
	var $uses = array('Contact', 'Adminapp');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'adminapp');
		$this->pageTitle = 'Contact Me - vsrituaL.com';
	}
	
	function index() {
		if(!empty($this->data)) {
			$this->Contact->set($this->data);				
			if($this->Contact->validates()) {
				// Do stuff and send e-mail
				$this->Email->from  	= $this->data['Contact']['Name'] . ' <' . $this->data['Contact']['E-Mail Address'] . '>';
				$this->Email->to		= 'ritual@vsritual.com';
				//$this->Email->to		= 'jbvillegas@gmail.com';
				$this->Email->subject	= 'Your Message from vsrituaL.com - ' . $this->data['Contact']['Name'] . '(' . $this->data['Contact']['E-Mail Address'] . ')';
				$this->Email->send('
					'.$this->data['Contact']['Name'].' says:
					'.$this->data['Contact']['Message'].'

					From: '.$_SERVER['REMOTE_ADDR'].'
				');
				$this->data = null;	
				$this->Session->setFlash('Your e-mail was sent successfully.', 'successbox');				
			} else {
				$this->Session->setFlash($this->Contact->invalidFields(), 'error_list');
			}
		}	
	}

	function adminapp() {
		if(!empty($this->data)) {
			$this->data['Adminapp']['ipaddr'] = $_SERVER['REMOTE_ADDR'];
			$this->Adminapp->set($this->data);		
			if($this->Adminapp->validates()) {
				// Do stuff and send e-mail
				$this->Email->from  	= $this->data['Adminapp']['name'] . ' <' . $this->data['Adminapp']['email'] . '>';
				$this->Email->to		= 'ritual@vsritual.com';
				$this->Email->subject	= 'Admin Application - ' . $this->data['Adminapp']['name'] . '(' . $this->data['Adminapp']['email'] . ')';
				$this->Email->send('
					Name: '.$this->data['Adminapp']['name'].' 
					City and State: '.$this->data['Adminapp']['location'].' 
					E-Mail Address: '.$this->data['Adminapp']['email'].'
					Remote IP: '.$_SERVER['REMOTE_ADDR'].'
					Birthday: '.$this->data['Adminapp']['birthdate'].' 
					Steam ID: '.$this->data['Adminapp']['steamid'].' 
					Nickname: '.$this->data['Adminapp']['nickname'].' 

					Computer Experience: '.$this->data['Adminapp']['compxp'].' 

					Admin Experience: '.$this->data['Adminapp']['adminxp'].' 

					CS Experience: '.$this->data['Adminapp']['csxp'].' 

					Why should you be an admin: '.$this->data['Adminapp']['why'].' 

					Times and days you normally play: '.$this->data['Adminapp']['hours'].' 

					Other comments: '.$this->data['Adminapp']['other'].' 

				');
				$this->Adminapp->saveAll($this->data, array('validate' => false));
				$this->data = null;	
				$this->Session->setFlash('Your e-mail was sent successfully.', 'successbox');				
			} else {
				$this->Session->setFlash($this->Adminapp->invalidFields(), 'error_list');
			}
		}	
	}
	
}
