create database dbtier;

SET SQL_SAFE_UPDATES = 0;

use dbtier;

create table tbtier(
	nomor int auto_increment primary key,
	tier char(1) not null,
    nama varchar(500)
);