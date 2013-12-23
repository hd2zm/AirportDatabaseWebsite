<?php

if(isset($_POST['back'])){
	header("Location: index.php");
}

if (isset($_POST['username']) || isset($_POST['password'])){
	require_once('validation.php');
	if($string_result == "YES"){
		header("Location: admin_funct.php");
	}
	else{
		echo "<p>$string_result<p>";
	}
}


echo 

'<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
  </head>
<body style="padding:30px; font-family:\'Lato\'">  
<h1 style="text-align:center; font-family:\'Lato\'; font-size:48px;">CHARLOTTESVILLE<br>CITY AIRPORT</h1>
<br>
<br>
<div  style="text-align:center">
<p style="font-family:\'Lato\'; font-size:30px;">Admin Login</p>
<form action="" method="post">
	Username:<input type="text" name="username" value="" /><br />
	Password:<input type="password" name="password" value="" /><br />
	<br />
	<input type="submit" name="submit" style="width:70px; height:40px;" />
	<input type="submit" name="back" value="Back" style="width:70px; height:40px;"/>
</form>
</div>
</body>'

?>