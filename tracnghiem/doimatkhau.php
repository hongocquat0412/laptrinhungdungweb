<?php 
	require_once('widget/mysqli_connect.php');
	require 'site.php';
	load_top();
	load_header();
	load_menu();
?>
<?php
	if (isset($_SESSION['name']))
	{
		if(isset($_POST['btnDongY']))
		{
			// Mã hóa pass
			$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
			$salt = sprintf("$2y$%02d$", 10) . $salt; //$2y$ là thuật toán BlowFish, 10 là độ dài của key mã hóa.
			$_POST['passnew'] = crypt($_POST['passnew'], $salt);
			$_POST['passagain'] = crypt($_POST['passagain'], $salt);
			
			// Truy vấn
			$lenh = "SELECT * FROM tbsinhvien WHERE id = '".$_SESSION['name']."'";
			$commandsql="UPDATE tbsinhvien SET password = '".$_POST['passnew']."' WHERE id = '".$_SESSION['name']."'";
			$kt1 = mysqli_query($con,$lenh) or die("Không thực hiện được");
			$row1 = mysqli_fetch_array($kt1);

			$check = crypt($_POST['passold'], $row1['password']);

			if(hash_equals($check, $row1['password']) || hash_equals($_POST['passold'], $row1['password']))
			{
				if(hash_equals($_POST['passnew'], $_POST['passagain']))
				{
					$results1 = mysqli_query($con,$commandsql) or die("Không lưu được dữ liệu");
					echo "<script>
							alert ('Đổi mật khẩu thành công.');
						</script>";
				}
				else
				{
					$n2 = 'Nhập lại mật khẩu sai.';
				}
			}
			else
			{
				$n3 = 'Mật khẩu cũ không đúng.';
			}
			mysqli_close($con);
		}
	}
	else
	{
		header('Location: thoat.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
	<meta charset="utf8">

	<head>
		<title>Đổi mật khẩu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="changepass.css">
	  	<script type="text/javascript">
			function showPass()
			{
				var passo = document.getElementById('passold');
				var passn = document.getElementById('passnew');
				var passa = document.getElementById('passagain');
				if(document.getElementById('check').checked)
				{
					passo.setAttribute('type','text');
					passn.setAttribute('type','text');
					passa.setAttribute('type','text');
				}
				else
				{
					passo.setAttribute('type','password');
					passn.setAttribute('type','password');
					passa.setAttribute('type','password');
				}
			}
		</script>
	</head>

	<body id="ChangeForm">
		<div class="container">
			<div class="change-form">
				<div class="main1-div">
					<div class="panel2">
					   <h1>Đổi mật khẩu</h1>
				    </div>
				    <form id="Change" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
				        <div class="form-group">
			            	<input type="password" class="form-control" name="passold" id="passold" placeholder="Mật khẩu cũ" required>
				        </div>
				        <div class="form-group">
			            	<input type="password" class="form-control" name="passnew" id="passnew" placeholder="Mật khẩu mới" required>
				        </div>
				        <div class="form-group">
			            	<input type="password" class="form-control" name="passagain" id="passagain" placeholder="Nhập lại mật khẩu" required>
				        </div>
				        <div class="form-check">
				        	<input type="checkbox" class="form-checkbox" id="check" onclick="showPass()"> Hiển thị mật khẩu
				        </div>
				        <button type="submit" class="btn btn-primary" name="btnDongY">Đồng ý</button>
				        <a href="index1.php"><button type="button" class="btn btn-primary">Hủy</button></a>
				        <div class="thongbao">
				        	<p><?php if(isset($_POST['btnDongY'])) { if(isset($n2)) echo "".$n2; if(isset($n3)) echo "".$n3; } ?> <p>
				        </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<?php 
	load_footer();
?>