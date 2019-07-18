<?php 
    include ('controller/c_admin.php');
    session_start();
    $c_admin = new C_Admin();
    $user_request = $c_admin->getAllAccount();
    $users = $user_request['user'];
    // get sô lượng thông báo
    $getCount = $c_admin->getCount_newOrder_newResponse();
    $c_newOrder = $getCount['c_order'];
    $c_newRes = $getCount['c_response'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danh mục khách hàng</title>

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
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-menu nav navbar-nav">
                        <ul>
                           
                            <?php
                                if(isset($_SESSION['admin_username'])){
                                    ?>
                                    <li><a href="#"><i class="fa fa-user" style="color: blue;"><?=$_SESSION['admin_username']?></i></a></li>
                                    <li><a href="admin_dangxuat.php"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                    <?php
                                }else{
                                    ?>
                                     <li><a href="dangnhap_admin.php"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                    <div class="col-sm-12" style="background-color: #ffffff;">
                        <div class="logo">
                            <h1><a href="admin_dashboard.php">Trà sữa <span>Kimochi</span></a></h1>
                            <h3><a href="#" style="text-decoration: none;"><span>Chào mừng đến với trang quản trị</span></a></h1>
                        </div>
                    </div>
            </div>
        </div>
    </div> 

    <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                         <li><a href="admin_dashboard.php">Trang chủ</a></li>
                        <li><a href="admin_products.php"</a>Quản Lý Sản Phẩm</a></li>
                        <li><a href="admin_order.php">Đơn Hàng <span class="badge"><?=$c_newOrder?></span></a></li>
                        <li  class="active"><a href="account_client.php">Tài Khoản Khách Hàng</a></li>
                        <li><a href="response.php">Phản Hồi <span class="badge"><?php if($c_newRes != 0) echo $c_newRes?></span></a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->	
<div class="container-fluid"  style="background-color: #35313a;">
	<div class="row col-md-12">
		<h2 style="color: white;">Danh sách tất cả khách hàng</h2>
        <div>
        <div class="row" style="margin-left: 100px;">
                <h3 class="text text-primary">Tìm kiếm</h3>
                <br>
               <form target="#" method="POST" class="search-form" action="#">
                    <span class="search-pan">
                        <button type="submit" id="btnSearch">
                        <i class="fa fa-search"></i>
                        </button>
                        <input type="text" id="search" placeholder="Tìm kiếm ..." autocomplete="off" />
                    </span>
                </form>
            </div>
        </div>
		<div class="box-content">
	        <div class="btn-toolbar pull-right clearfix">
	            <div class="btn-group">
	                <a class="btn btn-circle show-tooltip" title="Làm mới" href="account_client.php"><i class="fa fa-repeat"></i></a>
	            </div>
	        </div>
	    </div>
        <form action="#" method="post">
    	<table class="table table-condensed table-bordered" style="color: white;">
        	<thead>
            	<tr>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>SĐT</th>
                    <th>Avatar</th>
                    <th>Ngày tạo</th>
                    <th>Activate</th>
                    <th>Khóa tài khoản/Khôi phục</th>
                </tr>    
            </thead>
            <tbody id="data">
                <?php
                    foreach ($users as $user) {
                        ?>
                        <tr style="color: black">
                            <td ><input style="width :80px;" type="text" value="<?=$user->makh?>" name='makh'/></td>
                            <td><input type="text" value="<?=$user->tenkh?>" name='tenkh'/></td>
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
        </form>
    </div>
    <br>
    <br>
    <br />
    <script>
        $(document).ready(function() {
            $('#btnSearch').click(function(event) {
                event.preventDefault();
                var keyword = $('#search').val();
                $.post('admin_timkiemKH.php', {tukhoa:keyword}, function(data) {
                    $('#data').html(data);
                });
            });
        });
    </script>
</div>
</body>
</html>