<?php
	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="127.0.0.1";
	$username="username";
	$password="senha";
	$dbname="banco";
	//$usertable="your_tablename";
	//$yourfield = "your_field";

    $con = mysqli_connect($hostname,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to Database: " . mysqli_connect_error();
        exit;
    }
	
	
?>
