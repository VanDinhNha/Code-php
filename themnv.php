<?php
	include('include/connect.php');
  if(isset($_POST['btok'])){
		 $ho = $_POST['ho'];
		 $ten = $_POST['ten'];
		 $phai = $_POST['phai'];
		 $ngaysinh = $_POST['ngaysinh'];
		 $diachi = $_POST['diachi'];
		 $mapb = $_POST['mapb'];
		 $ktra=1;
		 
		 if($ho==''){
			 $loi = 'chưa nhập họ';
			 $ktra=0;
		 }
		 if($ten==''){
			 $loi1 = 'chưa nhập tên';
			 $ktra=0;
		 }
		 if($phai=='chọn'){
			 $loi2 = 'chưa chọn giới tính';
			 $ktra=0;
		 }
		 if($ngaysinh==null){
			 $loi3 = 'chưa chọn ngày sinh';
			 $ktra=0;
		 }
		 if($mapb=='chọn'){
			 $loi4 = 'chưa chọn giới tính';
			 $ktra=0;
		 }
		 
		 if($ktra ==1){
			 $sql = 'insert into nhanvien(ho,ten,phai,ngaysinh,diachi,mapb) value ("'.$ho.'","'.$ten.'","'.$phai.'","'.$ngaysinh.'","'.$diachi.'","'.$mapb.'")';
			$rs = mysqli_query($con,$sql);
			if($rs){
				echo '<script>
                alert("Thêm Thành Công");
              </script>';
			}else if(mysqli_errno($con) == 1062){
				$kq = 'khóa chính không được trùng';
			}else{
				$kq ='lỗi '.mysqli_error($con);
			}
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
  <table width="1000" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <table width="1000" cellspacing="0" cellpadding="0">
          <tr>
            <td width="242">&nbsp;</td>
            <td width="213">&nbsp;</td>
            <td width="543">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center" bgcolor="#FFFFFF"><h1 style="color:#F00">THÊM NHÂN VIÊN MỚI</h1></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td style="font-size:20px; padding:5px">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="ho">Họ nhân viên</label></td>
            <td><input type="text" name="ho" id="ho" value=""><?php if(isset($loi)) echo $loi ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="ten">Tên nhân viên</label></td>
            <td><input type="text" name="ten" id="ten" value=""><?php if(isset($loi1)) echo $loi1 ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="phai">Chọn Phái</label></td>
            <td><select name="phai" id="phai" >
                  <option value="chọn" selected="selected">chon</option>
                  <option value="1"  >nam</option>
                  <option value="0"  >nữ</option>
        		</select><?php if(isset($loi2)) echo $loi2 ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="ngaysinh">Nhập ngày sinh</label></td>
            <td><input type="date" name="ngaysinh" id="ngaysinh" value=""><?php if(isset($loi3)) echo $loi3 ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="diachi">Nhập địa chỉ</label></td>
            <td><input type="text" name="diachi" id="diachi" value=""></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label for="mapb">Chọn mã phòng ban</label></td>
            <td><select name="mapb" id="mapb">
          <option value="chọn" >chọn</option>
          <?php 
		  	$sql_pb = 'select * from phongban';
			$rs_pb = mysqli_query($con,$sql_pb);
			while ($row_pb = mysqli_fetch_assoc($rs_pb)){
				$mapb1= $row_pb['mapb'];
				$tenpb = $row_pb['tenpb'];
				if(isset($_POST['mapb']) && $mapb==$mapb1){
					echo'<option selected="selected" value="'.$mapb1.'">'.$tenpb.'</option>';
				}else{

		  			echo'<option value="'.$mapb1.'">'.$tenpb.'</option>';
				}
			}
          
		  ?>
      </select><?php if(isset($loi4)) echo $loi4 ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td style="padding:5px"><input type="submit" name="btok" id="btok" value="Thêm"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="index.php">Trang Chủ</a></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>