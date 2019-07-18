<?php
    session_start();
    $_SESSION['inbox'] = 1;
    $_SESSION['read'] = 0;
    include('controller/c_admin.php');
    $c_admin = new C_Admin();
    $tinnhan = $c_admin->loadMsg_Unread();
    $tinnhan_read = $c_admin->loadMsg_read();
    $msg = $tinnhan['tinnhan'];
    $msg_read = $tinnhan_read['tinnhan_read'];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
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
                        <li><a href="account_client.php">Tài Khoản Khách Hàng</a></li>
                        <li class="active"><a href="response.php">Phản Hồi <span class="badge"><?php if($c_newRes != 0) echo $c_newRes?></span></a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->   
    <div class="container-fluid"  style="background-color: #35313a;">
    <div class="row col-md-12">
        <h2 style="color: white;">Danh sách tất cả khách hàng</h2>
        <div>
        <div class="box-content">
            <div class="btn-toolbar pull-right clearfix">
                <div class="btn-group">
                    <a class="btn btn-circle show-tooltip" title="Làm mới" href="response.php"><i class="fa fa-repeat"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="product-inner">
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tin nhắn chưa đọc <span class="badge"><?php if(count($msg) != 0) echo count($msg);?></span></a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tin nhắn đã đọc</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2 class="text text-info"><b>Hộp thư chưa đọc</b></h2>  
                                                <div class="submit-review" style="color: green;">
                                                        <table class="table table-condensed table-bordered" style="color: white;">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên khách hàng</th>
                                                            <th>Email</th>
                                                            <th>Nội dung</th>
                                                            <th>Ngày tạo</th>
                                                            <th>Trạng thái</th>
                                                        </tr>    
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php
                                                            foreach ($msg as $user) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$user->tenkh?></td>
                                                                    <td width="20%"><?=$user->email?></td>
                                                                    <td><?=$user->noidung?></td>
                                                                    <td><?=$user->ngaytao?></td>
                                                                    <td><a class="btn btn-circle show-tooltip" title="Đánh dấu đã đọc" href='admin_read.php?maph=<?=$user->id?>'><i class="fa fa-check"></i></a></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2 class="text text-info"><b> Hộp thư đã đọc</b></h2>
                                                <div class="submit-review">
                                                    <table class="table table-condensed table-bordered" style="color: white;">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên khách hàng</th>
                                                            <th>Email</th>
                                                            <th>Nội dung</th>
                                                            <th>Ngày tạo</th>
                                                            <th>Xóa tin nhắn</th>
                                                        </tr>    
                                                    </thead>
                                                    <tbody id="data">
                                                        <?php
                                                            foreach ($msg_read as $user) {
                                                                ?>
                                                                <tr>
                                                                    <td><?=$user->tenkh?></td>
                                                                    <td width="20%"><?=$user->email?></td>
                                                                    <td><?=$user->noidung?></td>
                                                                    <td><?=$user->ngaytao?></td>
                                                                    <td><a class="btn btn-circle show-tooltip" title="Xóa tin nhắn" href='admin_xoatinnhan.php?maph=<?=$user->id?>'><i class="fa fa-trash-o"></i></a></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Đánh giá</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Họ và tên</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Đánh giá</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Đánh giá của bạn về sản phẩm</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Gửi" id="thongBao" onclick="showAlert()"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </div>
    </div>
    <br>
    <br>
    <br />
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
</div>
</body>
</html>