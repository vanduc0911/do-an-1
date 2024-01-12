<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");

    $username = null;
    $birthday = null;
    $gender = null;
    $address = null;
    $phone = null;

    if(isset($_POST["register"])) {
        if(isset($_POST["username"]) && isset($_POST["birthday"]) && isset($_POST["gender"]) && isset($_POST["address"]) && isset($_POST["phone"])) {
            $username = $_POST["username"];
            $birthday = $_POST["birthday"];
            $gender = $_POST["gender"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
        }
    }

    $sql_insert_patient = "INSERT INTO benh_nhan(ho_ten, ngay_sinh, gioi_tinh, dia_chi, so_dt) values ('$username', '$birthday', '$gender', '$address', '$phone')";
    mysqli_query($conn, $sql_insert_patient);
    header("location: ./index.php");
?>