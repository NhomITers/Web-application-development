<?php
require_once("PDO.php");
$sotin1trang =20;
if(isset($_GET["trang"])){
	$trang =$_GET["trang"];
	settype($trang,"int");
}else{
	$trang =1;
}
$db = new Database();

$db->setQuery("SELECT sua.Trong_Luong,sua.Don_Gia,loai_sua.Ten_Loai,hang_sua.Ten_Hang_Sua,sua.Hinh,sua.TP_Dinh_Duong,sua.Loi_Ich,sua.Ten_Sua FROM `sua`,loai_sua,hang_sua WHERE sua.Ma_Hang_Sua=hang_sua.Ma_Hang_Sua AND sua.Ma_Loai_Sua=loai_sua.Ma_Loai_Sua");
$loaisuahangsua = $db->loadAllRow();
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST')
{
	$Loai_sua=$_POST['Loai_sua'];
	$Hang_sua=$_POST['Hang_sua'];
	$Tensua=$_POST['Ten_sua'];
	if($Tensua!="")
	$db->setQuery("SELECT sua.Trong_Luong,sua.Don_Gia,loai_sua.Ten_Loai,hang_sua.Ten_Hang_Sua,sua.Hinh,sua.TP_Dinh_Duong,sua.Loi_Ich,sua.Ten_Sua FROM `sua`,loai_sua,hang_sua where(sua.Ma_Hang_Sua=hang_sua.Ma_Hang_Sua AND sua.Ma_Loai_Sua=loai_sua.Ma_Loai_Sua) and (sua.Ten_Sua like '%$Tensua%') group by sua.Ma_Sua");
	else
	$db->setQuery("SELECT sua.Trong_Luong,sua.Don_Gia,loai_sua.Ten_Loai,hang_sua.Ten_Hang_Sua,sua.Hinh,sua.TP_Dinh_Duong,sua.Loi_Ich,sua.Ten_Sua FROM `sua`,loai_sua,hang_sua where(sua.Ma_Hang_Sua=hang_sua.Ma_Hang_Sua AND sua.Ma_Loai_Sua=loai_sua.Ma_Loai_Sua) and(loai_sua.Ten_Loai ='$Loai_sua' or hang_sua.Ten_Hang_Sua='$Hang_sua' ) group by sua.Ma_Sua");	
}

$result = $db->loadAllRow();
$d_n =$db->CountAll();
?>
<html>
<head>
	<title>Working with SQL in PHP</title>
	<link rel="stylesheet" type="text/css" href="css2.9.css">
</head>
<body>
 <dib class="wapper">
	<div class="container">
		<h1>TÌM KIẾM THÔNG TIN SỮA </h1>
			<form action="" method="post">
					<label >Loại sữa</label>
					<input list="Loai" name="Loai_sua" id="Loai_sua">
					<datalist id=Loai>
					<?php
					foreach($loaisuahangsua as $i =>$item)
					{
						echo"<option value=\"".$item->Ten_Loai."\">";
					}
					
					?>
					</datalist>
					<label> Hãng sữa</label>
					<input list="Hang" name="Hang_sua" id="Hang_sua">
					<datalist id=Hang>
					<?php
					foreach($loaisuahangsua as $i =>$item)
					{
						echo"<option value=\"".$item->Ten_Hang_Sua."\">";
					}
					
					?>
					</datalist>
					<br>
					<label for="Ten_sua">Tên sữa:</label>
					<input type="text" name="Ten_sua" id="Ten_sua" placeholder="Nhập Tên Sữa">
					<input type="submit" style="background-color: pink;border-top:2px solid white; border-left:2px solid white" value="Tìm kiếm">
			</form>
			 <br>
			 <?php
			 if($d_n>0)
			 echo "có ".$d_n." sản phẩm được tìm thấy";
			 else
				echo "Không tìm thấy sản phẩm này";
			 ?>
	<table class="table_row" >
			<tbody>
		
			<?php
			
			echo "<br>";
			$from =($trang -1)*$sotin1trang;
			$qr="select * from sua limit $from,$sotin1trang";
			$ds =new Database();
			$ds->setQuery($qr);
			$dt =$ds->loadAllRow();
			
			foreach($result as $i =>$item)
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
		 		/*$x = new Database();
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
				echo"<a href='index.php?trang=$sotrang'> <u>>></u></a> ";*/
			?>
		 
		
	</div>
</div>
</body>
</html>