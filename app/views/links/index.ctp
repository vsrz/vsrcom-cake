<div class="body-left">	
	<h1>Links</h1>
	<?php $session->flash(); ?>
	<p>These are various links which I have found useful or just plain funny.</p>
		<?php foreach ($links as $link): ?>
			<a href="<?php e($link['Link']['url']); ?>"><?php e($link['Link']['url']); ?></a>
			<p><?php e($link['Link']['details']);?></p>
		<?php endforeach; ?>
</div>
<div class="body-right">	
	<?php e($this->element('ad-panel')); ?>
</div>			
<div class="clear"></div>
<div id="bottom">
	<span class="copyright">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
