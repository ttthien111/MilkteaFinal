<?php
	session_start();
	include('controller/c_TraSua.php');
	$thongbao = "";
	//tạo biến lấy dữ liệu cũ của hàng hóa
	$mahh = $_GET['mahh'];
	echo $mahh;
	//lấy thông tin trà sữa đã chọn
	$c_TraSua = new C_TraSua();
	$trasua = $c_TraSua->singleproduct();
	$data_trasua = $trasua['trasua'];
	// thực hiện sửa
	if(isset($_POST['luu'])){
			if($_POST['tenhh'] == "" || $_POST['hinh'] == "" || $_POST['tomtat'] == "" || $_POST['giatien'] == ""){
					$thongbao = "Không thể để trống các trường trên.";
					if(isset($_SESSION['sua_sp'])){
						unset($_SESSION['sua_sp']);
					}
			}else if(!is_numeric($_POST['giatien'])){
				$thongbao = "Giá tiền hoặc số lượng nhập vào là số nguyên. Vui lòng xem lại!";
			}else {
				$tenhh = $_POST['tenhh'];
				$hinh = $_POST['hinh'];
				$tomtat = $_POST['tomtat'];
				$giatien = $_POST['giatien'];
				$them_ts = $c_TraSua -> suaSanPham($mahh,$tenhh,$hinh,$tomtat,$giatien);  
			}
		}	

	?>
	<!--Tạo form sữa-->
			<head>	
				<style>	
						table,td,th{
							border:2px solid white;
							border-collapse: collapse;
							width: 350px;
							height: 70px;
							text-align: center;
							font-family: 'segoe ui light',sans-serif;
							background-color: grey;
							color: white;
							font-weight: bolder;
						}
						span{
							margin-left: 20%;
						}
						button {
							width: 150px;
							height: 50px;
							background-color: blue;
							color: white;
						}
						.btn-success {
	  						color: #fff;
	 						 background-color: #5cb85c;
	  						border-color: #4cae4c;
							}
							.btn-success:focus,
							.btn-success.focus {
	 						 color: #fff;
	  						background-color: #449d44;
	 						 border-color: #255625;
							}
							.btn-success:hover {
	  						color: #fff;
							  background-color: #449d44;
	 						 border-color: #398439;
							}
						.text-success {
 							 color: #3c763d;
						}
						a.text-success:hover,
						a.text-success:focus {
  							color: #2b542c;
						}
						.text-danger {
 						 	color: #a94442;
						}
						a.text-danger:hover,
						a.text-danger:focus {
  							color: #843534;
						}
						.alert-danger {
						  color: #a94442;
						  background-color: #f2dede;
						  border-color: #ebccd1;
						}
						.alert-success {
						  color: #3c763d;
						  background-color: #dff0d8;
						  border-color: #d6e9c6;
						}
						</style>
			</head>
			<h1 style="color: blue;" align="center">Sửa sản phẩm</h1>
						<form action="#" method ="POST">
							<?php
								echo "<span class='alert alert-danger'>".$thongbao."</span>";
								if(isset($_SESSION['sua_sp']))
								echo "<span class='alert alert-success'>".$_SESSION['sua_sp']."</span>"

							?>
							<table align="center">
								<tr>
									<td><label>Tên hàng hóa : </label></td>
									<td><input type="text" class="form-control" placeholder="Tên hàng hóa" name="tenhh" aria-describedby="basic-addon1" value="<?=$data_trasua->tenhh?>"></td>
								</tr>
								<tr>
									<td><label>Hình ảnh :</label></td>
									<td><input type="text" class="form-control" placeholder="Hình ảnh" name="hinh" aria-describedby="basic-addon1" value="<?=$data_trasua->hinh?>"
	                                ></td>
								</tr>
								<tr>
									<td><label>Tóm tắt :</label></td>
									<td><textarea name="tomtat" id="" cols="30" rows="10" required="required"><?=$data_trasua->tomtat?></textarea></td>
								</tr>
								<tr>
									<td><label>Giá tiền</label></td>
									<td><input type="text" class="form-control" name="giatien" aria-describedby="basic-addon1"placeholder="Giá tiền" value="<?=$data_trasua->giatien?>"></td>
								</tr>
								<tr>
									<td><a href="admin_products.php"><button type="button" class="btn btn-success" name="trove">Trở về</button></a></td>
									<td><button type="submit" class="btn btn-success" name="luu">Lưu
	                            	</button></td>

								</tr>
							</table>
						</form>