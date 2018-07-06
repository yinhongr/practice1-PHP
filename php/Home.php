
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

<center><h1>Home Page</h1></center>


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

		<p>This is a website for people to search information which are very useful.</p>

	</div>
    

<?php
	//echo time() . "<br/>";
	echo date("Y-m-d h:i:sa");
?>


	</div>

	

	

	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>


