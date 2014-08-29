<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Medical Appointment</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<?php
include('db_connect.php');
$viewAptErr = $createAptErr = $rescheduleAptErr = $cancelAptErr = "";
$username = $_SESSION['username'];
$query = mysql_query("SELECT * FROM appointments WHERE email='$username'");
$row = mysql_fetch_assoc($query);

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$login = true;
}
else
	$login = false;
	
if(isset($_POST["viewApt"])){
	if($login==true){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=ViewAppointment.php\" />";
	}
	else{
		$viewAptErr = "Please login.";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	}
}

if(isset($_POST["createApt"])){
	if($login==true){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=CreateAppointment.php\" />";
	}
	else{
		$createAptErr = "Please login.";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	}		
}

if(isset($_POST["rescheduleApt"])){
	if($login==true){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=RescheduleAppointment.php\" />";
	}
	else{
		$rescheduleAptErr = "Please login.";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	}
}

if(isset($_POST["cancelApt"])){
	if($login==true){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=CancelAppointment.php\" />";
	}
	else{
		$cancelAptErr = "Please login.";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	}
}
?>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="BackgroundColor">

<div id="wrapper">
<div id="Menu">
	<?php
    	if($_SESSION['login'] == true){
			echo '<a href="memberDetails.php">'.$_SESSION['username'].'</a> | <a href="logout.php">Logout</a>';
		}
		else{
		echo '<a href="login.php">Login</a> | <a href="signup.php">Register</a>';
		}
    ?>
</div>
<div class="logobackground">
</div>
<div class="logo">
<img src="HospLogo.png" width="137" height="121" alt="HospLogo" /></div>

<div id="navbar">
<div id="holder">

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="payment.php">Payment</a></li>
<li><a href="appointment.php" id="onlink">Appointment</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->
<div class="Appointmentbackground">
</div>
<div class="horizontalLineAppt"></div>
<div class="horizontalLineAppt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuAppt"><div id="footerTextAppt">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

</div><!-- end of wrapper div -->

<?php
	if($_SESSION['admin'] == true){
		echo'<div id="navbarTop">';
	} else{
		echo'<div id="navbarTop" style="left:739px;">';
	}
?>
<div id="holderTop">

<ul>
<?php
	if($_SESSION['admin'] == true){
		echo '<li><a href="adminPage.php">Admin Function</a></li>';
	}
?>
<li><a href="drdirectory.php">Doctor Directory</a></li>
<li><a href="services.php">Services</a></li>

</ul>

</div><!-- end of holderTop div -->

</div><!-- end of navbarTop div -->

<div class="Appointmentbackground">
<h1>Medical Appointment</h1>
<p>
Welcome to Bravo Hospital Online Appointment Booking.
</p>
<?php
	if($row){
		echo'<form action="appointment.php" method="post">
<input type="submit" name="viewApt" value="View Appointment" /><span class="error">'.$viewAptErr.'</span></form>';	
	}
	else{
		echo'<span class="error">There is no appointment associated with your account</span>';	
	}
?>
<h3>Make New Appointment</h3>
<P>
To make a new appointment to see our doctor, please click on "Create New Appointment". You'll need to fill in the specialist clinic and preferred date for the appointment. Our staff will contact you by the next working day to confirm it.
</P>
<?php 
	if($_SESSION['login'] == true){
	if($row){
		echo'<span class="error">You already had an appointment</span>';	
	} else{
		echo'<form action="appointment.php" method="post">
			<input type="submit" name="createApt" value="Create New Appointment" /><span class="error">'.$createAptErr.'</span></form>';	
	}}else{
		echo'<form action="appointment.php" method="post">
			<input type="submit" name="createApt" value="Create New Appointment" /><span class="error">'.$createAptErr.'</span></form>';
	}
?>
<h3>Reschedule an Appointment</h3>
<p>
To make changes to an appointment, please click on "Reschedule Appointment". You'll need to fill in the specialist clinic and preferred date for the appointment. Our staff will contact you by the next working day to confirm it.
</p>
<?php
	if($row){
		echo'<form action="appointment.php" method="post">
<input type="submit" name="rescheduleApt" value="Reschedule Appointment" /><span class="error">'.$rescheduleAptErr.'</span>
</form>';	
	}else{
		echo'<span class="error">There is no appointment associated with your account</span>';
	}
?>
<h3>Cancel an Appointment</h3>
<p>
To cancel an appointment, please click on "Cancel Appointment". Our staff will contact you by the next working day to confirm it.
</p>
<?php
	if($row){
		echo'<form action="appointment.php" method="post">
<input type="submit" name="cancelApt" value="Cancel Appointment" /><span class="error">'.$cancelAptErr.'</span>
</form>';	
	}else{
		echo'<span class="error">There is no appointment associated with your account</span>';	
	}
?>
</div>
</body>
</html>
