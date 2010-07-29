<?php 
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/classes.inc";  
	include_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/global.inc";
?>

<?php 

	$title="PostNeedz";
	$body = getInclude('body.inc');
	$includes_header = getInclude('includes_header.inc');
	
	include $_SERVER["DOCUMENT_ROOT"]."/content/templates/index.php";
	
	

?>


<?php 
	if ($_SERVER["HTTP_HOST"] == 'dev.postneedz.com')
		include $_SERVER["DOCUMENT_ROOT"]."/common/includes/functions/debug.php";
?> 