<?php	
	include ('controller/c_User.php');
	 $c_User = new C_User();
	 $makh = $_GET['makh'];
	 $c_User->dangxuat($makh);
?>