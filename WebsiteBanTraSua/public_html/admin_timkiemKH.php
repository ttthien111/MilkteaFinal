<?php
	include ('controller/c_admin.php');
	$c_admin = new C_Admin();
	//kiểm tra dữ liệu cần tìm
	$key = $_POST['tukhoa'];
	//tạo mảng trà sữa tìm dc
	$timkh = ""; // 
	$khs = "";
	if($_POST['tukhoa']=="") // kiểm tra nếu chuỗi rỗng
	{
		$khs = $c_admin->getAllAccount(); //thì xuất về tất cả khach hang
		$timkh = $khs['user'];
	}
	else{
		$khs = $c_admin->timkiemKH($key); //Xuất về tất cả khach hang có từ khóa đó
		//xuất khach hang
		$timkh = $khs['user'];
	}
	if(count($timkh) == 0)
	{
			$timkh = "Không tìm thấy khach hang nào";
			?>
			<h4><?=$timkh?></h4><br>
			<hr>
			<?php
	}
	else{
			?>
			<table class="table table-striped ">
	            <tbody id="data">
					<?php
					foreach ($timkh as $user) {
                        ?>
                       <tr style="color: black">
                            <td ><input style="width :90px;" type="text" value="<?=$user->makh?>" name='email'/></td>
                            <td><input type="text" value="<?=$user->tenkh?>" name='email'/></td>
                            <td><input type="text" value="<?=$user->email?>" name='email'/></td>
                            <td><input type="text" value="<?=$user->diachi?>" name='diachi'/></td>
                            <td><input type="text" value="<?=$user->sdt?>" name='sdt'/></td>
                            <td><input type="text" value="<?=$user->avatar?>" name='avatar'/></td>
                            <td style="color: white;"><?=$user->ngaytao?></td>
                            <?php
                                if($user->activate == 1){
                                    ?>
                                    <td style="color: green;">Hoạt động</td>
                                    <?php
                                }
                                else {
                                    ?>
                                    <td style="color: red;">Đã khóa</td>
                                    <?php 
                                }

                                if($user->activate == 0){
                                ?>
                                    <td><a class="btn btn-circle show-tooltip" title="Khôi phục tài khoản" href='admin_khoiphuc.php?makh=<?=$user->makh?>' onClick="javascript: return confirm('Bạn có chắc muốn khôi phục tài khoản khách hàng này ?');"><i class="fa fa-undo"></i></a></td>
                                <?php
                                }
                                else{
                                    ?>
                                     <td><a class="btn btn-circle show-tooltip" title="Khóa tài khoản" href='admin_xoaAccount.php?makh=<?=$user->makh?>' onClick="javascript: return confirm('Bạn có chắc muốn khóa tài khoản khách hàng này ?');"><i class="fa fa-ban"></i></a></td>
                                    <?php
                                }
                            ?>
                        </tr>
                        <?php
                    }
					?>
			  	</tbody>
	        </table>
	        <?php
	    }
?>