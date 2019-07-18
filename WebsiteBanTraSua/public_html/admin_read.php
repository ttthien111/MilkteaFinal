<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	$maph = $_GET['maph'];
	$msg = $c_admin->check_read($maph);
?>