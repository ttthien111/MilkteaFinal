<?php
	include('database.php');

	class M_User extends database{
			
		function dangki($name,$email,$password,$hinhavatar,$diachi,$sdt){
		    $activate = 0;
			$sql = "INSERT INTO tb_khachhangs(tenkh,email,password,avatar,diachi,sdt,activate) VALUES (?,?,?,?,?,?,?)";
			$this->setQuery($sql);
			$result = $this->execute(array($name,$email,md5($password),$hinhavatar,$diachi,$sdt,$activate));
			if($result){
				return $this->getLastId();
			}
			else {
				return false;
			}
		}

		function dangnhap($email,$md5_password){
			$sql = "SELECT * FROM tb_khachhangs WHERE email = '$email' and password = '$md5_password' and activate = 1";
			$this->setQuery($sql);
			return $this->loadRow(array($email,$md5_password));
		}

		function checkAccount($email){
			$sql = "SELECT * FROM tb_khachhangs WHERE email = '$email'";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function check_Activte($email){
			$sql = "SELECT * FROM tb_khachhangs WHERE email = '$email' and activate = 0";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function getInfo_byID($makh){
			$sql = "SELECT * FROM tb_khachhangs WHERE makh='$makh'";
			$this->setQuery($sql);
			return $this->loadRow(array($makh));
		}

		function thaydoi_info($makh,$tenkh,$email,$diachi,$sdt){
			$sql = "UPDATE tb_khachhangs SET tenkh = '$tenkh', email='$email', diachi = '$diachi', sdt = '$sdt' WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh,$tenkh,$email,$diachi,$sdt));
		}

		function changes_Avatar($makh,$avatar){
			$sql = "UPDATE tb_khachhangs SET avatar = '$avatar' WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh,$avatar));
		}

		function checkActive($email){
			$sql = "UPDATE tb_khachhangs SET active = 1 WHERE email = '$email'";
			$this->setQuery($sql);
			return $this->execute(array($email));
		}

		function desActive($makh){
			$sql = "UPDATE tb_khachhangs SET active = 0 WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh));
		}
		
		function checkPass($email,$mkc){
			$sql = "SELECT * FROM tb_khachhangs tb WHERE tb.email = '$email' and tb.password = '$mkc'";
			$this->setQuery($sql);
			return $this->loadRow();
		}

		function doimatkhau($email,$mkc,$mkm){
			$sql = "UPDATE tb_khachhangs tb SET  tb.password = '$mkm' WHERE tb.password = '$mkc' and tb.email = '$email'";
			$this->setQuery($sql);
		 	return $this->execute(array($email,$mkc,$mkm));
		}
		
		function kichhoatTK($email){
			$sql = "UPDATE tb_khachhangs SET activate = 1 WHERE email = '$email'";
			$this->setQuery($sql);
			return $this->execute(array($email));
		}
	}

?>