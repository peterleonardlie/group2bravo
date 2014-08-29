<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Payment</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<?php
	include('db_connect.php');
	$username = $_SESSION['username'];
	if($_SESSION['gender'] == 'male'){
		$honorific = 'Mr. ';	
	}else{
		$honorific = 'Ms. ';
	};
	$query = mysql_query("SELECT * FROM bravoUserInformation WHERE email='$username'");
	$query2 = mysql_query("SELECT * FROM appointments WHERE email='$username'");
	$row = mysql_fetch_assoc($query);
	$specialist = mysql_fetch_assoc($query2);
	$submit = $_REQUEST['submit'];
	$resetCost = 0;
	$redirect = "<meta http-equiv=\"refresh\" content=\"2; url=index.php\" />";
	if ($submit){
		echo	'Thank You!';
		mysql_query("UPDATE bravoUserInformation SET cost='$resetCost' WHERE email='$username'");
		mysql_query("DELETE FROM appointments WHERE email='$username'");
		echo $redirect;
	}else{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	}
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
<li><a href="payment.php" id="onlink">Payment</a></li>
<li><a href="appointment.php">Appointment</a></li>
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

<div class="paymentBackground">
</div>
<div class="horizontalLineLogout"></div>
<div class="horizontalLineLogout2"></div>
<div id="searchBar">
<form id="tfnewsearch" method="get" action="http://www.google.com/">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuPayment"><div id="footerTextPayment">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>
<div class="transparentBoxPayment">
<div class="posPayment"><h1>Payment</h1></div>
<pre><?php 
if($_SESSION['login'] == false){
	echo '<br><br><br>You must login before making payment.<br>Click <a href="login.php"> here </a> to login.';
}else{
	echo'<br /><br /><br />Name:	                 '.$honorific.$row['l_name'].', '.$row['f_name'].'<br />
E-mail Address:		 '.$row['email'].'<br />
Contact Number:	         '.$row['contact'].'<br />
Doctor:			 '.$specialist['doctor'].'<br />
Payment Type:	 	 Online<br />
Total Payment:	 	 '.$row['cost'].'
<form action="#" method="post">
<input type="submit" name="submit" value="Confirm" onclick="return confirm("Confirmed Payment?");"/></form>';
}
?>
<br />

</pre>
</div>

</div><!-- end of wrapper div -->
</body>
</html>
