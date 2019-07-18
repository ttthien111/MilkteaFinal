<?php
   ob_start();
	include ('model/m_admin.php');
 
	class C_Admin{

		function dangnhapTK($taikhoan_qtv,$matkhau_qtv){
		 
			$m_admin = new M_Admin();
			$admin = $m_admin->dangnhap($taikhoan_qtv,md5($matkhau_qtv));
			if($admin == true){
				$_SESSION['admin_username'] = $admin->tenqtv;
				header('location:admin_dashboard.php');
				if(isset($_SESSION['admin_error'])){
					unset($_SESSION['admin_error']);
				}
				if(isset($_SESSION['chuadangnhap'])){
					unset($_SESSION['chuadangnhap']);
				}
			ob_end_flush();
			}else{
				$_SESSION['admin_error'] = "Đăng nhập thất bại!";
				header('location:dangnhap_admin.php');
			}
		}

		function dangxuat(){
			session_start();
			session_destroy();
			header('location:dangnhap_admin.php');
		}

		function getAllAccount(){
			$m_admin = new M_Admin();
			$user = $m_admin->loadAllAccount();
			return array('user'=>$user);
		}

		function ban_KhachHang($makh){
			$m_admin = new M_Admin();
			$user = $m_admin->ban_KhachHang($makh);
			$_SESSION['khoa_acc'] = "Đã khóa tài khoản khách hàng có mã khách hàng : ".$makh;
			header('location:account_client.php');
		}

		function undo_KhachHang($makh){
			$m_admin = new M_Admin();
			$user = $m_admin->undo_KhachHang($makh);
			$_SESSION['khoiphuc_acc'] = "Đã khôi tài khoản khách hàng có mã khách hàng : ".$makh;
			header('location:account_client.php');
		}

		function timkiemKH($key){
			$m_admin = new M_Admin();
			$user = $m_admin->timkiemKH($key);
			return array('user' => $user);
		}

		function loadMsg_Unread(){
			$m_admin = new M_Admin();
			$tinnhan = $m_admin->loadMsg_Unread();
			return array('tinnhan'=>$tinnhan);
		}

		function loadMsg_read(){
			$m_admin = new M_Admin();
			$tinnhan = $m_admin->loadMsg_read();
			return array('tinnhan_read'=>$tinnhan);
		}

		function check_read($maph){
			$m_admin = new M_Admin();
			$msg = $m_admin->check_read($maph);
			header('location:'.$_SERVER['HTTP_REFERER']);
		}

		function xoaPhanHoi($maph){
			$m_admin = new M_Admin();
			$delete = $m_admin->xoaPhanHoi($maph);
			header('location:response.php');
		}

		function getAllOrder(){
			$m_admin = new M_Admin();
			$orders = $m_admin->getAllOrder();
			return array('orders' => $orders);
		}

		function getAllOrder_unUsed(){
			$m_admin = new M_Admin();
			$orders = $m_admin->getAllOrder_unUsed();
			return array('orders_unUsed' => $orders);
		}

		function getCount_newOrder_newResponse(){
			$m_admin = new M_Admin();
			$getcount_response = $m_admin->loadMsg_Unread();
			$getcount_order = $m_admin->getAllOrder_unUsed();
			return array('c_order'=>count($getcount_order),'c_response'=>count($getcount_response)); 
		}

		function getAllProduct(){
 			$m_admin = new M_Admin();
 			$trasuas = $m_admin->getTraSuas();
 			return array('trasuas'=>$trasuas);
 		}

 		function xacnhan_Order($mahd){
 			$m_admin = new M_Admin();
 			$xuly = $m_admin->xacnhan_Order($mahd);
 			header('location:'.$_SERVER['HTTP_REFERER']);
 		}

 		function getAllItem_byMAHD($mahd){
 			$m_admin = new M_Admin();
 			$chitiets = $m_admin->getAllItem_byMAHD($mahd);
 			return array('chitiets'=>$chitiets);
 		}

 		function deleteItem_bill($mahd,$mahh){
 			$m_admin = new M_Admin();
 			$m_admin->deleteItem_bill($mahd,$mahh);
 			header('location:'.$_SERVER['HTTP_REFERER']);
 		}

 		function thaydoi_sl($mahd,$mahh,$soluong,$tongtien){
 			$m_admin = new M_Admin();
 			$m_admin->thaydoi_sl($mahd,$mahh,$soluong,$tongtien);
 			header('location:'.$_SERVER['HTTP_REFERER']);
 		}
	}
?>