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
		<form method="POST" action="ketqua.php">
			
			<?php
				if(isset($_POST['btnBatDau']))
				{		
					$_SESSION['md'] = $_POST['made'];
					$sql = "SELECT * FROM dethi WHERE MaDe = {$_SESSION['md']}";
					$kt = mysqli_query($con,$sql) or die("Không thể truy vấn");
				?>
				<div class="container text-center">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 dh">
							<p>Thời gian làm bài:</p>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 dh tg">
							<p id="dongho"></p>
						</div>
					</div>
				</div>
				
				<!-- Bắt đầu đồng hồ -->
				<script>
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
					}, 1000);
				</script>
				<!-- Kết thúc đồng hồ -->
				
				<table class="on">
					<tr class="phan">
						<td>I. Phần lý thuyết:</td>
					</tr>

				<?php
					while($row = mysqli_fetch_array($kt))
					{
			?>			
						<tr class="cauhoi">
							<td><?php echo "Câu ".$row['STT'].": ".$row['CauHoi']; ?></td>
						</tr>
						<tr>
							<td class="cautraloi">
								<label class="container">(A) <?php echo "".$row['A'] ?>
									<input type="radio" name="<?php echo "".$row['STT'] ?>" value="A"></input>
									<span class="checkmark"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td class="cautraloi">
								<label class="container">(B) <?php echo "".$row['B'] ?>
									<input type="radio" name="<?php echo "".$row['STT'] ?>" value="B"></input>
									<span class="checkmark"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td class="cautraloi">
								<label class="container">(C) <?php echo "".$row['C'] ?>
									<input type="radio" name="<?php echo "".$row['STT'] ?>" value="C"></input>
									<span class="checkmark"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td class="cautraloi">
								<label class="container">(D) <?php echo "".$row['D'] ?>
									<input type="radio" name="<?php echo "".$row['STT'] ?>" value="D"></input>
									<span class="checkmark"></span>
								</label>	
							</td>
						</tr>
						
				<?php
					}
				?>

				</table>
				<button type='submit' class='btn btn-primary nut' name='btnNopBai'>Nộp bài lý thuyết</button>

			<?php
				}		
			?>		
		</form>
	</body>
</html>


<?php
	load_footer();
?>