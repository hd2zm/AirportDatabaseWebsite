<?php
include('connection.php');
$bag=$_POST['bagid'];
//$query = $conn->prepare("SELECT BaggageStatus FROM Baggage WHERE BaggageID = :baggageid)"
$query = sprintf("SELECT BaggageStatus FROM Baggage WHERE BaggageID = '%s'", mysql_real_escape_string($bag));
$result = mysql_query($query);

if (mysql_num_rows($result) == 0) {
header("Location: baggage.php");
}
else {
while($baggage = mysql_fetch_array($result)){
	echo "<p>".$baggage['BaggageStatus']."</p>";
	}
	}
?>