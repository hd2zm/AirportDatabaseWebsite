<?php
	include 'connection.php';
	$email = isset($_POST['iE']) ? $_POST['iE'] : '';

	
	if($email){
	$query = sprintf("SELECT * FROM Passenger WHERE Email = '%s'", mysql_real_escape_string($email));
	$result = mysql_query($query) or die(mysql_error());
		if ($result == false) {
			die(mysql_error());
			}
			else if (mysql_num_rows($result) == 0) {
			header("Location: welcome.php");
			}
		else {
		//echo "<p>User has been added</p>";
		//$GLOBALS['PassFirstName']=$result['FirstName'];
		//$GLOBALS['PassLastName']=$result['LastName'];
		session_start();
		$result = mysql_fetch_array($result);
		$_SESSION['travelerid']=$result['TravelerID'];
		$_SESSION['travelerfirstname']=$result['FirstName'];
		//global $travelerid;
		//$travelerid = $result['TravelerID'];
		header("Location: passenger_funct.php");
		}
	}
	else {
				header("Location: welcome.php");
	}
?>