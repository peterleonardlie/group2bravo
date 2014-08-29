<?php
	session_start();
?>
<title>Appointment Edit</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<?php 
	include ('db_connect.php');
	$update_sql = "SELECT * FROM appointments ORDER BY id DESC";
	$update_query = mysql_query($update_sql) or die	(mysql_error());
	$rsupdate = mysql_fetch_assoc($update_query);
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<li><a href="drdirectory.html">Doctor Directory</a></li>
<li><a href="services.html">Services</a></li>

</ul>

</div><!-- end of holderTop div -->

</div><!-- end of navbarTop div -->

<div class="transparentBoxDeleteAppt">
<h1><p> Select an appointment to edit: </p></h1>
<FORM><INPUT Type="button" VALUE="Cancel" onClick="history.go(-1);return true;"></FORM>
<?php if(empty($rsupdate)){
	echo "No Appointment";}
	
	else {do { ?><table style="margin: auto; align: left;" border="1">
<p> <?php echo '<td colspan="2"><p align="center"><a href = updateConfirm.php?id='.$rsupdate['id'].'>' ?> Edit this appointment
</a></p></td>

<tr>
<th width="200" align="left"> Doctor Name: </th>
<td><?php echo $rsupdate['doctor'];?></td>
</tr>
<tr>
<th width="200" align="left"> Date: </th>
<td><?php echo $rsupdate['date'];?></td>
</tr>
<tr>
<th width="200" align="left"> Time: </th>
<td> <?php echo $rsupdate['time'];?></td>
</tr>
<tr>
<th width="200" align="left"> Account: </th>
<td> <?php echo $rsupdate['email'];?></p> </td>
</tr>
</table>

 <?php } while ($rsupdate = mysql_fetch_assoc($update_query))?>
<?php
  ;}
?>


</div>

</div><!-- end of wrapper div -->
</body>
</html>
