<?php
include 'connection.php';
$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
do {
$randomString = '';
for ($i = 0; $i < 7; $i++) {
$randomString .= $characters[rand(0,strlen($characters)-1)];
}
$result = mysql_query("SELECT FirstName from Passenger WHERE TravelerID = '$randomString'");
}while(mysql_num_rows($result) != 0);
return $randomString;
?>