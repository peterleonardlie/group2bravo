<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

include('db_connect.php');

$redirect = "<meta http-equiv=\"refresh\" content=\"0; url=appointment.php\" />";
$username = $_SESSION['username'];

$specialistErr = $dateErr = $timeErr = "";
$specialistcheck = $datecheck = $timecheck = false;

if(!isset($_POST['submit'])){
	$query = mysql_query("SELECT * FROM appointments WHERE email='$username'");
	while($row = mysql_fetch_assoc($query)){
		$specialist = $row['specialist'];
		$date = $row['date'];
		$time = $row['time'];
		$doctor = $row['doctor'];
		$remarks = $row['remarks'];
	}
}

if(isset($_POST['submit'])){
	$specialist = $_POST['specialist'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$doctor = $_POST['doctor'];
	$remarks = $_POST['remarks'];
	if(empty($_POST["specialist"])){
		$specialistErr = "Please fill in the specialist clinic.";
	}
	else{
		if(!preg_match("/^[a-zA-Z ]*$/",$specialist)){
			$specialistErr = "Please fill in valid specialist clinic.";
		}
		else
			$specialistcheck = true;
	}
	
	if(empty($_POST["date"])){
		$dateErr = "Please fill in your preferred date for the appointment.";
	}
	else
		$datecheck = true;
		
	if(empty($_POST["time"])){
		$timeErr = "Please fill in your preferred time for the appointment";
	}
	else
		$timecheck = true;
		
	if ($specialistcheck&&$datecheck&&$timecheck){
		mysql_query("UPDATE appointments SET specialist = '$specialist', date = '$date', time = '$time', doctor = '$doctor', remarks = '$remarks', createDate = now() WHERE email='$username'");
		
		mysql_close();
		echo $redirect;
	}
	else
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
}

?>

<title>Bravo Hospital | Medical Appointment</title>
<style>
.error {color: #FF0000;}
</style>
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
<div id="bottomMenuReschedule"><div id="footerTextReschedule">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="RescheduleAppointmentbackground">
<p><a href="appointment.php">< Back</a></p>
<p><span class="error">* required field.</span></p>
<form action="RescheduleAppointment.php" method="post">
<table>
	<tr>
    	<td>
        Specialist Clinics:
		</td>
		<td>
        <input type="text" name="specialist" value="<?php echo $specialist; ?>" /><span class="error">* <?php echo $specialistErr;?></span>
        </td>
    </tr>
    <tr>
    	<td>
        Preferred Date(dd/mm/yyyy):
        </td>
        <td>
        <input type="date" name="date" value="<?php echo $date; ?>" /><span class="error">* <?php echo $dateErr;?></span>
        </td>
    </tr>
    <tr>
    	<td>
        Preferred Time:
        </td>
        <td>
        <input type="time" name="time" value="<?php echo $time; ?>" /><span class="error">* <?php echo $timeErr;?></span>
        </td>
    </tr>
    <tr>
    	<td>
        Any Specific Doctor:
        </td>
        <td>
        <select name="doctor">
        	<option value="DrJohnsonKia">
            Dr Johnson Kia
            </option>
            <option value="DrSamuelKirana">
            Dr Samuel Kirana
            </option>
            <option value="DrPeterLie">
            Dr Peter Lie
            </option>
            <option value="DrNadiaDamara">
            Dr Nadia Damara
            </option>
            <option value="DrGraceLim">
            Dr Grace Lim
            </option>
        </select>
        </td>
    </tr>
    <tr>
    	<td>
        Remarks:
        </td>
        <td>
        <textarea name="remarks" cols="50" rows="4"></textarea>
        </td>
    </tr>
</table>
<p><input type="submit" name="submit" value="Done" onclick="return confirm('Confirmed Submit?');"/></p>
</form>
</div>
</body>
</html>
