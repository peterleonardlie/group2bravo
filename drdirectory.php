<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bravo Hospital | Doctor Directory</title>
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
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="payment.php">Payment</a></li>
<li><a href="appointment.php">Appointment</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->

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
<div class="drDirectorybackground">
</div>
<div class="horizontalLineDirectory"></div>
<div class="horizontalLineDirectory2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuDirectory"><div id="footerTextDirectory">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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
<li><a href="drdirectory.php" id="onlink">Doctor Directory</a></li>
<li><a href="services.php">Services</a></li>

</ul>

</div><!-- end of holderTop div -->

</div><!-- end of navbarTop div -->

<div class="transparentBoxDirectory"><div class="posDrDirectory"><h1>Doctor Directory</h1></div>
<pre>
<br /><br /><br />Name:	                 Dr Johnson Kia <br />
Designation:	         Registrar<br />
Medical Specialty:	 Surgery<br />
Clinical Interest:	 Plastic Surgery<br />
Language Spoken:	 English, Mandarin, Malay</pre><br/><br /><br />
<pre>
Name:	                 Dr Samuel Kirana <br />
Designation:	         Visiting Consultant<br />
Medical Specialty:	 Diabetes, Pathology<br />
Clinical Interest:	 Clinical Chemistry<br />
Language Spoken:	 English, Bahasa, Hokkien</pre>
<br/><br /><br />
<pre>
Name:	                 Dr Peter Lie <br />
Designation:	         Registrar<br />
Medical Specialty:	 Geriatric Medicine<br />
Clinical Interest:	 Palliative Medicine<br />
Language Spoken:	 English, Mandarin, Bahasa, Hokkien</pre>
<br/><br /><br />
<pre>
Name:	                 Dr Nadia Damara <br />
Designation:	         Visiting Consultant<br />
Medical Specialty:	 Surgery<br />
Clinical Interest:	 Plastic Surgery<br />
Language Spoken:	 English, Bahasa</pre>
<br/><br /><br />
<pre>
Name:	                 Dr Grace Lim <br />
Designation:	         Registrar<br />
Medical Specialty:	 Surgery<br />
Clinical Interest:	 Plastic Surgery<br />
Language Spoken:	 English, Chinese, Hokkien</pre>
</div>

</div><!-- end of wrapper div -->
</body>
</html>
