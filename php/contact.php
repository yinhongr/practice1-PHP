
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link  href="../css/mainstyle.css"  type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="../css/contact.css" type="text/css" media="screen" />
<title>yinhongr's Second Assignment</title>

</head>

<body>
<?php
include("db_connect.php");
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
    <td><form action="signout.php" method="post"><input name="signout" type="submit" value="Sign Out"/></td>
    </tr>
    </table>

<center><h1>Contant Us Page</h1></center>


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



		<center>
		<h4>VIC</h4>
<div id="VIC">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>NSW</h4>
<div id="NSW">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>SA</h4>
<div id="SA">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>WA</h4>
<div id="WA">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>ACT</h4>
<div id="ACT">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>NT</h4>
<div id="NT">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>QLD</h4>
<div id="QLD">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

<h4>TAS</h4>
<div id="TAS">
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
</div>

		</center>


    

</div>

	

	

	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>



