<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

//receive the Username data from the form (in signin_form.php)
$user=$_POST['Username'];
//receive the Password data from the form (in signin_form.php)
$Password=$_POST['Password'];

//query to check whether Username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE Username='$user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);
//echo "00";
//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);
//echo "==";

//if the Username from table/database is not same as the Username data from the form(from signin_form.php)
if($row['Username']!=$user || $user=="")
{
	
	//automatically go back to signin_form and pass the error message
	header('Location: ./signin_form.php?error=invalid_Username');

	
}//if the Username is same as the Username data from the form(from signin_form.php) 
else {
	$encrypt_password=MD5($Password);
	if($row['Password']==$encrypt_password) {
	//if the Password from table/database is same as the Password data from the form(from signin_form.php)
	//if($row['Password']==$Password) {
		//save the Username in the session
		$session_user=$row['Username'];
		$_SESSION['session_user']=$session_user;
		//automatically go to signin_success.php

		header('Location: ./Home.php');

	}//if the Password from table/database does not match with the Password data from the signin form

	else {

		//automatically go back to signin_form and pass the error message
		header('Location: ./signin_form.php?error=invalid_Password');

	}
}
?>
