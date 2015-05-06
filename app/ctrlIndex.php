<?php

class ctrlIndex extends ctrl{
	
	function index(){
		$this->posts = $this->db->query('SELECT * FROM post ORDER BY ctime DESC')->all();
		$this->out('posts.php');
	}
}
//commit

?>