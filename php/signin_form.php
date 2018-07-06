<html>
<head>
<link rel="stylesheet" href="../css/login.css" type="text/css" media="screen" />
<title>Yinhongr's Second Assignment</title>
</head>

<body>
<center>
	<h1>Sign in</h1>
    <?php
//include the file session.php
include("session.php");

//if the session for Username has been set, automatically go to "signin_success.php"
if($session_user!="") {
	header('location: ./Home.php');
}

//if there is any received error message 
if($_GET['error']!="")
{
	$errormessage=$_GET['error'];
	
	echo "$errormessage";
}
?>
    <p>Please login to the system</p><br>
   
	<table>
	<!--when the submit button is clicked, the submitted data(Username, Password) will be sent to signin_engine.php -->
    <form action="./signin_engine.php" method="post">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="Username" type="text" id="Username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="Password" type="Password" id="Password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Sign in">
			<input type="reset" name="reset" value="Reset"></td>
      	</tr>
	</form>
	</table>
	<a href="signup.php">Sign Up</a> <br/>
    <a href="Home.php">Visit to Home as public user</a>
</center>   
</body>
</html>

