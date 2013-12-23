<?php

$buttons=array('Display', 'Update', 'Export', 'Logout');

for ($x=0; $x < count($buttons); $x++){
	if (isset($_POST[$buttons[$x]])){
		if($buttons[$x]== 'Logout'){
			header("Location: admin.php");
		}
		
		elseif($buttons[$x]== 'Export'){
			header("Location: export_table.php");
		}
		
		elseif($buttons[$x]== 'Update'){
			header("Location: update_table.php");
		}
		elseif($buttons[$x]== 'Display'){
			header("Location: display_table.php");
		}
		
		else{
			
		}
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
<p style="font-family:\'Lato\'; font-size:30px;">Welcome</p>
<form action="" method="post">
	<input type="submit" name="Display" value="Display" style="width:70px; height:40px;"/>
</form>

<form action="" method="post">
	<input type="submit" name="Update" value="Update" style="width:70px; height:40px;"/>
</form>

<form action="" method="post">
	<input type="submit" name="Export" value="Export" style="width:70px; height:40px;"/>
</form>

<form action="" method="post">
	<input type="submit" name="Logout" value="Logout" style="width:70px; height:40px;"/>
</form>


</div>
</body>'






?>