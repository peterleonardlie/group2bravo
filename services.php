<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bravo Hospital | Services</title>
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
<div class="servicesBackground">
</div>
<div class="horizontalLineServices"></div>
<div class="horizontalLineServices2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuServices"><div id="footerTextServices">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

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
<li><a href="drdirectory.php">Doctor Services</a></li>
<li><a href="services.php" id="onlink">Services</a></li>

</ul>

</div><!-- end of holderTop div -->

</div><!-- end of navbarTop div -->

<div class="transparentBoxServices">

<div id="bold" align="center"><br />Healthcare Packages</div>
<br /><br />
We are please to inform you that we offer services such as  personalising of health package to suit your needs. 
Simply call us or drop us an e-mail for a consultation and we will work out the best option for you. <br /><br /><br /><br />

<table width="650" border="0" align="center">
  <tr>
  	<td width="178"> <img src="home.png" width="32" height="32" alt="address" /> </td> 	
    <td width="462"> Patient Service Center<br />
    600 Upper Thomson Rd <br />
    Singapore 574421<br /></td>
  </tr>
  <tr>
  	<td width="178"> <img src="telephone.png" width="32" height="32" alt="phone" /></td>
    <td>+65 6912 0000<br />
    +65 6913 0000</td>
  </tr>
  <tr>
  <td width="178"> <img src="email.png" width="32" height="32" alt="email" /></td>
    <td>bravohospital@bravo.com.sg</td>
  </tr>
</table>
<br />
</div>
<div class="posServices1">
  <h1>Services</h1></div>


</div><!-- end of wrapper div -->
</body>
</html>
