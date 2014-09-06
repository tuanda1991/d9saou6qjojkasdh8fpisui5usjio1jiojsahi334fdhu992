/*prefix in file is "fgp_"*/
-- create table fgp_page_roles(
-- 	id INT NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255) NOT NULL,
-- 	short_url VARCHAR(255),
-- 	PRIMARY KEY(id)
-- )
--  ENGINE = InnoDB
--  DEFAULT CHARACTER SET = utf8
--  COLLATE = utf8_unicode_ci;
-- 
-- create table fgp_user_groups (
-- 	id INT  NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255) NOT NULL,
-- 	level INT,
-- 	can_delete INT,
-- 	PRIMARY KEY(id)
-- )
--  ENGINE = InnoDB
--  DEFAULT CHARACTER SET = utf8
--  COLLATE = utf8_unicode_ci;

create table fgp_users (
	id INT  NOT NULL AUTO_INCREMENT,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	user_group_id int NOT NULL,
	full_name varchar(255) NOT NULL,
	phone varchar(15),
	birthday datetime,
	gender int NOT NULL,
	is_delete int NOT NULL,
	PRIMARY KEY(id)        
--         ,CONSTRAINT FOREIGN KEY (user_group_id) REFERENCES fgp_user_groups(id)
)
 ENGINE = InnoDB
 DEFAULT CHARACTER SET = utf8
 COLLATE = utf8_unicode_ci;

-- create table fgp_user_groups_page_roles (
-- 	id INT  NOT NULL AUTO_INCREMENT,
-- 	page_role_id int NOT NULL,
-- 	user_group_id int NOT NULL,
-- 	is_del int NOT NULL,
-- 	is_create int NOT NULL,
-- 	is_edit int NOT NULL,
-- 	is_view int NOT NULL,
-- 	is_export int NOT NULL,
-- 	PRIMARY KEY(id),        
--         CONSTRAINT FOREIGN KEY (user_group_id) REFERENCES fgp_user_groups(id),        
--         CONSTRAINT FOREIGN KEY (page_role_id) REFERENCES fgp_page_roles(id)
-- )
--  ENGINE = InnoDB
--  DEFAULT CHARACTER SET = utf8
--  COLLATE = utf8_unicode_ci;

create table fgp_users_page_roles(
	id INT  NOT NULL AUTO_INCREMENT,
	page_role_id int NOT NULL,
	user_id int NOT NULL,
	is_del int NOT NULL,
	is_create int NOT NULL,
	is_edit int NOT NULL,
	is_view int NOT NULL,
	is_export int NOT NULL,
	PRIMARY KEY(id)       
--         ,CONSTRAINT FOREIGN KEY (page_role_id) REFERENCES fgp_page_roles(id),        
--         CONSTRAINT FOREIGN KEY (user_id) REFERENCES fgp_users(id)
)
 ENGINE = InnoDB
 DEFAULT CHARACTER SET = utf8
 COLLATE = utf8_unicode_ci;

insert into fgp_users(email,password,user_group_id,full_name,phone,birthday,gender,is_delete)
values('tuanda@fingerprint.com.vn',MD5('123abc'),1,'Do Anh Tuan','0963851607','1991/09/20','1',0);

