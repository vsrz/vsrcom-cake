<div class="body-left">
	<div class="post">
		<h1><?php e($html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']))); ?></h1>
		<hr />
		<div class="postinfo">
			<span class="postauthor">
				Posted by <?php e($html->link($post['User']['username'], array('controller' => 'users', 'action' => 'view', $post['User']['id']))); ?>
			</span>
			<span class="postdate">
				<?php e($time->niceShort($post['Post']['created'])); ?>		
			</span>
		</div>
		<div class="clear"></div>
		<div class="postcontent">
			<?php $decoda->parse($post['Post']['body'], false, array('b', 'i', 'u', 'img', 'url', 'code')); ?>
		</div>
	</div>
	<?php if(!empty($comments)): ?>
		<div class="comments">
			<h2>Comments</h2>
			<hr />
				<?php foreach ($comments as $comment): ?>
						<h3>By <?php e($comment['Comment']['author']); ?> - <?php e($time->niceShort($comment['Comment']['created'])); ?></h3>
					<p><?php App::import('Sanitize'); e(Sanitize::html($comment['Comment']['body']));?></p>		
					<hr />
				<?php endforeach;?>			
		</div>	
	<?php endif;?>
	<div class="addcomment">
		<?php 
			echo $form->create('Comment');
			echo "<h4>Add a comment</h4>";
			echo $form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));	
			echo "Name";
			echo $form->input('author', array('label' => false, 'size' => '40%'));
			echo "Comment";
			echo $form->input('body', array('label' => false, 'cols' => 50, 'rows' => 8));
			echo "What is five plus 1? (base 10 representation)";
			echo $form->input('test', array('label' => false, 'size' => '40%'));
			echo $form->button('Submit', array('class' => 'send', 'type' => 'submit'));
			echo $form->end();
		?>
	</div>
</div>
<div class="body-right">
	<?php e($this->element('ad-panel')); ?>
</div>
<div class="clear"></div>
<div id="bottom">
	<span class="copyright" style="float: none;">Copyright &copy; <?php date("Y"); ?> <a href="http://www.vsritual.com">vsritual.com</a>. All rights reserved.</a></span>
</div>
