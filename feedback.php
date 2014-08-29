<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Feedback</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">
<?php

include('db_connect.php');

$id = "";
if($_SESSION['login'] == true){
$f_name = $_SESSION['f_name'];
$l_name = $_SESSION['l_name'];
$gender = $_SESSION['gender'];
$email = $_SESSION['username'];
$contact = $_SESSION['contact'];	
}
else{
$f_name = $_REQUEST['fname'];
$l_name = $_REQUEST['lname'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];
}
$feedback = $_REQUEST['comments'];
$submit = $_REQUEST['submit'];
$query1 = "INSERT INTO bravoUserFeedback VALUES ('".$id."','".$email."','".$f_name."','".$l_name."','".$gender."','".$contact."','".$feedback."')";
$redirected = "<meta http-equiv=\"refresh\" content=\"2; url=index.php\" />";

if($submit){
		$insert = mysql_query($query1,$connection);
		echo'Thank You for your feedback!';
		echo $redirected;
	}
	else{
		echo'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
';	
	}
?>
<link rel="stylesheet" type="text/css" href="style.css"/>

<script type="text/javascript">

function checkform(){
	errorflag = false;
	errormsg = "";
	form = document.feedbackForm;
	
	if (form.fname.value == ""){
		errorflag = true;
		errormsg += "please enter your First Name.\n"	
	}
	
	if (form.lname.value == ""){
		errorflag = true;
		errormsg += "please enter your Last Name.\n"
	}
	
	for (var i=0; i<2; i++) {
    	if (form.gender[i].checked)
	  		var gender_radio = true;
  	}
	
  	if (!gender_radio) {
	  	errorflag = true;
     	errormsg +="Please select a Gender.\n";
  	}
	
	if (form.email.value == ""){
		errorflag = true;
		errormsg += "Please don't leave Email blank.\n"	
	}
	
	aliasPosition = form.email.value.indexOf("@");
	dotPosition = form.email.value.indexOf(".");
	
	if ((aliasPosition == -1 || dotPosition == -1) && form.email.value != ""){
		errorflag = true;
		errormsg += "Please enter a valid Email Address.\n";
	}
	
	if (form.comments.value == ""){
		errorflag = true;
		errormsg += "please write some feedback for us!\n";	
	}
	
	if (errorflag){
		alert(errormsg);	
	}
	return !errorflag;
	
}
</script>
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
<li><a href="contact.php" id="onlink">Contact</a></li>

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
<div class="horizontalLine1"></div>
<div class="horizontalLine1x1"></div>
<div class="transparentBox"  style="padding-left:1em; opacity:1; height:500px;">
<form action="#" method="post" name="feedbackForm" onSubmit="javascript:return checkform();">
<div style="margin:1em;" align="center">
<h1>Feedback</h1><br />
<fieldset style="width:80%; padding:1em;">
<label for="fname">First Name : </label>
<?php
if($_SESSION['login'] == true){
echo" ".$_SESSION['f_name'];
}
else{
echo"<input type='text' name='fname' placeholder='John' id='fname'>";
}?>
<br>
<label for="lname">Last Name : </label>
<?php
if($_SESSION['login'] == true){
echo" ".$_SESSION['l_name'];
}
else {
echo"<input type='text' name='lname' placeholder='Smith' id='lname'>"
;}?>
<br />
<label for="email">Email : </label>
<?php
if($_SESSION['login'] == true){
echo" ".$_SESSION['username'];
}
else {
echo "
<input type='text' name='email' placeholder='username@domain.com' id='email' size=\"26\"/>";}
?><br />
<hr style="width:50%;"/>
Sex <br /><br />
<?php
if($_SESSION['login'] == true){
echo" ".$_SESSION['gender'];
}
else {
echo'
<input type="radio" name="gender" value="male" id="male" class="radio"> <label for="male">Male</label>
<input type="radio" name="gender" value="female" id="female" class="radio"> <label for="female">Female</label>';}
?>
<hr style="width:50%;"/>
<br />
<label for="contact">Contact Number : </label>
<?php
if($_SESSION['login'] == true){
echo" (".$_SESSION['contact'].")";
}
else {
echo'
<input type="text" name="contact" placeholder="(+65) xxxx-xxxx" id="contact" />';}
?><br /><br />
<label for="feedback">Feedback : </label><br /><br />
<textarea name="comments" cols="65" rows="4" id="feedback"></textarea>
<br><br />
<input type="reset" name="reset" value="reset" />
<input type='submit' name='submit' value='Submit'>
</fieldset>
</div>
</form>
</div>
</div>
<div class="horizontalLine2" style="margin-top:21.7em; margin-left:6.8em; width:100px;" align='center'></div>

<div id="searchBar">
<form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
  </form></div>
<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

</div><!-- end of wrapper div -->
</body>
</html>
