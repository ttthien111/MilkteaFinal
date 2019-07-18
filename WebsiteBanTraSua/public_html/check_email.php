<?php
	include ('controller/c_User.php');
	$c_User = new C_User();
	$kiemtra = "";
	// lấy dữ liệu form trả về bằng Ajax
	$email = "";
	if(isset($_POST['tk_email']))
	$email = $_POST['tk_email'];
	$check_email = $c_User->checkAccount($email);
	
	if($check_email == 1){
		echo 1;
		
	}
	else if($check_email == 0) {
		echo 0;
		
	}
?>