<?php
	include('controller/c_User.php');
	$c_User = new C_User();
	$email = $_GET['email'];
	echo $email;
	$c_User->kichhoatTK($email);
?>