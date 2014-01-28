<?php 
/* SVN FILE: $Id$ */
/* Comment Fixture generated on: 2010-04-18 20:12:36 : 1271646756*/

class CommentFixture extends CakeTestFixture {
	var $name = 'Comment';
	var $table = 'comments';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'post_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index'),
		'body' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'author' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 32),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'post_id' => array('column' => 'post_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'post_id'  => 'Lorem ipsum dolor sit amet',
		'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'author'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2010-04-18 20:12:36',
		'modified'  => '2010-04-18 20:12:36'
	));
}
?>