<?php

    ob_start();
	//mở session
	session_start();
	include('model/m_user.php');
     
	class C_User{

		function dangkiTK($name,$email,$password,$hinhavatar,$diachi,$sdt){
			$m_user = new M_User();
			$id_user = $m_user->dangki($name,$email,$password,$hinhavatar,$diachi,$sdt);
			if($id_user > 0){
				$_SESSION['success'] = "Đăng kí thành công !";
				header('location:index.php');
				if(isset($_SESSION['error']) || isset($_SESSION['error_email'])){
					unset($_SESSION['error']);
					unset($_SESSION['error_email']);
				}
			}else{
				$_SESSION['error'] = "Đăng kí không thành công!";
			}
		}

		function dangnhap($email,$password){
		    ob_start();
			$m_user = new M_User();
			$user = $m_user->dangnhap($email,md5($password));
			
			if($user == true){
				$m_user->checkActive($email);//thay đổi trang thái sang đang hoạt động
				//tạo session để đăng nhập
				$_SESSION['username'] = $user->tenkh;
				$_SESSION['makh'] = $user->makh;
				$_SESSION['hinhavatar'] = $user->avatar;
				header('location:index.php');
				if(isset($_SESSION['user_error'])){
					unset($_SESSION['user_error']);
				}
				if(isset($_SESSION['chuadangnhap'])){
					unset($_SESSION['chuadangnhap']);
				}
	            ob_end_flush();
			}else{
				$check_Enable = $m_user->check_Activte($email);
				if($check_Enable == true){
					$_SESSION['user_error'] = "Tài khoản hiện đang bị khóa hoặc chưa được kích hoạt. Vui lòng kiểm tra mail hoặc liên hệ với nhà cung cấp dịch vụ để được hỗ trợ!";
					header('location:dangnhap.php');
				}else{
					$_SESSION['user_error'] = "Đăng nhập thất bại!";
					header('location:dangnhap.php');
				}
			}

		}

		function dangxuat($makh){
			$m_user = new M_User();
			$m_user->desActive($makh);
			session_destroy();
			header('location:index.php');
		}

		function checkAccount($email){
			$m_user = new M_User();
			$check = $m_user->checkAccount($email);
			if($check){
				return 1;
			}
			else {
				return 0;
			}	
		}

		function getInfo_byID($makh){
			$m_user = new M_User();
			$user = $m_user->getInfo_byID($makh);
			return array('user'=>$user);
		}

		function thaydoi_info($makh,$tenkh,$email,$diachi,$sdt){
			$m_user = new M_User();
			$m_user->thaydoi_info($makh,$tenkh,$email,$diachi,$sdt);
			$_SESSION['thaydoi_info'] = "Thay đổi thông tin thành công";
			header('location:thaydoi_info.php');
		}

		function changes_Avatar($makh,$avatar){
			$m_user = new M_User();
			$m_user->changes_Avatar($makh,$avatar);
			unset($_SESSION['hinhavatar']);
			$_SESSION['hinhavatar'] = $avatar;
			header('location:thaydoi_info.php');
		}

		function desActive($makh){
			$m_user = new M_User();
			$m_user->desActive($makh);
		}
		
		function doimatkhau($email,$mkc,$mkm){
			$m_user = new M_User();
			$chk = $m_user->checkPass($email,md5($mkc));
			if($chk){
				$dmk = $m_user->doimatkhau($email,md5($mkc),md5($mkm));
				unset($_SESSION['sts_dmk']);
				$_SESSION['sts_dmk'] = "Đổi mật khẩu thành công";
				session_destroy();
				return 1;
			}
			else{
				unset($_SESSION['sts_dmk']);
				$_SESSION['sts_dmk'] = "Đổi mật khẩu thất bại. Kiểm tra lại tài khoản mật khẩu.";
				return 0;
			}
			header('location:doimatkhau.php');
		}
		
		function kichhoatTK($email){
			$m_user = new M_User();
			$m_user->kichhoatTK($email);
			header('location:dangnhap.php');
		}
	}
?>