<?php
    include('controller/c_User.php');
    $c_User = new C_User();
    $error = "";
    // lấy thông tin khách hang load lên các trường dữ liệu trên form
    $user = $c_User->getInfo_byID($_SESSION['makh']);
    $getInfo = $user['user'];
    $emailcu = $getInfo->email;

    if(isset($_POST['luuthaydoi'])){ // khi ấn và nút lưu thay đổi
        $makh = $_SESSION['makh'];
        $tenkh = $_POST['name'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        if($_POST['name'] ==  "" ||  $_POST['email'] == "" || $_POST['diachi'] == "" || $_POST['sdt'] == "" ){
            unset($_SESSION['thaydoi_info']);
            $error  = "Không thể bỏ trống các trường trên !";
        }
        else if($email !== $emailcu){
            echo "đã vào ";
            $check = $c_User->checkAccount($email);
            if($check == 1){
                $error = "Email đã tồn tại vui lòng nhập email khác";
            }
            else
            {
                $user = $c_User->thaydoi_info($makh,$tenkh,$email,$diachi,$sdt);
            }
        }else{
            $user = $c_User->thaydoi_info($makh,$tenkh,$email,$diachi,$sdt);
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
    <div class="container-fuild" >
        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-4" style="position: relative;">
                <img style="width: 300px;height: 300px;" src="public/img/avatar/<?=$getInfo->avatar?>">
                <a href="doianh_avatar.php">
                    <img style="position: absolute; bottom:20px;right:150px;width:50px;height: 50px;" src="public/img/avatar_cam.png" alt="">
                </a>           
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                     <?php 
                        if($error !=""){
                            echo "<div class='alert alert-danger'>".$error."</div>";
                        }
                    ?>
                    <div class="panel-heading">THÔNG TIN CÁ NHÂN</div>
                    <div class="panel-body" style="position: relative;">
                        <form action="#" method ="POST" enctype="multipart/form-data">
                            <div>
                                <label>Họ tên</label>
                                <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="<?=$getInfo->tenkh?>">
                            </div>
                            <br>
                            <div>
                                <label>Email <span id="kiemtra" style="color: red">(Vui lòng kiểm tra email thay đổi nếu có)</span></label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon1" value="<?=$getInfo->email?>">
                                <br>
                                <div style="text-align: right;"><button  type="button" class="btn btn-success" name="kiemtra" id="btnkiemtra">Kiểm tra email
                                </button></div>
                            </div>
                            <br>    
                            <div>
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" aria-describedby="basic-addon1" value="<?=$getInfo->diachi?>">
                            </div>
                            <br>
                            <div>
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" aria-describedby="basic-addon1" value="<?=$getInfo->sdt?>">
                            </div>
                            <br>
                           
                            <a href="index.php"><img style="width: 50px;height: 50px;" src="public/img/go-back-icon.png" alt="Trở về"></a>

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

    <!-- jQuery -->
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
    
    <script language="javascript">
        $(document).ready(function() {
             $('#btnkiemtra').click(function(event) {
               var email = $('#email').val();
               console.log(email);
               if(email != '')
               {
                    $.post('check_email.php',{tk_email:email},function(data){
                        if(data == 1)
                        {
                             $('#kiemtra').removeClass('text text-success');
                            $('#kiemtra').html("Email đã tồn tại !").addClass('text text-danger');
                        }
                        else if(data == 0){
                            $('#kiemtra').removeClass('text text-danger');
                             $('#kiemtra').html("Email khả dụng").addClass('text text-success');
                         }
                    })
                }
            });
        });
    </script>
</body>
</html>
