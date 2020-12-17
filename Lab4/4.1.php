<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML+CSS+JS</title>
    <link rel="stylesheet" href="4.1.1.css" type="text/css">  
</head>
<body>
    <?php
        $method =  $_SERVER['REQUEST_METHOD'];
        if($method == 'POST')
        {
            $chieudai =$_POST['chieu_dai'];
            $chieurong =$_POST['chieu_rong'];
            $dientich = $chieudai * $chieurong;
        }

    ?>

    <div id="wrapper">
        <div class="container">
            <form id="tinh_dien_tich_hinh_chu_nhat" action="" method="post" >
                <table>
                    <thead>
                        <tr>
                            <th colspan="2"><h1 style="margin: 0px;">Diện tích hình chữ nhật</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chiều dài:</td>
                            <td>
                                <input type="number" id="chieu_dai" name ="chieu_dai" placeholder="Nhập chiều dài"value ="<?php echo $chieudai;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Chiều rộng:</td>
                            <td><input type="number" id="chieurong" name="chieu_rong" placeholder="Nhập chiều rộng" value="<?php echo $chieurong?>"></td>
                        </tr>
                        <tr>
                            <td>Diện tích:</td>
                            <td><input type="number" id="dien-tich" name="dientich" placeholder="Diện tích" disabled="disable" value="<?php echo $dientich?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="submit"  value="Tính">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form> 
        </div>
    </div>
   
</body>
</html>