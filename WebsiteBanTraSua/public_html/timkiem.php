<?php
	include ('controller/c_TraSua.php');
	$c_TraSua = new C_TraSua();
	//kiểm tra dữ liệu cần tìm
	$key = '';
	if(isset($_POST['tukhoa'])){
		$key = $_POST['tukhoa'];
	}
	$timtrasua = $c_TraSua->timkiem($key);

	//xuất trà sữa
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
		<h3>Kết quả tìm kiếm nội dung <strong><b><i style="color: red;"><?=$key?></i></b></strong> là:</h3><br><br>
	<?php
	foreach ($timtrasua as $trasua) {
		?>
		 <div class="thubmnail-recent">
            <img src="public/img/<?=$trasua->hinh?>" class="recent-thumb" alt="">
            <h2><a href="singleproduct.php?mahh=<?=$trasua->mahh?>" data-name="<?=$trasua->tenhh?>"><?=$trasua->tenhh?></a></h2>
            <div class="product-sidebar-price">
                <ins><?=$trasua->giatien?></ins>
            </div>                             
         </div>
        <hr>
		<?php
	}
	}
?>