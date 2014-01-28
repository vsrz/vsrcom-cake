<div class="body-left">	
	<h1>User Login</h1>
	<p>Don't have an account?  Then get out!</p>
	<?php $session->flash('auth'); ?>
	<?php $session->flash(); ?>
	<div id="login_form">
		<?php
			echo $form->create('User', array('action' => 'login'));
			echo $form->input('username');
			echo $form->input('password');
			echo $form->end('Login');
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