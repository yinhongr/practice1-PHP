<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link  href="../css/mainstyle.css"  type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="../css/online.css" type="text/css" media="screen" />
<title>yinhongr's Second Assignment</title>

<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
	 function setup_country_change(){
         //check whether country section is changed.
         $('#country').change(update_states);
      }
      
      function update_states(){
         //assigns the selected country to country variable.
         var country = $('#country').val();
         
         //get_states.php performs when the country is selected.
         //call the function(show_states) when the data is returned from get_states.php.
         $.get('get_states.php?country='+country,show_states);
      }
      
      function show_states(states){
         //returned data from get_states.php is assigned to states
	     //change the field(drop down list)
         $('#states').html(states);
		 update_city();
		 setup_state_change();
		 
      }
   
	function setup_state_change(){
         //check whether country section is changed.
         $('#states').change(update_city);
      }
      
      function update_city(){
         //assigns the selected country to country variable.
         var state = $('#state').val();
         
         //get_cities.php performs when the country is selected.
         //call the function(show_cities) when the data is returned from get_cities.php.
         $.get('get_cities.php?state='+state,show_cities);
      }
      
      function show_cities(cities){
         //returned data from get_cities.php is assigned to cities
	     //change the field(drop down list)
         $('#cities').html(cities);
      }
   
      //When the page is loaded, function (setup_country_change())is called.
      $(document).ready(setup_country_change);
   </script>



</head>

<body>

	<div id="background">

	</div>

	<div>
<?php
include("session.php");
//database connection
include("db_conn.php");


//If user does not have access number, then the user cannot access this page, and back to home page
$query = "SELECT * FROM users WHERE Username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
if($session_user == "") {
	?>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Only the general member and administrator can access!");
			window.location.href="./Home.php";
        </script>
	<?php
	
	}
?>
<table>
	<tr>
    <td>Welcome! <?php echo "$session_user";?></td>
    <td><a class="link" href="my.php">My Page</a></td>
    <td><a class="link" href="admin.php">Admin Page</a></td>
    <td><form action="signout.php" method="post"><input name="signout" type="submit" value="Sign Out"/></form></td>
    </tr>
    </table>

<center><h1>Online Survey Page</h1></center>


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

<?php
if(isset($_POST['form_submit'])){
	$gender=$_POST['Gender'];
    $country=$_POST['country'];
	$state=$_POST['state'];
	$cities=$_POST['city'];
   	$Satisfaction=$_POST['Satisfaction'];
        
	
    //setting the error message
    $error="";
        
    //gender validation
    if($gender==""){
    	$error.=" Please type your Gender"."<br/>";
    }
    //country validation
    if($country=="default"){
    	$error.=" Please type the country"."<br/>";
    }
    //state validation
    if($state=="default"){
    	$error.=" Please type the State"."<br/>";
    }
    //city validation
    if($cities=="default"){
    	$error.=" Please type the City"."<br/>";
    }
    
//Satisfaction validation
	if($Satisfaction==""){
        $error.=" Please type your Satisfaction"."<br/>";
	}
	
    if($error==""){
    	//echo "Thanks";
		//query for inserting
		$insertquery = "INSERT INTO `survey` (`ID`, `Gender`, `Country`, `State`, `City`, `Satisfaction`, `Created`) VALUES (NULL, '$gender', '$country', '$state', '$cities', '$Satisfaction', CURRENT_TIMESTAMP);";
    	//execute the insert query
    	$mysqli->query($insertquery);
		
		?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Your information has been updated successfully!");
			
        </script>
		<?php
    	//automatically stay on online page
       // header('location: ./online.php');
    }
}
?>
	
<div id="form">
<form class="submit" action="online.php" method="post">
    		
    <label for="Gender">Gender:</label>
	<input type="radio"  class="Gender" value="Male" name="Gender" >Male</input>
	<label for="sexf">&nbsp; </label>
	<input type="radio"  class="Gender"  value="Female"  name="Gender" >Female</input>
	<br/>
		
	<table>
    <tr>
    <th>Country</th>
            <td>
               <select name="country" id="country">
                  <option value="default" selected="selected">Please select country.</option>
                  <option value="Australia">Australia</option>
                  <option value="USA">USA</option>
               </select>
            </td>
         </tr>
         <tr id="states">
            
         </tr>
		 <tr id="cities">
		   
		 </tr>
    
    </table>
		
   <label for="satisy">Satisfaction:</label>
	<input type="radio"  class="Satisfaction" value="Yes" name="Satisfaction" >Yes</input>
	<label for="satisn">&nbsp; </label>
	<input type="radio"  class="Satisfaction"  value="No"  name="Satisfaction" >No</input>
	<br/>
	
    <input type="submit" class="submit" value="Submit" name="form_submit"  /> 
	<input type="reset" value="Reset" class="reset" name="reset" /> 
	<p><?php echo $error; ?></p>

</form>
</div>




	</div>

	

	

	<div id="footer">

		<p class="p1">by Yinhong Ren       ID:174045</p>

	</div>

</body>
</html>


