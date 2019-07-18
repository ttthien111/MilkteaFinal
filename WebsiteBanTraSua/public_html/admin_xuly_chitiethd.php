<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	$mahd = $_GET['mahd'];
	$mahh = $_GET['mahh'];
	$c_admin->deleteItem_bill($mahd,$mahh);
?>