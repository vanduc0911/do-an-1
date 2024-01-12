<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");
    $sql_select_calendar = "SELECT a.ma_lich_hen, a.ma_benh_nhan, c.ho_ten AS ho_ten_benh_nhan, c.ngay_sinh, c.gioi_tinh, a.ngay_hen, b.ho_ten AS ho_ten_bac_si FROM lich_hen AS a 
    INNER JOIN users AS b ON a.ma_nhan_vien = b.id
    INNER JOIN benh_nhan AS c ON a.ma_benh_nhan = c.ma_benh_nhan;";
    $list_calendar = mysqli_query($conn, $sql_select_calendar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="show-data">
    
    </div>
</body>
</html>