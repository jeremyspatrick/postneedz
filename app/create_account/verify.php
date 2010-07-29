<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/classes.inc";  
	include_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/global.inc";

	$key = $_REQUEST['key'];
	
	$db = Database::getInstance();
	$db->connect();
	$query = sprintf("SELECT COUNT(*) as rowno FROM person WHERE verify_key = '%s'",
					$key);
	
	$db->executeQuery($query);

	$row = $db->getRow();
	$row_count = $row['rowno'];
	
	if ($row_count)
	{
		$query = sprintf("UPDATE person SET verified = 1 WHERE verify_key = '%s'",
					$key);
		$db->executeQuery($query);
		echo "<br/>Success<br/>";	
	}
	
	?>

<?php 
	if ($_SERVER["HTTP_HOST"] == 'dev.postneedz.com')
		include $_SERVER["DOCUMENT_ROOT"]."/common/includes/functions/debug.php";
?> 