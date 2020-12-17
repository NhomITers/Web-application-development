<?php
require_once("PDO.php");
$sotin1trang =1;
if(isset($_GET["trang"])){
	$trang =$_GET["trang"];
	settype($trang,"int");
}else{
	$trang =1;
}
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
	<link rel="stylesheet" type="text/css" href="css2.8.css">
</head>
<body>
 <dib class="wapper">
	<div class="container">
	<h1>THÔNG TINH CHI TIẾT CÁC LOẠI SỮA</h1>
	<table class="table_row" >
			<tbody>
		
			<?php
			$from =($trang -1)*$sotin1trang;
			$qr="select * from sua limit $from,$sotin1trang";
			$ds =new Database();
			$ds->setQuery($qr);
			$dt =$ds->loadAllRow();
			
			foreach($dt as $i =>$item)
			{
				
				echo"<tr>";
				echo"<th colspan=\"2\">";
				echo"<h2>";
				 echo $item->Ten_Sua;
				 echo"</h2>";
				 echo"</th>";
				echo"</tr>";
				
				echo"<tr>";
				echo"<td>";
				echo"<img src=\"" .$item->Hinh ."\" />";
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
				echo "<br>";
			}
			
			?>
	
		</tbody>	
		</table>
		<?php
		 		$x = new Database();
				$x ->setQuery("select Ma_Sua from sua");
				$tongsotin=$x->CountAll();
				$sotrang = ceil($tongsotin/$sotin1trang);
				echo"<a href='index.php?trang=1'><u><<</u> </a> ";
				$tam =$trang-1;
				$tamm =$trang + 1;
				if($tam==0 ||$tamm ==0)
				{
						$tamm=0;
						$tam=0;
				}
				if($tamm>$sotrang)
				$tamm=$sotrang;
				if($tam<1)
				$tam=1;
				echo"<a href='index.php?trang=$tam'><u><</u> </a> ";
				for($t = 1;$t<=$sotrang;$t++)
				{
					echo"<a href='index.php?trang=$t'><u>$t</u></a> ";

				}
				echo"<a href='index.php?trang=$tamm'> <u>></u> </a> ";
				echo"<a href='index.php?trang=$sotrang'> <u>>></u></a> ";
			?>
		 
		
	</div>
</div>
</body>
</html>