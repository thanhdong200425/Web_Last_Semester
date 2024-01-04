----------------------------------------------------
------------// INSERT TO SONGS TABLE //-------------
----------------------------------------------------
INSERT INTO `songs`(`song_name`, `cover_photo`, `lyric`, `duration`, `path`) VALUES 
('Chỉ một đêm nữa thôi','ChiMotDemNuaThoi.jpg','','','ChiMotDemNuaThoi.mp3'),
('Chạy về khóc với anh','ChayVeKhocVoiAnh.jpg','','','ChayVeKhocVoiAnh.mp3'),
('Chìm sâu','ChimSau.jpg','','','ChimSau.mp3'),
('Closer','Closer.jpg','','','Closer.mp3'),
('Đã từng vô giá','DaTungVoG.jpg','','','DaTungVoGia.mp3'),
('Day dứt nỗi đau','DayDutNoiDau.jpg','','','DayDutNoiDau.mp3'),
('Đi để trở về','DiDeTroVe.jpg','','','DiDeTroVe.mp3'),
('Đông Kiếm Em','DongKiemEm.jpg','','','DongKiemEm.mp3'),
('Dont Let Me Down','DontLetMeDown.jpg','','','DontLetMeDown.mp3'),
('Đưa em về nhà','DuaEmVeNha.jpg','','','DuaEmVeNha.mp3'),
('Exs Hate Me 2','ExsHateMe2.jpg','','','ExsHateMe2.mp3'),
('Gene','','','Gene.jpg','Gene.mp3'),
('Hết Thương Cạn Nhớ','HetThuongCanNho.jpg','','','HetThuongCanNho.mp3'),
('Hit Me Up','HitMeUp.jpg','','','HitMeUp.mp3'),
('Hơn Cả Yêu','HonCaYeu.jpg','','','HonCaYeu.mp3');


----------------------------------------------------
------------// INSERT TO SINGER TABLE //-------------
----------------------------------------------------

INSERT INTO `singers`(`singer_name`, `stage_name`, `country`, `dob`, `cover_photo`, `short_description`, `gender`) VALUES 
('Nguyễn Đức Phúc','Đức Phúc','Việt Nam','1997-10-13','DucPhuc_avt',' Anh là một nam ca sĩ người Việt Nam. Anh được khán giả biết đến rộng rãi với tư cách quán quân của mùa thứ ba trong Giọng hát Việt.','Nam'),
('Nghiêm Vũ Hoàng Long','RPT MCK','Việt Nam','1999-03-02','MCKeyy_avt','Được biết đến với nghệ danh MCK, RPT MCK, Nger, hay Ngơ (khi còn theo đuổi thể loại nhạc indie) là một nam rapper, ca sĩ kiêm sáng tác nhạc người Việt Nam.','Nam'),
('Đoàn Thế Lân','greyD','Việt Nam','2000-12-11','greyD_avt',' anh chàng Gen Z sở hữu cho mình khả năng chơi nhạc cụ thuần thục cùng với giọng ca ấm áp đặc biệt hơn là anh còn có khả năng sáng tác nhạc tốt và vẻ ngoài nam tính.','Nam'),
('Trần Phương Ly','Phương Ly','Việt Nam','1990-10-28','PhuongLy_avt','Cô bắt đầu nổi danh với vai trò là một nhân vật nổi tiếng trên mạng xã hội, sau đó hoạt động với tư cách là một nghệ sĩ âm nhạc và nhanh chóng nhận về những thành công lớn.','Nữ'),
('Justine Drew Bieber','Justine Bieber','Canada','1994-3-1','JustinBieber_avt','Được coi là một biểu tượng nhạc pop, anh được công nhận về nghệ thuật kết hợp thể loại và tầm ảnh hưởng toàn cầu trong âm nhạc đại chúng hiện đại','Nam'),
('Lê Nguyễn Trung Đan','Binz','Việt Nam','1988-05-24','Binz_avt1','Binz Da Poet, Anh là một nam rapper kiêm nhạc sĩ sáng tác ca khúc người Việt Nam.','Nam'),
('Hoàng Thái Vũ','Vũ','Việt Nam','1995-10-03','Vu_avt','Anh thường được biết đến với nghệ danh Vũ (cách điệu là Vũ.), là một nam ca sĩ kiêm nhạc sĩ sáng tác Nhạc indie người Việt Nam.','Nam'),
('Charles Otto "Charlie" Puth Jr.','Charlie Puth','Mỹ','1991-12-02','CharliePuth_avt','Sự xuất hiện đầu tiên của anh ấy đến từ sự thành công lan truyền của các bản cover bài hát được tải lên YouTube ','Nam'),
('Lê Trung Thành','Erik','Việt Nam','1997-10-13','Erik_avt1',' Erik là một nam ca sĩ kiêm vũ công người Việt Nam. Anh từng tham gia chương trình Giọng hát Việt nhí năm 2013 và sau đó trở thành thành viên của nhóm nhạc Monstar.','Nam'),
('The Chainsmokers','The Chainsmokers','Mỹ','1997-02-02','TheChainsmokers_avt',' The Chainsmokers là bộ đôi DJ/nhà sản xuất/nhạc sĩ ở New York, Mỹ bao gồm hai thành viên chính Andrew Taggart (sinh năm 1989), Alex Pall (sinh năm 1985).','Nam'),
('Vương Quốc Tuấn','Mr Siro','Việt Nam','1982-11-18','MrSiro_avt',' Ngoài sáng tác và tự trình bày thành công các ca khúc của mình, Mr. Siro còn sáng tác tác phẩm cho những ca sĩ trẻ khác, tạo nên những thành công cho họ','Nam'),
('Nguyễn Huỳnh Sơn','Soobin Hoàng Sơn','Việt Nam','1992-09-10','SoobinHoangSon_avt',' Anh là một trong số ít nam ca sĩ tại Việt Nam có khả năng thể hiện được nhiều dòng nhạc và kĩ năng trình diễn sân khấu nổi bật.','Nam'),
('Trần Thiện Thanh Bảo','B Ray','Việt Nam','1993-11-10','Bray_avt','B Ray từng là 1 rapper chuyên nghiệp của Underground Việt Nam. Anh có lối dùng skill độc đáo, đa dạng và điêu luyện.','Nam');


----------------------------------------------------
------------// INSERT TO SONG_SINGER TABLE //-------------
----------------------------------------------------

INSERT INTO `song_singers`(`song_id`, `singer_id`) VALUES
    ('1','2'),
    ('2','9'),
    ('3','2'),
    ('4','10'),
    ('5','11'),
    ('6','11'),
    ('7','12'),
    ('8','7'),
    ('9','10'),
    ('10','3'),
    ('11','13'),
    ('12','6'),
    ('13','1'),
    ('14','6'),
    ('15','1');

    

----------------------------------------------------
------------// INSERT TO ALBUM TABLE //-------------
----------------------------------------------------

INSERT INTO `albumns`(`albumn_id`, `albumn_name`, `number_songs`, `cover_photo`, `short_description`) VALUES
('1','Ái','3','uploads/Ai_album','Với dòng nhạc R&B đầy cuốn hút và tập trung khai thác chủ đề tình yêu, tlinh mang đến cho khán giả những ca khúc mang thông điệp vừa quen thuộc nhưng cũng vừa mới lạ từ chính những quan niệm độc đáo và mới mẻ của riêng cô.'),
('2','99%','4','uploads/99%_album','Cái tên 99% là sự không hoàn hảo. Dù mình làm cái gì, cố gắng đến đâu thì cũng chỉ đến được 99% mà thôi'),
('3','Best of 2023','3','uploads/best_album','Trong thời điểm hỗn loạn, âm nhạc có thể là nơi giải thoát hoặc an ủi'),
('4','Love is so sweet','3','uploads/love_album','Bất kể tình trạng mối quan hệ của bạn như thế nào, thật khó để không đánh giá cao một bản tình ca ngọt ngào.');


----------------------------------------------------
------------// INSERT TO ALBUM_SONGS TABLE //-------------
----------------------------------------------------
INSERT INTO `albumn_songs`(`albumn_id`, `song_id`) VALUES 
    ('1','10'),
    ('1','8'),
    ('2','1'),
    ('2','3'),
    ('2','12'),
    ('2','11'),
    ('3','13'),
    ('3','5'),
    ('3','6'),
    ('4','4'),
    ('4','14'),
    ('4','15');


----------------------------------------------------
------------// INSERT TO TYPE_OF_SONG TABLE //-------------
----------------------------------------------------

INSERT INTO `types_of_song`(`type_id`, `type_name`) VALUES 
('1','Pop'),
('2','Rap'),
('3','Ballad'),
('4','EDM'),
('5','US/UK');



----------------------------------------------------
------------// INSERT TO TYPE_SONGS TABLE //-------------
----------------------------------------------------

INSERT INTO `type_songs`(`type_id`, `song_id`) VALUES 
('1','1'),
('1','3'),
('1','7'),
('1','8'),
('1','10'),
('1','11'),
('1','12'),
('1','14'),
('2','1'),
('2','3'),
('2','4'),
('2','11'),
('2','12'),
('2','14'),
('3','2'),
('3','5'),
('3','6'),
('3','8'),
('3','10'),
('3','13'),
('3','15'),
('4','4'),
('4','9'),
('5','4'),
('5','12'),
('5','9');
