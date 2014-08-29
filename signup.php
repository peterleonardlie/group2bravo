<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Signup</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">

<?php

include('db_connect.php');

$id = "";
$cost = "";
$f_name = $_REQUEST['fname'];
$l_name = $_REQUEST['lname'];
$gender = $_REQUEST['gender'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$contact = $_REQUEST['contact'];
$submit = $_REQUEST['submit'];
$encpassword = md5($password);
$query1 = "INSERT INTO bravoUserInformation VALUES ('".$id."','".$username."','".$encpassword."','".$f_name."','".$l_name."','".$gender."','".$contact."','".$cost."')";
$redirected = "<meta http-equiv=\"refresh\" content=\"2; url=login.php\" />";

if(isset($_GET['fblogin'])){
	$username = $_GET['email'];
	$gender = $_GET['gender'];
	$f_name = $_GET['f_name'];
	$l_name = $_GET['l_name'];
}

if($submit){
	
	$insert = mysql_query($query1);
	echo 'Account Created!';
	echo $redirected;
}
else{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';	
}
?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="facebooklogin.js"></script>
<script type="text/javascript">
function checkform(){
	errorflag = false;
	errormsg = "";
	form = document.signupForm;
	passwordLength = form.password.value.length;
	
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
	
	if (form.username.value == ""){
		errorflag = true;
		errormsg += "Please don't leave Username blank.\n"	
	}
	
	aliasPosition = form.username.value.indexOf("@");
	dotPosition = form.username.value.indexOf(".");
	
	if ((aliasPosition == -1 || dotPosition == -1) && form.username.value != ""){
		errorflag = true;
		errormsg += "Please enter a valid Email Address.\n";
	}
	
	if (passwordLength < 8){
		errorflag = true;
		errormsg += "Password must be more than 8.\n";	
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

<div class="Homebackground" style="height:600px;">
  <c class="picAdj"><br /></c>
</div>
<div class="horizontalLineDirectory"></div>
<div class="horizontalLineDirectory2"></div>
<div class="transparentBox"  style="padding-left:1em; opacity:1; height:500px;">
<form action="" method="post" name="signupForm" onSubmit="javascript:return checkform();">
<div style="margin:1em;" align="center">
<h1>Signup</h1>
<p align="center"><img src="signup-facebook.png" onclick="fb_register()" scope="email" height="51"></p>
<fieldset style="width:80%; padding:1em;">
<label for="fname">First Name : </label>
<input type='text' name='fname' placeholder='John' id="fname" value="<?php echo $f_name ?>">
<br>
<label for="lname">Last Name : </label>
<input type='text' name='lname' placeholder='Smith' id="lname" value="<?php echo $l_name ?>"><br />
<label for="username">Username : </label>
<input type='text' name='username' placeholder='username@domain.com' id='username' size="21"/ value="<?php echo $username ?>"><br />
<label for="password">Password : </label>
<input type='password' name='password' placeholder="password" id="password" /><br />
<hr style="width:50%;"/>
Sex <br /><br />
<input type="radio" name="gender" value="male" id="male" class='radio'> <label for="male">Male</label>
<input type="radio" name="gender" value="female" id="female" class='radio'> <label for="female">Female</label>
<hr style="width:50%;"/>
<br />
<label for="contact">Contact Number : </label>
<input type="text" name="contact" placeholder="(+65) xxxx-xxxx" id="contact" />
<br><br />
<input type="reset" name="reset" value="reset" />
<input type='submit' name='submit' value='Submit'>
</fieldset>
</div>
</form>
</div>
</div>
<div class="horizontalLine2" style="margin-top:16em; margin-left:6.8em; width:100px;" align='center'></div>

<div id="searchBar">
<form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
  </form></div>
<div id="bottomMenu" style="margin-top:10em"><div id="footerText">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

</div><!-- end of wrapper div -->
</body>
</html>
