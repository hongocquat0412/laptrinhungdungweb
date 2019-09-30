<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tên file.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<meta charset="utf-8" />
<table>
    <thead>
        <tr>
            <td>STT</td>
            
        </tr>
    </thead>
    <tbody>
        <?php  
		$kn=mysqli_connect("") or die("please check paramaters in the connection function ");
		//xây dựng try vấn
		$lenh="select * from .....";
	//thực hiện try vấn
	$kq=mysqli_query($kn,$lenh);
	$stt=1;
	 while ($dong=mysqli_fetch_array($kq))
	 {
		echo "<tr>";
		echo "<td>".$stt."</td>";
        			
		echo "</tr>";
		$stt=$stt+1;		
	 }
		?>
        
    </tbody>
</table>   