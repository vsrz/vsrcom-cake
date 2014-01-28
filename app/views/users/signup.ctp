<?php if($form->isFieldError('User.username')) e($form->error('User.username', null, array('class' => 'message'))); ?>
<?php if($form->isFieldError('User.password')) e($form->error('User.password', null, array('class' => 'message'))); ?>
<?php if($form->isFieldError('User.email')) e($form->error('User.email', null, array('class' => 'message'))); ?>
<h3>
	Signup for an account
</h3>
<?php e($form->create('User', array('action' => 'signup'))); ?>
	<fieldset>
		<label for="UserUsername" class="usernamelabel"><span>Username</span></label>
		<?php e($form->text('username'));?>
		<br />
		<label for="UserEmail" class="emaillabel"><span>E-Mail</span></label>
		<?php e($form->text('email'));?>
		<br />		
		<label for="UserPassword" class="passwordlabel"><span>Password</span></label>
		<?php e($form->password('password'));?>
		<br />		
		<label for="UserPasswordRepeat" class="passwordrepeatlabel"><span>Password Repeat</span></label>
		<?php e($form->password('password2'));?>
		<?php e($form->submit('Sign Up')); ?> 
	</fieldset>
<?php e($form->end()); ?>