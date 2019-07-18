<?php
	session_start();
	include('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	$makh = $_GET['makh'];

	$Cart = $c_TraSua->showMyCart($_SESSION['makh']);
    $myCart = $Cart['showCart'];
    // tạo hóa đơn và hóa đơn chi tiết
   	$tongtien_hd = 0;// tính tiền tổng hóa đơn
    if(isset($_SESSION['makh'])){
        $getCart = $c_TraSua->getMyCart($_SESSION['makh']);
            $myiconcart = $getCart['getCart'];
            for ($i=0; $i < count($myiconcart) ; $i++) { 
                $tongtien_hd += $myiconcart[$i]->giatien*$myiconcart[$i]->soluonghh;
            }
    }
    // lấy thông tin người nhận
    $tennguoinhan = $_POST['hovaten'];
    $sdt_nhan = $_POST['sdt'];
    $diachi_nhan = $_POST['diachi_nhan'];

    $orderbill = $c_TraSua->create_Order($makh,$tennguoinhan,$sdt_nhan,$diachi_nhan);// tạo hóa đơn
    $getmahd = $c_TraSua->getMaHD($makh);
    $mahds = $getmahd['mahd'];
    $mahd = $mahds->mahd;
    // tạo hóa đơn chi tiết
    for ($i=0; $i < count($myCart) ; $i++) { 
    		$tongtien = $myCart[$i]->giatien*$myCart[$i]->soluonghh;
    		$c_TraSua->addItem_bill($mahd,$myCart[$i]->mahh,$myCart[$i]->soluonghh,$tongtien);
    }
   	
   	// delete giỏ hàng
   	$c_TraSua->deleteAllItem($makh);
    $_SESSION['success_ordered'] = "Đặt hàng thành công vui lòng chờ và kiểm tra Email để nhận thông tin.";
    header('location:checkout.php');
?>