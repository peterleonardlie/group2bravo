<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bravo Hospital | Login</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">

<?php

include('db_connect.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$encpassword = md5($password);
$submit = $_REQUEST['submit'];
$query1 = "SELECT * FROM bravoUserInformation WHERE email='".$username."' AND password='".$encpassword."' LIMIT 1";
$redirected = "<meta http-equiv=\"refresh\" content=\"0.5; url=index.php\" />";


if($submit){
	$result = mysql_query($query1,$connection);
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) == 1){
		if (($username == "admin@gracelim.com") || ($username =="admin@peterleonard.com")){
			$_SESSION['admin'] = true;
		}
		$_SESSION['username'] = $username;
		$_SESSION['f_name'] = $row['f_name'];
		$_SESSION['l_name'] = $row['l_name'];
		$_SESSION['gender'] = $row['gender'];
		$_SESSION['contact'] = $row['contact'];
		$_SESSION['login'] = true;
		$_SESSION['cost'] = $row['cost'];
		echo 'Login Successful';
		echo $redirected;	
	}
	else{
		echo "Incorrect Combination.";
		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	}
}

if(isset($_GET['fblogin'])){
	$username = $_GET['email'];
	$result = mysql_query("SELECT * FROM bravoUserInformation WHERE email='".$username."' LIMIT 1",$connection);
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result) != 1){
		$redirected = "<meta http-equiv=\"refresh\" content=\"0.5; url=signup.php\" />";
	}
	else{
		$_SESSION['username'] = $_GET['email'];
		$_SESSION['gender'] = $_GET['gender'];
		$_SESSION['f_name'] = $_GET['f_name'];
		$_SESSION['l_name'] = $_GET['l_name'];
		$_SESSION['login'] = true;
		echo 'Login Successful';
	}
	echo $redirected;	
}
?>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="facebooklogin.js"></script>
<script type="text/javascript">

function checkform(){
	errorflag = false;
	errormsg = "";
	form = document.loginForm;
	passwordLength = form.password.value.length;
	
	if (form.username.value == ""){
		errorflag = true;
		errormsg += "Please don't leave Username blank.\n"	
	}
	
	aliasPosition = form.username.value.indexOf("@");
	dotPosition = form.username.value.indexOf(".");
	
	if ((aliasPosition == -1 || dotPosition == -1) && form.username.value != ""){
		errorflag = true;
		errormsg += "Please enter a valid Username Address.\n";
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
<div class="transparentBox"  style="padding-left:1em; opacity:1;">
<form action="#" method="post" name="loginForm" onSubmit="javascript:return checkform();">
<div style="margin:1em; word-spacing:2em;" align="center">
<h1>Login</h1><br />
<fieldset style="width:50%; padding:1em;">
<label for="username">Username : </label><input type='text' name='username' class='box' placeholder='Username@domain.com' id="username">
<br>
<label for="password">Password : </label>
<input type='password' name='password' class='box' placeholder='Password' id="password">
<br><br />
<input type='submit' name='submit' class='button' value='Log In'>
</fieldset>
</div>
</form>
<p align="center"><img src="login-facebook.png" onclick="fb_login()" scope="email"></p>
</div>
</div>
<div class="horizontalLine2" style="margin-top:4.7em; margin-left:6.8em; width:100px;" align='center'></div>


<div id="searchBar">
<form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
  </form></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

</div><!-- end of wrapper div -->
</body>
</html>
