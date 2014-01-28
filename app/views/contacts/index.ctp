<div class="body-left">	
	<h1>Contact Me</h1>
	<p>Use this form to send me an e-mail.  You don't need to spam me, kthx.</p>
	<?php $session->flash(); ?>
	<div id="contact_form">
		<?php 
			e($form->create('Contact', array('url' => '/contact')));
			e($form->input('Name', array('error' => false)));
			e($form->input('E-Mail Address', array('error' => false)));
			e($form->input('Message', array(
				'error' => false,
				'rows' => 8,
				'cols' => 36
			)));
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