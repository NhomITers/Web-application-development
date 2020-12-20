<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Yanone+Kaffeesatz:wght@300;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="5.1.css">
    <title>lab5.1</title>
</head>
<?php
$Tong =0;
$dayso ="";
 $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST')
    {
        
        $arr[100]=0;
        $t=0;
        $tam="" ;
        $dayso = $_POST['Nhap_So'];
        if($dayso !=""){
        for($i =0;$i<strlen($dayso);$i++)
        {
            
            if($dayso[$i] ==',')
            {
                $arr[$t++]=(int)$tam;
                //echo $arr[$t-1];
                $tam="" ;
                continue;
            }
                $tam = $tam.$dayso[$i];
        }
        $arr[$t]=(int)$tam;
        for($i =0; $i<=$t;$i++)
            $Tong += (int)$arr[$i];
    }
        
    }
?>
<body>
    <div class="container">
    <form action="" method="POST">
        <table>
            <header>
            <tr>
                    <th colspan="2">
                        NHẬP VÀ TÍNH TRÊN DÃY SỐ
                    </th>
            </tr>
            </header>
            <tbody>
                    <tr>
                    <td>
                            Nhập dãy số :
                        </td>
                        <td>
                            <input type="text" name="Nhap_So" id="" placeholder="Nhập dãy số" value="<?php echo $dayso ?>"> <span>(*)</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Tổng dãy số" style="background-color: yellow;">
                        </td>
                    </tr>
                    <tr>
                    <td>
                            Tổng dãy số :
                        </td>
                        <td>
                            <input type="text" name="Tong" id="" placeholder="" disabled="disable" value="<?php  echo $Tong?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <span>(*)</span> Các số được nhập cách nhau bằng dấu ","
                        </td>
                        
                    </tr>
            </tbody>
        </table>
    </form>
    </div>
    
</body>
</html>