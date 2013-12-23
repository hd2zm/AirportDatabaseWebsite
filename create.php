<?php
	include 'connection.php';
	//$index =  mysql_real_escape_string($_POST['travelerID']);
	require_once('generateID.php');
	$index = $randomString;
	$fname =  mysql_real_escape_string($_POST['iFN']);
	$mname =  mysql_real_escape_string($_POST['iMN']);
	$lname =  mysql_real_escape_string($_POST['iLN']);
	$phone =  mysql_real_escape_string($_POST['iPN']);
	$email =  mysql_real_escape_string($_POST['iE']);
	$address =  mysql_real_escape_string($_POST['iA']);
	$creditcardno =  mysql_real_escape_string($_POST['iCN']);

	if(!$_POST['submit']){
		echo "Add a new user";
		header("Location: passenger.php");
	}else{
		$result = mysql_query("INSERT INTO Passenger (`TravelerID`,`FirstName`, `MiddleName`, `LastName`, `PhoneNumber`, `PhysicalAddress`, `Email`, `CreditCardNumber`)
					VALUES('$index','$fname', '$mname', '$lname', '$phone', '$address', '$email', '$creditcardno')") or die(mysql_error());
		if ($result == false) {
			die(mysql_error());
			}
		else {
		echo "<p>User has been added</p>";
		session_start();
		$_SESSION['travelerid']=$index;
		$_SESSION['travelerfirstname']=$fname;
		header("Location: passenger_funct.php");
		}
	}
?>