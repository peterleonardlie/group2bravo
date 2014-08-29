<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="3; url=index.php" />
<title>Bravo Hospital | Logout</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body class="BackgroundColor">
<div id="wrapper">
<div id="Menu">
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
<div class="Aboutbackground">
</div>
<div class="horizontalLineAbt"></div>
<div class="horizontalLineAbt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuAbt"><div id="footerTextAbt">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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

<div class="transparentBoxLogout"><div class="logoutText"><center>
  <h1>Logout</h1>
  You have successfully Logout!<br />
  <i>If you have not been redirected <a href="index.php">click here</a>.</i>
  <?php
  	$_SESSION['login'] = false;
	$_SESSION['admin'] = false;
	unset($_SESSION['username']);
	unset($_SESSION['f_name']);
	unset($_SESSION['l_name']);
	unset($_SESSION['gender']);
	unset($_SESSION['contact']);
	unset($_SESSION['cost']);
  ?>
</center></div></div>

<div class="horizontalLine3"></div>
<div class="horizontalLine4"></div>


</div><!-- end of wrapper div -->
</body>
</html>
