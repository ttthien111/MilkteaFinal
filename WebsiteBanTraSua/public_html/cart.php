<?php
    session_start();
    include("controller/c_TraSua.php");
    $c_TraSua = new C_TraSua();

    //lấy thông tin icon giỏ hàng
    $myiconcart = "";
    $tongtien_hd = 0;
    $mycart = "";
    $carts = "";
    if(isset($_SESSION['makh'])){
        $getCart = $c_TraSua->getMyCart($_SESSION['makh']);
            $myiconcart = $getCart['getCart'];
            for ($i=0; $i < count($myiconcart) ; $i++) { 
                $tongtien_hd += $myiconcart[$i]->giatien*$myiconcart[$i]->soluonghh;
            }
        $carts = $c_TraSua->showMyCart($_SESSION['makh']);
        $mycart = $carts['showCart'];    
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
                                    <li><a href="checkout.php"><i class="fa fa-user"></i> Thanh toán</a></li>
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
                
                <!-- <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
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
                                     <a href="cart.php">Giỏ hàng - <span class="cart-amunt" id="doiGia"><?=$tongtien_hd. "đ"?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?=count($myiconcart)?></span></a>
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
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Cửa hàng</a></li>
                        <li><a href="singleproduct.php">Sản phẩm</a></li>
                        <li class="active"><a href="cart.php">Giỏ hàng</a></li>
                        <li><a href="checkout.php">Thanh toán</a></li>
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
                        <h2 style="font-family: 'segoe ui light',sans-serif;">Giỏ hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <?php
                                if(isset($_SESSION['makh'])){
                                    ?>
                                        <form method="post" action="capnhat_sl.php">
                                               <table cellspacing="0" class="shop_table cart">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove">&nbsp;</th>
                                                        <th class="product-thumbnail">&nbsp;</th>
                                                        <th class="product-name">Sản phẩm</th>
                                                        <th class="product-price">Đơn giá</th>
                                                        <th class="product-quantity">Số lượng</th>
                                                        <th class="product-subtotal">Tổng cộng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($mycart as $item) {
                                                          ?>
                                                             <tr class="cart_item">
                                                                <td class="product-remove">
                                                                    <input type="hidden" value="<?=$_SESSION['makh']?>" name="makh">
                                                                    <a title="Remove this item" class="remove" href="deleteItem_Cart.php?makh=<?=$_SESSION['makh']?>&mahh=<?=$item->mahh?>">×</a> 
                                                                </td>

                                                                <td class="product-thumbnail">
                                                                    <a href="singleproduct.php?mahh=<?=$item->mahh?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="public/img/<?=$item->hinh?>"></a>
                                                                </td>

                                                                <td class="product-name">
                                                                    <a href="singleproduct.php?mahh=<?=$item->mahh?>"><?=$item->tenhh?></a> 
                                                                </td>

                                                                <td class="product-price">
                                                                    <span class="amount"><?=$item->giatien?></span> 
                                                                </td>

                                                                <td class="product-quantity">
                                                                    <div class="quantity buttons_added">
                                                                         <input type="number" size="4" class="input-text qty text" title="Qty" value="<?=$item->soluonghh?>" min="1" step="1" name="soluong_update[]">
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    <span class="amount"><?=$item->giatien*$item->soluonghh?></span> 
                                                                </td>
                                                            </tr>
                                                          <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="6">
                                                                <input href="#" name="capnhat" value="Cập nhật giỏ" type="submit">
                                                                <input href="#" name="xoatatca" value="Xóa giỏ hàng" type="submit">
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    <?php
                                }else{
                                     echo "<div class='alert alert-danger'>VUI LÒNG ĐĂNG NHẬP ĐỂ MUA HÀNG.</div>";
                                }

                            ?>
                            

                            <div class="cart_totals">
                                <h2>Thanh toán</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng phí giỏ hàng</th>
                                            <td><span class="change"><?=$tongtien_hd." đ"?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Vận chuyển và bàn giao</th>
                                            <td>Miễn phí  phạm vi 10km chỉ nhận hóa đơn trong TP TDM, Bình Dương</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span class="change"><?=$tongtien_hd." đ"?></span></strong> </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td colspan="2" align="center">
                                                <a href="checkout.php"><input type="SUBMIT" value="THANH TOÁN" class="button button-info"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
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
    <script src="public/myJS.js"></script>
  </body>
</html>