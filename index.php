<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bravo Hospital | Home</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body class="BackgroundColor">
<div id="wrapper">
<div id="Menu">
	<?php
    	if($_SESSION['login'] == true){
			echo '<a href="memberDetails.php">'.$_SESSION['username'].'</a> | <a href="logout.php">Logout</a>';
		if($_SESSION['gender'] == 'male'){
			$honorific = 'Mr. ';	
		}else{
			$honorific = 'Ms. ';
		};
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
<li><a href="index.php" id="onlink">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="payment.php">Payment</a></li>
<li><a href="appointment.php">Appointment</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->
<div class="Homebackground">
</div>
<div class="horizontalLine"></div>
<div class="horizontalLine2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>


<div id="bottomMenu" style="z-index:200001"><div id="footerText" style="z-index:200001">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>
<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>
<?php
	if($_SESSION['admin'] == true){
		echo'<div id="navbarTop">';		
	}else{
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
<div class="Homebackground"><c class="picAdj"><img src="editedDrnNurses.jpg" width="711" height="454" alt="DrNNurses" /><br />
</div>
<div class="horizontalLine1"></div>
<div class="horizontalLine1x1"></div>
<?php
	if($_SESSION['login'] == true){
		echo'<div class="transparentBox"><center><h1>Welcome, '.$honorific.$_SESSION['l_name'].' '.$_SESSION['f_name'].'</h1></center></br>
</div>
<div class="horizontalLine2"></div>

<a href="memberDetails.php"><div id="regButton"></div>
<div id="posSignup"><h1>Account</h1></div></a>';
	}else{
	echo'<div class="transparentBox"><h1>Have You Registered?</h1></br>
For registered users, you will be able to pay your hospital bills and make your appointments online. </br>Cut the waiting time and register with us now!</div>
<div class="horizontalLine2"></div>

<a href="signup.php"><div id="regButton"></div>
<div id="posSignup"><h1>Sign Up</h1></div></a>';	
	}
?>
<!-- end of wrapper div --></div>
</div>
</body>
</html>
