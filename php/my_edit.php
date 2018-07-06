<?php
    //include the file session.php
	include("session.php");
	//include the file db_conn.php
	include("db_conn.php");

if(isset($_POST['my_edit'])){
	$username = $session_user;
	//$username = $_POST['Username'];
	$password = $_POST['Password'];
	$repassword = $_POST['rePassword'];
	$name = $_POST['Name'];
	//$years = $_POST['year'];
	//$month = $_POST['month'];
	//$access = $_POST['Access'];
	//$month = $_GET['month'];
	//$day = $_POST['day'];	
	$email = $_POST['Email'];
	
	//setting the error message
    $error="";

    //password validation
    if($password==""){
		header('Location: ./my_engine.php?error=Invalid_Password');
		//echo "Please type the password";
    	//$error.=" Please type the password"."<br/>";
    }
    elseif(strlen($password)<5){
		header('Location: ./my_engine.php?error=The_password_must_be_at_lease_5_characters');
    	//if the password is under 5 characters
    	//$error.=" The password must be at lease 5 characters"."<br/>";
    }
    elseif(count(explode(' ', $password))>1){
    	//if the password does not include any whitespace
    	header('Location: ./my_engine.php?error=The_password_must_not_include_any_whitespace');
		//$error.="Password must not include any whitespace!<br/>";
	}
    //repassword validation
    if($repassword==""){
		header('Location: ./my_engine.php?error=Invalid_Retypepassword');
    	//$error.=" Please type the repassword"."<br/>";
    }
	//retype password must exactly same as password
	elseif($password!=$repassword) {
		header('Location: ./my_engine.php?error=Retypepassword_must_exactly_same_as_password');
		//$error.="Repassword must exactly same as password"."<br/>";
		}
	//name validation
	if($name == "") {
		header('Location: ./my_engine.php?error=Invalid_Name');
		//$error.=" Please type your name"."<br/>";
		}
	elseif(count(explode(' ', $name))<1){
		header('Location: ./my_engine.php?error=Please_type_your_First_and_last_name');
		//$error.=" Please type your first and last name"."<br/>";
		}

	//email validation
	if($email==""){
		header('Location: ./my_engine.php?error=Invalid_Email');
        //$error.=" Please type your email address"."<br/>";
	}elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
		header('Location: ./my_engine.php?error=incorrect_format_email_address');
		//if the email is not proper..(format)
		$error.=" Please type the correct format of email address"."<br/>";
    }
	
	//echo $username;//.$password.$repassword.$name.$year.$month.$day.$email;
    else {
		
		$encrypt_password=MD5($password);
		$updatequery = "UPDATE `users` SET `Password`= '$encrypt_password',`Name`='$name',`DOB`= '',`Email`= '$email' WHERE `Username`='$username'";
		$mysqli->query($updatequery);
		$session_user=$username;
		$_SESSION['session_user']=$session_user;
        ?>
		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script type="text/javascript">
        	alert("Your information has been saved successfully!");
			window.location.href="./my.php";
        </script>
		
		<?php
    }

}
?>