<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bravo Hospital | Contact</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<<body class="BackgroundColor">
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
<li><a href="contact.php" id="onlink">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->
<div class="Contactbackground">
</div>
<div class="horizontalLineContact"></div>
<div class="horizontalLineContact2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuContact"><div id="footerTextContact">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="transparentBoxContact"><h1>Contact Us</h1></div>
<div id="maps">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.669381027591!2d103.82868680000003!3d1.375054900000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16ce690dead5%3A0x956e55a38cabda60!2s600+Upper+Thomson+Rd%2C+Singapore+574421!5e0!3m2!1sen!2ssg!4v1405433847120" width="400" height="300" frameborder="0" style="border:0"></iframe>
</div>
<div class="contactInfo">
<table width="400" border="0" align="center">
  <tr>
  	<td width="79"> <img src="home.png" width="32" height="32" alt="address" /> </td> 	
    <td width="561">Patient Service Center<br />
    600 Upper Thomson Rd <br />
    Singapore 574421<br /></td>
  </tr>
  <tr>
  	<td width="79"> <img src="telephone.png" width="32" height="32" alt="phone" /></td>
    <td>+65 6912 0000<br />
    +65 6913 0000</td>
  </tr>
  <tr>
  <td width="79"> <img src="email.png" width="32" height="32" alt="email" /></td>
    <td>bravohospital@bravo.com.sg</td>
  </tr>
</table></div>


<div class="OpeningHrs"><h3>Opening Hours</h3></div>


<div class="openingTable">
<table width="400" border="0" align="center">
  <tr>
    <td width="201"><div id="bold">General Hospital</div>
Monday to Friday: 8.30 to 17.00 <br />
Saturday: 8.00 to 14.00<br />
Sunday and PH: Closed<br /><br /></td>
    <td width="201"><div id="bold">Specialist Clinics</div>
Monday to Friday: 8.30  to 17.30<br />
Saturday: 8.00 to 13.30 <br />
Sunday and PH: Closed<br /><br /></td>

</table></div>

<a href="feedback.php"><div id="feedbackButton"></div>
<div id="posFeedback"><h3>Feedback</h3></div></a>

</div><!-- end of wrapper div -->
</body>
</html>
