<?php
    session_start();
    include ("controller/c_TraSua.php");
    $c_TraSua = new C_TraSua();
    $traSuas = $c_TraSua->index();
    $slideTraSua = $traSuas['trasuas'];
    
    $mycart = "";
    $tongtien_hd = 0;
    if(isset($_SESSION['makh'])){
        $getCart = $c_TraSua->getMyCart($_SESSION['makh']);
            $mycart = $getCart['getCart'];
            for ($i=0; $i < count($mycart) ; $i++) { 
                $tongtien_hd += $mycart[$i]->giatien*$mycart[$i]->soluonghh;
            }
    }

    $count = $c_TraSua->countActive();
    $cActive = count($count);
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css
    ">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="public/myCSS.css">

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
                <div class="col-md-12">
                    <div class="user-menu nav navbar-nav">
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
                                    <li><a href="dangxuat.php?makh=<?=$_SESSION['makh']?>"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                    <li><a href="cart.php"><i class="fa fa-user"></i> Giỏ hàng </a></li>
                                    <li><a href="checkout.php"><i class="fa fa-user"></i> Thanh toán</a></li>
                                    <li><a href="#"><i class="fa fa-user"> Đang online : <?php echo "<span class = 'text text-danger'>$cActive</span>"?></i></a></li>
                                    <?php
                                }else{
                                    ?>
                                    <li><a href="dangnhap.php"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                    <li><a href="dangki.php"><i class="fa fa-user"></i> Đăng kí</a></li>
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
                            <h1><a href="index.php">Trà sữa <span>Kimochi</span></a></h1>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="shopping-item">
                           <?php
                            if(isset($_SESSION['makh'])){
                                ?>
                                     <a href="cart.php">Giỏ hàng - <span class="cart-amunt" id="doiGia"><?=$tongtien_hd."đ"?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?=count($mycart)?></span></a>
                                <?php
                            }else {
                                ?>
                                    <a href="cart.php">Giỏ hàng - <span class="cart-amunt" id="doiGia">0đ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count" id = "doiSo">0</span></a>
                                <?php
                            }
                        ?>
                        </div>
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
                        <li class="active"><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Cửa hàng</a></li>
                        <li><a href="singleproduct.php">Sản phẩm</a></li>
                        <li><a href="cart.php">Giỏ hàng</a></li>
                        <li><a href="checkout.php">Thanh toán</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
                        <!-- <li><a href="#">Others</a></li> -->
                        <li><a href="contact.php">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Trà sữa Kimochi</h2>
                                                <p>Thành phần tươi ngon, chiết xuất từ các thành phần tự nhiên không chất bảo quản, sữa được nhập từ Hà Lan nơi có những cô gái đội nón mặc đầm ngồi vắt sữa tỉnh bơ điều đó khiến cho những giọt sữa càng tinh khiết hơn dưới bàn tay đầy phép màu của các cô. Thạch và trân châu được làm tại các nơi uy tín, hạt dai ngon, không phải cao su, bổ rẻ.</p>
                                                <p>Hãy đến với Kimochi bạn sẽ được trải nghiệm vị sữa nguyên chất và vị trà hảo hạng, không chỉ thế không gian bốn chiều khiến bạn tỏa sáng hơn trên những tấm ảnh sống ảo.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Không gian đẹp</h2>
                                                <p>Không gian thoáng mát, sạch sẽ đảm bảo bạn sẽ có thể thưởng thức đồ dùng một cách thoải mái.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Thức uống đặc biệt</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>Đổi trả sản phẩm</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Giao hàng miễn phí</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán an toàn</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Quà tặng hấp dẫn</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản phẩm mới nhất</h2>
                        <div class="product-carousel">
                            <?php
                                foreach ($slideTraSua as $traSua) {
                                    ?>
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="public/img/<?=$traSua->hinh?>" alt="">
                                                <div class="product-hover">
                                                    <a href="singleproduct.php?mahh=<?=$traSua->mahh?>" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                                </div>
                                            </div>
                                            
                                            <h2><a href="tsbidaokemsua.html"><?=$traSua->tenhh?></a></h2>
                                            
                                            <div class="product-carousel-price">
                                                <ins><?=$traSua->giatien." đ"?></ins>
                                            </div> 
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Thương hiệu</h2>
                        <div class="brand-list">
                            <img src="public/img/brands1.png" alt="">
                            <img src="public/img/services_logo__2.jpg" alt="">
                            <img src="public/img/services_logo__3.jpg" alt="">
                            <img src="public/img/services_logo__4.jpg" alt="">
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
   <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Bán chạy nhất</h2>
                        <a href="shop.html" class="wid-view-more">Xem tất cả</a>
                        <?php
                            for ($i = 0 ;$i<count($slideTraSua);$i++) {
                                if($i<3)
                                {
                                   ?>
                                    <div class="single-wid-product">
                                        <a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><img src="public/img/<?=$slideTraSua[$i]->hinh?>" alt="" class="product-thumb"></a>
                                        <h2><a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><?=$slideTraSua[$i]->tenhh?></a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins><?=$slideTraSua[$i]->giatien." đ"?></ins>
                                        </div>                            
                                    </div>
                                   <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Khuyên dùng</h2>
                        <a href="shop.html" class="wid-view-more">Xem tất cả</a>
                        <?php
                            for ($i = 3 ;$i<count($slideTraSua);$i++) {
                                if($i<6)
                                {
                                   ?>
                                    <div class="single-wid-product">
                                        <a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><img src="public/img/<?=$slideTraSua[$i]->hinh?>" alt="" class="product-thumb"></a>
                                        <h2><a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><?=$slideTraSua[$i]->tenhh?></a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins><?=$slideTraSua[$i]->giatien." đ"?></ins>
                                        </div>                            
                                    </div>
                                   <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Trà sữa mới</h2>
                        <a href="shop.html" class="wid-view-more">Xem tất cả</a>
                        <?php
                            for ($i = 6 ;$i<count($slideTraSua);$i++) {
                                if($i<9)
                                {
                                   ?>
                                    <div class="single-wid-product">
                                        <a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><img src="public/img/<?=$slideTraSua[$i]->hinh?>" alt="" class="product-thumb"></a>
                                        <h2><a href="singleproduct.php?mahh=<?=$slideTraSua[$i]->mahh?>"><?=$slideTraSua[$i]->tenhh?></a></h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins><?=$slideTraSua[$i]->giatien." đ"?></ins>
                                        </div>                            
                                    </div>
                                   <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
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