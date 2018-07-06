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


<hr><h2>My Page 2</h2><hr>
	<table>
    <?php
    //include the file session.php
	include("session.php");
	//include the file db_conn.php
	include("db_conn.php");
    $selectquery = "SELECT * FROM `users` WHERE `Username`='$session_user'";
    //$mysqli->query($selectquery);
    $result = $mysqli->query($selectquery);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	//$passworddb = $row['Password'];
	$namedb = $row['Name'];
	$emaildb = $row['Email'];
	//echo $result;
	//$access = $row['Access'];
	if($_GET['error']!="") {
		$errormessage = $_GET['error'];
		echo $errormessage;
		}
    ?>
	<!--when the submit button is clicked, the submitted data(Username, Password) will be sent to signin_engine.php -->
    <form action="./my_edit.php" method="post">
    	<tr>
    		<td><font color="#FF0000">*</font>	Username:</td>
    		<td><input name="Username" type="text" value="<?php echo $session_user;?>" disabled id="Username" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
            <td id="output"></td>
 		</tr>
 		<tr>
 	    	<td><font color="#FF0000">*</font>	Password:</td>
 	    	<td><input name="Password" type="Password" value="" id="Password" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
      	</tr>
        <tr>
       		<td><font color="#FF0000">*</font>	Retype Password:</td>
 	    	<td><input name="rePassword" type="Password" value="" id="rePassword" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
        </tr>
        <tr>
        	<td><font color="#FF0000">*</font>	Name:</td>
        	<td><input name="Name" type="Name" value="<?php echo $namedb;?>" id="Name" size="20" style="border:1px #333333 solid;width:100px;height:20px;">
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
    		<td><input name="Email" type="text" value="<?php echo $emaildb;?>" id="Email" size="20" style="border:1px #333333 solid;width:100px;height:20px;"></td>
 		</tr>
                
      	<tr>
			<td><input type="submit" name="my_edit" value="Sign Up"></td>
			<td><input type="reset" name="reset" value="Reset"></td>
      	</tr>
        <tr><?php echo $error; ?></tr>
	</form>
	</table>

<a href="./my.php">Back to My page</a>



</center>
</body>
</html>

