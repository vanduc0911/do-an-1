<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "khamchuabenh_nhom10");
    $sql_select_calendar = "SELECT a.ma_lich_hen, a.ma_benh_nhan, c.ho_ten AS ho_ten_benh_nhan, c.ngay_sinh, c.gioi_tinh, a.ngay_hen, b.ho_ten AS ho_ten_bac_si FROM lich_hen AS a 
    INNER JOIN users AS b ON a.ma_nhan_vien = b.id
    INNER JOIN benh_nhan AS c ON a.ma_benh_nhan = c.ma_benh_nhan;";
    $list_calendar = mysqli_query($conn, $sql_select_calendar);

    $sql_select_service = "select * from dich_vu";
    $list_service = mysqli_query($conn, $sql_select_service);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRISMA</title>
    <link rel="icon" href="./assets/logo/logo_tittle.png">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="./assets/styles/style.css">
</head>
<body>
    <!-- <?php
        if(isset($_SESSION["message"])): ?>
            <div class="modal open">
                <h3 style="background: #fff">
                    <?php echo $_SESSION['message'] ?>
                </h3>
            </div>
    <?php endif ?> -->
      <div class="main-hospital">
        
        <!-- start header -->
        <div class="header">

            <div class="top-header">

                <div class="container">

                    <div class="top-header-address">

                        <i class="fa-solid fa-location-dot"></i>
                        <p>Địa chỉ: 40 Phố Tràng Thi - Hoàn Kiếm - Hà Nội - Việt Nam</p>
                    
                    </div>

                    <div class="top-header-option">

                        <a href="#">Liên hệ</a>|
                        <a href="#">Hỏi đáp</a>|
                        <a href="#" class="icon-facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" class="js-login">Login</a>
                        
                    </div>

                </div>

            </div>

            <div class="main-header">

                <div class="container">

                    <div class="logo">

                        <img src="./assets/img/logo.jpg" alt="">

                    </div>

                    <div class="phone-number">

                        <a href="#" class="item-phone-number">

                            <i class="fa-solid fa-hospital"></i>

                            <div class="item-text">
                                <p class="item-text-title">Cấp cứu 24/7</p>
                                <p class="item-text-number">(024) 3825.3531</p>
                            </div>

                        </a>

                        <a href="#" class="item-phone-number">

                            <i class="fa fa-phone"></i>

                            <div class="item-text">
                                <p class="item-text-title">Hotline</p>
                                <p class="item-text-number">19001902</p>
                            </div>

                        </a>

                    </div>

                    <div class="search">

                        <div class="form-search">

                            <input name = "s" placeholder="Tìm kiếm" id="search" type="text">
                            <button type="submit" class="fa fa-search"></button>

                        </div>

                    </div>

                    <div class="clear"></div>

                </div>

            </div>

            <div class="main-menu">

                <nav class="menu menu-main">

                    <div class="container">

                        <div class="menu-main-container">

                            <ul class="menu-menu-main">

                                <li id="menu-item-123" class="menu-item-current active" >
                                    <a href="#">
                                        TRANG CHỦ
                                        <i></i>
                                        
                                    </a>
                                </li>

                                <li id="menu-item-345" class="menu-item-345">
                                    <a href="#">
                                        GIỚI THIỆU
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-345">
                                            <a href="./gioiThieu.html">Giới thiệu bệnh viện</a>
                                        </li>

                                        <li class="menu-item-345">
                                            <a href="#">Sơ đồ bệnh viện</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-456" class="menu-item-456">
                                    <a href="#">
                                        ĐÀO TẠO - NCKH
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-456">
                                            <a href="#">Đào tạo - Chỉ đạo tuyến</a>
                                        </li>

                                        <li class="menu-item-456">
                                            <a href="#">Nghiên cứu khoa học</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-567" class="menu-item-567">
                                    <a href="#news">
                                        TIN TỨC
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-567">
                                            <a href="#">Tin sự kiện</a>
                                        </li>

                                        <li class="menu-item-567">
                                            <a href="#">Tin y học</a>
                                        </li>

                                        <li class="menu-item-567">
                                            <a href="#">Quản lý chất lượng bệnh viện</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-678" class="menu-item-678">
                                    <a href="#">
                                        GÓC TỪ THIỆN
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-678">
                                            <a href="#">Thông tin bệnh nhân</a>
                                        </li>

                                        <li class="menu-item-678">
                                            <a href="#">Cập nhập tài trợ</a>
                                        </li>

                                        <li class="menu-item-678">
                                            <a href="#">Dự án</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-789" class="menu-item-789">
                                    <a href="#">
                                        CHUYÊN KHOA
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">

                                        <div class="lamsang">

                                            <p>Lâm sàng</p>
                                            <li>
                                                <a href="#">Phẫu thuật thần kinh I</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật thần kinh II</a>
                                            </li>
                                            <li>
                                                <a href="#">Nội - Hồi sức thần kinh</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật gan mật</a>
                                            </li>
                                            <li>
                                                <a href="#">Khám bệnh</a>
                                            </li>
                                            <li>
                                                <a href="#">Ung bướu</a>
                                            </li>
                                            <li>
                                                <a href="#">Đặt điều trị theo yêu cầu</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật nhi và trẻ sơ sinh</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật tiêu hóa</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật cấp cứu tiêu hóa</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật tiết niệu</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật nhiễm khuẩn</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Phẫu Thuật Chi trên và Y học thể thao</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Phẫu Thuật Chấn thương chung</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Phẫu Thuật Chi dưới</a>
                                            </li>
                                            <li>
                                                <a href="#">Thận lọc máu</a>
                                            </li>
                                            <li>
                                                <a href="#">Khám xương & Điều trị ngoại trú</a>
                                            </li>
                                            <li>
                                                <a href="#">Phục hồi Chức năng</a>
                                            </li>
                                            <li>
                                                <a href="#">Phẫu thuật Cột sống</a>
                                            </li>
                                            <li>
                                                <a href="#">PT Hàm mặt Tạo hình và Thẩm mỹ</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Nam Học</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Ghép tạng</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Gây mê & Hồi sức Ngoại khoa</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Phẫu thuật Nội soi</a>
                                            </li>
                                            <li>
                                                <a href="#">TT PT Đại trực tràng – Tầng sinh môn</a>
                                            </li>
                                            <li>
                                                <a href="#">Trung tâm Phẫu Thuật Thần kinh</a>
                                            </li>
                                            <li>
                                                <a href="#">Viện Chấn thương Chỉnh Hình</a>
                                            </li>
                                            <li>
                                                <a href="#">Ngân hàng mô</a>
                                            </li>
                                            <li>
                                                <a href="#">Trung tâm Tim mạch và Lồng ngực</a>
                                            </li>
                                        </div>

                                        <div class="can-lamsang">
                                            <p>Cận lâm sàng</p>
                                            <li>
                                                <a href="#">Khoa Nội soi</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Dược</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Giải phẫu bệnh</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Sinh hóa</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Truyền máu</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Vi sinh</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Xét nghiệm Huyết học</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Kiểm soát Nhiễm khuẩn</a>
                                            </li>
                                            <li>
                                                <a href="#">Khoa Dinh dưỡng</a>
                                            </li>
                                            <li>
                                                <a href="#">Nhà thuốc</a>
                                            </li>
                                            <li>
                                                <a href="#">TT Chẩn đoán hình ảnh và Y học hạt nhân</a>
                                            </li>
                                        </div>

                                    </ul>
                                </li>

                                <li id="menu-item-890" class="menu-item-890">
                                    <a href="#">
                                        PHÒNG BAN
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="#">Phòng Tổ chức cán bộ</a>
                                        </li>

                                        <li>
                                            <a href="#">Phòng Kế hoạch tổng hợp</a>
                                        </li>

                                        <li>
                                            <a href="#">Phòng Tài chính kế toán</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Kiểm toán nội bộ</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Hành chính</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Quản trị</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Vật tư- Thiết bị Y tế</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Nghiên cứu khoa học</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Công nghệ thông tin</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Điều dưỡng</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Y tế cơ quan</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Công tác xã hội</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Quản lý Chất lượng</a>
                                        </li>
                                        <li>
                                            <a href="#">TT Đào tạo và Chỉ đạo tuyến</a>
                                        </li>
                                        <li>
                                            <a href="#">Phòng Hợp tác quốc tế</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-012" class="menu-item-012">
                                    <a href="#expert">
                                        ĐỘI NGŨ CHUYÊN GIA
                                        <i></i>
                                        
                                    </a>
                                </li>

                                <li id="menu-item-987" class="menu-item-987">
                                    <a href="#">
                                        QUY TRÌNH KHÁM BỆNH
                                        <i></i>
                                        
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-987">
                                            <a href="#">Quy trình khám chuyên khoa</a>
                                        </li>

                                        <li class="menu-item-987">
                                            <a href="#">Quy trình cấp cứu</a>
                                        </li>

                                        <li class="menu-item-987">
                                            <a href="#">Quy trình khám bệnh theo yêu cầu</a>
                                        </li>
                                    </ul>
                                </li>

                                <li id="menu-item-654" class="menu-item-654">
                                    <a href="#medical-tourism">
                                        LỊCH KHÁM BỆNH
                                        <i></i>
                                        
                                    </a>
                                </li>

                                <li id="menu-item-321" class="menu-item-321">
                                    <a href="javascript:void(0)">
                                        BẢNG GIÁ DỊCH VỤ
                                        <i></i>
                                    </a>
                                </li>

                                <div class="line"></div>

                            </ul>

                        </div>

                    </div>

                </nav>
                

            </div>
            

        </div>
        <div class="clear"></div>
        <div class="data_service">
        <div id="show_service">
            <h2>Bảng giá dịch vụ</h2>
            <div class="scoll_bar styled-scrollbars">
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
            <div class="close">
                <i class="fa fa-times"></i>
            </div>
        </div>
    </div>
        <!-- end header -->

        <!-- start content -->

        <div class="content">

            <div class="slider">

                <img src="./assets/img/slider/slide1.jpg" alt="">
                <img src="./assets/img/slider/slide2.jpg" alt="">
                <img src="./assets/img/slider/slde3.jpg" alt="">
                <img src="./assets/img/slider/slide4.jpg" alt="">
                <img src="./assets/img/slider/slide6.jpg" alt="">

            </div>

            <div id="news" class="news">

                <div class="container">

                    <div class="title-section">
                        <h2>TIN TỨC</h2>
                        <span></span>
                        <p>Những tin tức được cập nhập hàng ngày</p>
                    </div>
                    <div class="news-content">

                        <div class="item-news">

                            <div class="title-item-news">
                                <span></span>
                                <h4>
                                    <a href="#">TIN TỨC - SỰ KIỆN</a>
                                </h4>
                                <span></span>
                            </div>
                            <div class="primary-item-news">
                                <a href="./assets/news/tintuc.pdf">
                                    <img src="./assets/img/img-news/tintuc.jpg" alt="">
                                </a>
                                <div class="primary-item-news-height">
                                    <h3>
                                    <a href="./assets/news/tintuc.pdf">
                                        <strong>Sức khỏe tâm thần và tâm lý xã hội của trẻ em và thanh niên tại một số tỉnh và thành phố ở Việt Nam</strong>
                                    </a>
                                    </h3>
                                    <p>Mặc dù tỷ lệ mắc các vấn đề sức khỏe tâm 
                                        thần được báo cáo trong các nghiên cứu 
                                        tài liệu có sẵn là tương đối thấp, quan 
                                        điểm chung cho rằng vấn đề sức khỏe 
                                        tâm thần và tâm lý xã hội đều đang gia 
                                        tăng ở Việt Nam, đặc biệt trong trẻ em và 
                                        thanh thiếu niên...</p>
                                </div>
                                <div class="detail">
                                    <a href="./assets/news/tintuc.pdf">Chi tiết</a>
                                </div>
                            </div>

                        </div>

                        <div class="item-news">

                            <div class="title-item-news">
                                <span></span>
                                <h4>
                                    <a href="#">ĐÀO TẠO - NCKH</a>
                                </h4>
                                <span></span>
                                
                            </div>

                            <div class="primary-item-news">
                                <a href="./assets/news/NCKH.pdf">
                                    <img src="./assets/img/img-news/nckh.jpg" alt="">
                                </a>
                                <div class="primary-item-news-height">
                                    <h3>
                                    <a href="./assets/news/NCKH.pdf">
                                        <strong>Kết quả phẫu thuật u màng não góc cầu - tiểu não bằng đường mổ sau xoang xích ma</strong>
                                    </a>
                                    </h3>
                                    <p>U màng não góc cầu-tiểu não là u thường gặp thứ hai ở vùng góc cầu-tiểu não, chiếm 6 - 15% u vùng này. 
                                        Phẫu thuật lấy toàn bộ u màng não góc cầu-tiểu não là thách thức lớn. Mục tiêu của nghiên cứu là đánh giá kết 
                                        quả phẫu thuật u màng não góc cầu - tiểu não....</p>
                                </div>
                                <div class="detail">
                                    <a href="./assets/news/NCKH.pdf">Chi tiết</a>
                                </div>
                            </div>
                            
                        </div>

                        <div class="item-news">

                            <div class="title-item-news">
                                <span></span>
                                <h4>
                                    <a href="#">GÓC TỪ THIỆN</a>
                                </h4>
                                <span></span>
                            </div>
                            <div class="primary-item-news">
                                <a href="./assets/news/tuthien.pdf">
                                    <img src="./assets/img/img-news/tuthien.jpg" alt="">
                                </a>
                                <div class="primary-item-news-height">
                                    <h3>
                                    <a href="./assets/news/tuthien.pdf">
                                    <strong>Nhận thức của người dân về hoạt động từ thiện và khả năng gây quỹ của tổ chức phi chính phủ tại Việt Nam</strong>
                                    </a>
                                    </h3>
                                    <p>Nghiên cứu này được thực hiện nhằm đáp ứng nhu cầu xây 
                                        dựng các chiến lược nhằm đa dạng hóa nguồn tài trợ của các 
                                        tổ chức phi chính phủ Việt Nam trong thời kỳ chuyển đổi. 
                                        Khi thu nhập bình quân của người dân Việt Nam đạt mức 
                                        trung bình thấp vào năm 2010,....</p>
                                </div>
                                <div class="detail">
                                    <a href="./assets/news/tuthien.pdf">Chi tiết</a>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>


            <div class="services">

                <a href="#">
                    <img src="./assets/img/backgroud.jpg" alt="">
                </a>

            </div>

            <div class="booking">

                <div class="container">

                    <div class="item-booking">
                        <div class="radius">
                            <a href="#">
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </a>
                        </div>
                        <h2>
                            <a href="#">Từ thiện</a>
                        </h2>
                        <span></span>
                        <p>
                        Cứu trợ ngay hôm nay, hy vọng ngày mai. Mỗi hành động nhỏ là một bước lớn về phía trước.
                        </p>
                        <div class="detail">
                            <a href="#">Chi tiết</a>
                        </div>
                    </div>

                    <div class="item-booking">

                        <div class="radius">
                            <a href="#">
                                <i class="fa-solid fa-address-card"></i>
                            </a>
                        </div>
                        <h2>
                            <a href="#">Đăng ký khám</a>
                        </h2>
                        <span></span>
                        <p>
                            Đặt lịch khám bệnh trực tuyến, khách hàng chủ động chọn thời gian và không cần chờ đợi lâu
                        </p>
                        <div class="detail" id="register">
                            <a href="javascript:void(0)">Đăng ký</a>
                        </div>

                        <div class="modal-booking">

                            <div class="modal-booking-container js-modal-booking-container">
                    
                                <div class="modal-booking-close js-modal-booking-close">
                                    <i class="fa fa-times"></i>
                                </div>
                    
                                <header class="modal-booking-header">
                                    <i class="fa-solid fa-address-card modal-booking-icon"></i>
                                    Thông tin đăng ký
                                </header>
                    
                                <form class="modal-booking-body" action="./booking.php" method="post">
                    
                                    <div class="information">
                                        <label for="username" class="modal-label">
                                            Họ và tên
                                        </label>
                        
                                        <input type="text" id="username" name="username" class="modal-input" placeholder="">
                                    </div>
                    
                                    <div class="information">
                                        <label for="birthday" class="modal-label">
                                            Ngày sinh
                                        </label>
                        
                                        <input type="date" id="birthday" name="birthday" class="modal-input" placeholder="">
                                    </div>
                                    
                                    <div class="information">
                                        <label for="phone" class="modal-label">
                                            Số điện thoại
                                        </label>
                        
                                        <input type="text" id="phone" name="phone" class="modal-input" placeholder="">
                                    </div>

                                    <div class="information">
                                        <label for="address" class="modal-label">
                                            Địa chỉ
                                        </label>
                        
                                        <input type="text" id="address" name="address" class="modal-input" placeholder="">     
                                    </div>

                                    

                                    <div class="information">
                                        <div class="gender">
                                            <label for="" class="modal-label">Giới tính</label>
                                            <div class="child-gender">
                                                <label for="boy">Nam</label>
                                                <input type="radio" name="gender" id="boy" value="Nam">
                                            </div>
                                            <div class="child-gender">
                                                <label for="girl">Nữ</label>
                                                <input type="radio" name="gender" id="girl" value="Nữ">
                                            </div>
                                            <div class="child-gender">
                                                <label for="another">Khác</label>
                                                <input type="radio" name="gender" id="another" value="Khác">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="information">
                                        <button id="register" name="register">
                                            Đăng ký
                                        </button>     
                                    </div>
                                </form>
                            </div>
                    
                        </div>
                    </div>
                    <div class="item-booking">

                        <div class="radius">
                            <a href="#">
                                <i class="fa fa-user"></i>
                            </a>
                        </div>
                        <h2>
                            <a href="#">Tìm kiếm bác sĩ</a>
                        </h2>
                        <span></span>
                        <p>
                            Tìm kiếm bác sĩ theo yêu cầu - trong danh sách đội ngũ những chuyên gia của chúng tôi 
                        </p>
                        <div class="detail" id="search_doctor">
                            <a href="#expert">Chi tiết</a>
                        </div>
                    </div>

                </div>

            </div>
            <div id="medical-tourism"  class="medical-tourism">

                <div class="container">

                    <div class="title-medical-tourism">

                        <div class="title-medical-tourism-date">

                            <p class="tourism-date-first">
                                01
                            </p>

                            <div class="tourism-date-last">
                                <p class="last1">
                                    THỨ 4
                                </p>
                                <p class="last2">
                                    THÁNG 3
                                </p>
                            </div>

                        </div>

                        <div class="title-medical-tourism-text">
                            <h3>LỊCH KHÁM BỆNH THEO YÊU CẦU</h3>
                            <p>Lịch khám chữa bệnh hàng tuần của các chuyên gia - bác sĩ tại bệnh viện</p>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="primary-medical-tourism">

                        <div class="calendar styled-scrollbars">

                            <div class="item-calendar">

                                <div class="title-item-calendar">
                                    <h3>LỊCH KHÁM CHỮA BỆNH</h3>
                                </div>

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

                                <!-- <div class="detail">
                                    <a href="#">Xem thêm</a>
                                </div> -->

                            </div>

                        </div>

                        <div class="banner-calender">

                            <div class="gratefull">

                                <h3>Góc tri ân</h3>

                                <div class="slider-gratefull">

                                    <div class="bx-wraper">
                                        <ul class="bx-slider">
                                            <li>
                                                <div class="gratefull-text">
                                                    <p>Gia đình cố bệnh nhân Nguyễn Văn Bình xin gửi tới toàn bộ các bác 
                                                        sĩ, y tá, anh chị em điều dưỡng và hộ lý đang công tác và làm 
                                                        việc trực tiếp tại khoa Thần kinh 3 lời cảm 
                                                        ơn đặc biệt chân thành và sâu sắc nhất. Trong suốt thời gian điều 
                                                        trị ở khoa, bệnh nhân luôn nhận được sự chăm sóc đặc biệt và cảm 
                                                        nhận rõ sự thân thiện, tình cảm của mọi người dành cho gia đình 
                                                        chúng tôi cho đến tận cuối cùng.
                                                        Thay mặt gia đình, xin một lần nữa cảm ơn khoa và kính chúc tất cả 
                                                        các bác sĩ và anh chị em đang công tác luôn là các chiến sĩ thầm 
                                                        lặng trong công cuộc cứu người, luôn mạnh khỏe bình an và hạnh phúc.</p>
                                                    <p class="patient">Người bệnh bày tỏ lòng biết ơn đến các chiến sĩ thầm lặng trong công 
                                                        cuộc cứu người</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <div class="new-document">
                                <i class="fa fa-file-text"></i>
                                <div class="new-document-text">
                                    <a href="#">
                                        <h4>BẢNG GIÁ DỊCH VỤ</h4>
                                    </a>
                                </div>  
                            </div>

                            <div class="graduce">
                                <img src="./assets/img/slider/banner1.jpg" alt="">
                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear"></div>

            </div>

            <div id="expert" class="expert">

                <div class="container" id="expert">

                    <div class="title-section">

                        <h2>Đội ngũ chuyên gia</h2>
                        <span></span>
                        <p>Cùng gặp gỡ và tìm hiểu về đội ngũ chuyên gia hàng đầu và giàu kinh nghiệm tại bệnh viện</p>

                    </div>

                    <div class="clear"></div>

                    <div class="expert-container">

                        <div class="bx-viewport styled-scrollbars">

                            <ul class="list-doctor">

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs1.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>Ths.</span>
                                                Vũ Trường Thịnh
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Bác sĩ Trung tâm Gây mê Hồi sức Ngoại khoa</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs2.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>BSCKII</span>
                                                Nguyễn Văn Đừng
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Phó Chánh Văn phòng Trung tâm Đào tạo và Chỉ đạo tuyến, Trưởng phòng Công tác sinh viên, Khảo thí và Đảm bảo chất lượng, Trường Cao đẳng Y tế và Thiết bị</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs3.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>THS.BS</span>
                                                Vũ Nguyễn Hà Ngân
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Bác sĩ Trung tâm Gây mê Hồi sức Ngoại khoa</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs4.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>BS</span>
                                                Nguyễn Thu Trang
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Bác sĩ khoa Thận lọc máu</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs5.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>THS. BS.</span>
                                                Trịnh Văn Hà
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Bác sĩ Khoa Điều trị theo yêu cầu</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                                <li class="item-expext">

                                    <div class="item-expext-img">

                                        <a href="#">
                                            <img src="./assets/img/doctor/bs6.jpg" alt="">
                                        </a>

                                    </div>

                                    <div class="name-doctor">

                                        <a href="#">
                                            <p>
                                                <span>ThS.</span>
                                                Tạ Thị Ánh Ngọc
                                            </p>
                                        </a>

                                    </div>

                                    <div class="item-expect-text">

                                        <h4>
                                            <a href="#">Bác sĩ Trung tâm Gây mê và Hồi sức ngoại khoa</a>
                                        </h4>

                                    </div>

                                    <div class="clear"></div>

                                </li>

                            </ul>

                        </div>

                    </div>
                </div>


            </div>

            <div class="clear"></div>

        </div>

        <!-- end content -->

        <!-- start footer -->
        <div class="footer">

            <div class="container">

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

                <div class="clear"></div>

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

        <div class="clear"></div>

    </div>    

        <!-- end footer -->  


    <!-- start login -->

    <div class="modal">

        <div class="modal-container js-modal-container">

            <div class="modal-close js-modal-close">
                <i class="fa fa-times"></i>
            </div>

            <header class="modal-header">
                <i class="modal-icon fa fa-sign-in"></i>
                Login
            </header>

            <form class="modal-body" action="./signIn.php" method="post">

                <label for="username" class="modal-label">
                    Username
                </label>

                <input type="text" id="username" name="username" class="modal-input" placeholder="Enter your username">

                <label for="password" class="modal-label">
                    Password
                </label>

                <input type="password" id="password" name="password" class="modal-input" placeholder="Enter your password">

                <button id="enter-login">
                    Enter 
                </button>
            </form>

            <footer class="modal-footer">
                <p class="modal-help">Need <a href="">help</a></p>
            </footer>

        </div>

    </div>

    
    <!-- end login -->

      <script src="./js/main.js"></script>
</body>
</html>