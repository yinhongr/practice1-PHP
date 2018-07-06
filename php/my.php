
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link  href="../css/mainstyle.css"  type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="../css/home.css" type="text/css" media="screen" />
<title>yinhongr's Second Assignment</title>

</head>

<body>
<?php
include("db_conn.php");
include("session.php");
//check the authority of the users
$query = "SELECT * FROM users WHERE Username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
$access = $row['Access'];
//$password = $row['Password'];
if($access == "") {//if the user is public user, user cannot access this page 
	?>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Only the general member and administrator can access!");
			window.location.href="./Home.php";
        </script>
	<?php
	//header('Location: ./Home.php');
	
	}
?>
	<div id="background">

	</div>

	<div>

<table>

	<tr>
    <td>Welcome! <?php echo "$session_user";?></td>
    <td><a class="link" href="my.php">My Page</a></td>
    <td><a class="link" href="admin.php">Admin Page</a></td>
    <td><form action="signout.php" method="post"><input name="signout" type="submit" value="Sign Out"/></form></td>
    </tr>
    </table>

<center><h1>My Page</h1></center>


<div id="nav">
	<table id="title">
    <td><a class="home" href="./Home.php">Home page</td>
    <td><a class="people" href="./People.php">People page</td>
    <td><a class="online" href="./online.php">Online survey page</td>
    <td><a class="contact" href="./contact.php">Contact us page</td>
    </table>
</div>


	</div>

	

	<div id="maincontent">
	<table>
	<!--when the submit button is clicked, the submitted data(Username, Password) will be sent to signin_engine.php -->
    <form action="./my.php" method="post">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="Username" type="text" value="<?php echo $session_user; ?>" disabled id="Username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="Password" type="Password" id="Password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
			<td><input type="submit" name="mysubmit" value="Sign in">
			<input type="reset" name="reset" value="Reset"></td>
      	</tr>
	</form>
	</table>
	<div>
<?php
if(isset($_POST['mysubmit'])){
//receive the Password data from the form (in my.php)
$Password=$_POST['Password'];

//query to check whether password is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE Username='$session_user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);
//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);

	$encrypt_password=MD5($Password);
	if($row['Password']==$encrypt_password) {

		header('Location: ./my_engine.php');

	}//if the Password from table/database does not match with the Password data from the my page form

	else {
		echo "invalid_Password";
		//header('Location: ./my.php?error=invalid_Password');
	}
}

?>



</div>
	</div>

	

	

	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>


