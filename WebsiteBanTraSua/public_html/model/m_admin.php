<?php
	include ("model/database.php");

	class M_Admin extends database{

		function dangnhap($taikhoan_qtv,$md5_matkhau_qtv){
			$sql = "SELECT * FROM tb_quantriviens qtv WHERE qtv.taikhoan_qtv = '$taikhoan_qtv' and qtv.matkhau_qtv 		= '$md5_matkhau_qtv'";
			$this->setQuery($sql);
			return $this->loadRow(array($taikhoan_qtv,$md5_matkhau_qtv));
		}

		function loadAllAccount(){
			$sql  = "SELECT * FROM tb_khachhangs ";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function loadMsg_Unread(){
			$sql = "SELECT * FROM tb_phanhois ph JOIN tb_khachhangs kh ON ph.makh = kh.makh WHERE ph.read_msg = 0 ";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function check_read($maph){
			$sql = "UPDATE tb_phanhois SET read_msg = 1 WHERE id = '$maph'";
			$this->setQuery($sql);
			return $this->execute(array($maph));
		}

		function loadMsg_read(){
			$sql = "SELECT * FROM tb_phanhois ph JOIN tb_khachhangs kh ON ph.makh = kh.makh WHERE ph.read_msg = 1 ";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function ban_KhachHang($makh){
			$sql = "UPDATE tb_khachhangs SET activate = 0 WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh));
		}

		function undo_KhachHang($makh){
			$sql = "UPDATE tb_khachhangs SET activate = 1 WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh));
		}

		function timkiemKH($key){
			$sql = "SELECT * FROM tb_khachhangs WHERE tenkh like '%$key%' or email like '%$key%'";
			$this->setQuery($sql);
			return $this->loadAllRows(array($key));
		}

		function xoaPhanHoi($maph){
			$sql = "DELETE FROM tb_phanhois WHERE id = '$maph'";
			$this->setQuery($sql);
			return $this->execute(array($maph));
		}

		function getAllOrder(){
			$sql = "SELECT * FROM tb_hoadons hd JOIN tb_khachhangs kh ON hd.makh = kh.makh";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function getAllOrder_unUsed(){
			$sql = "SELECT ct.mahd,SUM(ct.tongtien) as tongtien_hd,kh.tenkh,kh.email,hd.diachi_nhan,hd.sdt_nhan,hd.tennguoinhan,hd.trangthai 
					FROM tb_hoadons hd JOIN tb_khachhangs kh ON hd.makh = kh.makh
									   JOIN tb_chitiethds ct ON hd.mahd = ct.mahd
					WHERE hd.trangthai = 0
					GROUP by ct.mahd,kh.tenkh,hd.diachi_nhan,hd.sdt_nhan,hd.tennguoinhan,hd.trangthai,kh.email";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function getTraSuas(){
			$sql = "SELECT * FROM tb_products";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function xacnhan_Order($mahd){
			$sql = "UPDATE tb_hoadons SET trangthai = 1 WHERE mahd = '$mahd'";
			$this->setQuery($sql);
			return $this->execute(array($mahd));
		}

		function getAllItem_byMAHD($mahd){
			$sql = "SELECT * FROM tb_chitiethds ct JOIN tb_products hh ON ct.mahh = hh.mahh  WHERE mahd='$mahd'";
			$this->setQuery($sql);
			return $this->loadAllRows(array($mahd));
		}

		function deleteItem_bill($mahd,$mahh){
			$sql = "DELETE FROM tb_chitiethds WHERE mahd = '$mahd' and mahh = '$mahh'";
			$this->setQuery($sql);
			return $this->execute(array($mahd,$mahh));
		}

		function thaydoi_sl($mahd,$mahh,$soluong,$tongtien){
			$sql = "UPDATE tb_chitiethds SET soluong = '$soluong' ,tongtien = '$tongtien' WHERE mahd = '$mahd' and mahh='$mahh'";
			$this->setQuery($sql);
			return $this->execute(array($mahd,$mahh,$soluong,$tongtien));
		}
	}
?>