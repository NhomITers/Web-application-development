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
$db->setQuery("SELECT sua.Ten_Sua,hang_sua.Ten_Hang_Sua,loai_sua.Ten_Loai,sua.Trong_Luong,sua.Don_Gia FROM `hang_sua`,`sua`,loai_sua WHERE `sua`.Ma_Hang_Sua=`hang_sua`.Ma_Hang_Sua AND sua.Ma_Loai_Sua=loai_sua.Ma_Loai_Sua ORDER BY Ten_Hang_Sua DESC");
$result = $db->loadAllRow();
?>
<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.4.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<h1>THÔNG TIN SỮA</h1>
		<table class="table_row">
		<thead>
			<tr>
				<th style="background-color: darkorange;">Số TT</th>
				<th style="background-color: darkorange;">Tên Sữa</th>
				<th style="background-color: darkorange;">Hãng sữa</th>
				<th style="background-color: darkorange;">Loại sữa</th>
				<th style="background-color: darkorange;">Trọng lượng</th>
				<th style="background-color: darkorange;">Đơn giá</th>
			</tr>
		</thead>
		<tbody>
			<div>
			<?php
		$dem =1;
			foreach($result as $i => $item){
				if($dem % 2==0)
				{
					echo "<tr>";
					echo "<td style=\"background-color: darkorange;\">" .$dem. "</td>";
					echo "<td style=\"background-color: darkorange;\">" .$item->Ten_Sua . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Ten_Hang_Sua . "</td>";
					echo "<td style=\"background-color: darkorange;text-align:center\">".$item->Ten_Loai. "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Trong_Luong . "</td>";
					echo "<td style=\"background-color: darkorange;\">" . $item->Don_Gia . "</td>";
					echo "</tr>";
				}else{
					echo "<tr>";
					echo "<td >" .$dem. "</td>";
					echo "<td>" .$item->Ten_Sua . "</td>";
					echo "<td >" . $item->Ten_Hang_Sua . "</td>";
					echo "<td >".$item->Ten_Loai. "</td>";
					echo "<td>" . $item->Trong_Luong . "</td>";
					echo "<td >" . $item->Don_Gia . "</td>";
				}
				$dem++;
			}
			
		?>
			</div>
		</tbody>
		
		</table>
		<div style="margin: 0 0 0 450px;">
				<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item">
					<a class="page-link" href="lap2.1" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						
					</a>
					</li>
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&lt;</span>
						
					</a>
					</li>
					<li class="page-item"><a class="page-link" href="lap2.1">1</a></li>
					<li class="page-item"><a class="page-link" href="lap2.2">2</a></li>
					<li class="page-item"><a class="page-link" href="lap2.3">3</a></li>
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&gt;</span>
						
					</a>
					</li>
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
					</li>
				</ul>
				</nav>
			</div>
	</div>
			
</div>


</body>
</html>