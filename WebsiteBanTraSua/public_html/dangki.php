<?php
	include ('controller/c_User.php');
	$error  = "";
    $error_email = "";
	$user = "";
    $statusDKI = "Nếu khi ấn vào đăng kí bạn không chuyển về trang chủ tức là đăng kí thất bại. Ngược lại đăng kí thành công. Cám ơn bạn đã ủng hộ KIMOCHI";
	$c_User = new C_User();   
	if(isset($_POST['dangki'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['passwordAgain'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $hinhavatar = $_FILES['hinhavatar']['name'];
		//Xử lý ngoại lệ
        $check = $c_User->checkAccount($email);
		if($_POST['name'] == null ||  $_POST['email'] == null || $_POST['password'] == null || $_POST['passwordAgain'] == null || $_POST['diachi'] == null || $_POST['sdt'] == null ){
			$error  = "Không thể bỏ trống các trường trên !";
		}else if($password != $repassword){
			$error = "Mật khẩu nhập lại không đúng!";
		}
        else if($check == 1){
            $error = "Email đã tồn tại vui lòng nhập email khác";
        }
        else
        {
            move_uploaded_file($_FILES['hinhavatar']['tmp_name'], "public/img/avatar/$hinhavatar");
            $user = $c_User->dangkiTK($name,$email,$password,$hinhavatar,$diachi,$sdt);
            // gửi mail kích hoạt tài khoản
            $to1 = $email;
            $sb = "KIMOCHI milktea";   
            $body = "KIMOCHI cảm ơn bạn đã ủng hộ và tham gia vui lòng ấn vào đây để kích hoạt tài khoản: \n";
            $body .= "https://trasuakimochi2.000webhostapp.com/kichhoatTK.php?email=".$email;
            
             $headers = "From: kimochimilktea@gmail.com" . "\r\n" .
                "CC: somebodyelse@example.com";
            //send the message, check for errors
            mail($to1,$sb,$body,$headers);
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
            
		}
	}

   
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Đăng kí</title>

    <link href="httpss://code.jquery.com/jquery-1.x-git.js">
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
        <script src="httpss://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="httpss://oss.maxcdn.com/libs/respond.public/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
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
    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                 <?php 
                 if($error !=""){
                    echo "<div class='alert alert-danger'>".$error."</div>";
                 }else
                  echo "<div class='alert alert-info'>".$statusDKI."</div>";   
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng ký tài khoản</div>
                    <div class="panel-body">
                        <form action="#" method ="POST" enctype="multipart/form-data">
                            <div>
                                <label>Họ tên</label>
                                <input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Email <span id="kiemtra">(Vui lòng kiểm tra Email khi ấn đăng kí !)  </span></label>
                                <input type="email" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon1">
                                <br>
                                <div style="text-align: right;"><button  type="button" class="btn btn-success" name="kiemtra" id="btnkiemtra">Kiểm tra email
                                </button></div>
                            </div>
                            <br>    
                            <div>
                                <label>Nhập mật khẩu</label>
                                <input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Avatar   <span style="color: red;">(Vui lòng upload file không dấu)</span></label>
                                <input type="file" name="hinhavatar" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <div>
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success" name="dangki" id="btndangki">Đăng ký
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
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
