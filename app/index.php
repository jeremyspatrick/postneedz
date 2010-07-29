<?php 
	session_start();  

if($_SESSION["logged"] != "yes")  
{  
$agent = $_SERVER['HTTP_USER_AGENT'];  
$uri = $_SERVER['REQUEST_URI'];  
$ip = $_SERVER['REMOTE_ADDR'];  
$ref = $_SERVER['HTTP_REFERER'];  
$visitTime = date("r");        //Example: Thu, 21 Dec 2000 16:01:07 +0200  

$logLine = "$visitTime - IP: $ip || User Agent: $agent  || Page: $uri || Referrer: $ref\n";  
$fp = fopen("visitorLog.txt", "a");  
fputs($fp, $logLine);  
fclose($fp);  
$_SESSION["logged"] = "yes";  
}  
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