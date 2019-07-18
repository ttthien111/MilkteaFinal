<?php
	include ('controller/c_admin.php');
	$c_admin = new C_Admin();
	$mahd = $_GET['mahd'];
	$chitiet = $c_admin->getAllItem_byMAHD($mahd);
	$chitiethds = $chitiet['chitiets'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh mục sản phẩm</title>

<!--Links bootstrap-->
<!--default-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trà sữa Kimochi - Trà sữa của sự Sung Sướng</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css
    ">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/JQuery/style.css">
    <script src="public/JQuery/js/jquery-1.4.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="public/JQuery/js/java.js"></script>

    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="public/myCSS.css">
</head>
<body>	
<div class="container-fluid"  style="background-color: #35313a;">
	<div class="row col-md-12">
		<h2 style="color: white;">CHI TIẾT HÓA ĐƠN</h2>
        <form action="admin_xuly_sl.php?mahd=<?=$_GET['mahd']?>" method="post">
		<div class="box-content">
	        <div class="btn-toolbar pull-right clearfix">
                <div class="btn-group">  
                    <input type="submit" class="btn btn-circle show-tooltip" name="capnhatsl" value="Lưu"><i class="fa fa-save"></i></a>
                </div>

	        </div>
	    </div>
    	<table class="table table-condensed table-bordered" style="color: white;">
        	<thead>
            	<tr>
                    <th>Mã hàng hóa</th>
                    <th>Tên hàng hóa</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Xóa</th>
                </tr>    
            </thead>
            <tbody id="data">
            	<?php
                    foreach ($chitiethds as $item) {
                        ?>
                        <tr>
                            <td><?=$item->mahh?></td>
                            <td><?=$item->tenhh?></td>
                            <td><?=$item->giatien?></td>
                            <td style="color: black;" width="100px"><input type="number" style="width: 80px;" value="<?=$item->soluong?>" name='soluong_update[]'/></td>
                            <td><?=$item->tongtien?></td>
                            <td><a class="btn btn-circle show-tooltip" title="Xóa mặt hàng" href='admin_xuly_chitiethd.php?mahd=<?=$item->mahd?>&mahh=<?=$item->mahh?>' onClick="javascript: return confirm('Bạn có chắc muốn xóa mặt hàng này ?');"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        </form>
    </div>
    <br>
    <br>
    <br />
</div>
</body>
</html>