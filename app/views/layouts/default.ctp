<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_for_layout; ?></title>	
	<?php
		print($scripts_for_layout);
		print($html->css('default'));
		
	?>		
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="header-banner">
				<?php 
					if($session->check("Auth.User.id")) {
						e('<a class="login" href="/users/logout">Logged In</a>');
					} else {
						e('<a class="login" href="/users/login">Login</a>');
					}
				?>
			</div>
			<div id="header-menu">
				<?php e($this->element('vsr_header_menu')); ?>
			</div>
		</div>
		<div id="body">
			<?php echo $content_for_layout; ?>
			<div class="clear"></div>
		</div>
	</div>	
	<script type="text/javascript">

  		var _gaq = _gaq || [];
  		_gaq.push(['_setAccount', 'UA-10751621-1']);
  		_gaq.push(['_trackPageview']);

  		(function() {
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  		})();

	</script>
</body>
</html>