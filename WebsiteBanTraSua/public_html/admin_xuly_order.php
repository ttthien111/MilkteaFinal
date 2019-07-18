<?php 
	include('controller/c_admin.php');

	$c_admin = new C_Admin();
	//get mã hóa đơn
	$mahd = $_GET['mahd'];
	// tạo các dữ liệu cho mail
	$to1 = $_GET['to'];
    $subject = "Trà sữa Kimochi";
    $txt = "Đơn hàng của bạn đã được xác nhận, sản phẩm sẽ được chuyển tới bạn sau 30 phút!!! \nCảm ơn bạn đã ủng hộ Kimochi";
    $headers = "From: kimochimilktea@gmail.com" . "\r\n" .
    "CC: somebodyelse@example.com";

    mail($to1,$subject,$txt,$headers);
    $accept_order = $c_admin->xacnhan_Order($mahd);
?>

