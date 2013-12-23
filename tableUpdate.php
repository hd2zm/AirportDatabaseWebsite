<?php
	session_start();
	include('connection.php');
	$row=0;
	if (!isset($_POST['name'])) {
		$name=$_SESSION['currenttablename'];
	}
	else {
		$name=$_POST['name'];
		$_SESSION['currenttablename']=$name;
	}

	if(!isset($_SESSION['getData'])){
		$_SESSION['getData']=False;
	}
	
	if(!isset($_POST['row'])) {
	$row = $_SESSION['row'];
	}
	else {
	$row = $_POST['row'];
	$_SESSION['row']=$row;
	}
	//echo '<p>'.$name.'</p>';
	$query = 'SELECT * FROM '.$name;
	$result = mysql_query($query);
	$line='';

		if($row < 1){
			echo '<br>Invalid row number; please try again</br>';
		}
		else{
			$_SESSION['getData']= True;
			//echo '<p>'.mysql_num_rows($result).'</p>';
			for($x=1; $x<=$row; $x++){
				$line = mysql_fetch_array($result);
				$_SESSION['line'] = $line;
			}
	
		
	
	}

	echo '	<h>Enter row number to update (1 = row 1)</h>
		<form action="" method="post"><br>
		RowNumber:<input type="number" name="row"/><br />
		<input type="submit" value="Get Record"/>
		</form>
		<br></br>	
		';
	
	if($_SESSION['getData'] == True){
	//works
	if($name == 'Admin') {
		if (isset($_POST['uname']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pword'])){
			$username=mysql_real_escape_string($_POST['uname']);
			$firstname=mysql_real_escape_string($_POST['fname']);
			$lastname=mysql_real_escape_string($_POST['lname']);
			$password=mysql_real_escape_string($_POST['pword']);
			$line=$_SESSION['line'];
			$query="UPDATE ".$name." SET Username= '".$username."', FirstName='".$firstname."', LastName='".$lastname."', Password='".$password."'
					WHERE Username='".mysql_real_escape_string($line['Username'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
			
		}		
		else{
			$usernamee=$line['Username'];
			$firstnamee=$line['FirstName'];
			$lastnamee=$line['LastName'];
			$passworde=$line['Password'];
			echo '<form action="" method="post">
			Username:<br><input type="text" name="uname" value="'.$usernamee.'" /><br />
			First Name:<br><input type="text" name="fname" value="'.$firstnamee.'" /><br />
			Last Name:<br><input type="text" name="lname" value="'.$lastnamee.'" /><br />	
			Password:<br><input type="text" name="pword" value="'.$passworde.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
	}
//works
	elseif($name == 'Airline') {
	$desigline=mysql_real_escape_string($line['AirlineDesignator']);
		if (isset($_POST['ad']) && isset($_POST['an']) && isset($_POST['ac']) && isset($_POST['term'])){
			$desig=mysql_real_escape_string($_POST['ad']);
			$name=mysql_real_escape_string($_POST['an']);
			$code=mysql_real_escape_string($_POST['ac']);
			$terminal=mysql_real_escape_string($_POST['term']);
			$query="UPDATE Airline SET AirlineDesignator= '".$desig."', AirlineName='".$name."', AirlineCode='".$code."', Terminal='".$terminal."'
					WHERE AirlineDesignator='".$desigline."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
			
		}		
		else{
			
			$name=$line['AirlineName'];
			$code=$line['AirlineCode'];
			$terminal=$line['Terminal'];
			echo '<form action="" method="post">
			Airline Designator:<br><input type="text" name="ad" value="'.$desigline.'" /><br />
			Airline Name:<br><input type="text" name="an" value="'.$name.'" /><br />
			Airline Code:<br><input type="text" name="ac" value="'.$code.'" /><br />	
			Terminal:<br><input type="text" name="term" value="'.$terminal.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
		}

	elseif($name == 'Airplane') {
		if (isset($_POST['ad']) && isset($_POST['an']) && isset($_POST['ac']) && isset($_POST['term'])){
			$id=mysql_real_escape_string($_POST['aid']);
			$desig=mysql_real_escape_string($_POST['ad']);
			$manufactured=mysql_real_escape_string($_POST['man']);
			$yeari=mysql_real_escape_string($_POST['year']);
			mysql_query("UPDATE Airplane SET AirplaneID= '".$id."', AirlineDesignator='".$desig."', Manufacturer='".$manufactured."', YearIssued='".$yeari."'
					WHERE AirplaneID='".mysql_real_escape_string($line['AirplaneID'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$desig=$line['AirlineDesignator'];
			$id=$line['AirplaneID'];
			$manu=$line['Manufacturer'];
			$yeari=$line['YearIssued'];
			echo '<form action="" method="post">
			Airplane ID:<br><input type="text" name="aid" value="'.$id.'" /><br />
			Airline Designator:<br><input type="text" name="ad" value="'.$desig.'" /><br />
			Manufacturer:<br><input type="text" name="man" value="'.$manu.'" /><br />	
			YearIssued:<br><input type="text" name="year" value="'.$yeari.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
	}
//works
	elseif($name == 'ArrivingFlight') {
		if (isset($_POST['flightno']) && isset($_POST['departair']) && isset($_POST['bag'])){
			$flight=mysql_real_escape_string($_POST['flightno']);
			$depart=mysql_real_escape_string($_POST['departair']);
			$baggage=mysql_real_escape_string($_POST['bag']);
			mysql_query("UPDATE ArrivingFlight SET FlightNo= '".$flight."', DepartureAirportCode='".$depart."', BaggageCarousel='".$baggage."'
					WHERE FlightNo='".mysql_real_escape_string($line['FlightNo'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$flight=$line['FlightNo'];
			$depart=$line['DepartureAirportCode'];
			$baggage=$line['BaggageCarousel'];
			echo '<form action="" method="post">
			Flight No:<br><input type="text" name="flightno" value="'.$flight.'" /><br />
			Departure Airport:<br><input type="text" name="departair" value="'.$depart.'" /><br />
			Baggage Carousel:<br><input type="text" name="bag" value="'.$baggage.'" /><br />	
			<input type="submit" value="Update"/>
			</form>';
		}
		}
//works
elseif($name == 'Baggage') {
if (isset($_POST['flightno']) && isset($_POST['bid']) && isset($_POST['stat']) && isset($_POST['traveller'])){
			$flight=mysql_real_escape_string($_POST['flightno']);
			$id=mysql_real_escape_string($_POST['bid']);
			$status=mysql_real_escape_string($_POST['stat']);
			$tid=mysql_real_escape_string($_POST['traveller']);
			mysql_query("UPDATE ".$name." SET FlightNo= '".$flight."', BaggageID='".$id."', BaggageStatus='".$status."', TravelerID='".$tid."'
					WHERE BaggageID='".mysql_real_escape_string($line['BaggageID'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$flight=$line['FlightNo'];
			$id=$line['BaggageID'];
			$status=$line['BaggageStatus'];
			$tid=$line['TravelerID'];
			echo '<form action="" method="post">
			Baggage ID:<br><input type="text" name="bid" value="'.$id.'" /><br />
			Status:<br><input type="text" name="stat" value="'.$status.'" /><br />
			Traveller ID:<br><input type="text" name="traveller" value="'.$tid.'" /><br />
			Flight No.:<br><input type="text" name="flightno" value="'.$flight.'" /><br />				
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'DepartingFlight') {
if (isset($_POST['flightno']) && isset($_POST['destair'])){
			$flight=mysql_real_escape_string($_POST['flightno']);
			$dest=mysql_real_escape_string($_POST['destair']);
			mysql_query("UPDATE ".$name." SET FlightNo= '".$flight."', ArrivalAirportCode='".$dest."'
					WHERE FlightNo='".mysql_real_escape_string($line['FlightNo'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$flight=$line['FlightNo'];
			$dest=$line['ArrivalAirportCode'];
			echo '<form action="" method="post">
			Flight No:<br><input type="text" name="flightno" value="'.$flight.'" /><br />
			Departure Airport:<br><input type="text" name="destair" value="'.$dest.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Employee') {
if (isset($_POST['emp']) && isset($_POST['fn']) && isset($_POST['mn']) && isset($_POST['ln']) && isset($_POST['pn']) && isset($_POST['pa'])){
			$eid=mysql_real_escape_string($_POST['emp']);
			$fname=mysql_real_escape_string($_POST['fn']);
			$mname=mysql_real_escape_string($_POST['mn']);
			$lname=mysql_real_escape_string($_POST['ln']);
			$phonenum=mysql_real_escape_string($_POST['pn']);
			$padd=mysql_real_escape_string($_POST['pa']);	
				$query="UPDATE ".$name." SET EmployeeID= '".$eid."', FirstName='".$fname."', MiddleName='".$mname."', LastName='".$lname."', PhoneNumber='".$phonenum."',
					PhysicalAddress='".$padd."'
					WHERE EmployeeID='".mysql_real_escape_string($line['EmployeeID'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
			}		
		else{
			$eid=$line['EmployeeID'];
			$fname=$line['FirstName'];
			$mname=$line['MiddleName'];
			$lname=$line['LastName'];
			$phonenum=$line['PhoneNumber'];
			$padd=$line['PhysicalAddress'];
			echo '<form action="" method="post">
			Employee ID:<br><input type="text" name="emp" value="'.$eid.'" /><br />
			First Name:<br><input type="text" name="fn" value="'.$fname.'" /><br />
			Middle Name:<br><input type="text" name="mn" value="'.$mname.'" /><br />
			Last Name:<br><input type="text" name="ln" value="'.$lname.'" /><br />
			Phone Number:<br><input type="text" name="pn" value="'.$phonenum.'" /><br />
			Physical Address:<br><input type="text" name="pa" value="'.$padd.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Flight') {
if (isset($_POST['flight']) && isset($_POST['dat']) && isset($_POST['gate']) && isset($_POST['dep']) && isset($_POST['air']) && isset($_POST['arriv'])){
			$flightno=mysql_real_escape_string($_POST['flight']);
			$date=mysql_real_escape_string($_POST['dat']);
			$gateno=mysql_real_escape_string($_POST['gate']);
			$deptime=mysql_real_escape_string($_POST['dep']);
			$airplane=mysql_real_escape_string($_POST['air']);
			$arrtime=mysql_real_escape_string($_POST['arriv']);
				$query="UPDATE Flight SET FlightNo= '".$flightno."', GateNumber='".$gateno."', Date='".$date."', DepartureTime='".$deptime."', AirplaneID='".$airplane."', ArrivalTime='".$arrtime."' 
					WHERE FlightNo='".mysql_real_escape_string($line['FlightNo'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
		}		
		else{
			$flightno=$line['FlightNo'];
			$date=$line['Date'];
			$gateno=$line['GateNumber'];
			$deptime=$line['DepartureTime'];
			$airplane=$line['AirplaneID'];
			$arrtime=$line['ArrivalTime'];
			echo '<form action="" method="post">
			Flight No.:<br><input type="text" name="flight" value="'.$flightno.'" /><br />
			Date:<br><input type="text" name="dat" value="'.$date.'" /><br />
			Gate Number:<br><input type="text" name="gate" value="'.$gateno.'" /><br />
			Departure Time:<br><input type="text" name="dep" value="'.$deptime.'" /><br />
			Airplane ID:<br><input type="text" name="air" value="'.$airplane.'" /><br />
			Arrival Time:<br><input type="text" name="arriv" value="'.$arrtime.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Flying') {
/*echo "<tr>
	<th>Traveler ID</th>
	<th>Flight Number</th>
	<th>Seat Number</th>
</tr>";
while($fly = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $fly['TravelerID'] . '</td>';
		echo '<td>' . $fly['FlightNo'] . '</td>';
		echo '<td>' . $fly['SeatNo'] . '</td>';
		echo '</tr>';
	}*/


if (isset($_POST['tid']) && isset($_POST['flightno']) && isset($_POST['seatno']) ){
			$traveller=mysql_real_escape_string($_POST['tid']);
			$flight=mysql_real_escape_string($_POST['flightno']);
			$seat=mysql_real_escape_string($_POST['seatno']);
			$line=$_SESSION['line'];
			$linetraveler=mysql_real_escape_string($line['TravelerID']);
			$lineflight=mysql_real_escape_string($line['FlightNo']);
			//mysql_query("UPDATE ".$name." SET Username= '".$username."', FirstName='".$firstname."', LastName='".$lastname."', Password='".$password."'
				//	WHERE Username='".$line['Username']."'");
			$query = "UPDATE ".$name." SET TravelerID= '".$traveller."', FlightNo='".$flight."', SeatNo='".$seat."' 
					WHERE TravelerID='".$linetraveler."' and FlightNo='".$lineflight."'";
			mysql_query($query);
			echo '<p>'.$name.'</p>';
			//echo '<p>'.$query.'<p>';
			
		}		
		else{
			$traveller=$line['TravelerID'];
			$flight=$line['FlightNo'];
			$seat=$line['SeatNo'];
			echo '<form action="" method="post">
			Traveller ID:<br><input type="text" name="tid" value="'.$traveller.'" /><br />
			Flight No.:<br><input type="text" name="flightno" value="'.$flight.'" /><br />
			Seat No.:<br><input type="text" name="seatno" value="'.$seat.'" /><br />	
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Gate') {
if (isset($_POST['gate']) && isset($_POST['term']) ){
			$gateno=mysql_real_escape_string($_POST['gate']);
			$terminal=mysql_real_escape_string($_POST['term']);
			$query = "UPDATE ".$name." SET GateNumber= '".$gateno."', Terminal='".$terminal."'
					WHERE GateNumber='".mysql_real_escape_string($line['GateNumber'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
		}		
		else{
			$gateno=$line['GateNumber'];
			$terminal=$line['Terminal'];
			echo '<form action="" method="post">
			Gate No:<br><input type="text" name="gate" value="'.$gateno.'" /><br />
			Terminal:<br><input type="text" name="term" value="'.$terminal.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Passenger') {
if (isset($_POST['travel']) && isset($_POST['fn']) && isset($_POST['mn']) && isset($_POST['ln']) && isset($_POST['pn']) && isset($_POST['pa']) && isset($_POST['eM']) && isset($_POST['ccn'])){
			$tid=mysql_real_escape_string($_POST['travel']);
			$fname=mysql_real_escape_string($_POST['fn']);
			$mname=mysql_real_escape_string($_POST['mn']);
			$lname=mysql_real_escape_string($_POST['ln']);
			$phonenum=mysql_real_escape_string($_POST['pn']);
			$padd=mysql_real_escape_string($_POST['pa']);
			$email=mysql_real_escape_string($_POST['eM']);
			$credit=mysql_real_escape_string($_POST['ccn']);			
			mysql_query("UPDATE ".$name." SET TravelerID= '".$tid."', FirstName='".$fname."', MiddleName='".$mname."', LastName='".$lname."', PhoneNumber='".$phonenum."',
					PhysicalAddress='".$padd."', Email='".$email."', CreditCardNumber='".$credit."'
					WHERE TravelerID='".mysql_real_escape_string($line['TravelerID'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$tid=$line['TravelerID'];
			$fname=$line['FirstName'];
			$mname=$line['MiddleName'];
			$lname=$line['LastName'];
			$phonenum=$line['PhoneNumber'];
			$padd=$line['PhysicalAddress'];
			$email=$line['Email'];
			$credit=$line['CreditCardNumber'];
			echo '<form action="" method="post">
			Traveller ID:<br><input type="text" name="travel" value="'.$tid.'" /><br />
			First Name:<br><input type="text" name="fn" value="'.$fname.'" /><br />
			Middle Name:<br><input type="text" name="mn" value="'.$mname.'" /><br />
			Last Name:<br><input type="text" name="ln" value="'.$lname.'" /><br />
			Phone Number:<br><input type="text" name="pn" value="'.$phonenum.'" /><br />
			Physical Address:<br><input type="text" name="pa" value="'.$padd.'" /><br />
			Email:<br><input type="text" name="eM" value="'.$email.'" /><br />
			Credit Card Number:<br><input type="text" name="ccn" value="'.$credit.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Restaurant') {
if (isset($_POST['restname']) && isset($_POST['term']) ){
			$name=mysql_real_escape_string($_POST['restname']);
			$terminal=mysql_real_escape_string($_POST['term']);
			$query = "UPDATE Restaurant SET Name= '".$name."', Terminal='".$terminal."'
					WHERE Name='".mysql_real_escape_string($line['Name'])."' and Terminal='".mysql_real_escape_string($line['Terminal'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
		}		
		else{
			$name=$line['Name'];
			$terminal=$line['Terminal'];
			echo '<form action="" method="post">
			Name:<br><input type="text" name="restname" value="'.$name.'" /><br />
			Terminal:<br><input type="text" name="term" value="'.$terminal.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//works
elseif($name == 'Shop') {
if (isset($_POST['shopname']) && isset($_POST['term']) ){
			$shopname=mysql_real_escape_string($_POST['shopname']);
			$terminal=mysql_real_escape_string($_POST['term']);
			mysql_query("UPDATE ".$name." SET Name= '".$shopname."', Terminal='".$terminal."'
					WHERE Name='".mysql_real_escape_string($line['Name'])."' and Terminal='".mysql_real_escape_string($line['Terminal'])."'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$name=$line['Name'];
			$terminal=$line['Terminal'];
			echo '<form action="" method="post">
			Name:<br><input type="text" name="shopname" value="'.$name.'" /><br />
			Terminal:<br><input type="text" name="term" value="'.$terminal.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}
//work
elseif($name == 'WorksFor') {
if (isset($_POST['eid']) && isset($_POST['employ']) && isset($_POST['posit']) && isset($_POST['salary']) ){
			$empid=mysql_real_escape_string($_POST['eid']);
			$emp=mysql_real_escape_string($_POST['employ']);
			$pos=mysql_real_escape_string($_POST['posit']);
			$sal=mysql_real_escape_string($_POST['salary']);
				$query = "UPDATE ".$name." SET EmployeeID= '".$empid."', Employer='".$emp."', Position='".$pos."', Salary='".$sal."'
					WHERE EmployeeID='".mysql_real_escape_string($line['EmployeeID'])."'";
			mysql_query($query);
			echo '<p>Updated Database<p>';
			//echo '<p>'.$query.'</p>';
		}		
		else{
			$empid=$line['EmployeeID'];
			$emp=$line['Employer'];
			$pos=$line['Position'];
			$sal=$line['Salary'];
			echo '<form action="" method="post">
			Employee ID:<br><input type="text" name="eid" value="'.$empid.'" /><br />
			Employer:<br><input type="text" name="employ" value="'.$emp.'" /><br />
			Position:<br><input type="text" name="posit" value="'.$pos.'" /><br />
			Salary:<br><input type="text" name="salary" value="'.$sal.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
}

}

	
?>
<input type="submit" value="Back" onclick="location.href='update_table.php';"/>