<?php
	include('controller/c_User.php');
	$c_User = new C_User();
	$info = "";
	$makh = $_SESSION['makh'];
	if(isset($_FILES['avatar']) && isset($_POST['upload'])){

		$ava = $_FILES['avatar']['name'];
		if($_FILES['avatar']['name'] == ""){
			$info =  "Vui lòng chọn dữ liệu";
		}
		else if($_FILES['avatar']['size'] > 100000){
			printf($_FILES['avatar']['size']);
			$info = "File có kích thước quá lớn";
		}
		else{
			move_uploaded_file($_FILES['avatar']['tmp_name'], "public/img/avatar/$ava");
			$c_User->changes_Avatar($makh,$ava);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>upload file- toidicode.com</title>
    <link rel="stylesheet" href="">
    <style>
    	tr,td{
    		padding: 10px;
    	}
    </style>
</head>
<body>
	
	<form action="#" method="post" enctype="multipart/form-data">
		<table align="center" border="1px" style="border-collapse: collapse;">
			<tr>
				<td align="center"><h2>THAY ĐỔI ẢNH ĐẠI DIỆN</h2></td>
			</tr>
			<tr>
				<td align="center"><input type="file" name="avatar"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="Lưu" name="upload"></td>
			</tr>
		</table>
		<div align="center"><h4 style="color: red;"><?=$info?></h4></div>
	</form>
</body>


