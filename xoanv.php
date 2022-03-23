<?php
	include('include/connect.php');
	
	if(isset($_POST['btok'])){
		$kt = 0;
		echo 'khởi tạo: ';
		echo $kt;//khởi tạo
		$manv = $_POST['manv'];
		echo '
		<script>
        	if(confirm("Bạn có chắc muốn xoá") == true){
				'.$kt++.'
            }
			else {
				'.$kt--.'
			}
    	</script>';
		echo 'khi dc tăng: ';
		echo $kt;//khi dc tăng
		if($kt == 1){
			echo 'vào lệnh xoá';
			$kt--;
			echo 'khi giảm';
			echo $kt;//khi giảm
		}

		if($kt == 2){
			echo $kt;//trong khi xoá*/
			$sql = 'delete from nhanvien where manv = '.$manv;
			$rs = mysqli_query($con,$sql);
			if($rs){
				echo  '<script> alert("xóa thành công")</script>';
			}else{
				echo  '<script> alert("xóa không thành công")</script>';
			}
			$kt=0;
			echo $kt;//khi đã giảm
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="800" align="center">
    <tr>
      <td colspan="3" align="center"><h1 style="color:#F00">XÓA THÔNG TIN NHÂN VIÊN</h1></td>
    </tr>
    <tr>
      <td width="213">&nbsp;</td>
      <td width="181"><label for="manv">Chọn nhân viên cần xóa</label></td>
      <td width="390">
        <select name="manv" id="manv">
		<option value="Chọn">Chọn....</option>
        	<?php
				$sql_nv = 'select manv,ho,ten from nhanvien';
				$rs_nv = mysqli_query($con,$sql_nv);
				while ($row = mysqli_fetch_assoc($rs_nv)){
					$manv1 = $row['manv'];
					$ho = $row['ho'];
					$ten = $row['ten'];
					$hoten = $ho.'&nbsp;'.$ten;
					if(isset($_POST['manv']) && $manv==$manv1){
						echo '<option selected="selected" value="'.$manv1.'">'.$manv1.' - '.$hoten.'</option>' ;
					}else{
						echo '<option value="'.$manv1.'">'.$manv1.' - '.$hoten.'</option>' ;
					}
					
				
				}
			?>
          
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btok" id="btok" value="xóa"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php if(isset($kq)) echo $kq ?></td>
      <td><a href="index.php">Trang Chủ</a></td>
    </tr>
  </table>
</form>
</body>
</html>