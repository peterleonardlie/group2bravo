<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

$username = $_SESSION['username'];
mysql_connect("localhost","760738","87654321");
mysql_select_db("760738");
$query = mysql_query("SELECT * FROM appointments WHERE email='$username'");

while($row = mysql_fetch_assoc($query)){
	$specialist = $row['specialist'];
	$date = $row['date'];
	$time = $row['time'];
	$doctor = $row['doctor'];
	$remarks = $row['remarks'];
	$createDate = $row['createDate'];
}
mysql_close();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bravo Hospital | Medical Appointment</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
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

<div class="horizontalLineAppt"></div>
<div class="horizontalLineAppt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuView"><div id="footerTextView">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="viewAppointmentbackground">
<p><a href="appointment.php">< Back</a></p>
<table style="background:#FFF">
<tr>
	<td>
    Specialist Clinics:
    </td>
    <td>
    <?php echo $specialist; ?>
    </td>
</tr>
<tr>
	<td>
    Appointment Date:
    </td>
    <td>
    <?php echo $date; ?>
    </td>
</tr>
<tr>
	<td>
    Appointment Time:
    </td>
    <td>
    <?php echo $time; ?>
    </td>
</tr>
<tr>
	<td>
    Specific Doctor:
    </td>
    <td>
    <?php echo $doctor; ?>
    </td>
</tr>
<tr>
	<td>
    Remarks:
    </td>
    <td>
    <?php echo $remarks; ?>
    </td>
</tr>
<tr>
	<td>
    Date of appointment created:
    </td>
    <td>
    <?php echo $createDate; ?>
    </td>
</tr>
</table>
</div>
</body>
</html>
