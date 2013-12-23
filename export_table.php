<?php 
include 'connection.php';
$tableNames=array("Admin","Airline","Airplane","ArrivingFlight","Baggage","DepartingFlight","Employee","Flight","Flying","Gate","Passenger","Restaurant","Shop","WorksFor");

$filename = "airline_dump_".date("Y-m-d-h-i-s");

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="'.$filename.'.xml"');

$xml ='<?xml version="1.0" encoding="iso-8859-1"?>
<Airline_Databases>';

foreach($tableNames as $table){
    $result = mysql_query("SELECT * FROM  `$table`");
    $xml .='
    <table_'.$table.'>';
 
    while($row=mysql_fetch_array($result)) {
        $xml .=  "
        <$table>";
            foreach($row as $key => $val){
					if(!is_numeric($key)) {
                    $xml .=  "
                    <$key>$val</$key>";
					}
            }
        $xml .=  "
        </$table>";
    }
 
    $xml .= "
    </table_$table>";
}
    $xml .= "
</Airline_Databases>";
echo $xml;
?>