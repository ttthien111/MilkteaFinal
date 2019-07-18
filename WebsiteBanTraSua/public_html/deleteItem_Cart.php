<?php
	include('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	$makh = $_GET['makh'];
	$mahh = $_GET['mahh'];
	$c_TraSua->deleteItem_Cart($makh,$mahh)
?>