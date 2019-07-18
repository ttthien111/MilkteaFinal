<?php
    session_start();
    include('controller/c_admin.php');
    $c_admin = new C_Admin();
    //tạo biến admin_error để thông báo trạng thái đăng nhập
    $admin_error = "";
    // kiểm tra đăng nhập
    if(isset($_POST['dangnhap'])){
        if(isset($_POST['taikhoanqtv']) && isset($_POST['matkhauqtv'])){
            $taikhoanqtv = $_POST['taikhoanqtv'];
            $matkhauqtv = $_POST['matkhauqtv'];
            $admin = $c_admin->dangnhapTK($taikhoanqtv,$matkhauqtv);
        }else{
            $admin_error = "Đăng nhập thất bại!.";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Đăng nhập</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="public/myCSS.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.public/js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body background="public/img/bgLogin.jpg">
    <br>
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-8" style=" height: 500px;">
            </div>
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION['admin_error']))
                        echo "<div class='alert alert-danger'>".$_SESSION['admin_error']."</div>";
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng nhập</div>
                    <div class="panel-body">
                        <form action="#" method="post">
                            <div>
                                <label>Tài khoản</label>
                                <input type="text" class="form-control" placeholder="Tài khoản" name="taikhoanqtv" 
                                >
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="matkhauqtv">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="dangnhap">Đăng nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy;2018 Trà Sữa KiMoChi. Đã đăng kí bản quyền.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>
     <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/js/main.js"></script>
    <script src="public/myJS.js"></script>

</body>

</html>
