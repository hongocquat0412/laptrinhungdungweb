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
	<title>Kết quả</title>
	<link rel="stylesheet" href="onthi.css">
</head>
<body>
	<form>
		<div class="ketqua">
			
			<!-- Bắt đầu đồng hồ -->
			<script>
				function dongHo()
				{
					var today = new Date();
					var nam = today.getFullYear();
					var thang = today.getMonth();
					var ngay = today.getDate();
					var gio = today.getHours();
					var phut = today.getMinutes();
					var giay = today.getSeconds();

					//tính theo phút
					var thoigianthi = 60;
					
					// thời gian kết thúc
					var countDownDate = new Date(nam,thang,ngay,gio,phut+thoigianthi,giay).getTime();

					// Update the count down every 1 second
					var x = setInterval(function() {

					    // Get todays date and time
						var now = new Date().getTime();

						// Find the distance between now and the count down date
						var distance = countDownDate - now;
					    
					    // Time calculations for days, hours, minutes and seconds
					    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
					    
					    if (hours < 10)
					    {
					    	hours = "0" + hours;
					    }
					    if (minutes < 10)
					    {
					    	minutes = "0" + minutes;
					    }
					    if (seconds < 10)
					    {
					    	seconds = "0" + seconds;
					    }
					    // Output the result in an element with id="dongho"
					    document.getElementById("dongho").innerHTML = hours + ":"
					    + minutes + ":" + seconds;
					    
					    // If the count down is over, write some text 
					    if (distance < 0) {
					        clearInterval(x);
					        //document.getElementById("dongho").innerHTML = "HẾT THỜI GIAN!";
					        alert('Thời gian làm bài đã hết. Bài của bạn đã được đã nộp.');
					        //window.location = "ketqua.php";
					    }
					}, 1000)
				};
			</script>
			<!-- Kết thúc đồng hồ -->

			<?php
				if(isset($_POST['btnNopBai']))
				{
					/*Bắt đầu chấm điểm lý thuyết*/
					$arr = $_POST; /*POST được những gì thì lưu vào $arr*/
					$dung = array(); /*khai báo mảng $dung rỗng*/
					$sai = array();
					$tongcau = 42;
					$socaudung = 0;
					$socausai = 0;

					for ($i = 1; $i <= $tongcau ; $i++)
					{ 
						if (isset($_POST[''.$i]))
						{
							$sql1 = "SELECT * FROM dethi WHERE MaDe = {$_SESSION['md']} and STT = {$i}";
							$kt1 = mysqli_query($con,$sql1) or die("Không thể truy vấn.");
							$row1 = mysqli_fetch_array($kt1);
							if($_POST[''.$i] == $row1['DapAn'])
							{
								$dung[] = $i; /*lưu câu đúng vào mảng đúng*/
							}
							else
							{
								$sai[] = $i; /*lưu câu sai vào mảng sai*/
							}
						}
						else
							$sai[] = $i; /*lưu câu không chọn đáp án vào mảng sai*/
					}

					echo "<span class='cau thongbao'>Kết quả phần lý thuyết</span><br>";
					echo "<span class='cau'>Số câu đúng: </span>".count($dung)."/".$tongcau."<br>";
					echo "<span class='cau'>Số câu sai: </span>".count($sai)."/".$tongcau."<br>";
					
					if(!empty($dung)) /*nếu mảng $dung khác rỗng*/
					{
						echo "<span class='cau'>Các câu làm đúng: </span>";
						foreach($dung as $caudung) /*duyệt in ra từng phần tử trong mảng $dung, giá trị là $caudung*/
						{
							echo $caudung." ";
						}
						echo "<br>";
					}
					if(!empty($sai))
					{
						echo "<span class='cau'>Các câu làm sai: </span>";
						foreach($sai as $causai)
						{
							echo $causai." ";
						}
					}

					$diem = round((count($dung)*(10/$tongcau)),2);

					echo "<br><span class='cau'>Điểm đạt được: </span><span class='diem'>".$diem." đ</span>";

					$sql = "UPDATE tbsinhvien SET diem = {$diem} WHERE id = '{$_SESSION['name']}'";
					$kt = mysqli_query($con,$sql);
					/*Kết thúc chấm điểm lý thuyết*/
				?>

				<table>
					<tr class="phan">
						<td>II. Phần thực hành:</td>
					</tr>
					<tr>
						<td class="de">Chú ý! Thời gian thực hành sẽ bắt đầu khi bạn bấm tải đề về máy.</td>
					</tr>
					<tr>
						<td class="de">Các bạn nộp bài bằng cách chọn "Nộp bài" trên thanh menu.</td>
					</tr>
					
					<?php
						$sql = "SELECT * FROM thuchanh WHERE MaDe = {$_SESSION['md']}";
						$kt = mysqli_query($con,$sql);
						if($row = mysqli_fetch_array($kt))
						{
					?>
						
						<tr class="thuchanh">
							<td class="de"><?php echo $row['Ten']; ?>   <a href="<?php echo $row['DuongDan']; ?>" onclick="dongHo()">Tải đề về máy</a></td>
						</tr>

					<?php
						}
					?>
				</table>

				<div class="container text-center">
					<div class="row tg">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 dh">
							<p>Thời gian làm bài:</p>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 dh tg">
							<p id="dongho">60 phút</p>
						</div>
					</div>
				</div>

			<?php
				}
			?>

		</div>
	</form>
</body>
</html>


<?php
	load_footer();
?>