<?php
	require_once('widget/mysqli_connect.php');
	require 'site.php';
	load_top();
	load_header();
	load_menu();
	if(!isset($_SESSION['name']))
		header('Location: thoat.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<span style="float:left; color: black">Chọn file để nộp</span></br>
				<input type="file" name="tenf" style="float:left">
				<input type="submit" name="nop" value="Nộp bài" style="float:left">
		</form>
	</body>
</html>
<?php 
	load_footer();
?>