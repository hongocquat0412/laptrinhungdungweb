<?php
	require_once('widget/mysqli_connect.php');
	require 'site.php';
	load_top();
	load_header();
	load_menu();
	if(!isset($_SESSION['namecus']))
		header('Location: thoat.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf8">
		<title></title>
	</head>
	
	<body>
		<form name="myform" method="post" action="xlyk39A.php">
			<p>Name <input type="text" name="txtname"/></p>
			<p>Job <input type="text" name="txtjob"/></p>
			<p>Giới tính 
				<input type="radio" name="rdbsex" value="Nam"/>Nam 
				<input type="radio" name="rdbsex" value="Nữ"/>Nữ 
			</p>
			<p>Quê quán</p>
			<select name="selhomeland">
				<option value="Hà Nội"> Hà Nội </option>
				<option value="Huế"> Huế </option>
				<option value="Đà Nẵng"> Đà Nẵng </option>
				<option value="Quy Nhơn" selected="selected">
									Quy Nhơn </option>
				<option value="Hồ Chí Minh">Hồ Chí Minh </option>
			</select>
			<p>Ngoại ngữ</p>
				<input type="checkbox" name="ckb[]" 
									value="Anh"/> Tiếng Anh
				<input type="checkbox" name="ckb[]" 
									value="Pháp"/> Tiếng Pháp
				<input type="checkbox" name="ckb[]" 
									value="Nhật"/> Tiếng Nhật 			
			<p>Thông tin thêm</p>
				<textarea name="txtmore" cols="45" rows="5"></textarea>
				<p><input type="submit" value="Gửi" /></p>
		</form>
</html>

<?php 
	load_footer();
?>