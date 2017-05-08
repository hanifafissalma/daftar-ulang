<?php

	$host   = "localhost";
	$db     = "ukt_lapor_diri";
	$username = "root";
	$password = "";
	try{
	    $koneksi_ukt = new PDO('mysql:host=localhost;dbname=' . $db, $username, $password);
	} catch (PDOException $ex) {
	    echo $ex->getMessage();
	}

	$host2   = "localhost";
	$db2     = "h2h";
	$username2 = "root";
	$password2 = "";
	try{
	    $koneksi_h2h = new PDO('mysql:host=localhost;dbname=' . $db2, $username2, $password2);
	} catch (PDOException $ex) {
	    echo $ex->getMessage();
	}	
?>