<?php
	include('include/connect.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="1000" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <table width="1000" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td width="242">&nbsp;</td>
            <td width="182">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center" bgcolor="#FFFFFF"><h1 style="color:#F00">QUẢN LÝ NHÂN VIÊN</h1></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td style="font-size:20px">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          
          <tr>
            <td colspan="4">

			<table width="800" border="1" cellspacing="0" cellpadding="0" align="center">
          <tr style="background-color:#39F" align="center">
            <td style="font-size:20px" width="103">Mã nhân viên</td>
            <td style="font-size:20px; padding:5px" width="137">Họ và tên</td>
            <td style="font-size:20px; padding:5px" width="68">Phái</td>
            <td style="font-size:20px; padding:5px" width="232">Ngày sinh </td>
            <td style="font-size:20px; padding:5px" width="152">Mã phòng ban</td>
          </tr>	
			<?php
				$sql = 'SELECT * FROM nhanvien';
				$rs = mysqli_query($con,$sql);
				while ($row = mysqli_fetch_assoc($rs)){
					$manv = $row['manv'];
					$ho = $row['ho'];
					$ten = $row['ten'];
					$hoten = $ho.' '.$ten;
					$phai = $row['phai'];
						if($phai==1){
							$phai = 'nam';
						}else{
							$phai = 'nữ';
						}
					$ngaysinh = date('d-m-Y',strtotime($row['ngaysinh']));	
					$mapb = $row['mapb'];	
					echo'<tr>
							<td align="center">'.$manv.'</td>
							<td align="center">'.$hoten.'</td>
							<td align="center">'.$phai.'</td>
							<td align="center">'.$ngaysinh.'</td>
							<td align="center">'.$mapb.'</td>
						</tr>';
				}
				 
			?>	
          
         </table>
          <tr>
            <td height="21" colspan="4" align="center"><a href="index.php">Trang chủ         </a>            
          <tr>
            <td colspan="4">          
          <tr>
            &nbsp;        
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
  </table>
</form>
</body>
</html>