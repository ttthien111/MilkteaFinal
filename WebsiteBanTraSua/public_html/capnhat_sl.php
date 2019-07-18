<?php
	include('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	if(isset($_POST['capnhat'])){
		$mangSL = $_POST['soluong_update'];
		$myCart = $c_TraSua->showMyCart($_POST['makh']);
		$mangCart = $myCart['showCart'];
		for ($i=0; $i < count($mangSL) ; $i++) { 
			if($mangSL[$i] > 0)
		 		$change = $c_TraSua->thaydoi_sl($_POST['makh'],$mangCart[$i]->mahh,$mangSL[$i]);
		} 
	}

	// thanh toán 

	if(isset($_POST['xoatatca'])){
		$c_TraSua->deleteAllItem($_POST['makh']);
	}

?>