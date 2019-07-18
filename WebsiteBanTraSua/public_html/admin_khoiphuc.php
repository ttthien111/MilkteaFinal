<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	$makh = $_GET['makh'];
	$khoiphuc_KH =$c_admin->undo_KhachHang($makh); 
?>