<div class="body-left">	
	<?php $session->flash(); ?>
	<table border="0" cellpadding="0" cellspacing="0" style="text-align: center; width: 100%; margin-top: 5%;">
		<tr>
			<td style="font-size: small;"><a name="goto"><?php e($this->element('photo_nav')); ?></td>
		</tr>
		<tr>
			<?php 
				foreach($photos as $photo) :
					e('<tr><td>');
					e('<h3>'.$photo['Photo']['title'].'</h3>');					
					$img = ($html->image(
						$photo_store . '/' . $photo['Photo']['url'], array(
							'alt' => $photo['Photo']['title'],
							'style' => 'padding: 3px; background-color: #b0b0b0; border: 1px solid #454545;',
							'width' => $photo_dims[0],
							'height' => $photo_dims[1],							
						)
					));
					
					e($html->link(
						$img,
						'/img/' . $photo_store . '/' . $photo['Photo']['url'],												
						array(
							'escape' => false
						)
						
					));
					
					e('</td></tr>');
					e('<tr><td>');
					e(
						$html->para(
							null, 'Submitted ' . $time->niceShort($photo['Photo']['created']) . ' by '. $html->link(
								$photo['User']['username'], 
								array(
									'controller' => 'users', 
									'action' => 'view', 
									$photo['User']['id']
								)
							)
						)
					);
					e('</td></tr>');
					e('<tr><td>');
					e($html->para(null, $photo['Photo']['caption']));
					e('</td></tr>');					
				endforeach;
			?>			
		</tr>
	</table>
</div>
<div class="body-right">	
	<?php e($this->element('ad-panel')); ?>
</div>			
<div class="clear"></div>
<div id="bottom">
	<span class="copyright">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
