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
<div  style="padding:0px 0px 0px 140px; width:400px">
<p style="font-family:'Lato'; font-size:30px;">Flights</p> 
<p style="font-family:'Lato'; font-size:15px;"></p>
<div style="text-align:left;">
<table>

<?php
include('connection.php');
$flight=$_POST['flighttype'];
if($flight == 'Arriving') {
echo "<tr>
	<th>Flight No</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Arrival Time</th>
	<th>Departure Airport</th>
	<th>Baggage Carousel</th>
</tr>";
$query = "SELECT FlightNo,Date,GateNumber,DepartureTime,ArrivalTime,DepartureAirportCode,BaggageCarousel FROM Flight NATURAL JOIN ArrivingFlight";
$result = mysql_query($query);
while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td><center>' . $no . '</center></td>';
		echo '<td><center>' . $flight['Date'] . '</center></td>';
		echo '<td><center>' . $gate . '</center></td>';
		echo '<td><center>' . $flight['DepartureTime'] . '</center></td>';
		echo '<td><center>' . $flight['ArrivalTime'] . '</center></td>';
		echo '<td><center>' . $flight['DepartureAirportCode'] . '</center></td>';
		echo '<td><center>' . $flight['BaggageCarousel'] . '</center></td>';
		echo '</tr>';
	}
}
else {
echo "<tr>
	<th>Flight No</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Arrival Time</th>
	<th>Destination Airport</th>
</tr>";
$query = "SELECT FlightNo,Date,GateNumber,DepartureTime,ArrivalTime,ArrivalAirportCode FROM Flight NATURAL JOIN DepartingFlight";
$result = mysql_query($query);
while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td>' . $no . '</td>';
		echo '<td>' . $flight['Date'] . '</td>';
		echo '<td>' . $gate . '</td>';
		echo '<td>' . $flight['DepartureTime'] . '</td>';
		echo '<td>' . $flight['ArrivalTime'] . '</td>';
		echo '<td>' . $flight['ArrivalAirportCode'] . '</td>';
		echo '</tr>';
	}
}

while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td>' . $no . '</td>';
		echo '<td>' . $gate . '</td>';
		echo '</tr>';
	}
	
?>
</table>
</div>
</div>
</td>
</tr>
</table>
<br>
<br>
<div style="text-align:center; color:black">
<a href="admin.php" style="color:Black;">Admin Login</a>
</div>
</body>