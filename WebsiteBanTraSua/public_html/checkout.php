<?php
    include ('controller/c_User.php');
    $c_User = new C_User();
    $info = "";
    $user="";
    if(isset($_SESSION['makh'])){
          $getUser = $c_User->getInfo_byID($_SESSION['makh']);
        $user = $getUser['user'];
    }

    if(!isset($_SESSION['success_ordered'])){
        $_SESSION['success_ordered'] = "Đặt hàng thất bại vui lòng đăng nhập để đặt hàng.";
    }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trà sữa Kimochi - Trà sữa của sự Sung Sướng</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
  </head>
  <body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php
                                if(isset($_SESSION['username'])){
                                    ?>
                                    <li>
                                        <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                                            <img class="nav-user-photo" style="width: 30px;height: 30px;" src="public/img/avatar/<?=$_SESSION['hinhavatar']?>" />
                                            <span class="hhh" id="user_info">
                                                <?=$_SESSION['username']?>
                                            </span>
                                            <i class="fa fa-caret-down"></i>
                                             <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                                                <li class="nav-header">
                                                    <a href="thaydoi_info.php">
                                                        <i class="fa fa-user"></i>
                                                        Chỉnh sửa thông tin
                                                    </a>
                                                    <a href="doimatkhau.php">
                                                        <i class="fa fa-key"></i>
                                                        Đổi mật khẩu
                                                    </a>
                                                </li>
                                            </ul>
                                        </a>
                                       
                                     </li>
                                    <li><a href="dangxuat.php"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                    <li><a href="cart.php"><i class="fa fa-user"></i> Giỏ hàng </a></li>
                                    <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>
                                    <?php
                                }else{
                                    ?>
                                    <li><a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                    <li><a href="dangki.php"><i class="fa fa-user"></i> Đăng kí</a></li>
                                    <li><a href="cart.php"><i class="fa fa-user"></i> Giỏ hàng </a></li>
                                    <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>
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
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.html">Trà sữa <span>Kimochi</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
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
                       <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Cửa hàng</a></li>
                        <li><a href="singleproduct.php">Sản phẩm</a></li>
                        <li ><a href="cart.php">Giỏ hàng</a></li>
                        <li class="active"><a href="checkout.php">Thanh toán</a></li>
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2 style="font-family: 'segoe ui light',sans-serif;">Hóa đơn thanh toán</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                        <?php
                            if(isset($_SESSION['makh'])){
                                ?>
                                    <form enctype="multipart/form-data" action="xuly_muahang.php?makh=<?=$_SESSION['makh']?>" class="checkout" method="post" name="checkout">

                                            <div id="customer_details" class="col12-set">
                                                

                                                <div class="col-12">
                                                    <div class="woocommerce-shipping-fields">
                                                        <h3 id="ship-to-different-address">
                                                            <label class="checkbox" for="ship-to-different-address-checkbox">Giao hàng tới địa chỉ ?</label>
                                                        </h3>
                                                        <div id="thongbao" class="text text-danger"><?=$info?></div>
                                                        <div class="shipping_address" style="display: block;">

                                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                                <label class="" for="billing_first_name">Họ và tên người nhận <abbr title="required" class="required">*</abbr>
                                                                </label>
                                                                <input type="text" value="<?=$user->tenkh?>" placeholder="" id="hovaten" name="hovaten" class="input-text ">
                                                            </p>

                                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                            <label class="" for="billing_last_name">Số điện thoại <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="<?=$user->sdt?>" placeholder="" id="sdt" name="sdt" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>

                                                        <p id="diachi_nhan" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="<?=$user->diachi?>" placeholder="Địa chỉ nhận hàng" id="public/" name="diachi_nhan" class="input-text ">
                                                        </p>

                                                        <div class="clear"></div>
                                                </div>

                                            </div>


                                            <div id="order_review" style="position: relative;">
                                                    <div class="form-row place-order" align="center">
                                                        <button type="submit" name="proceed" id="button-clear" class="checkout-button button alt wc-forward btn1" style="color: white;">ĐẶT MUA</button>
                                                    </div>
                                                    <div class="clear"></div>

                                                    <br>
                                                    <br>
                                                    <div align="center" class="text text-success"><?=$_SESSION['success_ordered']?></div>
                                                </div>
                                            </div>
                                        </form>
                                <?php
                            }else {
                                echo "<div class='alert alert-danger'>VUI LÒNG ĐĂNG NHẬP ĐỂ MUA HÀNG.</div>";
                            }
                        ?>
                        
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Trà Sữa<span> Kimochi</span></h2>
                        <p>Hãy đến với Kimochi bạn sẽ được trải nghiệm vị sữa nguyên chất và vị trà hảo hạng, không chỉ thế không gian bốn chiều khiến bạn tỏa sáng hơn trên những tấm ảnh sống ảo.</p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/GongCha309ADaiLoBinhDuong/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.youtube.com/watch?v=MLaZmM9fO1Q" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Người dùng </h2>
                        <ul>
                             <li><a href="thaydoi_info.php" onclick="alert('Mục tài khoản đang được update.');">Tài khoản </a></li>
                            <li><a href="contact.php">Liên hệ nhà cung cấp</a></li>
                            <li><a href="index.php">Trang chủ</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Thể loại</h2>
                        <ul>
                            <li><a href="shop.php">Trà sữa</a></li>
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
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
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="public/js/owl.carousel.min.js"></script>
    <script src="public/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/js/main.js"></script>
    <script src="public/my_js.js"></script>
  </body>
</html>