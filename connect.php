<?php
	
	include('config.php');
	
	$con = mysqli_connect($server,$user,$password,$dtb);
	 
	 if(!$con){
		 die ('kết nối csdl không thành công');
	 }  
?>