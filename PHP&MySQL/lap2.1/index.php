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
$db->setQuery("SELECT * FROM hang_sua ");
$result = $db->loadAllRow();
?>
<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.1.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<h1>THÔNG TIN HÃNG SỮA</h1>
		<table class="table_row">
		<thead>
			<tr>
				
				<th>Mã HS</th>
				<th>Tên hãng sữa</th>
				<th>Địa chỉ</th>
				<th>Điện thoại</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($result as $i => $item){
				echo "<tr>";
				echo "<td>" . $item->Ma_Hang_Sua . "</td>";
				echo "<td>" . $item->Ten_Hang_Sua . "</td>";
				echo "<td>" . $item->Dia_chi . "</td>";
				echo "<td>" . $item->Dien_thoai . "</td>";
				echo "<td>" . $item->Email . "</td>";
				echo "</tr>";
			}
		?>
		</tbody>
		</table>
	</div>
</div>
</body>
</html>