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
<form name="form1" method="get" action="">
 <table width="1000" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><h1 style="color:#F00">SỬA THÔNG TIN NHÂN VIÊN</h1></td>
    </tr>
    <tr>
      <td colspan="3" align="center">
      <?php 
	  	$sql = 'SELECT nhanvien.*, phongban.* FROM nhanvien, phongban
							WHERE nhanvien.mapb = phongban.mapb';
		$rs = mysqli_query($con,$sql);
		$stt = 0;
		if(mysqli_num_rows($rs)>0){
			echo '<table width="895" border="1" cellspacing="0" cellpadding="0">
        <tr style="background-color:#39F">
          <td width="43" align="center">STT</td>
          <td width="40" align="center">MãNV</td>
          <td width="170" align="center">Họ tên</td>
          <td width="60" align="center">Phái</td>
          <td width="110" align="center">Ngày sinh</td>
          <td width="200" align="center">Địa chỉ</td>
          <td width="150" align="center">Phòng ban</td>
          <td width="70" align="center">Link</td>
        </tr>';
		while ($row = mysqli_fetch_assoc($rs)){
							$manv = $row['manv'];	
							$ho = $row['ho'];
							$ten = $row['ten'];
							$HoTen = $ho.' ' .$ten;
							$phai = $row['phai'];
							$X_phai = ($phai == 0) ? 'nữ' : 'nam';
							$ngaysinh = date('d/m/Y',strtotime($row['ngaysinh']));
							$diachi = $row['diachi'];
							$tenpb = $row['tenpb'];
							$mapb = $row['mapb'];
							$stt ++;
       echo' <tr>
          <td align="center">'.$stt.'</td>
          <td align="center">'.$manv.'</td>
          <td align="center">'.$HoTen.'</td>
          <td align="center">'.$X_phai.'</td>
          <td align="center">'.$ngaysinh.'</td>
          <td align="center">'.$diachi.'</td>
          <td align="center">'.$tenpb.'</td>
          <td align="center"><a href="suanv.php?manv='.$manv.'">sửa</a></td>
        </tr>';
		}
      echo '</table>';	
	   ?>
       </td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
    </tr>
    <tr>
      <td width="397" align="right">&nbsp;</td>
      <td width="103" align="center"><a href="index.php">Trang chủ</a></td>
      <td width="400">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp; </td>
    </tr>
</table>
      </form>
<?php mysqli_close($con);} ?>
</body>
</html>