<?php
	include('include/connect.php');
	
	if(isset($_GET['manv'])){	
		$manv = $_GET['manv'];
		
		$sql = 'select * from nhanvien where manv="'.$manv.'"';
		$rs = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($rs);
		$ho = $row['ho'];
		$ten = $row['ten'];
		$phai = $row['phai'];
		$ngaysinh = $row['ngaysinh'];
		$diachi = $row['diachi'];
		$mapb = $row['mapb'];
	}else{
		header('location:fix.php');
	}
	if(isset($_POST['btOK'])){
		$manv = $_POST['manv'];
		$ho = $_POST['ho'];
		$ten = $_POST['ten'];
		$phai = $_POST['phai'];
		$ngaysinh = $_POST['ngaysinh'];
		$diachi = $_POST['diachi'];
		$mapb = $_POST['mapb'];
		
		$sql_capnhat = 'update nhanvien
						set ho ="'.$ho.'",
							ten="'.$ten.'",
							phai = '.$phai.',
							ngaysinh ="'.$ngaysinh.'",
							diachi = "'.$diachi.'",
							mapb ="'.$mapb.'"
						where manv =  '.$manv;
		
		$rs_capnhat = mysqli_query($con, $sql_capnhat);
		if($rs_capnhat){
			$kq = 'Cập nhật thành công';
		}else{
			$kq = 'Chưa cập nhật được';
			echo mysqli_error($con);
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
  <table width="1000" border="0" align="center">
    <tr>
      <td colspan="3" align="center"><h1 style="color:#F00">CẬP NHẬT THÔNG TIN NHÂN VIÊN</h1></td>
    </tr>
    <tr>
      <td width="281">&nbsp;</td>
      <td width="197"><label>Họ và tên lót nhân viên</label></td>
      <td width="508">
        <input type="text" name="ho" id="ho" 
        value="<?php if(isset($ho)) echo $ho;?>">
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="ten">Tên nhân viên</label></td>
      <td>
      <input type="text" name="ten" id="ten"
      value="<?php if(isset($ten)) echo $ten;?>">
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="phai">giới tính</label></td>
      <td><p>
        <select class"nhap" name="phai" id="phai">
       		<option value="1"<?php if($phai==1) echo "selected"?>>nam</option>
            <option value="0"<?php if($phai==0) echo "selected"?>>nữ</option>
        </select>
        
        <br>
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="ngaysinh">Ngày sinh</label></td>
      <td>
      <input type="date" name="ngaysinh" id="ngaysinh" 
      value="<?php if(isset($ngaysinh)) echo $ngaysinh;?>">
      <span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Địa chỉ</td>
      <td>
<input type="text" name="diachi" id="diachi"value="<?php if(isset($diachi)) echo $diachi;?>">
      <span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="mapb">Phòng ban</label></td>
      <td>
        <select name="mapb" id="mapb">
          <?php
			$sql_pban = 'select * from phongban';
			$kq_pban = mysqli_query($con,$sql_pban);
			if(mysqli_num_rows($kq_pban)>0){
				while($row_pban = mysqli_fetch_assoc($kq_pban)){
					$mapb1 = $row_pban['mapb'];
					$tenpb = $row_pban['tenpb'];
					if($mapb == $mapb1){
						echo '<option selected="selected" value="'.$mapb1.'">'.$tenpb.'</option>';
					}
					else{
						echo '<option value="'.$mapb1.'">'.$tenpb.'</option>';
					}
				}
			}
			else{
				die ('table không kết nối đc');
			}
			?>
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="btOK" id="btOK" value="Cập nhật">
        <input type="hidden" name="manv" id="manv" 
        value="<?php if(isset($manv)) echo $manv;?>">
        <br>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?php if(isset($kq)) echo $kq;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><a href="index.php">Trang chủ</a></td>
    </tr>
    
  </table>
</form>
<?php
mysqli_close($con);	
?>
</body>
</html>