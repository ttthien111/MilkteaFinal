<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	$maph = $_GET['maph'];
	$delete = $c_admin->xoaPhanHoi($maph);
?>