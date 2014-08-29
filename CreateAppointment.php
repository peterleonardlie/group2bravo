<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

include('db_connect.php');

$redirect = "<meta http-equiv=\"refresh\" content=\"0; url=appointment.php\" />";
$username = $_SESSION['username'];

$specialistErr = $dateErr = $timeErr = "";
$specialistcheck = $datecheck = false;
$timecheck = true;

if(isset($_POST['reset'])){
	$specialist = "";
	$date = "";
	$time = "";
	$doctor = "";
	$remarks = "";
}

if(isset($_POST['submit'])){
	$query = mysql_query("SELECT * FROM bravoUserInformation WHERE email='$username'");
	while($row = mysql_fetch_assoc($query)){
		$contact = $row['contact'];
		$cost = $row['cost'];
	}
	$errorflag = errorflag;
	$specialist = $_POST['specialist'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$doctor = $_POST['doctor'];
	$remarks = $_POST['remarks'];
	$query2 = mysql_query("SELECT * FROM appointments WHERE doctor='$doctor' AND time='$time' AND date='$date'");
	
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
	} else 
		$datecheck = true;
		
	while($row2 = mysql_fetch_assoc($query2)){
		$timeErr = "$doctor is not available at the specific time";
		$timecheck = false;
	}
		
	if ($specialistcheck&&$datecheck&&$timecheck){
		$approval = "pending";
		$cost += 150;
		mysql_query("INSERT INTO appointments VALUES ('','$username','$specialist','$date','$time','$doctor','$remarks','$contact', now())");
		mysql_query("UPDATE bravoUserInformation SET cost='$cost' WHERE email='$username'");
		mysql_close();
		echo $redirect;
	}
	else
		echo '< meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
}

?>
<script type="text/javascript">
function checkform(){
	var errorflag = false;
	errormsg = '';
	form = document.appt_form;
	
	nowDate = new Date(2014,8,6);
	inputDate = new Date(form.date.value);
	
	if (inputDate < nowDate){
		errorflag = true;
		errormsg += 'Appointment must be made at least 5 days in advance.';
	}
	if (errorflag){
		alert(errormsg);	
	}
	return !errorflag;
	
}
</script>
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
<div id="bottomMenuCreateAppt"><div id="footerTextCreateAppt">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="createAppointmentbackground">
<p><a href="appointment.php">< Back</a></p>
<h4>Appointment Guide</h4>
<ul>
	<li>
    The appointment preferred date must be 5 working days from the day appointment created.
	</li>
</ul>
<p><span class="error">* required field.</span></p>
<form action="CreateAppointment.php" method="post" name="appt_form" onSubmit="javascript:return checkform();">
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
        <input type="date" name="date" value="<?php echo $date; ?>"/><span class="error">* <?php echo $dateErr;?></span>
        </td>
    </tr>
    <tr>
    	<td>
        Preferred Time:
        </td>
        <td>
        <select name="time">
        <option value="13:00-13:30">13:00-13:30</option>
		<option value="13:30-14:00">13:30-14:00</option>
        <option value="14:00-14:30">14:00-14:30</option>
        <option value="14:30-15:00">14:30-15:00</option>
        <option value="15:00-15:30">15:00-15:30</option>
        <option value="15:30-16:00">15:30-16:00</option>
        <option value="16:00-16:30">16:00-16:30</option>
        <option value="16:30-17:00">16:30-17:00</option>
        <option value="17:00-17:30">17:00-17:30</option>
        <option value="17:30-18:00">17:30-18:00</option>
        <option value="18:00-18:30">18:00-18:30</option>
		
		</select><span class="error">* <?php echo $timeErr;?></span>
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
<p> <input type="reset" value="Reset" name="reset" id="Reset" onclick="return confirm('Reset all fields?');" /> or <input type="submit" name="submit" value="Submit"/></p>
</form>
</div>

</body>
</html>
