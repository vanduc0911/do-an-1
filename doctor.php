<?php
   session_start();
   $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");
    if(!isset($_SESSION["id"])) {
        header("location: ./signIn.php");
    }
//    $result = mysqli_query($conn, $sql);
//    $row = mysqli_fetch_assoc($result);
//    var_dump($row);
//    mysqli_close($conn);
    $id_doctor = $_SESSION["id"];
    $sql_select_calendar = "SELECT a.ma_benh_nhan, b.ho_ten, b.ngay_sinh, b.gioi_tinh, b.dia_chi, b.so_dt, a.ngay_hen FROM lich_hen AS a INNER JOIN benh_nhan AS b ON a.ma_benh_nhan = b.ma_benh_nhan
    WHERE a.ma_nhan_vien = '$id_doctor';";
    $list_calendar = mysqli_query($conn, $sql_select_calendar);

    if(isset($_POST["update"])) {
        $full_name = null;
        $birthday = null;
        $gender = null;
        $address = null;
        $phone = null;
        $experience = null;
        if($_POST["full_name"] && $_POST["birthday"] && $_POST["gender"] && $_POST["address"] && $_POST["phone"] && $_POST["experience"]) {
            $full_name = $_POST["full_name"];
            $birthday = $_POST["birthday"];
            $gender = $_POST["gender"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $experience = $_POST["experience"]." năm";
        }
        $sql  = "update users set ho_ten = '$full_name', ngay_sinh = '$birthday', gioi_tinh = '$gender', dia_chi = '$address', so_dt = '$phone', kinh_nghiem = '$experience' where id = '".$_SESSION["id"]."';";
        $result_update = mysqli_query($conn, $sql);
        if($result_update == 1) {
            $_SESSION["ho_ten"] = $full_name;
            $_SESSION["ngay_sinh"] = $birthday;
            $_SESSION["gioi_tinh"] = $gender;
            $_SESSION["dia_chi"] = $address;
            $_SESSION["so_dt"] = $phone;
            $_SESSION["kinh_nghiem"] = $experience;
        }
        header("location: ./doctor.php");
    }

    $sql_select_patient = "SELECT a.ma_kham_benh, c.ho_ten, c.ngay_sinh, c.gioi_tinh, c.dia_chi, c.so_dt, d.ten_benh, e.dia_chi as co_so, a.ngay_kham_benh, a.ngay_nhap_vien, a.ngay_ra_vien FROM ho_so_kham_benh AS a 
	INNER JOIN users AS b ON a.ma_nhan_vien = b.id
	INNER JOIN benh_nhan AS c ON a.ma_benh_nhan = c.ma_benh_nhan
	INNER JOIN benh AS d ON a.ma_benh = d.ma_benh
	INNER JOIN co_so_dieu_tri e ON a.ma_co_so = e.ma_co_so WHERE b.id = '".$_SESSION["id"]."';";
    $list_patient = mysqli_query($conn, $sql_select_patient);

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
    <link rel="stylesheet" type="text/css" href="./assets/styles/doctor.css">
    <title>Doctor</title>
</head>
<body>

    <div class="main-doctor">

        <div class="header-doctor">

            <div class="container flex">

                <div class="logo-dt">

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
                                    <i class="fa fa-bell-o"></i>
                                </span>
                                Tin tức
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="user-acc">

                    <div class="user-info">

                        <img src="./assets/img/doctor/Doctor-Cartoon-Wallpapers.png" alt="">
                        <a href="#" class="name_doctor"><?php echo $_SESSION["ho_ten"]; ?></a>
                        <i class="fa fa-caret-down user-account-name-caret-down"></i>

                        <div class="menu-user">
                            <div class="border_menu"></div>
                            <ul class="us-links">
                                <li class="update_btn">
                                    <a href="javascript:void(0)">Đổi mật khẩu</a>
                                </li>
                                <li>
                                    <a href="index.php">Đăng xuất</a>
                                </li>
                            </ul>
    
                        </div>

                    </div>

                </div>

            </div>

        </div>

    <div class="content-doctor">

        <div class="main-content">

            <div class="column-information">

                <div class="content-section">

                    <div class="heading-information">

                        <div class="title">
                            <p class="title-header">
                                Thông tin cá nhân
                            </p>
                        </div>

                    </div>

                    <div class="main-info">
                    
                        <div class="avata-information">
                            <img src="./assets/img/doctor/Doctor-Cartoon-Wallpapers.png " alt="">
                            <div class="active">
                                <a href="#">Xem chi tiết</a>
                            </div>
                        </div>

                    
                        <div class="text-infomation">
                        
                            <div class="text-infomation-body">
                                <div class="form-group">
                                    <label for="" class="inf inf_group1">
                                        <span>Mã nhân viên</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["id"]; ?></span>
                                    </label>


                                    <label for="" class="inf inf_group2">
                                        <span>Khoa</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["ten_khoa"]  ?></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="" class="inf inf_group1">
                                        <span>Họ tên</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["ho_ten"]; ?></span>
                                    </label>

                                     <label for="" class="inf inf_group2">
                                        <span>Chức vụ</span>
                                        :
                                        <span class="bold">Bác sĩ</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="" class="inf inf_group1">
                                        <span>Giới tính</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["gioi_tinh"]; ?></span>
                                        
                                    </label>

                                    <label for="" class="inf inf_group2">
                                        <span>Bậc đào tạo</span>
                                        :
                                        <span class="bold">Đại học</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="" class="inf inf_group1">
                                        <span>Ngày sinh</span>
                                        :
                                        <span class="bold"><?php echo date("d-m-Y", strtotime($_SESSION["ngay_sinh"])); ?></span>
                                    </label>

                                    <label for="" class="inf inf_group2">
                                        <span>Chuyên khoa</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["ten_chuyen_khoa"]; ?></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="" class="inf inf_group1">
                                        <span>Nơi sinh</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["dia_chi"]; ?></span>
                                    </label>

                                    <label for="" class="inf inf_group2">
                                        <span>Kinh nghiệm</span>
                                        :
                                        <span class="bold"><?php echo $_SESSION["kinh_nghiem"]; ?></span>
                                    </label>
                                </div>

                            </div>    

                        </div>

                    </div>    

                </div>

                <div class="column-schedule">

                    <div class="column-note">

                        <div class="remind">

                            <div class="column-main">

                                <div class="box-column">
                                    <h3>Ghi chú</h3>
                                    <a href="#">Hiện tại không có ghi chú</a>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="column-calender">

                        <div class="calender-k">

                            <div class="column-k">
                                <div class="calender">
                                    <div class="box-menu">
                                        <h3>Lịch khám trong tuần</h3>
                                        <div class="clearfix">
                                            <h2>2</h2>
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <a href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="calender-t">

                            <div class="column-t">
                                <div class="calender">
                                    <div class="box-menu">
                                        <h3>Lịch trực trong tuần</h3>
                                        <div class="clearfix">
                                            <h2>0</h2>
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <a href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="menu">

                <div class="menu-doctor">
    
                    <div class="menu-main">

                            <div id="menu" class="my_info_btn">
                                <a href="#">
                                    <i class="fa fa-info"></i>
                                    <h3>Thông tin cá nhân</h3>
                                </a>
                            </div>
    
                            <div id="menu" class="patient_btn">
                                <a href="#">
                                <i class="fa-solid fa-hospital-user"></i>
                                    <h3>Bệnh nhân</h3>
                                </a>
                            </div>
    
                            <div id="menu" class="calendar">
                                <a href="#">
                                <i class="fa-solid fa-calendar-days"></i>
                                    <h3>Lịch hẹn</h3>
                                </a>
                            </div>
    
                    </div>
    
                </div>
    
            </div>

        </div>

    </div>

    <div class="footer">

        <div class="container-ft">

            <div class="info-footer">

                <a href="#">
                    <img src="./assets/logo/logo_tittle.png" alt="">
                </a>

                <div class="footer-text">
                    <h3>CỔNG THÔNG TIN ĐIỆN TỬ BỆNH VIỆN PRISMA</h3>
                    <P>
                        Chịu trách nhiệm chính: GS.TS Trần Bình Giang - Giám đốc bệnh viện
                    </P>
            </div>

            </div>

            <div class="footer-address">

                <ul class="company-address">

                    <li class="address1">
                        <h4>Cơ sở 1</h4>
                        <div class="location-box">
                        <i class="fa-solid fa-location-dot"></i>
                            <p>Tựu Liệt, Tam Hiệp, Thanh Trì, Hà Nội</p>
                        </div>
                        <div class="location-box">
                            <i class="fa fa-phone"></i>
                            <p>0936 238 808</p>
                        </div>
                        <div class="location-box">
                            <i class="fa fa-envelope"></i>
                            <p>benhvienpisma@bvp.org.vn</p>
                        </div>
                    </li>

                    <li class="address1">
                        <h4>Cơ sở 2</h4>
                        <div class="location-box">
                        <i class="fa-solid fa-location-dot"></i>
                            <p>Số 30 đường Tân Triều, Thanh Trì, Hà Nội</p>
                        </div>
                        <div class="location-box">
                            <i class="fa fa-phone"></i>
                            <p>0904 690 818</p>
                        </div>
                        <div class="location-box">
                            <i class="fa fa-envelope"></i>
                            <p>benhvienpisma@bvp.org.vn</p>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>

        <div class="bottom-footer">
            <div class="icon-social">
                <a class="icon-fb" href="https://www.facebook.com/profile.php?id=100023602670048">
                <i class="fa-brands fa-facebook"></i>   
                </a>

                <a class="icon-gg" href="https://www.google.com.vn/?hl=vi">
                <i class="fa-brands fa-google"></i>
                </a>
            </div>
        </div>

    </div>

    </div>
    <div class="data_calendar">
        <div id="show_calendar">
            <h2>Danh sách bệnh nhân đã có lịch hẹn</h2>
            <table class="data" border="1">
                <tr>
                    <th>Mã bệnh nhân</th>
                    <th>Tên bệnh nhân</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ngày hẹn</th>
                </tr>
                <?php
                    while($row_calendar = mysqli_fetch_assoc($list_calendar)){
                        echo "<tr>";
                        echo "<td>".$row_calendar["ma_benh_nhan"]."</td>";
                        echo "<td>".$row_calendar["ho_ten"]."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_calendar["ngay_sinh"]))."</td>";
                        echo "<td>".$row_calendar["gioi_tinh"]."</td>";
                        echo "<td>".$row_calendar["dia_chi"]."</td>";
                        echo "<td>".$row_calendar["so_dt"]."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_calendar["ngay_hen"]))."</td>";
                        echo "</tr>";
                    }
    
                ?>
            </table>
            <div class="close_calendar close">
                <i class="fa fa-times"></i>
            </div>
        </div>
    </div>

    <div class="my_info">
        <div id="form_update" class="">
            <div class="modal_department_container_update">
                <header class="header_update">
                    <i class="fa-solid fa-gears"></i>
                    Thông tin cá nhân
                </header>
                <form action="./doctor.php" method="post">
                        <div class="information">
                            <label for="full_name" class="full_name">Họ tên</label>
                            <input type="text" name="full_name" id="full_name" value="<?php echo $_SESSION["ho_ten"]; ?>">
                        </div>

                        <div class="information">
                            <label for="birthday" class="birthday">Ngày sinh</label>
                            <input type="date" name="birthday" id="birthday" value="<?php echo $_SESSION["ngay_sinh"]; ?>">
                        </div>

                        <div class="information">
                            <label for="gender" class="gender">Giới tính</label>
                            <?php
                                $checked_boy = null;
                                $checked_girl = null;
                                $checked_another = null;
                                if($_SESSION["gioi_tinh"] == "Nam") {$checked_boy = "checked";}
                                if($_SESSION["gioi_tinh"] == "Nữ") {$checked_girl = "checked";}
                                if($_SESSION["gioi_tinh"] == "Khác") {$checked_another = "checked";}
                                echo '<label for="boy" class="">Nam</label>';
                                echo '<input type="radio" name="gender" id="boy" value="Nam"'.$checked_boy.'>';
                                echo '<label for="girl" class="">Nữ</label>';
                                echo '<input type="radio" name="gender" id="girl" value="Nữ"'.$checked_girl.'>';
                                echo '<label for="another" class="">Khác</label>';
                                echo '<input type="radio" name="gender" id="another" value="Khác"'.$checked_another.'>';
                            ?>
                        </div>

                        <div class="information">
                            <label for="address" class="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo $_SESSION["dia_chi"]; ?>">
                        </div>

                        <div class="information">
                            <label for="phone" class="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" value="<?php echo $_SESSION["so_dt"]; ?>">
                        </div>

                        <div class="information">
                            <label for="experience" class="experience">Kinh nghiệm</label>
                            <input type="number" name="experience" id="experience" min="0" value="<?php
                                $storage = $_SESSION["kinh_nghiem"];
                                $parts = preg_split('/[A-Za-z]/', $storage);
                                $number = (int) $parts[0];
                                echo $number;
                            ?>">
                        </div>

                        <div class="information">
                            <button name="update" id="update">Cập nhật</button>
                        </div>
                </form>
                <div class="close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
        </div>
    </div>

    <div id="view_patient" class="">
        <div class="view_patient_container">
            <header class="header_patient">
                <i class="fa-solid fa-address-book"></i>
                Hồ sơ khám bệnh
            </header>
            <table border="1" class="data">
                <tr>
                    <th>Mã khám bệnh</th>
                    <th>Tên bệnh nhân</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tên loại bệnh</th>
                    <th>Cơ sở điều trị</th>
                    <th>Ngày khám bệnh</th>
                    <th>Ngày nhập viện</th>
                    <th>Ngày ra viện</th>
                </tr>
    
                <?php
                    while($row_patient = mysqli_fetch_assoc($list_patient)) {
                        echo "<tr>";
                        echo "<td>".$row_patient["ma_kham_benh"]."</td>";
                        echo "<td>".$row_patient["ho_ten"]."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_patient["ngay_sinh"]))."</td>";
                        echo "<td>".$row_patient["gioi_tinh"]."</td>";
                        echo "<td>".$row_patient["dia_chi"]."</td>";
                        echo "<td>".$row_patient["so_dt"]."</td>";
                        echo "<td>".$row_patient["ten_benh"]."</td>";
                        echo "<td>".$row_patient["co_so"]."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_patient["ngay_kham_benh"]))."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_patient["ngay_nhap_vien"]))."</td>";
                        echo "<td>".date("d-m-Y", strtotime($row_patient["ngay_ra_vien"]))."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <div class="close">
                <i class="fa fa-times"></i>
            </div>
        </div>
    </div>

    <div class="update_password">
        <div id="form_update_password" class="modal_calendar">
            <div class="modal_department_container">
                <header class="header_create">
                    <i class="fa-solid fa-gears"></i>
                    Đổi mật khẩu
                </header>
                <form action="./doctor.php" method="post" class="form_create_department">
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

    <?php if (isset($_SESSION['flash-message']) && $message = $_SESSION['flash-message']): ?>
        <div id="toast_message">
            <i class="fa-solid fa-circle-check icon_check"></i>
            <div class="success">
                <h3><?php echo $_SESSION['flash-message']; unset($_SESSION['flash-message']); ?></h3>
                <i class="fa-solid fa-xmark icon_close"></i>
            </div>
        </div>
    <?php endif ?>

    <script src="./js/doctor.js"></script>
    
</body>
</html>