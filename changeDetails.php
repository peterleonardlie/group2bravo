<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Change Details</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">

<?php

mysql_connect("localhost","jc253608","QJKw2IaISnEDcJOP");
mysql_select_db("db_jc253608");

	$username = $_SESSION['username'];
	$l_name = $_REQUEST['l_name'];
	$f_name = $_REQUEST['f_name'];
	$password = $_REQUEST['password'];
	$encpassword = md5($password);
	$contact =  $_REQUEST['contact'];
	$redirected = "<meta http-equiv=\"refresh\" content=\"2; url=memberDetails.php\" />";
	
if ($_POST['submit']){
	mysql_query("UPDATE bravoUserInformation SET l_name = '$l_name', f_name = '$f_name', password = '$encpassword', contact = '$contact' WHERE email='$username'");
	echo $redirected;
}else{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';	
}
	mysql_close();
?>
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
<div class="Appointmentbackground">
</div>
<div class="horizontalLineAppt"></div>
<div class="horizontalLineAppt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenu"><div id="footerText">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="memberDetails">
<h1>Change Details</h1>
<form action="#" method="post">
<table width="400" border="0">
  <tr>
    <td>Last Name:</td>
    <td><input type="text" name="l_name" /></td>
  </tr>
    <tr>
    <td>First Name:</td>
    <td><input type="text" name="f_name" /></td>
  </tr>
    <tr>
    <td>Password :</td>
    <td><input type="password" name="password" /></td>
  </tr>
    <tr>
    <td>Contact Number:</td>
    <td><input type="text" name="contact" /></td>
  </tr>
  </table>
  <input type="submit" name="submit" value="Change Details" />
  </form><br />
  <form action="memberDetails.php" method="post">
  <input type="submit" name="goback" value="Go back" />
  </form>
<br /><br />

</div>


</body>
</html>
