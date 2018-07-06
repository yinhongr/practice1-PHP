<html>

<head>
<link rel="stylesheet" href="../css/login.css" type="text/css" media="screen" />
<title>Yinhongr's Second Assignment</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
	$(document).ready(function() {
     	
     	// when user types in the username field, execute the following function
	      $("#Username").keyup( function () {
	      	
	      		// get the value of username field and assign as username.
	      		var Username = $("#Username").val();

	      		// send the data 'username' as username to checker.php and execute the following function (if the data sending is successful)
	      		$.get( "checker.php", { Username: Username} )
					  .done(function( data ) {
					  		// print the data (output of checker.php) as a label for 'username' id='output'
						    $("#output").html(data);
				});
		      	
	      });    
	      
     });
   
	 function setup_year_change(){
         //check whether year section is changed.
         $('#year').change(update_months);
		 $('#year').change(update_day);
      }
      
      function update_months(){
         //assigns the selected year to year variable.
         var year = $('#year').val();
         
         //get_month.php performs when the year is selected.
         //call the function(show_month) when the data is returned from get_month.php.
         $.get('get_month.php?year='+year,show_months);
      }
      
      function show_months(months){
         //returned data from get_month.php is assigned to month
	     //change the field(drop down list)
         $('#months').html(months);
		 update_day();
		 setup_month_change();
		 
      }
   
	function setup_month_change(){
         //check whether year section is changed.
         $('#months').change(update_day);
      }
      
      function update_day(){
         //assigns the selected country to country variable.
         var month = $('#month').val();
		 var year = $('#year').val();
         
         //get_day.php performs when the year is selected.
         //call the function(show_cities) when the data is returned from get_day.php.
         $.get('get_day.php?month='+month,'year='+year,show_days);
		 //$.get('get_day.php?month='+month,show_days);
		 
      }
      
      function show_days(days){
         //returned data from get_day.php is assigned to cities
	     //change the field(drop down list)
         $('#days').html(days);
      }
   
      //When the page is loaded, function (setup_country_change())is called.
      $(document).ready(setup_year_change);
	  
//	  function myFunction() {
//	alert("Your information has been submitted successful");
//	}
   </script>



</head>




<body>
<center>


<hr><h2>Sign Up</h2><hr>

<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

if(isset($_POST['signup_submit'])){
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$repassword = $_POST['rePassword'];
	$name = $_POST['Name'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	//$month = $_GET['month'];
	$day = $_POST['day'];	
	$email = $_POST['Email'];
	//$d=mktime($month, $day, $year);
		//echo date("Y-m-d", $d);
		echo $day;
		//echo $_GET['day'];
		echo $month;
		//echo $months;
		echo $year;
		//echo "<br/>";
		//$d=mktime($day+1, $month+1, $year);
		//echo "Created date is " . date("Y-m-d", $d);
		//echo date("M-d-Y",mktime(0,0,0,12,36,2001));
	//setting the error message
    $error="";
        
    //username validation
    if($username==""){
    	$error.=" Please type your username"."<br/>";
    }
	//username must be contain at least 1 character
	elseif(!preg_match("#[a-z]+#", $username)){
 		//if the username does not include any letter
		$error.="Username must include at least one letter!<br/>";
	}
    //password validation
    if($password==""){
    	$error.=" Please type the password"."<br/>";
    }
    elseif(strlen($password)<5){
    	//if the password is under 5 characters
    	$error.=" The password must be at lease 5 characters"."<br/>";
    }
    elseif(count(explode(' ', $password))>1){
    	//if the password does not include any whitespace
    	$error.="Password must not include any whitespace!<br/>";
	}
    //repassword validation
    if($repassword==""){
    	$error.=" Please type the repassword"."<br/>";
    }
	//retype password must exactly same as password
	elseif($password!=$repassword) {
		$error.="Repassword must exactly same as password"."<br/>";
		}
	//name validation
	if($name == "") {
		$error.=" Please type your name"."<br/>";
		}
	elseif((count(explode(' ', $name))<1)) {
		$error.=" Please type your first and last name"."<br/>";
		}

	//email validation
	if($email==""){
        $error.=" Please type your email address"."<br/>";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
		//if the email is not proper..(format)
		$error.=" Please type the correct format of email address"."<br/>";
    }
	//echo $username;//.$password.$repassword.$name.$year.$month.$day.$email;
    else {
		
		$encrypt_password=MD5($password);
		$save = $year.'-'.$month.'-'.$day;
		$insertquery = "INSERT INTO `yinhongr`.`users` (`ID`, `Username`, `Password`, `Name`, `DOB`, `Email`, `Access`, `Created`) VALUES (NULL, '$username', '$encrypt_password', '$name', 'date('$year-$month-$day')', '$email', '2', CURRENT_TIMESTAMP);";
		$mysqli->query($insertquery);
		$session_user=$username;
		$_SESSION['session_user']=$session_user;
    	//automatically go to home.php
        ?>
		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Your information has been saved successfully!");
			window.location.href="./Home.php";
        </script>
		
		<?php
    }

}
?>

	<table>
	<!--when the submit button is clicked, the submitted data(Username, Password) will be sent to signin_engine.php -->
    <form action="./signup.php" method="post">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="Username" type="text" value="<?php echo $username;?>" id="Username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
            <td id="output"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="Password" type="Password" value="<?php echo $password;?>" id="Password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
        <tr>
       		<td><font color="#FF0000">*</font>	Retype Password:</td>
 	    	<td><input name="rePassword" type="Password" value="<?php echo $password;?>" id="rePassword" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
        </tr>
        <tr>
        	<td><font color="#FF0000">*</font>	Name:</td>
        	<td><input name="Name" type="Name" value="<?php echo $name;?>" id="Name" size="20" style="border:1px #333333 solid;width:100px;height:20px;">
        	</td>
        </tr>
        
        <tr>
        	<td><font color="#FF0000">*</font>	Date of Birth:</td>
        	<td>	
    <select name="year" id="year">
        <option value="0000" selected="selected">--</option>
        <?php 
		for($year=2014; $year>=1100; $year--) {
			echo "<option value='$year'>$year</option>";
		}
		?>
    </select>
        	</td>
        
       
    	<td id="months"></td>
    	<td id="days"></td>
		 </tr>
        <tr>
    		<td>Email:</td>
    		<td><input name="Email" type="text" value="<?php echo $email;?>" id="Email" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
                
      	<tr>
			<td><input type="submit" name="signup_submit" value="Sign Up"></td>
			<td><input type="reset" name="reset" value="Reset"></td>
      	</tr>
        <tr><?php echo $error; ?></tr>
         <tr><?php echo $save; ?></tr>
	</form>
	</table>

<a href="./signin_form.php">Back to Signin page</a>
</center>
</body>
</html>

