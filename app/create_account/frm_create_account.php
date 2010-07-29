<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/classes.inc";  
	include_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/global.inc";

	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password']; 
	$password_verify = $_REQUEST['password_verify'];
	
	$key = genRandStr(12,12);	
		
	mail('postneedz@gmail.com', 'Verify Postneedz.com account', 'http://dev.postneedz.com/app/create_account/verify.php?key='.$key);
	
	$db = Database::getInstance();
	$db->connect();
	$query = sprintf("INSERT INTO person (email, first_name, last_name, password, verify_key, verified) VALUES('%s', '%s', '%s', '%s','%s', 0)",
            mysql_real_escape_string($firstname),
            mysql_real_escape_string($lastname),
            mysql_real_escape_string($email),
            mysql_real_escape_string($password),
            mysql_real_escape_string($key));
	$db->executeQuery($query);
	
	$title="PostNeedz";
	$body = getInclude('body.inc');
	$includes_header = getInclude('includes_header.inc');
		
	include $_SERVER["DOCUMENT_ROOT"]."/content/templates/basic.php";
	?>

<?php 
	if ($_SERVER["HTTP_HOST"] == 'dev.postneedz.com')
		include $_SERVER["DOCUMENT_ROOT"]."/common/includes/functions/debug.php";
?> 