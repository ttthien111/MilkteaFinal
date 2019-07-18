<?php
    session_start();
    include ('controller/c_admin.php');
    // lấy thông báo đơn hàng mới hay phản hồi mới.
    $c_admin = new C_Admin();
    $getCount = $c_admin->getCount_newOrder_newResponse();
    $c_newOrder = $getCount['c_order'];
    $c_newRes = $getCount['c_response'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
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
                            <h1><a href="index.php">Trà sữa <span>Kimochi</span></a></h1>
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
                        <li class="active"><a href="admin_dashboard.php">Trang chủ</a></li>
                        <li><a href="admin_products.php"</a>Quản Lý Sản Phẩm</a></li>
                        <li><a href="admin_order.php">Đơn Hàng <span class="badge"><?=$c_newOrder?></span></a></li>
                        <li><a href="account_client.php">Tài Khoản Khách Hàng</a></li>
                        <li><a href="response.php">Phản Hồi <span class="badge"><?php if($c_newRes != 0) echo $c_newRes?></span></a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    <div class="container-fluid"  style="background-color: #35313a;">
        <div class="row" style="margin-left: 10%;">
            <a href="admin_products.php"><div class="tinto">
                <img alt="" class="layer1">
                <div class="xam"></div>
                <div class="gradient"></div>
                <div class="hinhvuong"></div>
                <div class="chuto">Quản lý Sản Phẩm</div>
            </div></a>

            <a href="admin_order.php"><div class="tinto">
                <img src="images/sapa.jpg" alt="" class="layer1">
                <div class="xam"></div>
                <div class="gradient"></div>
                <div class="hinhvuong"></div>
                <div class="chuto">Đơn Hàng</div>
            </div></a>

            <a href="account_client.php"><div class="tinto">
                <img src="images/sapa.jpg" alt="" class="layer1">
                <div class="xam"></div>
                <div class="gradient"></div>
                <div class="hinhvuong"></div>
                <div class="chuto">Khách hàng</div>
            </div></a>

             <a href="response.php"><div class="tinto">
                <img src="images/sapa.jpg" alt="" class="layer1">
                <div class="xam"></div>
                <div class="gradient"></div>
                <div class="hinhvuong"></div>
                <div class="chuto"> Phản hồi</div>
            </div></a>

        </div>
    </div>
   
   
</body>
</html>