<?php
	require_once('widget/mysqli_connect.php');
	session_start();
?>
<?php
	if (isset($_POST['btnDangNhap']))
	{
		if($_POST['quyen'] == "sv")	
		{
			$sql = "SELECT id, password as pw, fullname as name FROM tbsinhvien WHERE id = '".$_POST['name']."'";
			$kt = mysqli_query($con,$sql) or die();
			$row = mysqli_fetch_array($kt);
			$_SESSION['namecus'] = $row['name'];
			$_SESSION['name'] = $row['id'];
		}
		if($_POST['quyen'] == "gv")	
		{
			$sql = "SELECT usernamegv as id, passwordgv as pw, namegv FROM giaovien WHERE usernamegv = '".$_POST['name']."'";
			$kt = mysqli_query($con,$sql) or die();
			$row = mysqli_fetch_array($kt);
			$_SESSION['namead'] = $row['namegv'];
			$_SESSION['idadmin'] = $row['id'];
		}

		if ($row)
		{	
			$check = crypt($_POST['pass'], $row['pw']);
			// hash_equals($check, $row['password'])

			if (hash_equals($check, $row['pw']) || hash_equals($_POST['pass'], $row['pw']))
			{
				header('Location: index1.php');
			}
			else
			{
				$loi1='Sai mật khẩu.';
			}				
		}
		else
		{
			$loi2='Sai tên đăng nhập.';
		}
		//mysql_close($con);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Đăng nhập</title>
		<meta charset="UTF-8">
     	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    	<link rel="stylesheet" href="login.css">  
		<script type="text/javascript">
			function showPass()
			{
				var p = document.getElementById('p');
				if(document.getElementById('check').checked)
				{
					p.setAttribute('type','text');
				}
				else
				{
					p.setAttribute('type','password');
				}
			}
		</script>
	</head>

	<body id="LoginForm">
		<div class="container">
			<div class="login-form">
				<div class="main-div">
					<div class="panel1">
					   <h1>Đăng nhập</h1>
				    </div>
				    <form id="Login" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
				        <div class="form-group">
				            <input type="text" class="form-control" name="name" placeholder="Tài khoản" required>
				        </div>
				        <div class="form-group">
				            <input type="password" class="form-control" name="pass" id="p" placeholder="Mật khẩu" required>
				        </div>
				        <div class="form-group">
				        	<select class="form-control" name="quyen">
				        		<option value="sv" selected="selected">Sinh viên</option>
				        		<option value="gv">Giáo viên</option>
				        	</select>
				        </div>
				        <div class="checkbox">
				        	<input type="checkbox" id="check" onclick="showPass()">Hiển thị mật khẩu
				        </div>
				        <button type="submit" class="btn btn-primary" name="btnDangNhap">Đăng nhập</button>
				        <!-- <a href="#"><button type="button" class="btn btn-primary" name="btnDangKy">Đăng ký</button></a> -->
				        <div class="loi">
				        	<p><?php if(isset($_POST['btnDangNhap'])) { if(isset($loi1)) echo "".$loi1; if(isset($loi2)) echo "".$loi2;}?> <p>
				        </div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>