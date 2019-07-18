<?php
	include('controller/c_admin.php');
	$c_admin = new C_Admin();
	if(isset($_POST['capnhatsl'])){
		$mangSL = $_POST['soluong_update'];
		$myBill = $c_admin->getAllItem_byMAHD($_GET['mahd']);
		$mangBill = $myBill['chitiets'];
		print_r($mangBill);
		for ($i=0; $i < count($mangSL) ; $i++) { 
			$tongtien = $mangBill[$i]->giatien*$mangSL[$i];
			$c_admin->thaydoi_sl($_GET['mahd'],$mangBill[$i]->mahh,$mangSL[$i],$tongtien);
		} 
	}
?>