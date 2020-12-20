<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="4.5.css">
    <title>Lap4.5</title>
</head>
<?php
   $method =$_SERVER['REQUEST_METHOD'];
   if($method=='POST')
   {
       $canha=$_POST['Canh_A'];
       $canhb=$_POST['Canh_B'];
       $canhc= sqrt($canha*$canha+$canhb*$canhb);
   }
?>
<body>
    <div class="container">
    <form action="" method="post">
        <table class="table-row">
            <header>
            <tr>
         <th colspan="2"> CẠNH HUYỀN TAM GIÁC VUÔNG</th>
         </tr>
            </header>
            <tbody>
            <tr>
             <td>Cạnh A:</td>
             <td><input type="number" name ="Canh_A"></td>
         </tr>
         <tr>
             <td>Cạnh B:</td>
             <td><input type="number" name ="Canh_B"></td>
         </tr>
         <tr>
             <td>Cạnh huyền:</td>
             <td><input type="number" name ="Canh_C" disabled="disabled" value="<?php echo $canhc; ?>"></td>
         </tr>
         <tr>
             <td colspan="2" ><input type="submit" value="Tính"></td>
         </tr>
            </tbody>
         
         
        </table>
    </form>
    </div>
    
</body>
</html>