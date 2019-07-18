<?php
	include ("model/database.php");
	class M_TraSua extends database {

		function getTraSuaById($mahh){
			$sql = "SELECT * FROM tb_products WHERE mahh = $mahh";
			$this->setQuery($sql);
			return $this->loadRow(array($mahh));
		}

		function searchByNameOrId($key){
			$sql = "SELECT * FROM tb_products WHERE tenhh like '%$key%'";
			$this->setQuery($sql);
			return $this->loadAllRows(array($key));
		}

		function getCommentLimit($id_tin){
			$sql = "SELECT bl.noidung,kh.tenkh,bl.ngaytao as ngaytao_cmt,kh.avatar FROM tb_binhluans bl INNER JOIN tb_khachhangs kh ON bl.makh = kh.makh WHERE bl.mahh = '$id_tin' ORDER BY bl.ngaytao DESC limit 0,3";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_tin));
		}

		function getComments($id_tin){
			$sql = "SELECT bl.noidung,kh.tenkh,bl.ngaytao as ngaytao_cmt,kh.avatar FROM tb_binhluans bl INNER JOIN tb_khachhangs kh ON bl.makh = kh.makh WHERE bl.mahh = '$id_tin' ORDER BY bl.ngaytao DESC";
			$this->setQuery($sql);
			return $this->loadAllRows(array($id_tin));
		}

		function addComment($makh,$mahh,$noidung){
			$sql = "INSERT INTO tb_binhluans(makh,mahh,noidung) VALUES(?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($makh,$mahh,$noidung));
		}

		function XoaTraSua($mahh){
			$sql = "DELETE FROM tb_products WHERE mahh = $mahh";
			$this->setQuery($sql);
			return $this->execute(array($mahh));
		}

		function themTraSua($tenhh,$hinh,$tomtat,$giatien){
			$sql = "INSERT INTO tb_products(tenhh,hinh,tomtat,giatien) VALUES(?,?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($tenhh,$hinh,$tomtat,$giatien));
		}

		function suaTraSua($mahh,$tenhh,$hinh,$tomtat,$giatien){
			$sql = "UPDATE tb_products SET tenhh = '$tenhh' , hinh = '$hinh', tomtat = '$tomtat', giatien = '$giatien' WHERE mahh = $mahh";
			$this->setQuery($sql);
			return $this->execute(array($tenhh,$hinh,$tomtat,$giatien));
		}

		function themphanhoi($makh,$noidung){
			$sql = "INSERT INTO tb_phanhois(makh,noidung) VALUES(?,?)";
			$this->setQuery($sql);
			$result = $this->execute(array($makh,$noidung));
		}

		function getTraSuas(){
			$sql = "SELECT * FROM tb_products";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function getMyCart($makh){
			$sql = "SELECT * FROM tb_giohang_tmp gh JOIN tb_products hh ON gh.mahh = hh.mahh WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}

		function updateItemCart($makh,$mahh,$soluong){
			$sql = "UPDATE tb_giohang_tmp SET soluonghh = '$soluong' WHERE mahh = '$mahh' and makh='$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh,$mahh));
		}

		function addItemCart($makh,$mahh,$soluong){
			$sql = "INSERT INTO tb_giohang_tmp(makh,mahh,soluonghh) VALUES(?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($makh,$mahh,$soluong));
		}

		function showMyCart($makh){
			$sql = "SELECT gh.mahh,hh.tenhh,hh.hinh,hh.giatien,gh.soluonghh FROM tb_giohang_tmp gh JOIN tb_products hh ON gh.mahh = hh.mahh  WHERE gh.makh = '$makh'";
			$this->setQuery($sql);
			return $this->loadAllRows(array($makh));
		}

		function updateSoluong($makh,$mahh,$soluong){
			$sql = "UPDATE tb_giohang_tmp SET soluonghh = '$soluong' WHERE mahh = '$mahh' and makh='$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh,$mahh,$soluong));
		}

		function deleteItem_Cart($makh,$mahh){
			$sql = "DELETE FROM tb_giohang_tmp WHERE makh = '$makh' and mahh = '$mahh'";
			$this->setQuery($sql);
			return $this->execute(array($makh,$mahh));
		}

		function deleteAllItem($makh){
			$sql = "DELETE FROM tb_giohang_tmp WHERE makh = '$makh'";
			$this->setQuery($sql);
			return $this->execute(array($makh));
		}

		function create_Order($makh,$tennguoinhan,$sdt_nhan,$diachi_nhan){
			$sql = "INSERT INTO tb_hoadons(makh,tennguoinhan,diachi_nhan,sdt_nhan) VALUES(?,?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($makh,$tennguoinhan,$diachi_nhan,$sdt_nhan));
		}

		function getMaHD($makh){
			$sql = "SELECT mahd FROM tb_hoadons WHERE makh = '$makh' and trangthai = 0";
			$this->setQuery($sql);
			return $this->loadRow(array($makh));
		}

		function addItem_bill($mahd,$mahh,$soluong,$tongtien){
			$sql = "INSERT INTO tb_chitiethds(mahd,mahh,soluong,tongtien) VALUES(?,?,?,?)";
			$this->setQuery($sql);
			return $this->execute(array($mahd,$mahh,$soluong,$tongtien));
		}

		function countActive(){
			$sql = "SELECT * FROM tb_khachhangs WHERE active = 1";
			$this->setQuery($sql);
			return $this->loadAllRows();
		}
	}
?>