<!-- Nhật ký gửi. Số lần gửi. Lưu các lần gửi ở folder (file) khác nhau -->
<?php
	require 'nopbai.php';

	if (isset($_SESSION['name']))
	{
		if (isset($_POST['nop']))
		{
			$tenfile = $_FILES['tenf']['name'];
			$thumucsv = "D:/".$_SESSION['name'];

			if (!$tenfile)
			{
				echo "<script>
						alert('Bạn chưa chọn file!');
					</script>";
			}
			else
			{
				//Lấy tên file
				$ten = pathinfo($tenfile)['filename'];
				//Lấy phần mở rộng
				$duoi = pathinfo($tenfile)['extension'];
				
				if ((strcmp($duoi, "xls") == 0) || (strcmp($duoi, "xlsx") == 0) || (strcmp($duoi, "pdf") == 0) || (strcmp($duoi, "docx") == 0) || (strcmp($duoi, "doc") == 0))
				{
					if ($duoi == "xls" || $duoi == "xlsx")
					{	
						// Tạo đường dẫn
						$thumucluutep = $thumucsv."/BTEXCEL";
					}
					if ($duoi == "docx" || $duoi == "doc")
					{
						$thumucluutep = $thumucsv."/BTWORD";
					}
					if ($duoi == "pdf")
					{
						$thumucluutep = $thumucsv."/BTPDF";
					}

					//$lan = $_SESSION['dem']++;
					
					if (is_dir($thumucsv)) //Kiểm tra đường dẫn $thumucsv có phải folder k
					{ 
						if (is_dir($thumucluutep)) 
						{

							$thumucluu = $thumucluutep."/".$ten.".".$duoi;
						}
						else
						{
							mkdir($thumucluutep);
							$thumucluu = $thumucluutep."/".$ten.".".$duoi;
						}
					}
					else
					{
						mkdir($thumucsv);
						mkdir($thumucluutep);
						$thumucluu = $thumucluutep."/".$ten.".".$duoi;
					}

					move_uploaded_file($_FILES['tenf']['tmp_name'], $thumucluu);

					echo "<script>
							alert('Nộp bài thành công!');
						</script>";
				}
				else
				{
					echo "<script>
							alert('Không đúng loại file!');
						</script>";
				}
			}
		}
	}
	else
	{
		header('Localtion: thoat.php');
	}
?>
