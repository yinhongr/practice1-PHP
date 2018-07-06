<?php
	include('db_conn.php');
		
	//get the q parameter from URL
	$Username=$_GET["Username"];
	
    $result=$mysqli->query("SELECT `Username` FROM `users` WHERE `username` LIKE '$Username'");
    $result_cnt = $result->num_rows;
	if ($result_cnt!=0) {
		echo "username exists";
	} else {
		echo "available username";		
	}

?> 
