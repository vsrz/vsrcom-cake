<?php 
/* SVN FILE: $Id$ */
/* Comment Test cases generated on: 2010-04-18 20:12:36 : 1271646756*/
App::import('Model', 'Comment');

class CommentTestCase extends CakeTestCase {
	var $Comment = null;
	var $fixtures = array('app.comment', 'app.post');

	function startTest() {
		$this->Comment =& ClassRegistry::init('Comment');
	}

	function testCommentInstance() {
		$this->assertTrue(is_a($this->Comment, 'Comment'));
	}

	function testCommentFind() {
		$this->Comment->recursive = -1;
		$results = $this->Comment->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Comment' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'post_id'  => 'Lorem ipsum dolor sit amet',
			'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'author'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-04-18 20:12:36',
			'modified'  => '2010-04-18 20:12:36'
		));
		$this->assertEqual($results, $expected);
	}
}
?>