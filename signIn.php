<?php
   session_start();
   $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST["username"])){
         $username = $_POST['username'];
      }
      if(isset($_POST["password"])){
         $password = $_POST['password'];
      }
      // $sql = "SELECT * FROM users AS a INNER JOIN chuc_vu AS b ON a.ma_chuc_vu = b.ma_chuc_vu INNER JOIN chuyen_khoa AS c ON c.ma_chuyen_khoa = c.ma_chuyen_khoa INNER JOIN khoa AS d ON a.ma_khoa = d.ma_khoa WHERE id = '{$username}' and mat_khau = '{$password}';";
      // $result = mysqli_query($conn, $sql);
      $sql = "select * from users AS a 
      INNER JOIN chuc_vu AS b ON a.ma_chuc_vu = b.ma_chuc_vu 
      INNER JOIN chuyen_khoa AS c ON a.ma_chuyen_khoa = c.ma_chuyen_khoa 
      INNER JOIN khoa AS d ON a.ma_khoa = d.ma_khoa WHERE a.id = '$username' AND a.mat_khau = '$password'";
      $result = mysqli_query($conn, $sql);

      $sql_admin = "select * from users where id = '$username' AND mat_khau = '$password'";
      $result_admin = mysqli_query($conn, $sql_admin);

      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION["id"] = $row["id"];
         $_SESSION["mat_khau"] = $row["mat_khau"];
         $_SESSION["ho_ten"] = $row["ho_ten"];
         $_SESSION["ngay_sinh"] = $row["ngay_sinh"];
         $_SESSION["gioi_tinh"] = $row["gioi_tinh"];
         $_SESSION["ma_khoa"] = $row["ma_khoa"];
         $_SESSION["dia_chi"] = $row["dia_chi"];
         $_SESSION["so_dt"] = $row["so_dt"];
         $_SESSION["ma_chuc_vu"] = $row["ma_chuc_vu"];
         $_SESSION["ma_chuyen_khoa"] = $row["ma_chuyen_khoa"];
         $_SESSION["vai_tro"] = $row["vai_tro"];
         $_SESSION["ten_chuyen_khoa"] = $row["ten_chuyen_khoa"];
         $_SESSION["ten_khoa"] = $row["ten_khoa"];
         $_SESSION["kinh_nghiem"] = $row["kinh_nghiem"];
         if($row["vai_tro"] == "nhan_vien") {
            $_SESSION['flash-message']  = "Đăng nhập thành công";
            header("location: ./doctor.php");
            exit();
         }
         
      }

      if(mysqli_num_rows($result_admin) == 1){
         $row = mysqli_fetch_assoc($result_admin);
         $_SESSION["id"] = $row["id"];
         $_SESSION["ho_ten"] = $row["ho_ten"];
         $_SESSION["mat_khau"] = $row["mat_khau"];
         $_SESSION["ngay_sinh"] = $row["ngay_sinh"];
         $_SESSION["gioi_tinh"] = $row["gioi_tinh"];
         $_SESSION["dia_chi"] = $row["dia_chi"];
         $_SESSION["so_dt"] = $row["so_dt"];
         $_SESSION["kinh_nghiem"] = $row["kinh_nghiem"];
         $_SESSION["vai_tro"] = $row["vai_tro"];
         if($row["vai_tro"] == "admin") {
            $_SESSION['flash-message']  = "Đăng nhập thành công";
            header("location: ./admin.php");
            exit();
         }
      }
      else {
         $_SESSION["message"] = "Tên đăng nhập hoặc mật khẩu không đúng.";
         header("location: ./");
         exit();
      }
      
   }
   $_SESSION["message"] = "Tên đăng nhập hoặc mật khẩu không đúng.";
   header("location: ./");
   mysqli_close($conn);
   exit();
?>