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
$db->setQuery("SELECT * FROM khach_hang ");
$result = $db->loadAllRow();
?>
<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.2.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<h1>THÔNG TIN KHÁCH HÀNG</h1>
		<table class="table_row">
		<thead>
			<tr>
				
				<th >Mã KH</th>
				<th>Tên khách hàng</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$dem =0;
			foreach($result as $i => $item){
				if($dem % 2==0)
				{
					echo "<tr>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Ma_Khach_Hang . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Ten_Khach_Hang . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Phai . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Dia_chi . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Dien_thoai . "</td>";
					echo "</tr>";
				}else{
					echo "<tr>";
					echo "<td >" . $item->Ma_Khach_Hang . "</td>";
					echo "<td>" . $item->Ten_Khach_Hang . "</td>";
					echo "<td>" . $item->Phai . "</td>";
					echo "<td>" . $item->Dia_chi . "</td>";
					echo "<td>" . $item->Dien_thoai . "</td>";
					echo "</tr>";
				}
				$dem++;
			}
		?>
		</tbody>
		</table>
	</div>
</div>
</body>
</html>