<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$dom = new DOMDocument();
	 	$dom->load('data/dscanbo.xml');
	 	$row = $dom->getElementsByTagName('Row');

	 	foreach ($row as $r)
		{
			for ($i = 0; $i <= 6; $i++)
			{
				$a[$i] = $r->getElementsByTagName('Cell')->item($i)->nodeValue;
			}
			
			$con=mysqli_connect("localhost","root","","giuaky") or die("không thể kết nối");
			
			mysqli_query($con,"SET NAMES 'utf8'");

			$them="insert into tbgiangvien(stt,mahocphan,mamonhoc,tenmonhoc,sotinchi,hocky,magiangvien) values('".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."')";
			
			$sql=mysqli_query($con,$them) or die('Không thể thực hiện câu truy vấn');
		}
		mysqli_close($con);
	?>

	<?php 
		load_footer();
	?>
</body>
</html>

<script>
	alert("Đã chuyển xong dữ liệu!");
</script>