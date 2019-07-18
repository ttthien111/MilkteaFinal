<?php
	include('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	$mahh = $_GET['mahh'];
	$xoasp =$c_TraSua->xoaSanPham($mahh); 
?>