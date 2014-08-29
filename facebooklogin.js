window.fbAsyncInit = function() {
	FB.init({
		appId      : '775700659147278', // Facebook App ID
		cookie     : true,  // enable cookies to allow the server to access the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.1' // use version 2.1
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		console.log('Successful login for: ' + response.name);
		document.getElementById('statusbox').innerHTML =
		'Welcome, ' + response.name + ' | <div class="row"><div class="col-md-7"><a href="user_managebooking.php">MANAGE BOOKING</a></div>' + ' <div class="col-md-2"><a href="#" onclick="fb_logout()">LOGOUT</a></div></div>';
	});
}

function getUserInformation(){
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		scope:'email'
		var email = response.email;
		var username = response.name;
		var gender = response.gender;
		var f_name = response.first_name;
		var l_name = response.last_name;
		window.open("login.php?fblogin='true'&username=" + username + "&email=" + email +"&gender=" + gender + "&f_name=" + f_name + "&l_name=" + l_name , "_self");
    });
}

function registerUser(){
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		scope:'email'
		var email = response.email;
		var username = response.name;
		var gender = response.gender;
		var f_name = response.first_name;
		var l_name = response.last_name;
		window.open("signup.php?fblogin='true'&username=" + username + "&email=" + email +"&gender=" + gender + "&f_name=" + f_name + "&l_name=" + l_name , "_self");
    });
}
  
function fb_login(){
	FB.login(function(response) {
		if(response.authResponse){
			getUserInformation();
		} else
		{
			console.log('Authorization failed.');
		}
		},{scope:'email'});
}

function fb_register(){
	FB.login(function(response) {
		if(response.authResponse){
			registerUser();
		} else
		{
			console.log('Authorization failed.');
		}
		},{scope:'email'});
}

function fb_logout(){
	FB.logout(function(){document.location.reload();});
}
