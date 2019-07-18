<?php
    session_start();
    include ("controller/c_TraSua.php");
    $c_TraSua = new C_TraSua(); 
    //gọi người dùng để lấy avatar

    //gọi đến hàm xử lý 
    $trasua = $c_TraSua->singleproduct();
    //load lên trà sữa theo mã
    $chitiettrasua = $trasua['trasua'];
    //trà sữa
    $trasuas = $trasua['trasuas'];
    //Đổ comment vào sản phẩm
    $comment = $trasua['comment'];
    $comment_limit = $trasua['comment_limit'];
    if(isset($_POST['thembinhluan'])){
        if(isset($_SESSION['makh'])){
            $makh = $_SESSION['makh'];
            $mahh = $_POST['mahh'];
            $noidung = $_POST['noidung'];
            $comment = $c_TraSua->thembinhluan($makh,$mahh,$noidung);
        }
        else{
             $_SESSION['chuadangnhap']= "Vui lòng đăng nhập để thêm bình luận";
        }
    }

    //  load gio hàng
    $myiconcart = "";
    $tongtien_hd = 0;
    if(isset($_SESSION['makh'])){
        $getCart = $c_TraSua->getMyCart($_SESSION['makh']);
            $myiconcart = $getCart['getCart'];
            for ($i=0; $i < count($myiconcart) ; $i++) { 
                $tongtien_hd += $myiconcart[$i]->giatien*$myiconcart[$i]->soluonghh;
            }
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
                        <li ><a href="index.php">Trang chủ</a></li>
                        <li><a href="shop.php">Cửa hàng</a></li>
                        <li class="active"><a href="singleproduct.php">Sản phẩm</a></li>
                        <li><a href="cart.php">Giỏ hàng</a></li>
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
                        <h2 style="font-family: 'segoe ui light',sans-serif;">Thông tin sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <form action="">
                            <input type="text" placeholder="Nhập tên sản phẩm..." id="textsearch" >
                            <input type="button" class="btn btn-info" value="Tìm kiếm" name="OK" id="btnSearch">
                        </form>

                        <div>
                            <div id ="datasearch" class="col-sm-12"> 
                            </div>
                        </div>

                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm</h2>
                        <?php
                            for ($i = 0;$i < 3 ;$i++) {
                                $r = rand(0,count($trasuas)-1);

                               ?>
                               <div class="thubmnail-recent">
                                    <img src="public/img/<?=$trasuas[$r]->hinh?>" class="recent-thumb" alt="">
                                    <h2><a href="singleproduct.php?mahh=<?=$trasuas[$r]->mahh?>" data-name="<?=$trasuas[$r]->tenhh?>"><?=$trasuas[$r]->tenhh?></a></h2>
                                    <div class="product-sidebar-price">
                                        <ins><?=$trasuas[$r]->giatien?></ins>
                                    </div>                             
                                </div>
                               <?php
                            }
                        ?>
                    </div>
                    
                    <!-- <div class="single-sidebar">
                        <h2 class="sidebar-title">Bài đăng gần đây</h2>
                        <ul>
                            <li><a href="">Trà sữa pudding đậu đỏ</a></li>
                            <li><a href="">Trà sữa pudding đậu đỏ</a></li>
                            <li><a href="">Trà sữa pudding đậu đỏ</a></li>
                            <li><a href="">Trà sữa pudding đậu đỏ</a></li>
                            <li><a href="">Trà sữa pudding đậu đỏ</a></li>
                        </ul>
                    </div> -->
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Trang chủ</a>
                            <a href="">Loại trà sữa</a>
                            <a href=""><?=$chitiettrasua->tenhh?></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="public/img/<?=$chitiettrasua->hinh?>" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?=$chitiettrasua->tenhh?></h2>
                                    <div class="product-inner-price">
                                        <ins><?=$chitiettrasua->giatien." đ"?></ins>
                                    </div>    
                                    
                                    <form action="" class="cart" align ="center">
                                        <?php
                                        if(isset($_SESSION['makh'])){
                                           ?>
                                            <a href="xuly_cart.php?makh=<?=$_SESSION['makh']?>&mahh=<?=$chitiettrasua->mahh?>  " class="btn btn-success" ><span>Thêm vào giỏ</span></a>
                                           <?php 
                                        } else{
                                            ?>
                                                <a href="#"  class="btn btn-danger" ><span>Thêm vào giỏ</span></a>
                                            <?php
                                        }
                                    ?>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Loại: <a href="">Truyền thống</a>. Thẻ <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả sản phẩm</h2>  
                                                <p>
                                                    <?=$chitiettrasua->tomtat;?>
                                                </p>
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
    <!-- Comments Form -->
     <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <?php
                            if(isset($_SESSION['chuadangnhap'])){
                                echo "<div class='alert alert-danger'>".$_SESSION['chuadangnhap']."</div>";
                            }
                            ?>
                            <div class="text text-info"><h3>Bình luận (<?=count($comment)?>)</h3></div>
                            <br>
                            <?php
                        ?>
                        <div class="well">
                            <h5>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h5>
                            <form role="form" action="#" method="post">
                                <input type="hidden" name="mahh" value="<?=$chitiettrasua->mahh?>">
                                <div class="form-group">
                                    <textarea class="form-control" rows="1" name="noidung"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="thembinhluan">Gửi</button>
                            </form>
                        </div>
                        <?php 
                            foreach ($comment_limit as $cmt) {
                            ?>
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" style="width: 64px;height: 64px;" src="public/img/avatar/<?=$cmt->avatar?>" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?=$cmt->tenkh?>
                                        <small><?=$cmt->ngaytao_cmt?></small>
                                    </h4>
                                    <?=$cmt->noidung?>
                                </div>
                            </div>
                        <?php
                     }   
                ?> 
                <hr>                   
            </div>
        </div>
    </div>
    
    <div class="footer-top-area" style="display: inline-block; width: 100%;">
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
    <script language="javascript">
        $(document).ready(function() {
             $('#btnSearch').click(function(event) {
               var keyword = $('#textsearch').val();
               if(keyword == '')
               {
                    alert("Vui lòng nhập dữ liệu tìm kiếm");
               }else{
                    $.post('timkiem.php',{tukhoa:keyword},function(data){
                        $('#datasearch').html(data);
                    })
                }
            });
        });
    </script>
  </body>
</html>