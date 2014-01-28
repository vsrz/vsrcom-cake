<h1>Add Links</h1>
<?php $session->flash(); ?>
<p>Use this page to add a link.</p>
<?php 
	e($form->create('Link'));
	e($form->input('url'));
	e($form->input('details'));
	e($form->end(' Submit '));
?>