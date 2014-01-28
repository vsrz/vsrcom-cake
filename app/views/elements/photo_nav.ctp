<?php
	echo $paginator->options(array('url' => $this->passedArgs)); 
	echo 'Photo navigation<br />';
	echo $paginator->first(' First ');
	e('|');
	echo $paginator->prev(' Previous ', null, ' Previous ', array('class' => 'disabled'));
	e(' | ');
	echo $paginator->numbers(array(
		'modulus' => 5, 
		'separator' => '  '
	));
	e(' | ');
	echo $paginator->next(' Next ', null, ' Next ', array('class' => 'disabled'));
	e(' | ');
	echo $paginator->last(' Last ');
		
	
