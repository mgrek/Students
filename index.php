<?php
	
	include "lib/db.php";
	include "lib/Base.php";

	//$this->mysqli = new mysqli("localhost","root","","blog");
	
	new app(substr($_SERVER['REQUEST_URI'],2));
?>