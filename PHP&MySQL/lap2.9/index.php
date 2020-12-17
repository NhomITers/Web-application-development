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

$db->setQuery("SELECT* FROM `sua` ");
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST')
{
	$Tensua=$_POST['Ten_sua'];
	$db->setQuery("SELECT* FROM `sua`where Ten_Sua like'%".$Tensua."%'");
			
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
					<label for="Ten_sua">Tên sữa:</label>
					<input type="text" name="Ten_sua" id="Ten_sua" placeholder="Nhập Tên Sữa" >
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