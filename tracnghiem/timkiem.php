<?php
	require_once('widget/mysqli_connect.php');
	require 'site.php';
	load_top();
	load_header();
	load_menugv();
	if(!isset($_SESSION['idadmin']))
	{
		header('Location: thoat.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="timkiem.css">
	</head>
	<body>
		<form method="GET">
			<div class="aaa">
			<div class="container">
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div class="chon">
						<select name="tenlop">
							<option value="">--- Chọn tên lớp ---</option>;
							<?php
								$lenh1 = "SELECT distinct mathi FROM tbsinhvien";
								$kt1 = mysqli_query($con,$lenh1) or die();	
								while($row1 = mysqli_fetch_array($kt1))
								{
									echo "<option >".$row1['mathi']."</option>";
								}
							?>
						</select>
						</div>
					</div>
					<div class="nut">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<button class="btn btn-default">Tìm kiếm</button>
						</div>
					</div>
				</div>	
			</div>
			</div>
		</form>
	</body>
</html>


<?php
	if (isset($_GET['tenlop']))
	{
		if($_GET['tenlop'] == "")
			echo "<script>alert('Bạn chưa chọn lớp.')</script>";
		else
		{
			$lenh2 = "SELECT * FROM tbsinhvien WHERE mathi = '".$_GET['tenlop']."'";
			$kt2 = mysqli_query($con,$lenh2) or die();

			$SoBanGhi = mysqli_num_rows($kt2);
			$SoBanGhiTrongMotTrang = 25;
			$SoTrangCanChia = ceil($SoBanGhi/$SoBanGhiTrongMotTrang);
			//Lấy vị trí bắt đầu từ Trang đang mở
			$BatDau = 0;
			if(isset($_GET['page'])){
				$BatDau = $_GET['page']*$SoBanGhiTrongMotTrang;
			}

			$lenh3 = "SELECT * FROM tbsinhvien WHERE mathi = '".$_GET['tenlop']."' LIMIT $BatDau,$SoBanGhiTrongMotTrang";
			$kt3 = mysqli_query($con,$lenh3) or die();

			// Lay vi tri trang hien tai
			if (isset($_GET['page'])) 
				$tranghientai = $_GET['page'] + 1;
			else
				$tranghientai = 1;

			$p1 = $tranghientai - 1;
			echo "<div class='thongbao1'><p>Danh sách lớp: {$_GET['tenlop']}</p></div>";
			echo "<div align='center'><table class='lop'>
	            <tr class='a'>
		            <td>ID</td>
		            <td>USERNAME</td>
		            <td>FULLNAME</td>
		            <td>MATHI</td>
		            <td>THONGTIN</td>
	            </tr>";

				while($row = mysqli_fetch_array($kt3))
				{
					echo
					"<tr>
						<td>{$row['id']}</td>
						<td>{$row['username']}</td>
						<td>{$row['fullname']}</td>
						<td>{$row['mathi']}</td>
						<td><a href='chitiet.php?tenlop=".$row['mathi']."&ID=".$row['id']."&page=$p1'>Xem chi tiết</a></td>
					</tr>";
				}
			echo '</table></div>';
			
			echo "<div class='sotrang'>";
			for($t = 0; $t < $SoTrangCanChia; $t++)
			{
				$p = $t + 1;
				echo "<a href='timkiem.php?tenlop=".$_GET['tenlop']."&page=$t'>$p</a>";
			}
			
			echo "<div class='tranghientai'><p>Trang {$tranghientai}</p></div>";
			echo "</div>";
		}
	}
?>	

<?php 
	load_footer();
?>