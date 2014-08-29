<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php

define('DB_NAME', 'db_jc253608');
define('DB_USER', 'jc253608');
define('DB_PASSWORD', 'QJKw2IaISnEDcJOP');
define('DB_HOST', 'localhost');
define('TABLE_NAME', 'bravoUserInformation');

$connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$connection){
	die('Could not connect: ' . mysql_error());	
}

$db_selected = mysql_select_db(DB_NAME,$connection);

if (!$db_selected){
	die('Could not find database ' . DB_NAME . ': ' . mysql_error());	
}


?>
</body>
</html>
