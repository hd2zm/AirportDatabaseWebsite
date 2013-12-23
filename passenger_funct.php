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
<!--<p style="font-family:'Lato'; font-size:30px;">What would you like to view?</p> -->
<?php
include 'connection.php';
session_start();
//$fname = $GLOBALS['PassFirstName'];
$tid=$_SESSION['travelerid'];
$query="SELECT FlightNo,GateNumber,Terminal FROM Flying NATURAL JOIN Flight NATURAL JOIN Gate WHERE TravelerID = '$tid'";
$result = mysql_query($query);
$result = mysql_fetch_array($result);
$flightno = $result['FlightNo'];
$terminal = $result['Terminal'];
$fname=$_SESSION['travelerfirstname'];
echo "<p style=\"font-family:'Lato'; font-size:30px;\">What would you like to view, ".$fname."?</p>"; 
if (strlen($result['FlightNo'] > 0)) {
echo "<p style=\"font-family:'Lato'; font-size:15px;\">Your flight (Flight No. ".$result['FlightNo'].") is at gate ".$result['GateNumber']." in terminal ".$result['Terminal'].".";
}
// "<p>".$fname."</p>";
?>
<p style="font-family:'Lato'; font-size:15px;"></p>
<div style="text-align:left;">
<form action="flights.php" method="post">
	<input type="submit" name="Flights" value="Flights" style="width:90px; height:40px;">
</form>

<form action="shops.php" method="post">
	<input type="submit" name="Shops" value="Shops" style="width:90px; height:40px;">
</form>

<form action="restaurants.php" method="post">
	<input type="submit" name="Restaurants" value="Restaurants" style="width:90px; height:40px;">
</form>

<form action="baggage.php" method="post">
	<input type="submit" name="Baggage" value="Baggage" style="width:90px; height:40px;">
</form>
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

