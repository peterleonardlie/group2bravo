<?php
	session_start();
?>
<title>View All Appointments</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<?php
	include ('db_connect.php');
	$username = $_SESSION['username'];
	$appointments = "SELECT * FROM appointments";
	$appointments_query = mysql_query($appointments) or die(mysql_error());
	$retreiveappointments = mysql_fetch_assoc($appointments_query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div class="ViewAllbackground"><div id="bottomMenuViewAll"><div id="footerTextViewAll">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div></div>
<div class="horizontalLineAbt"></div>
<div class="horizontalLineAbt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>


<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>
</div>
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

<div class="transparentBoxViewAll">
<h1> List of All Appointments </h1>
<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>

<?php if(empty($retreiveappointments)){
	echo "No Appointment";}
	
	else {do { ?>
<table style="margin: auto; align: left;" border="1">
<tr>
<th width="200" align="left">Email:</th>
<td>
 <?php echo  $retreiveappointments['email'];?>
 </td>
 </tr>
<tr>
<th width="200" align="left">Specialist:</th>
<td>
 <?php echo  $retreiveappointments['specialist'];?>
 </td>
 </tr>
<tr>
<th width="200" align="left">Date:</th>
<td>
 <?php echo  $retreiveappointments['date'];?>
 </td>
 </tr>
<tr>
<th width="200" align="left">Time:</th>
<td>
 <?php echo  $retreiveappointments['time'];?>
 </td>
 </tr>
<tr>
<th width="200" align="left">Doctor:</th>
<td>
 <?php echo $retreiveappointments['doctor'];?>
</td>
</tr>
<tr>
<th width="200" align="left">Remarks:</th>
<td>
<?php echo $retreiveappointments['remarks'];?>
</td>
</tr>
<tr>
<th width="200" align="left">Contact:</th>
<td>
 <?php echo  $retreiveappointments['contact'];?>
 </td>
 </tr>
<tr>
<th width="200" align="left">Date Created:</th>
<td>
 <?php echo  $retreiveappointments['createDate'];?>
 </td>
 </tr>
 </table>
 <br /> <br />
<?php } while( $retreiveappointments = mysql_fetch_assoc($appointments_query)); ?>

<?php
;} 
?>

</div>
</div>
</body>
</html>
