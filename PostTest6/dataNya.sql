create database dbtier;

SET SQL_SAFE_UPDATES = 0;

use dbtier;

create table tbtier(
	nomor int auto_increment primary key,
	tier char(1) not null,
    nama varchar(500)
);

INSERT INTO tbtier
value
(null,'S','Furina, Alhaitam, Arlecchino, Baizu, Kazuha, Kokomi, Nahida,
Neuvillette, Yelan, Zhongli, Bennet, Kuki Shinobu, Xiangling,
Xingqiu'),
(null,'A','Childe, Clorinde, Hu Tao, Jean, Kinich, Lyney, Mona, Mualani, Navia
Nilou, Raiden, Shenhe, Tignari, Xianyun, Yae Miko, Chevreuse,
Faruzan, Fischl'),
(null,'B','Albedo, Ayaka, Chiori, Emilie, Ganyu, Sigewinne, Venti, Xiao,
Wriothesley, Beidou, Charlotte, Diona, Gaming, Gorou, Rosaria, Sara,
Sucrose, Yaoyao, Yunjin'),
(null,'C','Ayato, Cyno, Dehya, Diluc, Eula, Itto, Keqing, Klee,
Traveler(dendro), Wanderer, Yoimiya, Barbara, Candace, Chongyun,
ColleiDori, Freminet, Heizou, Kachina, Kaeya, Kaveh, Kirara, Layla,
Lisa, Lynette, Mika, Ningguang, Sayu, Sethos, Thoma, Xinyan, Yanfei'),
(null,'D','Alloy, Qiqi, Traveler(anemo), Traveler(electro), Traveler(geo),
Traveler(hydro), Amber, Noelle, Razor');

create table gambar(
	ID int auto_increment primary key,
    gambar varchar(100)
);

select * from gambar;