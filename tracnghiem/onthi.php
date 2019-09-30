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
		<link rel="stylesheet" href="onthi.css">
	</head>
	<body>
		<form method="POST" action="lambai.php">
			<div class="container text-center con">
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 span1">
								<span>Chọn mã đề ôn</span>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 chon">
								<select name="made">
									<?php
										$lenh1 = "SELECT distinct MaDe FROM dethi";
										$kt1 = mysqli_query($con,$lenh1) or die();	
										while($row1 = mysqli_fetch_array($kt1))
										{
											echo "<option>".$row1['MaDe']."</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nut">
								<button class="btn btn-default" name="btnBatDau">Bắt đầu</button>
							</div>
						</div>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thoigian">
						<p>(Lý thuyết: 60 phút, thực hành: 60 phút)</p>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>

<?php 
	load_footer();
?>