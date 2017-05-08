<?php
	require 'functions/koneksi_ukt.php';
	session_start();
	if($_SESSION['username']){
	}
	else{
		header( 'Location:login.php' );
	}
?>