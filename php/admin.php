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
//If user does not have access number, then the user cannot access this page, and back to home page
$query = "SELECT * FROM users WHERE Username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
if($row['Access'] != "1") {
	?>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Only the administrator can access!");
			window.location.href="./Home.php";
        </script>
	<?php
	
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

<center><h1>Administrator Page</h1></center>


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
    <form action="./admin.php" method="post">
    	<tr>
    		<td>Username:</td>
    		<td><input name="Username" type="text" value="<?php echo $session_user; ?>" disabled id="Username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
 		<tr>
 	    	<td>Password:</td>
 	    	<td><input name="Password" type="Password" id="Password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
      	<tr>
			<td></td>
			<td><input type="submit" name="admin_submit" value="Submit"></td>
      	</tr>
	</form>
	</table>

<?php
if(isset($_POST['admin_submit'])){
//receive the Password data from the form (in my.php)
$Password=$_POST['Password'];

//query to check whether Username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE Username='$session_user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);
//echo "00";
//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);
//echo "==";
	$encrypt_password=MD5($Password);
	if($row['Password']==$encrypt_password) {

		$selectquery = "SELECT * FROM `users` WHERE 1";
		$result=$mysqli->query($selectquery);
		echo "";
		echo "<table border = 1>";
		echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>DOB</th><th>Email</th><th>Access</th></tr>";
		while($row=$result->fetch_array(MYSQLI_ASSOC)) {
			$id=$row['ID'];
			$name=$row['Name'];
			$username=$row['Username'];
			$dob=$row['DOB'];
			$email=$row['Email'];
			$access=$row['Access'];
			echo "<tr>";
			echo "<td>".$id."</td>";
			echo "<td>".$username."</td>";
			echo "<td>".$name."</td>";
			echo "<td>".$dob."</td>";
			echo "<td>".$email."</td>";
			echo "<td>";
			//echo $id;
	   		//echo $username;
			?>
            <form action="admin_engine.php" method="post" name="edit">
            <select id="<?php echo $id; ?>" name="<?php echo $id; ?>">
            	<option value="2" <?php if($access == 2) {echo "selected";}?>>General</option>
                <option value="1" <?php if($access == 1) {echo "selected";}?>>Admin</option>
            </select>
            
			<?php
			echo "</td></tr>";
			echo "<tr id='id'></tr>";
?>

		<?php	}//end while
		?>
        <input type="submit" name="admin_edit" value="Edit">
        <input type="reset" name="reset" value="reset">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("<?php echo '#'.$id;?>").change(function() {
				alert("<?php echo $id;?>");
				//var id = <?php //echo $id;?>;
				
				//$.post('admin_engine.php?id='+id);
												   });
		
			});
		</script>
		
     </form>
		</table>
		
   <?php
	}//end if
	else {
		?>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("You entered wrong password. Please try again!");
			window.location.href="./admin.php";
        </script>
		<?php
		}
		

}


		?>
    </div>

	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>


