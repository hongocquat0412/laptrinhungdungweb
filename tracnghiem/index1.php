<?php
	require 'site.php';
	load_top();
	load_header();
	if(isset($_SESSION['name']))
	{
		load_menu();
	}
	else if(isset($_SESSION['idadmin']))
		{
			load_menugv();
		}
		else
		{
			header('Location: thoat.php');
		}
	
	load_footer();
?>