<?php
	require_once('widget/mysqli_connect.php');
	require 'site.php';
	load_top();
	load_header();
	load_menugv();
	if(!isset($_SESSION['idadmin']))
		header('Location: thoat.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="timkiem.css">
	</head>
	<body>
		<?php
			if(isset($_GET['ID']))
			{
				$lenh = "SELECT * FROM tbsinhvien WHERE id = '".$_GET['ID']."'";
				$kt = mysqli_query($con,$lenh);
				echo "<div align='center'><table class='lop chitiet'>
					<tr class='a'>
			            <td>ID</td>
			            <td>USERNAME</td>
			            <td>FULLNAME</td>
			            <td>MATHI</td>
			            <td>MADE1</td>
			            <td>MADE2</td>
			            <td>MADE3</td>
			            <td>TGBATDAU</td>
			            <td>MAXACNHAN</td>
			            <td>DIEM</td>
		            </tr>";
		        while($row = mysqli_fetch_array($kt)){
		        echo "<tr>
		        		<td>".$row['id']."</td>
		        		<td>{$row['username']}</td>
		        		<td>{$row['fullname']}</td>
		        		<td>{$row['mathi']}</td>
		        		<td>{$row['made1']}</td>
		        		<td>{$row['made2']}</td>
		        		<td>{$row['made3']}</td>
		        		<td>{$row['tgbatdau']}</td>
		        		<td>{$row['maxacnhan']}</td>
		        		<td>{$row['diem']}</td>
		        	</tr>";}
		        echo "</table></div>";	
			}
			echo "<div class='aa'><a href='timkiem.php?tenlop=".$_GET['tenlop']."&page=".$_GET['page']."'>Trở về</a></div>";
		?>
	</body>
</html>



<?php
	load_footer();
?>