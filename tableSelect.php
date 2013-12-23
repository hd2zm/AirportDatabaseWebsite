<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
  </head>
<body style="padding:30px; font-family:'Lato'">  
<h1 style="text-align:center; font-family:'Lato'; font-size:48px;">CHARLOTTESVILLE<br>CITY AIRPORT</h1>
<br>
<br>
<div  style="padding:0px 0px 0px 140px;">

<?php
include('connection.php');
$name=$_POST['tablename'];
$query = 'SELECT * FROM '.$name;
$result = mysql_query($query);

if($name == 'Admin') {
echo '
	<p style="font-family:\'Lato\'; font-size:30px;">Admin</p>
	<table>
	<tr>
	<th>Username</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Password</th>
</tr>';
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['Username'] . '</td>';
		echo '<td style="text-align:center">' . $name['FirstName'] . '</td>';
		echo '<td style="text-align:center">' . $name['LastName'] . '</td>';
		echo '<td style="text-align:center">' . $name['Password'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Airline') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Airline</p>
	<table>
	<tr>
	<th>Airline Designator</th>
	<th>Airline Name</th>
	<th>Airline Code</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['AirlineDesignator'] . '</td>';
		echo '<td style="text-align:center">' . $name['AirlineName'] . '</td>';
		echo '<td style="text-align:center">' . $name['AirlineCode'] . '</td>';
		echo '<td style="text-align:center">' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Airplane') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Airplane</p>
	<table>
	<tr>
	<th>Airplane ID</th>
	<th>Airline Designator</th>
	<th>Manufacturer</th>
	<th>Year Issued</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['AirplaneID'] . '</td>';
		echo '<td style="text-align:center">' . $name['AirlineDesignator'] . '</td>';
		echo '<td style="text-align:center">' . $name['Manufacturer'] . '</td>';
		echo '<td style="text-align:center">' . $name['YearIssued'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'ArrivingFlight') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">ArrivingFlight</p>
	<table>
	<tr>
	<th>Flight Number</th>
	<th>Departure Airport Code</th>
	<th>Baggage Carousel</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['FlightNo'] . '</td>';
		echo '<td style="text-align:center">' . $name['DepartureAirportCode'] . '</td>';
		echo '<td style="text-align:center">' . $name['BaggageCarousel'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Baggage') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Baggage</p>
	<table>
	<tr>
	<th>Baggage ID</th>
	<th>Baggage Status</th>
	<th>Traveler ID</th>
	<th>Flight Number</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['BaggageID'] . '</td>';
		echo '<td style="text-align:center">' . $name['BaggageStatus'] . '</td>';
		echo '<td style="text-align:center">' . $name['TravelerID'] . '</td>';
		echo '<td style="text-align:center">' . $name['FlightNo'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'DepartingFlight') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">DepartingFlight</p>
	<table>
	<tr>
	<th>Flight Number</th>
	<th>Arrival Airport Code</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['FlightNo'] . '</td>';
		echo '<td style="text-align:center">' . $name['ArrivalAirportCode'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Employee') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Employee</p>
	<table>
	<tr>
	<th>Employee ID</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Phone Number</th>
	<th>Physical Address</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['EmployeeID'] . '</td>';
		echo '<td style="text-align:center">' . $name['FirstName'] . '</td>';
		echo '<td style="text-align:center">' . $name['MiddleName'] . '</td>';
		echo '<td style="text-align:center">' . $name['LastName'] . '</td>';
		echo '<td style="text-align:center">' . $name['PhoneNumber'] . '</td>';
		echo '<td style="text-align:center">' . $name['PhysicalAddress'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Flight') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Flight</p>
	<table>
	<tr>
	<th>Flight Number</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Airplane ID</th>
	<th>Arrival Time</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['FlightNo'] . '</td>';
		echo '<td style="text-align:center">' . $name['Date'] . '</td>';
		echo '<td style="text-align:center">' . $name['GateNumber'] . '</td>';
		echo '<td style="text-align:center">' . $name['DepartureTime'] . '</td>';
		echo '<td style="text-align:center">' . $name['AirplaneID'] . '</td>';
		echo '<td style="text-align:center">' . $name['ArrivalTime'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Flying') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Flying</p>
	<table>
	<tr>
	<th>Traveler ID</th>
	<th>Flight Number</th>
	<th>Seat Number</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['TravelerID'] . '</td>';
		echo '<td style="text-align:center">' . $name['FlightNo'] . '</td>';
		echo '<td style="text-align:center">' . $name['SeatNo'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Gate') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Gate</p>
	<table>
	<tr>
	<th>Gate Number</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['GateNumber'] . '</td>';
		echo '<td style="text-align:center">' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Passenger') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Passenger</p>
	<table>
	<tr>
	<th>Traveler ID</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Phone Number</th>
	<th>Physical Address</th>
	<th>Email</th>
	<th>Credit Card Number</th>	
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['TravelerID'] . '</td>';
		echo '<td style="text-align:center">' . $name['FirstName'] . '</td>';
		echo '<td style="text-align:center">' . $name['MiddleName'] . '</td>';
		echo '<td style="text-align:center">' . $name['LastName'] . '</td>';
		echo '<td style="text-align:center">' . $name['PhoneNumber'] . '</td>';
		echo '<td style="text-align:center">' . $name['PhysicalAddress'] . '</td>';
		echo '<td style="text-align:center">' . $name['Email'] . '</td>';
		echo '<td style="text-align:center">' . $name['CreditCardNumber'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Restaurant') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Restaurant</p>
	<table>
	<tr>
	<th>Name</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['Name'] . '</td>';
		echo '<td style="text-align:center">' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Shop') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">Shop</p>
	<table>
	<tr>
	<th>Name</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['Name'] . '</td>';
		echo '<td style="text-align:center">' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'WorksFor') {
echo "
	<p style=\"font-family:'Lato'; font-size:30px;\">WorksFor</p>
	<table>
	<tr>
	<th>EmployeeID</th>
	<th>Employee</th>
	<th>Position</th>
	<th>Salary</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td style="text-align:center">' . $name['EmployeeID'] . '</td>';
		echo '<td style="text-align:center">' . $name['Employer'] . '</td>';
		echo '<td style="text-align:center">' . $name['Position'] . '</td>';
		echo '<td style="text-align:center">' . $name['Salary'] . '</td>';
		echo '</tr>';
	}
}

else {

}

	
?>
</table>
<input type="submit" value="Back" onclick="location.href='update_table.php' style="width:70px; height:40px;""/>
</div>
</body>'