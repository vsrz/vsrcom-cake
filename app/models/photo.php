<?php 

class Photo extends AppModel {
	
	var $belongsTo = array(
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',			
			'fields' => array('User.username', 'User.id'),
			'order' => ''
		)
	);
	
	var $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Please enter a title for your photo'
		),
		'Upload' => array(
			'uploaded_image' => array(
				'rule' => array('validateUploadedImageFile', true),
				'message' => 'The file uploaded was not a valid image or was too large'
			)
		),
		'Album Code' => array(
			'is_valid_code' => array(
				'rule' => array('validateAlbumCode'),
				'message' => 'The album code specified was invalid.  If you do not have a code, please leave this field blank.'
			)
		)
	);
	
	// Cross reference for a valid album code that was submitted by the user
	function validateAlbumCode($data) {
		
		$album_code = array_shift($data);				
		
		
		// If they didn't specify anything, return true
		if(empty($album_code)) return true;
		
		
		// Validate the album code specified exists in the Album database
		$total = $this->Album->find(
			'count', array(
				'conditions' => array(
					'Album.shortcut' => $album_code
				)
			)
		);
		if($total > 0) return true;
		return false;
		
	}
	function validateUploadedImageFile($data, $required = false) {
		
		// Move data into $ul and shift model name out of array
		$ul = array_shift($data);
				
		// Check to see if a file was uploaded
		if($required && ($ul['size'] < 1)) {
			return false;
		}
		
		// Check filesize
		if($ul['size'] > 5242880) {
			return false;
		}
		
		// Check for php file errors
		if ($ul['error']!==0) {
			return false;
		}
		
		// Make sure content type is correct
		$allowedTypes = array(
			'image/jpg',
			'image/jpeg',
			'image/png',
			'image/gif',
			'image/bmp',
			'image/tiff',
			'image/tif'
		);
						
		if(!in_array($ul['type'], $allowedTypes)) {
			return false;
		}
		
		// Return the filename
		return is_uploaded_file($ul['tmp_name']);
	}
	
	// Generate a random character string
	function rand_str($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890') {
		// Length of character list
		$chars_length = (strlen($chars) - 1);

		// Start our string
		$string = $chars{rand(0, $chars_length)};
	   
		// Generate random string
		for ($i = 1; $i < $length; $i = strlen($string)) {
			// Grab a random character from our list
			$r = $chars{rand(0, $chars_length)};
		   
			// Make sure the same two characters don't appear next to each other
			if ($r != $string{$i - 1}) $string .=  $r;
		}
	   
		// Return the string
		return $string;
	}
	
	public function imgResize($target) {
		$maxwidth = 780;
		list($width, $height) = getimagesize($target);
		
		if($width > $maxwidth) {
			$perc_scale = 780 / $width;
			$width = intval($perc_scale * $width);
			$height = intval($perc_scale * $height);			
		}
		
		return(array($width,$height));
	}
}