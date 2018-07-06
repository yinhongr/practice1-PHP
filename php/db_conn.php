<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'yinhongr', 'RENAcis1', 'yinhongr');
//check whether there is error in connection
if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

?>