<?php
	require_once('widget/mysqli_connect.php');
?>
<?php
	if(isset($_POST['btnDangKy']))
	{	
		/*mã hóa pass*/
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2y$%02d$", 10) . $salt; //$2y$ là thuật toán BlowFish, 10 là độ dài của key mã hóa.
		$_POST['password'] = crypt($_POST['password'], $salt);
		$_POST['passagain'] = crypt($_POST['passagain'], $salt);

		$ten = $_POST['nameuser'];
		$mk = $_POST['password'];
		$mka = $_POST['passagain'];
		$tenkh = $_POST['namecustomer'];
		$ngay = $_POST['dateborn'];
		$em = $_POST['email'];
		$luong = $_POST['salary'];
		$gt = $_POST['sex'];
		
		$lenh = "SELECT * FROM thongtin WHERE TenDangNhap = '".$ten."'";
		$commandsql="INSERT INTO thongtin(TenDangNhap,MatKhau,HovaTen,NgaySinh,GioiTinh,Email,ThuNhap) value ('".$ten."','".$mk."','".$tenkh."','".$ngay."','".$gt."','".$em."','".$luong."')";
		$kt = mysqli_query($con,$lenh) or die("Không thực hiện được.");
	
		if($row = mysqli_fetch_array($kt))
		{
			echo "Trùng tên đăng nhập.";
		}
		else if($mka != $mk)
			{
				echo "Nhập lại mật khẩu không đúng.";
			}
			else
			{	
				$results = mysqli_query($con,$commandsql);
				echo "Đăng ký thành công.";
			}
		mysqli_close($con);
	}
?>

<!DOCTYPE html>
</html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Đăng ký</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="signup.css">

<!-- 	<script type="text/javascript">
			function patTern(){
			var input = document.getElementById('nameusers');
			input.oninvalid = function(event)
			{
			    event.target.setCustomValidity("Bạn chưa nhập tên đăng nhập.");
			}}
		</script> -->

	</head>
	<body>
		<div class="container">
			<div class="sign-form">
				<div class="main2-div">
					<div class="panel3">
						<h1>Đăng ký</h1>
					</div>
					<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="row">
						<div class="col-lg-6">
							<div class="sign-group">	
								<input type="text" class="form-control" name="nameuser" placeholder="Tên đăng nhập" required>
							</div>
							<div class="sign-group">
								<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
							</div>
							<div class="sign-group">
								<input type="password" class="form-control" name="passagain" placeholder="Nhập lại mật khẩu" required>
							</div>
							<div class="gioitinh">
								<label>Giới tính:</label>
								<lable class="radio-inline"><input type="radio" name="sex" value="Nam" required <?php if (isset($_POST['sex'])) {$sex="Nam";}?>>Nam</lable>
								<lable class="radio-inline"><input type="radio" name="sex" value="Nữ" <?php if (isset($_POST['sex'])) {$sex="Nữ";}?>>Nữ</lable>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="sign-group">
								<input type="text" class="form-control" name="namecustomer" placeholder="Họ và tên" required>
							</div>
							<div class="sign-group">
								<input type="text" class="form-control" name="dateborn" placeholder="Ngày sinh (năm-tháng-ngày)" required>
							</div>
							<div class="sign-group">
								<input type="email" class="form-control" name="email" placeholder="Email" required>
							</div>
							<div class="sign-group">
								<input type="text" class="form-control" name="salary" placeholder="Thu nhập" required>
							</div>
						</div>
						<div class="col-lg-6">
							<button type="submit" class="btn btn-primary" name="btnDangKy">Đăng ký</button></div>
						<div class="col-lg-6">
						<a href="dangnhap.php"><button type="button" class="btn btn-primary">Trở về</button></a></div>
					</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	// $sodongmottrang=25;
	// if(isset($_GET['trangchon']))
	// {
		// $trang=0;
	// }
	// else
	// {
		// $trang = $_GET['trangchon'];
	// }
	// //số dòng dl
	// $sodongdl = mysqli_num_rows($kt);
	// $sotrangdl = $sodongdl/$sodongmottrang;
	// $vtbatdau = $trang*$sodongmottrang;
	// $commanpt = "select * from thontin LIMIT $vtbatdau, $sodongmottrang";
	// $ktpt = mysqli_query($con,$comanpt);
	// $t = $page+1;
	// //tạo nút bấm
	// for ($page=0;$page<=$sotrangdl;$page++)
	// {
		// echo "<a href = 'a.php?trangchon={$page}'>$t>></a>";
	// }
?>