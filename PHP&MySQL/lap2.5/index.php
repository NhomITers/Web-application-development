<?php
require_once("PDO.php");

$db = new Database();
//echo count($result);
/*$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
	$hoten = $_POST['hoten'];
	$gioitinh = $_POST['gioitinh'];
	$ngaysinh = $_POST['ngaysinh'];
	$cmnd = $_POST['cmnd'];
	$mucluong = $_POST['mucluong'];
	$diachi = $_POST['diachi'];
	$params = [$hoten,$gioitinh,$ngaysinh,$cmnd,$mucluong,$diachi];
	$query = "INSERT INTO nhan_vien(Ho_ten,Gioi_tinh,Ngay_sinh,CMND,Muc_luong,Dia_chi,ID_DON_VI) VALUES (?,?,?,?,?,?,1)";
	$db->setQuery($query);
	$db->execute($params);
}*/
$db->setQuery("SELECT sua.Ten_Sua, hang_sua.Ten_Hang_Sua,sua.Hinh,loai_sua.Ten_Loai,sua.Trong_Luong,sua.Don_Gia  FROM `sua`,hang_sua,loai_sua WHERE hang_sua.Ma_Hang_Sua=sua.Ma_Hang_Sua and loai_sua.Ma_Loai_Sua=sua.Ma_Loai_Sua");
$result = $db->loadAllRow();
?>
<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.5.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<table class="table_row">
		<thead>
			<tr>
			 <th colspan="2"><h1>THÔNG TIN CÁC SẢN PHẨM</h1></th>
			  
			</tr>
		</thead>
		<tbody>
			<div>
			<?php
			
			foreach($result as $i => $item){
				echo"<tr>";
				echo"<td>";
				echo"<img src=\"" .$item->Hinh ."\" weight =\"150px\"  width =\"150px\">";
				echo"</td>";
				echo"<td>";
				echo "<b>   ";
				echo $item->Ten_Sua;
				echo"</b>";
				echo"<br><br> Nha sản xuất:";
				echo $item->Ten_Hang_Sua;
				echo"<br>";
				echo $item->Ten_Loai."-".$item->Trong_Luong." gr-".$item->Don_Gia." VNĐ";
				echo"</td>";
				echo"</tr>";
			}
			
		?>
			</div>
		</tbody>
		</table>
	</div>
			
</div>


</body>
</html>