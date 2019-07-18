<?php
    include('controller/c_User.php');
    $c_User = new C_User();
    $error = "";
    // lấy thông tin khách hang load lên các trường dữ liệu trên form
    $user = $c_User->getInfo_byID($_SESSION['makh']);
    $getInfo = $user['user'];

    //lấy dữ liệu các trường trong form
    if(isset($_POST['luuthaydoi'])){
        if($_POST['email'] != "" && $_POST['mkc'] != "" && $_POST['mkm'] != ""){
            $email = $_POST['email'];
            $mkc = $_POST['mkc'];
            $mkm = $_POST['mkm'];
            
            $error = "";
            $dmk = $c_User->doimatkhau($email,$mkc,$mkm);
        }
        else{
                unset($_SESSION['sts_dmk']);
                $error = "Không được bỏ trống các trường trên";
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

    <title> Thông tin tài khoản</title>

    <link href="https://code.jquery.com/jquery-1.x-git.js">
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
<body style="background-image: url(public/img/bgLogin.jpg)">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	 <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="cart.php"><i class="fa fa-user"></i> Giỏ hàng </a></li>
                                <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>
                                <li><a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                <li><a href="dangki.php"><i class="fa fa-user"></i> Đăng kí</a></li>
                            </ul>
                        </div>
                    </div>  
            	</div>
        	</div> <!-- End mainmenu area -->  
        </div>
    </nav> <!-- End header area -->
    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container-fuild">
        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-8">
                <div class="panel panel-default" style="margin-left:50%;">
                     <?php 
                        if($error !=""){
                            echo "<div class='alert alert-danger'>".$error."</div>";
                        }
                        if(isset($_SESSION['sts_dmk'])){
                            echo "<div class='alert alert-info'>".$_SESSION['sts_dmk']."</div>";
                        }
                    ?>
                    <div class="panel-heading">THÔNG TIN CÁ NHÂN</div>
                    <div class="panel-body" style="position: relative;">
                        <form action="#" method ="POST" enctype="multipart/form-data">
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon1" value="<?=$getInfo->email?>">
                                <br>
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu hiện tại ..." name="mkc" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu mới ..." name="mkm" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <?php
                                if(!isset($_SESSION['sts_dmk'])){
                                    ?>
                                     <a href="index.php"><img style="width: 50px;height: 50px;" src="public/img/go-back-icon.png" alt="Trở về"></a>
                                    <?php
                                }else {
                                    ?>
                                     <a href="dangnhap.php"><img style="width: 50px;height: 50px;" src="public/img/go-back-icon.png" alt="Trở về"></a>
                                    <?php
                                }
                            ?>
                           

                             <button style="position: absolute;bottom: 10px;right: 10px;" type="submit" class="btn btn-success" name="luuthaydoi" id="luuthaydoi">Lưu thay đổi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
	
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/js/main.js"></script>
</body>
</html>
