<?php
	include 'connection.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$isInDB = 0;

	$string_result = '';
	

	if(!$_POST['username'] || !$_POST['password']){
		$string_result = "Datafield left blank; please enter value";
	}else{
		$query = "SELECT Username,Password FROM Admin";
		$result = mysql_query($query);
		while($admin = mysql_fetch_array($result)){
			if(($username == $admin['Username']) && ($password == $admin['Password'])){
				$isInDB=1;
			}
		}
		if($isInDB == 1){
			$string_result = "YES";
		}
		else{
			$string_result = "Invalid User";
		}
	}
	return $string_result;	
	
	
?>