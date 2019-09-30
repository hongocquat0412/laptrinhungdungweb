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

<?php

	$dom = new DOMDocument();
 	$dom->load('de/dethi.xml');
 	$row = $dom->getElementsByTagName('Row');

 	foreach ($row as $r)
	{
		for ($i = 0; $i <= 7; $i++)
		{
			$a[$i] = $r->getElementsByTagName('Cell')->item($i)->nodeValue;
		}
		$them="insert into dethi(MaDe,STT,CauHoi,A,B,C,D,DapAn) values('".$a[0]."','".$a[1]."','".$a[2]."','".$a[3]."','".$a[4]."','".$a[5]."','".$a[6]."','".$a[7]."')";
		$sql=mysqli_query($con,$them) or die('Không thể thực hiện câu truy vấn');
	}
	mysqli_close($con);
?>

<?php 
	load_footer();
?>

<script>
	alert("Đã chuyển xong dữ liệu!");
</script>