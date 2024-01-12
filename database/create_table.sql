create DATABASE KHAMCHUABENH_NHOM10;
use KHAMCHUABENH_NHOM10

CREATE TABLE IF NOT EXISTS khoa (
   `ma_khoa` int AUTO_INCREMENT,
   `ten_khoa` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
   PRIMARY KEY (`ma_khoa`)
 );
 
 
 CREATE TABLE IF NOT EXISTS chuc_vu (
   `ma_chuc_vu` int AUTO_INCREMENT,
   `ten_chuc_vu` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
   PRIMARY KEY (`ma_chuc_vu`)
   
 );
 
 CREATE TABLE IF NOT EXISTS chuyen_khoa (
   `ma_chuyen_khoa` int AUTO_INCREMENT,
   `ten_chuyen_khoa` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
   PRIMARY KEY (`ma_chuyen_khoa`)
   
 );

CREATE TABLE if NOT EXISTS users(
	id INT AUTO_INCREMENT PRIMARY key,
	ho_ten VARCHAR(50) default null,
	`ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` VARCHAR(50) DEFAULT NULL, 
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 DEFAULT 'uneti',
  ma_khoa int DEFAULT NULL,
  dia_chi varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  so_dt VARCHAR(12) DEFAULT NULL,
  ma_chuc_vu INT DEFAULT NULL ,
  `ma_chuyen_khoa` int DEFAULT NULL,
  `kinh_nghiem` VARCHAR(60) CHARACTER SET utf8mb4 DEFAULT NULL,
  `vai_tro` VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT "nhan_vien",
  FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`ma_khoa`),
  FOREIGN KEY (`ma_chuc_vu`) REFERENCES `chuc_vu` (`ma_chuc_vu`),
  FOREIGN KEY (`ma_chuyen_khoa`) REFERENCES `chuyen_khoa` (`ma_chuyen_khoa`)
);
 
 CREATE TABLE IF NOT EXISTS benh_nhan (
  ma_benh_nhan int AUTO_INCREMENT,
  ho_ten varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  ngay_sinh date DEFAULT NULL,
  gioi_tinh VARCHAR(50) DEFAULT NULL,
  dia_chi varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  so_dt VARCHAR(12) DEFAULT NULL,
  
  PRIMARY KEY (`ma_benh_nhan`)
);

CREATE TABLE IF NOT EXISTS benh (
  `ma_benh` int AUTO_INCREMENT,
  `ten_benh` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`ma_benh`)
);

CREATE TABLE if NOT EXISTS co_so_dieu_tri(
  ma_co_so int  AUTO_INCREMENT,
  dia_chi varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (ma_co_so)
);

CREATE TABLE if NOT EXISTS dich_vu(
  ma_dich_vu int AUTO_INCREMENT,
  ten_dich_vu varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  don_gia FLOAT DEFAULT NULL,
  PRIMARY KEY (ma_dich_vu)
); 
 
 CREATE TABLE IF NOT EXISTS ho_so_kham_benh (
   ma_kham_benh int AUTO_INCREMENT,
   ma_nhan_vien int DEFAULT NULL,
   ma_benh_nhan int DEFAULT NULL,
   ma_benh int DEFAULT NULL,
	ngay_kham_benh date DEFAULT NULL,
	chi_phi_kham float DEFAULT NULL,
	ma_co_so int  DEFAULT NULL,
   ngay_nhap_vien date DEFAULT NULL,
   ngay_ra_vien date DEFAULT NULL,
  PRIMARY KEY (`ma_kham_benh`),
  FOREIGN KEY (`ma_nhan_vien`) REFERENCES `users` (`id`),
  FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`),
  FOREIGN KEY (`ma_benh`) REFERENCES `benh` (`ma_benh`),
  FOREIGN KEY (`ma_co_so`) REFERENCES `co_so_dieu_tri` (`ma_co_so`)
);

CREATE TABLE if NOT EXISTS ho_so_dich_vu(
  ma_dich_vu INT DEFAULT NULL ,
  FOREIGN KEY (`ma_dich_vu`) REFERENCES `dich_vu` (`ma_dich_vu`),
  ma_kham_benh INT DEFAULT NULL ,
  FOREIGN KEY (`ma_kham_benh`) REFERENCES `ho_so_kham_benh` (`ma_kham_benh`)
); 
 
 CREATE TABLE IF NOT EXISTS thuoc (
  ma_thuoc int  AUTO_INCREMENT,
  ten_thuoc varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  don_gia float DEFAULT NULL,
  PRIMARY KEY (`ma_thuoc`)
);

CREATE TABLE IF NOT EXISTS don_thuoc (
  ma_don_thuoc int  AUTO_INCREMENT,
  ma_kham_benh int  DEFAULT NULL ,
  ma_thuoc int  DEFAULT NULL ,
  ngay_ke_don date DEFAULT NULL,
  PRIMARY KEY (`ma_don_thuoc`),
  FOREIGN KEY (`ma_thuoc`) REFERENCES `thuoc` (`ma_thuoc`),
  FOREIGN KEY (`ma_kham_benh`) REFERENCES `ho_so_kham_benh` (`ma_kham_benh`)
);

CREATE TABLE IF NOT EXISTS thuoc_trong_don_thuoc (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ma_thuoc int  DEFAULT NULL,
  ma_don_thuoc int  DEFAULT NULL,
  lieu_dung VARCHAR(50) DEFAULT NULL,
  so_luong INT DEFAULT NULL ,
  FOREIGN KEY (`ma_thuoc`) REFERENCES `thuoc` (`ma_thuoc`),
  FOREIGN KEY (`ma_don_thuoc`) REFERENCES `don_thuoc` (`ma_don_thuoc`),
  UNIQUE(ma_thuoc, ma_don_thuoc)
);

 CREATE TABLE if NOT EXISTS bao_hiem_y_te(
  so_the int  NOT NULL AUTO_INCREMENT,
  ma_benh_nhan int  NOT NULL,
  ngay_cap date DEFAULT NULL,
  ngay_het_han date DEFAULT NULL,
  PRIMARY KEY (so_the),
  FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`)
);
 
 CREATE TABLE if NOT EXISTS vien_phi(
  ma_vien_phi int  NOT NULL AUTO_INCREMENT,
  ma_benh_nhan int  NOT NULL,
  ma_kham_benh int  NOT NULL,
  ma_dich_vu int  NOT NULL,
  don_gia FLOAT DEFAULT NULL,
  ngay_thu_tien DATE DEFAULT NULL,
  PRIMARY KEY (ma_vien_phi),
  FOREIGN KEY (`ma_kham_benh`) REFERENCES `ho_so_kham_benh` (`ma_kham_benh`),
  FOREIGN KEY (`ma_dich_vu`) REFERENCES `dich_vu` (`ma_dich_vu`),
  FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`)
);

CREATE TABLE if NOT EXISTS thiet_bi(
  ma_thiet_bi int  NOT NULL AUTO_INCREMENT,
  ten_thiet_bi varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  don_gia FLOAT DEFAULT NULL,
  PRIMARY KEY (ma_thiet_bi)
);

CREATE TABLE if NOT EXISTS lich_hen(
  ma_lich_hen int  NOT NULL AUTO_INCREMENT,
  ma_benh_nhan int  NOT NULL,
  ma_nhan_vien int  NOT NULL,
  ngay_hen DATE DEFAULT NULL, 
  PRIMARY KEY (ma_lich_hen),
  FOREIGN KEY (`ma_nhan_vien`) REFERENCES `users` (`id`),
  FOREIGN KEY (`ma_benh_nhan`) REFERENCES `benh_nhan` (`ma_benh_nhan`)
);

SELECT a.ma_lich_hen, a.ma_benh_nhan, c.ho_ten AS ho_ten_benh_nhan, c.ngay_sinh, c.gioi_tinh, a.ngay_hen, b.ho_ten AS ho_ten_bac_si FROM lich_hen AS a 
INNER JOIN users AS b ON a.ma_nhan_vien = b.id
INNER JOIN benh_nhan AS c ON a.ma_benh_nhan = c.ma_benh_nhan;

SELECT * FROM users AS a INNER JOIN chuc_vu AS b ON a.ma_chuc_vu = b.ma_chuc_vu 
    INNER JOIN chuyen_khoa AS c ON c.ma_chuyen_khoa = c.ma_chuyen_khoa 
    INNER JOIN khoa AS d ON a.ma_khoa = d.ma_khoa WHERE a.vai_tro = "nhan_vien";
 
 DELETE FROM users WHERE ho_ten = "Đỗ Văn Đức" AND so_dt = "0334078025" AND vai_tro = "nhan_vien";
 