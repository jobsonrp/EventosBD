<?php 
	session_start();
    if(!isset($_SESSION['UserLog'])){
        header("Location: ../index.php");  
        session_destroy();
    }
    date_default_timezone_set('UTC');
?>