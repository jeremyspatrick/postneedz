<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/common/includes/functions/random.php';

	function verifyEmail(){
			
		print_r(genRandStr(12,12));	
		
			//mail("postneedz@gmail.com", "i'm cool", "see");
	
		$db = Database::getInstance();
		$db->connect();
		$query = "insert into person (email,first_name, last_name, password, verified) values ('js@df.com','jeremy','patrick','siayer',0)";
		$db->executeQuery($query);
	}

?>