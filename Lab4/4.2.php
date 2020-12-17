<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML+PHP</title>
    <link rel="stylesheet"  href="4.2.css" type="text/css">
</head>
<body>
    <?php   
         $method =  $_SERVER['REQUEST_METHOD'];
         if($method == 'POST')
         {
            $noidung = $_POST['noi_dung'];
            $maunen = $_POST['mau_nen'];
            $mauchu = $_POST['mau_chu']; 
         }
        
    ?>
    <div class="warrap">
    <div id="container">
        <form method="POST" action="doimaunenvamauchu.php">
            <table>
                <thead>
                    <tr style="background-color: orange;">
                        <th colspan="2" style="color: while;">Định Màu Chữ - Màu Nền </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Nội dung:</td>
                        <td>
                            <input name="noi_dung" type="text" id="noi_dung"  placeholder="Nhập nội dung" value ="<?php echo $noidung?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Màu nền:</td>
                        <td><input type="text" id="mau_nen"  name ="mau_nen" placeholder="Nhập màu" value="<?php echo $maunen;?>"></td>
                    </tr>
                    <tr>
                        <td>Màu chữ:</td>
                        <td><input type="text" id="mau_chu"  name="mau_chu" placeholder="Nhập màu" value="<?php echo $mauchu;?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="xemketqua" value="Xem kết quả"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        
    </div>
    </div>
    <table bgcolor="#<?php echo $maunen ?>" >
                    <tr>
                        <td><font color = "#<?php echo $mauchu?>"> <?php echo $noidung ?> </font>  </div></td>
                    </tr>
            </table>
</body>
</html>