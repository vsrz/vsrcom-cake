<div class="body-left">	
	<h1>Administrator Application</h1>
	<p>
		Thank you for your interest in becoming an Admin on the GG Server.  Before you 
		fill out the form below, please take the time to read the guidelines.
	</p>
	<p>
		The information I will be collecting is private only to me and will not be
		shared with anyone else.  I will potentially be trusting you with my server.  
		The least I could ask for is some basic information about you.
	</p>	
	<p>
		What I expect:
	</p>
	<ul>
		<li>
			Basic maturity. If you scream into the mic frequently, make knee jerk reactions,
			ask for someone to be kicked because they piss you off, or all of the above, 
			please don't bother me.
		</li>
		<li>
			Basic computer knowledge. Obviously, the more the better.  This is a Linux 
			server so you may need to know some basic commands to get start.
		</li>
		<li>
			You must be active.
		</li>
		<li>
			You must be in our <a href="http://steamcommunity.com/groups/vsritual">Steam Community Group</a>.
		</li>
	</ul>
	<p>
		Think you have what it takes?  Apply now!
	</p>		
	<?php $session->flash(); ?>
	<div id="contact_form">
		<?php 
			e($form->create('Adminapp', array('url' => '/admin')));
			e($form->input('name', array(
				'error' => false,
				'label' => 'Real name',
			)));
			e($form->input('location', array(
				'error' => false,
				'label' => 'City and State',
			)));
			e($form->input('email', array(
				'error' => false,
				'label' => 'E-mail address',
			)));
			e($form->input('birthdate', array(
				'error' => false,
				'label' => 'Birthdate',

			)));
			e($form->input('steamid', array(
				'error' => false,
				'label' => 'Steam ID',
			)));
			e($form->input('nickname', array(
				'error' => false,
				'label' => 'Nickname',
			)));
			e($form->input('hours', array(
				'error' => false,
				'label' => 'List the times and days you normally play',
				'rows' => 8,
 				'cols' => 36
			)));
			e($form->input('compxp', array(
				'error' => false,
				'label' => 'Describe your computer experience',
				'rows' => 8,
				'cols' => 36
			)));
			e($form->input('adminxp', array(
				'error' => false,
				'label' => 'Describe your admin experience',
				'rows' => 8,
				'cols' => 36
			)));
			e($form->input('csxp', array(
				'error' => false,
				'label' => 'Describe your counter strike experience',
				'rows' => 8,
				'cols' => 36
			)));
			e($form->input('why', array(
				'error' => false,
				'label' => 'Why should you be an admin?',
				'rows' => 8,
				'cols' => 36
			)));
			e($form->input('other', array(
				'error' => false,
				'label' => 'Anything else you want to say?',
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