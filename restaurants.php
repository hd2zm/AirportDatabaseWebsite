<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
  </head>
<body style="padding:30px; font-family:'Lato'">  
<h1 style="text-align:center; font-family:'Lato'; font-size:48px;">CHARLOTTESVILLE</br>CITY AIRPORT</h1>

<br>
<br>
<table>
<tr>
<td>
<div  style="padding:0px 0px 0px 140px; width:300px">
<p style="font-family:'Lato'; font-size:30px;">Restaurants</p> 
<p style="font-family:'Lato'; font-size:15px;"></p>
<div style="text-align:left;">
<table>
<tr>
	<th>Restaurant Name</th>
	<th>Terminal</th>
</tr>
<?php
include('connection.php');

$query = "SELECT * FROM Restaurant ORDER BY Terminal ASC";
$result = mysql_query($query);


while($restaurant = mysql_fetch_array($result)){
		$name = $restaurant['Name'];
		$terminal = $restaurant['Terminal'];
		echo '<tr>';
		echo '<td>' . $name . '</td>';
		echo '<td>' . $terminal . '</td>';
		echo '</tr>';
	}
	
?>
</table>
</div>
</div>
</td>
<td>
<img src="http://www.thefineyounggentleman.com/wp-content/uploads/2012/10/Airplane.jpg" style="padding:0px 0px 0px 30px; width:700px">
</td>
</tr>
</table>
<br>
<br>
<div style="text-align:center; color:black">
<a href="admin.php" style="color:Black;">Admin Login</a>
</div>
</body>


