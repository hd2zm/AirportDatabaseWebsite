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
<p style="font-family:'Lato'; font-size:30px;">Baggage</p> 
<p style="font-family:'Lato'; font-size:15px;"></p>
<div style="text-align:left;">

<?php
	include 'connection.php';
	session_start();
	$tid=$_SESSION['travelerid'];
	$query="SELECT BaggageID, BaggageStatus, FlightNo FROM Baggage NATURAL JOIN Passenger WHERE TravelerID = '$tid'";
	$result = mysql_query($query);
	
	echo "
	<table>
	<tr>
	<th>BaggageID</th>
	<th>BaggageStatus</th>
	<th>FlightNo</th>
	</tr>";
	
	while($baggage = mysql_fetch_array($result)){
		$baggageID = $baggage['BaggageID'];
		$baggageStatus = $baggage['BaggageStatus'];
		$flightNo = $baggage['FlightNo'];
		echo '<tr>';
		echo '<td>' . $baggageID . '</td>';
		echo '<td>' . $baggageStatus . '</td>';
		echo '<td>' . $flightNo . '</td>';
		echo '</tr>';
	}
		
?>
</table>

	
<!--<form action="bagFind.php" method="POST"/>
Baggage ID:<input type="text" name="bagid" value="" />
<BR>
<INPUT TYPE="SUBMIT" Value="View"/>
</form>-->
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