<?php debug($comments); ?>
<div class="post">
	<h1><?php e($html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']))); ?></h1>
	<hr />
	<div class="postinfo">
		<span class="postauthor">
			Posted by <?php e($html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id']))); ?>
		</span>
		<span class="postdate">
			On <?php e($post['Post']['created']); ?>		
		</span>
	</div>
	<div class="clear"></div>
	<div class="postcontent">
		<?php $decoda->parse($post['Post']['body'], false, array('b', 'i', 'u', 'img', 'url', 'code')); ?>
	</div>
</div>
<div class="comments display">
	<?php foreach ($comments as $comment): ?>
		<h3><?php $comment['Comment']['title'];?> by <?php $comment['Comment']['author'] ?></h3>
		<p><?php $comment['Comment']['body'];?></p>		
	<?php endforeach;?>
</div>
<div class="comments form">
<?php echo $form->create('Comment');?>
	<fieldset>
 		<legend><?php __('Add Comment');?></legend>
	<?php
		echo $form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));
		echo $form->input('title');
		echo $form->input('author');
		echo $form->input('body');		
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div id="bottom">
	<span class="copyright" style="float: none;">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
