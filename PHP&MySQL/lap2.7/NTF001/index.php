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
$db->setQuery("SELECT *  FROM `sua` WHERE Ma_Sua=\"NTF001\"");
$result = $db->loadAllRow();
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>

<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.7.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
		<table class="table_row">
		<thead>
			
		</thead>
		<tbody>
			<div>
			<?php
			
			foreach($result as $i => $item){
				echo"<tr>";
					echo"<th colspan=\"2\"><h1>".$item->Ten_Sua."</h1></th>";	 
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
						echo"<img src=\"" .$item->Hinh ."\">";
					echo"</td>";
					echo"<td>";
						echo"<b>";
						echo "<i>";
						echo"Thành phần dinh dưỡng:";
						echo "</i>";
						echo "</b>";
						echo "<br>";
						echo $item->TP_Dinh_Duong;
						echo"<br>";
						echo"<b>";
						echo "<i>";
						echo"Lợi ích:";
						echo "</i>";
						echo "</b>";
						echo "<br>";
						echo $item->Loi_Ich;
						echo"<br>";
						echo"<b><i>Trọng lượng:</b></i> ".$item->Trong_Luong." gr- <b><i>Đơn giá:</b></i> ".$item->Don_Gia."VNĐ";
					echo"</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td>";
					echo "<a href=\"".$previous."\"><u>Quay lại</u></a>";
					echo"</td>";
					echo"<td>";
					
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