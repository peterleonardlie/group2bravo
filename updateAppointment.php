<?php
	session_start();
?>
<title> Update Appointment </title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">

<?php
	include('db_connect.php');
	$update_sql = "SELECT * FROM appointments WHERE id = ".$_SESSION['updateID'];
	$update_query = mysql_query($update_sql) or die	(mysql_error());

$redirect = "<meta http-equiv=\"refresh\" content=\"0; url=adminPage.php\" />";	
$specialistErr = $dateErr = $timeErr =  "";
$specialistcheck = $datecheck = $timecheck = false;

if(!isset($_POST['submit'])){
	while($rsconfirm = mysql_fetch_assoc($update_query)){
		$specialist = $rsconfirm['specialist'];
		$date = $rsconfirm['date'];
		$time = $rsconfirm['time'];
		$doctor = $rsconfirm['doctor'];
		$remarks = $rsconfirm['remarks'];
	}
}

if(isset($_POST['submit'])){
	$specialist = $_POST['specialist'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$doctor = $_POST['doctor'];
	$remarks = $rsconfirm['remarks'];
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
		$id = $_SESSION['updateID'];
		mysql_query("UPDATE appointments SET specialist = '$specialist', date = '$date', time = '$time', remarks = '$remarks', doctor = '$doctor' WHERE id = '$id'");
		
		mysql_close();
		unset ($_SESSION['updateID']);
		echo $redirect;
	}
	else
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.error {color: #FF0000;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<li><a href="appointment.php">Appointment</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->
<div class="deleteApptbackground">
</div>
<div class="horizontalLineAbt"></div>
<div class="horizontalLineAbt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuDAppt"><div id="footerTextDAppt">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

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

<div class="transparentBoxDeleteAppt">
<p><span class="error">* required field.</span></p>
<form action="updateAppointment.php" method="post">
<table align="center">
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
</table>

<p>
<input type="submit" name="submit" value="Done" onClick="return confirm('Confirmed Submit?');"/></p>
<p>
<INPUT Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></p>


</form>
</div>

</div><!-- end of wrapper div -->
</body>
</html>
