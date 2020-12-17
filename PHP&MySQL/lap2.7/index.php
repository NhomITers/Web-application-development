<?php
require_once("PDO.php");

$db = new Database();
$dt = new Database();
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
$db->setQuery("SELECT sua.Ma_Sua,sua.Ten_Sua, hang_sua.Ten_Hang_Sua,sua.Hinh,loai_sua.Ten_Loai,sua.Trong_Luong,sua.Don_Gia  FROM `sua`,hang_sua,loai_sua WHERE hang_sua.Ma_Hang_Sua=sua.Ma_Hang_Sua and loai_sua.Ma_Loai_Sua=sua.Ma_Loai_Sua");
$result = $db->loadAllRow();
$dt->setQuery("SELECT COUNT(sua.Ma_Loai_Sua)as Socantim FROM `sua`,hang_sua,loai_sua WHERE hang_sua.Ma_Hang_Sua=sua.Ma_Hang_Sua and loai_sua.Ma_Loai_Sua=sua.Ma_Loai_Sua");
$kq=$dt->loadAllRow();
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
			$demcot =0;
			echo"<tr>";
			
			echo"<th colspan=\"";
			foreach($kq as $i => $item){
				if( $item->Socantim>5)
				{
					echo "5";
					$demcot=5;
				}else{
					echo $item->Socantim;
					$demcot = $item->Socantim;
				}
			}
			echo "\"><h1>THÔNG TIN CÁC SẢN PHẨM</h1></th>";
			
		   echo "</tr>";
		   $tam = 1;
			foreach($result as $i => $item){
				if($tam == 1)
				echo"<tr>";
				echo"<td>";
				echo"<a href=\"./".$item->Ma_Sua."\" target=\"_blank\" title=\"Sữa\" rel=\"follow, index\">";
				echo "<b> ";
				echo "<u> ";
				echo $item->Ten_Sua;
				echo"</u>";
				echo"</b>";
				echo "</a>";
				echo"<br>";
				echo $item->Trong_Luong." gr-".$item->Don_Gia." VNĐ";
				echo"<br>";
				echo"<img src=\"" .$item->Hinh ."\" />";
				echo"</td>";
				if($tam == $demcot)
				{
					echo"</tr>";
					$tam = 0;
				}
				$tam++;
				
			}
			
		?>
			</div>
		</tbody> 
		</table>
	</div>
			
</div>


</body>
</html>