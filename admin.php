<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");
    $sql_khoa = "select * from khoa";
    $result_khoa = mysqli_query($conn, $sql_khoa);
    $sql_chuc_vu = "select * from chuc_vu";
    $result_chuc_vu = mysqli_query($conn, $sql_chuc_vu);
    $sql_chuyen_khoa = "select * from chuyen_khoa";
    $result_chuyen_khoa = mysqli_query($conn, $sql_chuyen_khoa); 
    if(isset($_POST["add"])) {
        $full_name = null;
        $birthday = null;
        $gender = null;
        $department = null;
        $address = null;
        $phone = null;
        $position = null;
        $specialist = null;
        $experience = null;
        if($_POST["full_name"] && $_POST["birthday"] && $_POST["gender"] && $_POST["department"] && $_POST["address"] && $_POST["phone"] && $_POST["position"] && $_POST["specialist"] && $_POST["experience"]) {
            $full_name = $_POST["full_name"];
            $birthday = $_POST["birthday"];
            $gender = $_POST["gender"];
            $department = $_POST["department"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $position = $_POST["position"];
            $specialist = $_POST["specialist"];
            $experience = $_POST["experience"]." năm";
        }

        $sql_add = "INSERT INTO users (ho_ten, ngay_sinh, gioi_tinh, ma_khoa, dia_chi, so_dt, ma_chuc_vu, ma_chuyen_khoa, kinh_nghiem) VALUES ('$full_name', '$birthday', '$gender', '$department', '$address', '$phone', '$position', '$specialist', '$experience');";
        mysqli_query($conn, $sql_add);
        header("location: ./admin.php");
    }
    $sql_select_users = "SELECT * FROM users AS a INNER JOIN chuc_vu AS b ON a.ma_chuc_vu = b.ma_chuc_vu 
    INNER JOIN chuyen_khoa AS c ON c.ma_chuyen_khoa = c.ma_chuyen_khoa 
    INNER JOIN khoa AS d ON a.ma_khoa = d.ma_khoa;";
    $list_employed = mysqli_query($conn, $sql_select_users);

    $sql_select_department = "SELECT * FROM khoa";
    $list_department = mysqli_query($conn, $sql_select_department);

    $sql_select_patient = "SELECT * FROM benh_nhan";
    $list_patient = mysqli_query($conn, $sql_select_patient);
    $list_patient_calendar = mysqli_query($conn, $sql_select_patient);

    $sql_select_calendar = "SELECT a.ma_lich_hen, a.ma_benh_nhan, c.ho_ten AS ho_ten_benh_nhan, c.ngay_sinh, c.gioi_tinh, a.ngay_hen, b.ho_ten AS ho_ten_bac_si FROM lich_hen AS a 
    INNER JOIN users AS b ON a.ma_nhan_vien = b.id
    INNER JOIN benh_nhan AS c ON a.ma_benh_nhan = c.ma_benh_nhan;";
    $list_calendar = mysqli_query($conn, $sql_select_calendar);

    $sql_select_doctor = "select * from users where vai_tro = 'nhan_vien'";
    $list_doctor = mysqli_query($conn, $sql_select_doctor);

    if(isset($_POST["create"])) {
        $patients = null;
        $doctors = null;
        $time = null;
        if(isset($_POST["time"]) && isset($_POST["patients"]) && isset($_POST["doctors"])) {
            $patients = $_POST["patients"];
            $doctors = $_POST["doctors"];
            $time = $_POST["time"];
        }

        $sql_create_calendar = "INSERT INTO lich_hen(ma_benh_nhan, ma_nhan_vien, ngay_hen) VALUES ('$patients','$doctors','$time');";
        mysqli_query($conn, $sql_create_calendar);
        header("location: ./admin.php");
    } 

    $sql_select_hospital = "SELECT bn.ho_ten AS ten, bn.ngay_sinh AS ngay_sinh, dv.ten_dich_vu AS ten_dich_vu,thuoc.ten_thuoc AS ten_thuoc, thuoc.don_gia AS gia_thuoc, thuoc_2.lieu_dung AS lieu_dung, thuoc_2.so_luong AS so_luong, ((thuoc_2.so_luong * thuoc.don_gia) + dv.don_gia) AS gia, vp.ngay_thu_tien AS ngay_thu_tien
	FROM ho_so_kham_benh AS hs
	JOIN don_thuoc AS dt 
	ON hs.ma_kham_benh = dt.ma_kham_benh
	JOIN thuoc_trong_don_thuoc AS thuoc_2
	ON dt.ma_don_thuoc = thuoc_2.ma_don_thuoc
	JOIN thuoc ON thuoc_2.ma_thuoc = thuoc.ma_thuoc
	JOIN ho_so_dich_vu AS hs_dv 
	ON hs.ma_kham_benh = hs_dv.ma_kham_benh
	JOIN dich_vu AS dv
	on hs_dv.ma_dich_vu = dv.ma_dich_vu
	JOIN vien_phi AS vp
	ON hs.ma_kham_benh = vp.ma_kham_benh
	JOIN benh_nhan AS bn
	ON vp.ma_benh_nhan = bn.ma_benh_nhan";
    $list_hospital = mysqli_query($conn, $sql_select_hospital);

    $sql_select_service = "select * from dich_vu";
    $list_service = mysqli_query($conn, $sql_select_service);

    $sql_select_insurance = "SELECT * FROM bao_hiem_y_te AS a 
    INNER JOIN benh_nhan AS b ON a.ma_benh_nhan = b.ma_benh_nhan";
    $list_insurance = mysqli_query($conn, $sql_select_insurance);

    $sql_select_equipment = "select * from thiet_bi";
    $list_equipment = mysqli_query($conn, $sql_select_equipment);

    if(isset($_POST["create_department"])) {
        $name_department = null;
        if(isset($_POST["name_department"])) {
            $name_department = $_POST["name_department"];
        }

        $sql_create_department = "INSERT INTO khoa (ten_khoa) VALUES ('$name_department');";
        mysqli_query($conn, $sql_create_department);
        header("location: ./admin.php");
    } 

    if(isset($_POST["update_password"])) {
        $password_old = null;
        $password_new = null;
        $retype = null;
        $storage = $_SESSION["mat_khau"];
        if(isset($_POST["password_old"]) && isset($_POST["password_new"]) && isset($_POST["retype"])) {
            $password_old = $_POST["password_old"];
            $password_new = $_POST["password_new"];
            $retype = $_POST["retype"]; 
        }
        if($password_new == $retype && $password_old == $storage) {
            $sql_update_password = "update users set mat_khau = '$password_new' where id = '".$_SESSION["id"]."';";
            mysqli_query($conn, $sql_update_password);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="./assets/styles/admin.css">
    <title>Admin</title>
</head>

<body>
    <div class="main-admin">

        <div class="header" id="header">

            <div class="container flex">

                <div class="logo">

                    <a href="#">
                        <img src="./assets/img/lg.png" alt="">
                    </a>

                </div>

                <div class="search-bar">

                    <form action="">
                        <input type="text" name="" id="" placeholder="Tìm kiếm">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>

                </div>

                <div class="menu-top">

                    <ul>

                        <li>
                            <a href="#">
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
                                Trang chủ
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span>
                                    <i class="fa-regular fa-bell"></i>
                                </span>
                                Tin tức
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="user-acc">

                    <div class="user-info">

                        <img src="./assets/img/admin/admin.jpg" alt="">
                        <a href="#">
                            <?php echo $_SESSION["ho_ten"]; ?>
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="content">

            <div class="menu">

                <div class="menu-main">

                    <ul id="menu">

                        <li class="tabs_link" onclick="onpen_list(event, 'admin_home')">
                            <a href="#">
                                <i class="fa fa-home"></i>
                                <h3>Trang chủ</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'list_department')">
                            <a href="#">
                                <i class="fa-solid fa-hospital"></i>
                                <h3>Khoa</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'list_employed')">
                            <a href="#">
                                <i class="fa fa-user-md"></i>
                                <h3>Nhân sự</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'list_patient')">
                            <a href="#">
                                <i class="fa-solid fa-user"></i>
                                <h3>Bệnh nhân</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'list_calendar')">
                            <a href="#">
                                <i class="fa-solid fa-calendar"></i>
                                <h3>Lịch hẹn</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'hospital_fee')">
                            <a href="#">
                                <i class="fa-solid fa-money-check-dollar"></i>
                                <h3>Viện phí</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'service')">
                            <a href="#">
                                <i class="fa fa-stethoscope"></i>
                                <h3>Dịch vụ</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'insurance')">
                            <a href="#">
                                <i class="fa-solid fa-notes-medical"></i>
                                <h3>Bảo hiểm y tế</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'equipment')">
                            <a href="#">
                                <i class="fa fa-archive"></i>
                                <h3>Thiết bị y tế</h3>
                            </a>
                        </li>

                        <li class="tabs_link" onclick="onpen_list(event, 'account')">
                            <a href="#">
                                <i class="fa fa-credit-card-alt"></i>
                                <h3>Thêm nhân sự</h3>
                            </a>
                        </li>

                        <li class="tabs_link setting_btn">
                            <a href="#" class="setting">
                                <div>
                                    <i class="fa fa-cog"></i>
                                    <h3>Cài đặt</h3>
                                </div>
                                <i class="fa-solid fa-chevron-down"></i>
                            </a>
                        </li>
                        <ul class="subnav">
                            <li class="update_btn" onclick="onpen_list(event, 'form_update_password')"><a href="javascript:void(0)">Đổi mật khẩu</a></li>
                            <li><a href="./index.php">Đăng xuất</a></li>
                        </ul>

                    </ul>

                </div>

            </div>

            <div class="show_data styled-scrollbars">

                <div id="admin_home" class="tabs_content">
                    <img src="./assets/img/doctor/background.jpg" alt="">
                    <img src="./assets/img/doctor/background2.jpg" alt="">
                    <img src="./assets/img/doctor/background3.jpg" alt="">
                    <div class="prev_slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div class="next_slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>

                <div id="list_department" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Mã khoa</th>
                            <th>Tên khoa</th>
                        </tr>

                        <?php
                            while($row_department = mysqli_fetch_assoc($list_department)) {
                                echo "<tr>";
                                echo "<td>".$row_department["ma_khoa"]."</td>";
                                echo "<td>".$row_department["ten_khoa"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    <button class="department_btn">Tạo khoa</button>
                </div>

                <div class="modal_department ">
                    <div class="modal_department_container">
                        <header class="header_create">
                            <i class="fa-solid fa-gears"></i>
                            Tạo khoa
                        </header>
                        <form action="./admin.php" method="post" class="form_create_department">
                            <div class="information">
                                <label for="name_department">Tên khoa</label>
                                <input type="text" name="name_department" id="name_department">
                            </div>
                            <div class="information">
                                <button name="create_department">Tạo khoa</button>
                            </div>
                            <div class="close-create-department close">
                                <i class="fa fa-times"></i>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="list_employed" class="tabs_content">
                    <table class="data" border="1">
                        <tr>
                            <th>Mã nhân sự</th>
                            <th>Tên nhân sự</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Khoa</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Chuyên khoa</th>
                            <th>Kinh nghiệm</th>
                        </tr>

                        <?php 
                                while($row_employed = mysqli_fetch_assoc($list_employed)) {
                                    echo "<tr>";
                                    echo "<td>".$row_employed["id"]."</td>";
                                    echo "<td>".$row_employed["ho_ten"]."</td>";
                                    echo "<td>".date("d-m-Y", strtotime($row_employed["ngay_sinh"]))."</td>";
                                    echo "<td>".$row_employed["gioi_tinh"]."</td>";
                                    echo "<td>".$row_employed["ten_khoa"]."</td>";
                                    echo "<td>".$row_employed["dia_chi"]."</td>";
                                    echo "<td>".$row_employed["so_dt"]."</td>";
                                    echo "<td>".$row_employed["ten_chuc_vu"]."</td>";
                                    echo "<td>".$row_employed["ten_chuyen_khoa"]."</td>";
                                    echo "<td>".$row_employed["kinh_nghiem"]."</td>";
                                    echo "</tr>";
                                }
                            ?>
                    </table>
                </div>

                <div id="list_patient" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Mã bệnh nhân</th>
                            <th>Tên bệnh nhân</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>

                        <?php
                            while($row_patient = mysqli_fetch_assoc($list_patient)) {
                                echo "<tr>";
                                echo "<td>".$row_patient["ma_benh_nhan"]."</td>";
                                echo "<td>".$row_patient["ho_ten"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_patient["ngay_sinh"]))."</td>";
                                echo "<td>".$row_patient["gioi_tinh"]."</td>";
                                echo "<td>".$row_patient["dia_chi"]."</td>";
                                echo "<td>".$row_patient["so_dt"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div id="list_calendar" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Tên bệnh nhân</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Ngày hẹn khám</th>
                            <th>Họ tên bác sĩ khám</th>
                        </tr>

                        <?php
                            while($row_calendar = mysqli_fetch_assoc($list_calendar)) {
                                echo "<tr>";
                                echo "<td>".$row_calendar["ho_ten_benh_nhan"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_calendar["ngay_sinh"]))."</td>";
                                echo "<td>".$row_calendar["gioi_tinh"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_calendar["ngay_hen"]))."</td>";
                                echo "<td>".$row_calendar["ho_ten_bac_si"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                    <button class="calendar_btn">Tạo lịch hẹn</button>
                </div>
                <div class="modal_calendar">
                    <div class="modal_calendar_container">
                        <header class="header_create">
                            <i class="fa-solid fa-gears"></i>
                            Tạo lịch hẹn
                        </header>
                        <form action="./admin.php" method="post" class="form_create_calendar">
                            <div class="information">
                                <label for="patients">Chọn bệnh nhân</label>
                                <select name="patients" id="patients" class="patients">
                                    <?php
                                        while($row_patient_calendar = mysqli_fetch_assoc($list_patient_calendar)) {
                                            echo "<option value=".$row_patient_calendar["ma_benh_nhan"].">".$row_patient_calendar["ho_ten"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="information">
                                <label for="doctors">Chọn bác sĩ</label>
                                <select name="doctors" id="doctors" class="doctors">
                                    <?php
                                            while($row_doctor = mysqli_fetch_assoc($list_doctor)) {
                                                echo "<option value=".$row_doctor["id"].">".$row_doctor["ho_ten"]."</option>";
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="information">
                                <label for="time">Chọn ngày hẹn</label>
                                <input type="date" name="time" id="time">
                            </div>
                            <div class="information">
                                <button name="create">Tạo lịch hẹn</button>
                            </div>
                            <div class="close-create-calendar close">
                                <i class="fa fa-times"></i>
                            </div>
                        </form>
                    </div>
                </div>




                <div id="account" class="tabs_content">
                    <form action="./admin.php" method="post" id="form_add_employed">
                        <div class="information">
                            <label for="full_name" class="full_name">Họ tên</label>
                            <input type="text" name="full_name" id="full_name" style="margin-left: 37px;">
                        </div>

                        <div class="information" style="margin-left: 55px;">
                            <label for="birthday" class="birthday">Ngày sinh</label>
                            <input type="date" name="birthday" id="birthday" style="margin-left: 37px;">
                        </div>

                        <div class="information">
                            <label for="gender" class="gender">Chọn giới tính</label>
                            <label for="boy" class="setWidth" style="margin-left: 6px;">Nam</label>
                            <input type="radio" name="gender" id="boy" value="Nam">
                            <label for="girl" class="setWidth">Nữ</label>
                            <input type="radio" name="gender" id="girl" value="Nữ">
                            <label for="another" class="setWidth">Khác</label>
                            <input type="radio" name="gender" id="another" value="Khác">
                        </div>

                        <div class="information" style="margin-left: 59px;">
                            <label for="department" class="department">Chọn khoa</label>
                            <select name="department" id="department" style='margin-left: 76px;'>
                                <?php
                                    while($row = mysqli_fetch_assoc($result_khoa)) {
                                        echo "<option value='".$row["ma_khoa"]."'>".$row["ten_khoa"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="information">
                            <label for="address" class="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" style="transform: translateX(33px);">
                        </div>

                        <div class="information" style="margin-left: 81px;">
                            <label for="phone" class="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" style="margin-left: 29px;">
                        </div>

                        <div class="information">
                            <label for="position" class="position">Chọn chức vụ</label>
                            <select name="position" id="position">
                                <?php
                                    while($row_position = mysqli_fetch_assoc($result_chuc_vu)) {
                                        echo "<option value='".$row_position["ma_chuc_vu"]."'>".$row_position["ten_chuc_vu"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="information">
                            <label for="specialist" class="specialist">Chọn chuyên khoa</label>
                            <select name="specialist" id="specialist">
                                <?php
                                    while($row_specialist = mysqli_fetch_assoc($result_chuyen_khoa)) {
                                        echo "<option value='".$row_specialist["ma_chuyen_khoa"]."'>".$row_specialist["ten_chuyen_khoa"]."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="information">
                            <label for="experience" class="experience">Kinh nghiệm</label>
                            <input type="number" name="experience" id="experience" min="0">
                        </div>

                        <button name="add" id="add">Thêm nhân sự</button>
                    </form>
                </div>

                <div id="hospital_fee" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Tên bệnh nhân</th>
                            <th>Ngày sinh</th>
                            <th>Dịch vụ sử dụng</th>
                            <th>Tên thuốc được kê</th>
                            <th>Giá thuốc</th>
                            <th>Liều dùng</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền phải trả</th>
                            <th>Ngày thanh toán</th>
                        </tr>

                        <?php
                            while($row_hospital = mysqli_fetch_assoc($list_hospital)) {
                                echo "<tr>";
                                echo "<td>".$row_hospital["ten"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_hospital["ngay_sinh"]))."</td>";
                                echo "<td>".$row_hospital["ten_dich_vu"]."</td>";
                                echo "<td>".$row_hospital["ten_thuoc"]."</td>";
                                echo "<td>".$row_hospital["gia_thuoc"]."</td>";
                                echo "<td>".$row_hospital["lieu_dung"]."</td>";
                                echo "<td>".$row_hospital["so_luong"]."</td>";
                                echo "<td>".$row_hospital["gia"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_hospital["ngay_thu_tien"]))."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>

                <div id="service" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Mã dịch vụ</th>
                            <th>Tên dịch vụ</th>
                            <th>Đơn giá</th>
                        </tr>

                        <?php
                            while($row_service = mysqli_fetch_assoc($list_service)) {
                                echo "<tr>";
                                echo "<td>".$row_service["ma_dich_vu"]."</td>";
                                echo "<td>".$row_service["ten_dich_vu"]."</td>";
                                echo "<td>".$row_service["don_gia"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>

                <div id="insurance" class="tabs_content">
                    <table border="1" class="data">
                        <tr>
                            <th>Số thẻ</th>
                            <th>Tên bệnh nhân</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Địa chỉ</th>
                            <th>Ngày cấp thẻ</th>
                            <th>Ngày hết hạn</th>
                        </tr>

                        <?php
                            while($row_insurance = mysqli_fetch_assoc($list_insurance)) {
                                echo "<tr>";
                                echo "<td>".$row_insurance["so_the"]."</td>";
                                echo "<td>".$row_insurance["ho_ten"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_insurance["ngay_sinh"]))."</td>";
                                echo "<td>".$row_insurance["gioi_tinh"]."</td>";
                                echo "<td>".$row_insurance["dia_chi"]."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_insurance["ngay_cap"]))."</td>";
                                echo "<td>".date("d-m-Y", strtotime($row_insurance["ngay_het_han"]))."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>

                <div id="equipment" class="tabs_content">
                <table border="1" class="data">
                        <tr>
                            <th>Mã thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Đơn giá</th>
                        </tr>

                        <?php
                            while($row_equipment = mysqli_fetch_assoc($list_equipment)) {
                                echo "<tr>";
                                echo "<td>".$row_equipment["ma_thiet_bi"]."</td>";
                                echo "<td>".$row_equipment["ten_thiet_bi"]."</td>";
                                echo "<td>".$row_equipment["don_gia"]."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>            


            </div>

            <div class="update_password data_calendar">
                <div id="form_update_password" class="modal_calendar">
                    <div class="modal_department_container">
                        <header class="header_create">
                            <i class="fa-solid fa-gears"></i>
                            Đổi mật khẩu
                        </header>
                        <form action="./admin.php" method="post" class="form_create_department">
                            <div class="information">
                                <label for="password_old">Nhập mật khẩu cũ</label>
                                <input type="password" name="password_old" id="password_old">
                                <i class="fa-solid fa-eye show_password"></i>
                            </div>
                            <div class="information">
                                <label for="password_new">Nhập mật khẩu mới</label>
                                <input type="password" name="password_new" id="password_new">
                                <i class="fa-solid fa-eye show_password"></i>
                            </div>
                            <div class="information">
                                <label for="retype">Nhập lại mật khẩu</label>
                                <input type="password" name="retype" id="retype">
                                <i class="fa-solid fa-eye show_password"></i>
                            </div>
                            <div class="information">
                                <button name="update_password">Lưu lại</button>
                            </div>
                            <div class="close_form_password close">
                                <i class="fa fa-times"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php if (isset($_SESSION['flash-message']) && $message = $_SESSION['flash-message']): ?>
        <div id="toast_message">
            <i class="fa-solid fa-circle-check icon_check"></i>
            <div class="success">
                <h3><?php echo $_SESSION['flash-message']; unset($_SESSION['flash-message']); ?></h3>
                <i class="fa-solid fa-xmark icon_close"></i>
            </div>
        </div>
    <?php endif ?>
    <script src="./js/admin.js"></script>
</body>

</html>