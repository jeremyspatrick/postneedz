<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/common/includes/classes.inc";  

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$comments = $_REQUEST['comments']; 

$myFile = "testFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $name;
fwrite($fh, "\n".$stringData); 
$stringData = " ".$email;
fwrite($fh, $stringData);
$stringData = " ".$comments;
fwrite($fh, $stringData);
fclose($fh);

$myFile = "email.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $email;
fwrite($fh, "\n".$stringData); 
fclose($fh);

$db = new Database();
$db->connect();

$query = sprintf("INSERT INTO log_email_signup VALUES('%s', '%s', '%s', NOW())",
            mysql_real_escape_string($name),
            mysql_real_escape_string($email),
            mysql_real_escape_string($comments));


$db->executeQuery($query);
$db->closeConnection();


?>