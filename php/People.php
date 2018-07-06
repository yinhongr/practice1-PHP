<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link  href="../css/mainstyle.css"  type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="../css/people.css" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<title>yinhongr's Second Assignment</title>

</head>

<body>
<?php

include('session.php');
?>
	<div id="background">

	</div>

	<div>

<table>

	<tr>
    <td>Welcome! <?php echo "$session_user";?></td>
    <td><a class="link" href="my.php">My Page</a></td>
    <td><a class="link" href="admin.php">Admin Page</a></td>
    <td><form action="signout.php" method="post"><input name="signout" type="submit" value="Sign Out"/></td>
    </table>

<center><h1>People Page</h1></center>


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

	<div>
		
<?php
include('db_conn.php'); //db connection
//printing list
$tablequery="SELECT * FROM `users` WHERE `Access`=1 ORDER BY `Name`";
//echo $session_user."23";
//executing the tablequery
$result=$mysqli->query($tablequery);

//echo "$tablequery";

echo "<ul>";
while($row=$result->fetch_array(MYSQLI_ASSOC))
{
	//$row=$result->fetch_array(MYSQLI_ASSOC);
	//datavalue=$row['keyname'];
	$id=$row['ID'];
	$name=$row['Name'];
	$DOB=$row['DOB'];
	$Email=$row['Email'];
	$access=$row['Access'];
	
	//starting new row in the table
	echo "<tr>";
	echo "<div ><li id='$id'>".$name."</li></div>";
	echo "<div id='info'><p id='$name'>"."DOB: ".$DOB."Email: ".$Email."Level: ".$access;
	echo "</p></div>";
?>
<script>
	$(document).ready(function() {
		$("<?php echo '#'.$name;?>").hide();
		$("<?php echo '#'.$id;?>").click(function() {
			$("<?php echo '#'.$name;?>").toggle();
			});
		});


</script>
<?php
}
//closing table tag
echo "</ul>";

?>


</div>
    


	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>