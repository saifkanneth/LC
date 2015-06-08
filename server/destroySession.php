<?php 
include_once "../inc/sessionsetting.class.php";

 $sessionobj	=	sessionsetting::getInstance();
	$sessionobj->destroysession();

?>