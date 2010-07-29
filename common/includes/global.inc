<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/common/includes/functions/errorhandler.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/common/includes/functions/email.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/common/includes/functions/random.php';

if ($_SERVER["HTTP_HOST"] == 'dev.postneedz.com'){
	require_once "/home/postnee1/php/Benchmark/Timer.php";
	
	$bench = new Benchmark_Timer;
	
	$bench->start();
	$bench->setMarker('Start of the script');
}

function getInclude($include){
		ob_start(); 
		include_once($include);
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
?>