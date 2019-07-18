<?php
	include ('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	$makh = $_GET['makh'];
	$mahh = $_GET['mahh'];
	$soluong = 1;
	$cart = $c_TraSua->showMyCart($makh);
	$JS_cart = $cart['showCart'];
	foreach ($JS_cart as $item) {
		if($item->mahh == $mahh){
			echo "tìm thấy hh";
			$item->soluonghh++;
			$soluong = $item->soluonghh;
			break;
		}
	}
	echo $soluong;
	$add_cart = $c_TraSua->addItemCart($makh,$mahh,$soluong);
?>