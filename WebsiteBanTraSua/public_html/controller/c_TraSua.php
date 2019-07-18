<?php
    ob_start();
 include ("model/m_TraSua.php");
 class C_TraSua{
 	function index(){
 			$m_TraSua = new M_TraSua();
 			$trasuas = $m_TraSua->getTraSuas();
 			return array('trasuas'=>$trasuas);
 	}

 	function singleproduct(){
 		$m_TraSua = new M_TraSua();
 		//lấy tất cả trà sữa
 		$trasuas = $m_TraSua->getTraSuas();
 		//lấy danh sách trà sữa theo mã
 		$mahh =(isset($_GET['mahh']))?$_GET['mahh']:1;
 		$trasua = $m_TraSua->getTraSuaById($mahh);
 		//tìm trà sữa theo tên
 		$chuoitimkiem = (isset($_GET['textsearch']))?$_GET['textsearch']:NULL;
 		$timtrasua = $m_TraSua->searchByNameOrId($chuoitimkiem);//tạo biến lấy dữ liệu
 		//Lấy comment đổ về mỗi sản phẩm
 		$comment = $m_TraSua->getComments($mahh);
 		$comment_limit = $m_TraSua->getCommentLimit($mahh);
 		//Tạo comment cho sản phẩm
 		
 		return array('trasua'=>$trasua,'timtrasua'=>$timtrasua,'trasuas'=>$trasuas,'comment'=>$comment,'comment_limit'=>$comment_limit);
 	}

 	function timkiem($key){
 		$m_TraSua = new M_TraSua();
 		$timtrasua = $m_TraSua->searchByNameOrId($key);
 		return  $timtrasua;
 	}

 	function themBinhLuan($makh,$mahh,$noidung){
 		$m_TraSua = new M_TraSua();
 		$addcmt = $m_TraSua->addComment($makh,$mahh,$noidung);
 		header('location:'.$_SERVER['HTTP_REFERER']);
 	}

 	function xoaSanPham($mahh){
 		$m_TraSua = new M_TraSua();
 		$xoaSP = $m_TraSua->XoaTraSua($mahh);
 		$_SESSION['xoa_sp'] = "Đã xóa mặt hàng";
		header('location:admin_products.php');
 	}

 	function themSanPham($tenhh,$hinh,$tomtat,$giatien){
 		$m_TraSua = new M_TraSua();
 		$themSP = $m_TraSua->themTraSua($tenhh,$hinh,$tomtat,$giatien);
 		$_SESSION['them_sp'] = "Đã thêm sản phẩm thành công !";
 		header('location:'.$_SERVER['HTTP_REFERER']);
 	}

 	function suaSanPham($mahh,$tenhh,$hinh,$tomtat,$giatien){
 		$m_TraSua = new M_TraSua();
 		$themSP = $m_TraSua->suaTraSua($mahh ,$tenhh,$hinh,$tomtat,$giatien);
 		$_SESSION['sua_sp'] = "Đã sửa sản phẩm thành công !";
 		header('location:'.$_SERVER['HTTP_REFERER']);
 	}

 	function themphanhoi($makh,$noidung){
			$m_TraSua = new M_TraSua();
			$phanhoi = $m_TraSua->themphanhoi($makh,$noidung);
			$_SESSION['respone_msg'] = "Đã gửi phản hồi thành công . Cảm ơn bạn đã đồng hành cùng KiMoChi.";
	}

	function getMyCart($makh){
		$m_TraSua = new M_TraSua();
		$getCart = $m_TraSua->getMyCart($makh);
		return array('getCart'=>$getCart);
	}

	function addItemCart($makh,$mahh,$soluong){
		$m_TraSua = new M_TraSua();
		if($soluong == 1){
			$addCart = $m_TraSua->addItemCart($makh,$mahh,$soluong);
		}else{
			$addCart = $m_TraSua->updateItemCart($makh,$mahh,$soluong);
		}
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	function showMyCart($makh){
		$m_TraSua = new M_TraSua();
		$showCart = $m_TraSua->showMyCart($makh);
		return array('showCart'=> $showCart);
	}

	function thaydoi_sl($makh,$mahh,$soluong){
		$m_TraSua = new M_TraSua();
		$m_TraSua->updateSoluong($makh,$mahh,$soluong);
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	function deleteItem_Cart($makh,$mahh){
		$m_TraSua = new M_TraSua();
		$m_TraSua->deleteItem_Cart($makh,$mahh);
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	function deleteAllItem($makh){
		$m_TraSua = new M_TraSua();
		$m_TraSua->deleteAllItem($makh);
		header('location:'.$_SERVER['HTTP_REFERER']);
	}

	function create_Order($makh,$tennguoinhan,$sdt_nhan,$diachi_nhan){
		$m_TraSua = new M_TraSua();
		$order = $m_TraSua->create_Order($makh,$tennguoinhan,$sdt_nhan,$diachi_nhan);
		return array('order'=>$order);
	}

	function getMaHD($makh){
		$m_TraSua = new M_TraSua();
		$get_mahd = $m_TraSua->getMaHD($makh);
		return array('mahd'=>$get_mahd);
	}

	function addItem_bill($mahd,$mahh,$soluong,$tongtien){
		$m_TraSua = new M_TraSua();
		$m_TraSua->addItem_bill($mahd,$mahh,$soluong,$tongtien);
	}

	function countActive(){
		$m_TraSua = new M_TraSua();
		$count = $m_TraSua->countActive();
		return array('count'=>$count);
	}
 }
?>