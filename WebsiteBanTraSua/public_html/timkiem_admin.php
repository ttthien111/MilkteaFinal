<?php
	include ('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	//kiểm tra dữ liệu cần tìm
	$key = $_POST['tukhoa'];
	//tạo mảng trà sữa tìm dc
	$timtrasua = ""; // 
	$trasuas = "";
	if($_POST['tukhoa']=="") // kiểm tra nếu chuỗi rỗng
	{
		$trasuas = $c_TraSua->index(); //thì xuất về tất cả sản phẩm
		$timtrasua = $trasuas['trasuas'];
	}
	else{
		$timtrasua = $c_TraSua->timkiem($key); //Xuất về tất cả sản phẩm có từ khóa đó
		//xuất trà sữa
	}
	if(count($timtrasua) == 0)
	{
			$timtrasua = "Không tìm thấy sản phẩm nào";
			?>
			<h4><?=$timtrasua?></h4><br>
			<hr>
			<?php
	}
	else{
			?>
			<table class="table table-striped ">
	            <tbody id="data">
					<?php
					foreach ($timtrasua as $trasua) {
						?>
						<tr>
			            	<input type="hidden" value="<?=$trasua->mahh?>" id="mahh"/>
					        <td><?=$trasua->mahh?></td>
					        <td><?=$trasua->tenhh?></td>
					        <td><?=$trasua->giatien?></td>
					        <td><a class="btn btn-circle show-tooltip" title="Xóa" href='admin_xoasanpham.php?mahh="<?=$trasua->mahh?>"' onClick="javascript: return confirm('Bạn có chắc muốn xóa sản phẩm này ?');"><i class="fa fa-trash-o"></i></a></td>
					         <td><a class="btn btn-circle show-tooltip" title="Sửa" href="" ><i class="fa fa-edit"></i></a></td>
					    </tr>
						<?php
					}
					?>
			  	</tbody>
	        </table>
	        <?php
	    }
?>