<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	$makh = $_GET['makh'];
	$xoaKH =$c_admin->ban_KhachHang($makh); 
?>