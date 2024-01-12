use KHAMCHUABENH_NHOM10

INSERT INTO khoa (`ten_khoa`) VALUES
	('Khoa Khám bệnh đa khoa và điều trị ngoại trú'),
	('Khoa Nội'),
	('Khoa Ngoại'),
	('Khoa Phụ sản'),
	('Khoa Nhi'),
	('Khoa truyền nhiễm'),
	('Khoa Cấp cứu'),
	('Khoa Hồi sức tích cực và chống độc'),
	('Khoa Y học cổ truyền'),
	('Khoa Vật lý trị liệu - phục hồi chức năng'),
	('Khoa Ung bướu'),
	('Khoa Y học Hạt nhân'),
	('Khoa Phẫu thuật - gây mê hồi sức'),
	('Khoa Chẩn đoán hình ảnh'),
	('Khoa xét nghiệm'),
	('Khoa Giải phẫu bệnh'),
	('Khoa lọc máu'),
	('Khoa Nội soi'),
	('Khoa Thăm dò chức năng'),
	('Khoa Dược'),
	('Khoa Dinh dưỡng'),
	('Khoa Quản lý nhiễm khuẩn');
	
	INSERT INTO chuc_vu (`ten_chuc_vu`) VALUES
	('Trưởng khoa'),
	('Y tá'),
	('Điều dưỡng'),
	('Kỹ thuật viên'),
	('Nữ hộ sinh'),
	('Dược sĩ');
	
	INSERT INTO chuyen_khoa (`ten_chuyen_khoa`) VALUES
	('Ngoại Thận - Tiết niệu - Nam học'),
	('Gâ mê hồi sức'),
	('Hồi sức bệnh nhân đa chấn thương'),
	('Điều trị Sốc nhiễm trùng'),
	('Chẩn đoán xử trí Ngộ độc thuốc tê'),
	('Điều trị chấn thương ngực, ARDS'),
	('Phẫu thuật Tiêu hóa'),
	('Phẫu thuật Tụy');
	
	INSERT INTO users(ho_ten, ngay_sinh, gioi_tinh, ma_khoa, dia_chi, so_dt, ma_chuc_vu, ma_chuyen_khoa, kinh_nghiem) VALUES
	('Đỗ Văn Đức', 20021109, 'nam', 1, 'Hà Nội', '0971136925', 1, 1, '5 năm'),
	('Nguyễn Lan Anh', 20021109, 'nữ', 1, 'Hà Nội', '0971136925', 3, 1, '5 năm'),
	('Trần Văn Cường', 20021109, 'nam', 1, 'Hà Nội', '0971136925', 5, 1, '5 năm'),
	('Nguyễn Văn Sơn', 20021109, 'nam', 2, 'Hà Nội', '0971136925', 6, 1, '5 năm'),
	('Phạm Lan Anh', 20021109, 'nữ', 3, 'Hà Nội', '0971136925', 1, 5, '5 năm'),
	('Vũ Ánh Duyên', 20021109, 'nữ', 4, 'Hà Nội', '0971136925', 1, 7, '5 năm'),
	('Trần Huyền Diệp', 20021109, 'nữ', 1, 'Hà Nội', '0971136925', 1, 1, '5 năm'),
	('Lê Văn Quốc', 20021109, 'nam', 6, 'Hà Nội', '0971136925', 1, 8, '5 năm'),
	('Nguyễn Thị Ánh', 20021109, 'nữ', 7, 'Hà Nội', '0971136925', 2, 1, '5 năm'),
	('Đào Việt Anh', 20021109, 'nam', 8, 'Hà Nội', '0971136925', 4, 1, '5 năm'),
	('Trần Tiểu Vy', 20021109, 'nữ', 3, 'Hà Nội', '0971136925', 1, 7, '5 năm'),
	('Nguyễn Thanh Thủy', 20021109, 'nữ', 2, 'Hà Nội', '0971136925', 1, 3, '5 năm'),
	('Đỗ Duy Nam', 20021109, 'nam', 5, 'Hà Nội', '0971136925', 1, 3, '5 năm'),
	('Trần Hoàng Nam', 20021109, 'nam', 2, 'Hà Nội', '0971136925', 5, 1, '5 năm'),
	('Vũ Văn Kỳ', 20021109, 'nam', 6, 'Hà Nội', '0971136925', 1, 4, '5 năm');
	
	
	INSERT INTO benh_nhan (`ho_ten`, `ngay_sinh`, `gioi_tinh`,`dia_chi`, `so_dt`) VALUES
	('Phùng Văn Khang', '19760302', 'nam', 'Hưng Yên', '0945881905'),
	('Hồ Thị Hạnh', '19790502', 'nữ', 'Nam Định', '0914162689'),
	('Trần Minh Nam', '19850115', 'nam', 'Ninh Bình', '0166978869'),
	('Nguyễn Thị Ánh Hoa', '19880204', 'nữ', 'Hà Nội', '0978178764'),
	('Nguyễn Phương Anh', '19830329', 'nữ', 'Hà Nội', '0979809204'),
	('Huỳnh Thị Thoa', '19880519', 'nữ', 'Hưng Yên', '0905682529'),
	('Nguyễn Thị Hồng Hạnh', '19850912', 'nữ', 'Hải Dương', '0982725726'),
	('Đoàn Bùi Thục Đoan', '19850209', 'nữ', 'Thái Bình', '0937303282'),
	('Trịnh Thị Minh Thuần', '20001228', 'nữ', 'Hải Phòng', '0974131489'),
	('Phạm Thị Như Tú', '19821022', 'nữ', 'Hưng Yên', '0984084034'),
	('Lê Thị Xuân Hiếu', '19870708', 'nữ', 'Hưng Yên', '0977557349'),
	('Phạm Anh Duyên', '19990903', 'nam', 'Hải Phòng', '0164961671'),
	('Dương Hải Đoàn', '19851024', 'nam', 'Hưng Yên', '0127238977'),
	('Nguyễn Hữu Đoàn', '20130716', 'nam', 'Hà Nội', '0986958908'),
	('Đào Tiến Mạnh', '20010930', 'nam', 'Hà Nội', '0164812915'),
	('Nguyễn Thị Khánh Loan', '19971010', 'nam', 'Hưng Yên', '0988753023'),
	('Phạm Thị Nhàn', '19911102', 'nữ', 'Hải Phòng', '0165607715'),
	('Vũ Quang Toản', '20190614', 'nam', 'Hà Nội', '0972907579'),
	('Trần Thị Thanh Thủy', '20061103', 'nữ', 'Hải Dương', '0904054732'),
	('Nguyễn Văn Chung', '19790824', 'nam', 'Ninh Bình', '0165810287'),
	('Nguyễn Quang Nam', '19890207', 'nam', 'Hải Dương', '0976388281'),
	('Nguyễn Thùy Tiên', '19901029', 'nữ', 'Hải Dương', '0165607728');
	
	INSERT INTO benh (`ten_benh`) VALUES
	('Áp xe phổi'),
	('Bạch hầu'),
	('Bệnh cơ xương khớp'),
	('Buồng trứng đa nang'),
	('Bệnh phổi tắc nghẽn mạn tính'),
	('Bệnh cột sống'),
	('Chấn thương dây chằng đầu gối'),
	('Cơ tim phì đại'),
	('Covid-19'),
	('Đau vai'),
	('Đứt gân gót chân Achilles'),
	('Đục thủy tinh thể'),
	('Đứt dây chằng đầu gối'),
	('Giãn phế quản'),
	('Gãy xương hở'),
	('Gai khớp gối'),
	('Giãn tĩnh mạch thừng tinh'),
	('Gãy thân xương đùi'),
	('Hen suyễn'),
	('Hen phế quản'),
	('Hở van động mạch chủ'),
	('Khàn tiếng'),
	('Lao phổi'),
	('Mồ hôi máu'),
	('Nhồi máu não');
	
	INSERT INTO co_so_dieu_tri (`dia_chi`) VALUES
	('Tựu Liệt'),
	('Tân Triều'); 
	
	INSERT INTO dich_vu (`ten_dich_vu`, `don_gia`) VALUES 
	('Chẩn đoán hình ảnh', 1000000),
	('Điều trị ung bướu', 2000000),
	('Khám theo yêu cầu', 30000),
	('Phục hồi chức năng', 188000),
	('Giường bệnh', 100000),
	('Tiêm phòng', 900000);
	
	INSERT INTO ho_so_kham_benh (`ma_nhan_vien`, `ma_benh_nhan`, `ma_benh`, `ngay_kham_benh`, `chi_phi_kham`, `ma_co_so`, `ngay_nhap_vien`, `ngay_ra_vien`) VALUES
	(1, 4, 4, '20200304', 0, 1, '20200304', '20201214'),
	(2, 3, 4, '20200304', 0, 1, '20200304', '20201214'),
	(8, 5, 12, '20200304', 0, 1, '20200304', '20201214'),
	(9, 6, 11, '20200304', 0, 1, '20200304', '20201214'),
	(1, 7, 3, '20200304', 0, 2, '20200304', '20201214'),
	(10,11, 10, '20200304', 0, 2, '20200304', '20201214'),
	(7, 4, 9, '20200304', 0, 2, '20200304', '20201214'),
	(2, 5, 8, '20200304', 0, 1, '20200304', '20201214'),
	(7, 9, 5, '20200304', 0, 1, '20200304', '20201214');
	
	INSERT INTO ho_so_dich_vu (`ma_dich_vu`, `ma_kham_benh`) VALUES
	(2, 1),
	(1, 5),
	(4, 4),
	(3, 8),
	(2, 7),
	(2, 11),
	(2, 12);
	
	INSERT INTO thuoc (`ten_thuoc`, `don_gia`) VALUES
	('Levothyroxine',0),
	('Memantine',0),
	('Donepezil',0),
	('Zolpidem',0),
	('Eszopiclone',0),
	('Temazepam',0),
	('Ticagrelor',0),
	('Etonogestrel +',0),
	('Folic Acid',0),
	('Testosterone',0),
	('Tiotropium',0),
	('Roflumilast',0),
	('Buprenorphine',0),
	('Methadone',0),
	('Varenicline',0);
	
	INSERT INTO don_thuoc (`ma_kham_benh`, `ma_thuoc`, `ngay_ke_don`) VALUES
	(1, 2, 20220312),
	(2, 2, 20220313),
	(3, 4, 20220313),
	(13, 5, 20220316),
	(12, 3, 20220317),
	(11, 3, 20220321),
	(10, 7, 20220321),
	(9, 5, 20220324),
	(8, 11, 20220403);
	
	SELECT * FROM users WHERE id = 2;
	
	select * from users AS a 
	INNER JOIN chuc_vu AS b ON a.ma_chuc_vu = b.ma_chuc_vu 
   INNER JOIN chuyen_khoa AS c ON a.ma_chuyen_khoa = c.ma_chuyen_khoa 
	INNER JOIN khoa AS d ON a.ma_khoa = d.ma_khoa WHERE a.id = '3' AND a.mat_khau = 'uneti'
      
	
	INSERT INTO thuoc_trong_don_thuoc (`ma_thuoc`, `ma_don_thuoc`, `lieu_dung`, `so_luong`) VALUES
	(1, 61, '1', 1),
	(2, 62, '3', 1),
	(3, 63, '3', 1),
	(4, 64, '4', 1),
	(5, 65, '4', 1),
	(6, 66, '5', 1);
	
	INSERT INTO bao_hiem_y_te (`ma_benh_nhan`, `ngay_cap`, `ngay_het_han`) VALUES
	(1,20220301,20270301),
	(2,20220301,20270301),
	(3,20220301,20270301),
	(4,20220301,20270301),
	(5,20220301,20270301),
	(6,20220301,20270301),
	(7,20220301,20270301),
	(8,20220301,20270301),
	(9,20220301,20270301),
	(10,20220301,20270301),
	(11,20220301,20270301),
	(12,20220301,20270301),
	(13,20220301,20270301),
	(14,20220301,20270301),
	(15,20220301,20270301);
	
	INSERT INTO vien_phi (`ma_benh_nhan`, `ma_kham_benh`, `ma_dich_vu`, `don_gia`, `ngay_thu_tien`) VALUES
	(1, 13, 1, 0, '20210907'),
	(3, 11, 1, 0, '20210907'),
	(4, 4, 1, 0, '20210907'),
	(5, 1, 1, 0, '20210907'),
	(6, 5, 1, 0, '20210907'),
	(8, 6, 1, 0, '20210907'),
	(9, 7, 1, 0, '20210907'),
	(11, 2, 1, 0, '20210907'),
	(3, 10, 1, 0, '20210907'),
	(12, 8, 1, 0, '20210907'),
	(14, 9, 1, 0, '20210907'),
	(1, 6, 1, 0, '20210907'),
	(5, 5, 1, 0, '20210907');
	
	INSERT INTO thiet_bi (`ten_thiet_bi`, `don_gia`) VALUES
	('Máy X-Quang', 1000000000),
	('Máy CT Scan', 0),
	('Máy MRI', 0),
	('Máy Siêu Âm', 0),
	('Máy Thở Oxi', 0),
	('Máy phân tích khí máu', 0),
	('Máy phân tích hóa học', 0),
	('Máy phân tích điện giải', 0),
	('Máy phân tích thử nghiệm thuốc', 0),
	('Máy phân tích đông máu', 0),
	('Máy phân tích huyết học', 0),
	('Máy phân tích nước tiểu', 0),
	('Máy Realtime PCR', 0),
	('Máy tách chiết ADN', 0),
	('Máy đo huyết áp', 0);
	
	INSERT INTO lich_hen(ma_benh_nhan, ma_nhan_vien, ngay_hen) VALUES 
	(18,1,20220410),
	(19,2,20220410),
	(20,3,20220414),
	(21,4,20220415),
	(22,5,20220416),
	(1,6,20220419),
	(2,7,20220420),
	(3,8,20220503),
	(4,9,20220512),
	(5,10,20220607),
	(6,11,20220612);
	
	
	
	