<div class="body-left">	
	<h1>Submit a photo</h1>
	<p>Want to submit a photo?  Fill out this form then upload your photo.  Thank you!</p>
	<?php $session->flash(); ?>

	<div class="photoupload_form">
		<?php 
			e($form->create('Photo', array('enctype' => 'multipart/form-data')));
			e($form->input('title', array('error' => false)));
			e($form->input('caption', array('error' => false)));
			e($form->input('Album Code', array('error' => false)));
			e($form->file('Photo.Upload'));
			e($form->end('Submit'));
		?>
	</div>
</div>
<div class="body-right">	
	<?php e($this->element('ad-panel')); ?>
</div>			
<div class="clear"></div>
<div id="bottom">
	<span class="copyright">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
