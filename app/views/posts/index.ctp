<div class="body-left">	
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<h1><?php e($html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']))); ?></h1>
			<hr />
			<div class="postinfo">
				<span class="postauthor">
					Posted by <?php e($html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id']))); ?>
				</span>
				<span class="postdate">
					On <?php e($time->niceShort($post['Post']['created'])); ?>		
				</span>
			</div>
			<div class="clear"></div>
			<div class="postcontent">
				<?php 
					$decoda->useGeshi = true; 
					$decoda->parse($post['Post']['body'], false, array('b', 'i', 'u', 'img', 'url', 'code')); 
				?>
			</div>
			<?php if(!empty($post['Comment'])) :?>				
				<div class="comments">
					<h2>Comments</h2>
					<hr />
					<?php App::import('Sanitize'); ?>
          				<?php foreach ($post['Comment'] as $comment): ?>
						<h3>By <?php e($comment['author']); ?> on <?php e($time->niceShort($comment['created'])); ?></h3>
						<p><?php e(Sanitize::html($comment['body']));?></p>		
						<hr />
					<?php endforeach;?>			
				</div>
			<?php endif;?>	
			<div class="addbtn">
				<a href="/posts/view/<?php e($post['Post']['id']);?>">Add Comment</a>
			</div>
		</div>

	<?php endforeach; ?>
</div>
<div class="body-right">	
	<?php e($this->element('ad-panel')); ?>
</div>			
<div class="clear"></div>
<div id="bottom">
	<div class="postsnav">
		<?php echo $paginator->prev('<< '.__('newer', true), array(), null, array('class'=>'disabled'));?> 
		<?php echo $paginator->numbers();?>		
		<?php echo $paginator->next(__('older', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	<span class="copyright">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
