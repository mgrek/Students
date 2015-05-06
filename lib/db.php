<?php

class db{
	
	public function __construct(){
		$this->mysqli = new mysqli("localhost","root","","blog");
	}
	
	public function query($sql){
		$args = func_get_args();
		$link = $this->mysqli;
		array_map(function ($params) use ($link){
			return $link->escape_string($params);
		}, $args);
		
		$sql = str_replace(array('%','?'),array('%%','%s'),$sql);
		array_unshift($args, $sql);
		$sql = call_user_func_array('sprintf',$args);
		
		$this->mysqli->query($sql);
		
		$this->last = $this->mysqli->query($sql);
		if($this->last === false) 
			throw new Exception('Database error: '.$this->mysqli->error);
		
		return $this;
	}
	
	public function assoc(){
		return $this->last->fetch_assoc();
	}
	
	public function all(){
		$result = array();
		while($row = $this->last->fetch_assoc()) $result[] = $row;
		return $result;
	}
}

?>