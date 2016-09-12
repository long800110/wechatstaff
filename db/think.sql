-- 数据表

-- 员工基本信息
CREATE TABLE tb_staff(
id INT NOT NULL AUTO_INCREMENT,
pwid VARCHAR( 10 ) NOT NULL ,
name VARCHAR( 30 ) NOT NULL ,
department VARCHAR( 30 ) NOT NULL ,
cost_centre VARCHAR( 30 ) NOT NULL ,
status INT NOT NULL DEFAULT 0,
PRIMARY KEY (  ID )
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_staff` ADD UNIQUE (`pwid`);

-- 微信用户信息
CREATE TABLE tb_wechat_user(
 id int not null AUTO_INCREMENT,
 open_id CHAR(50) NOT NULL,
 nickname CHAR (30) ,
 head_img_url CHAR (255) ,
 status int NOT NULL DEFAULT 0,
 PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_wechat_user` ADD UNIQUE (`open_id`);

-- 微信用户与员工关联 
CREATE TABLE tb_rel_user_staff(
	id int not null AUTO_INCREMENT,
	open_id CHAR(50) NOT NULL,
	pwid VARCHAR( 10 ) NOT NULL ,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;


-- 角色
CREATE TABLE tb_role(
 id int not null AUTO_INCREMENT,
 role_cd CHAR(30) NOT NULL,
 description TEXT,
 status int NOT NULL DEFAULT 0,
 PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_role` ADD UNIQUE (`role_cd`);

-- 员工与角色关联 
CREATE TABLE tb_rel_staff_role(
	id int not null AUTO_INCREMENT,
	staff_id INT NOT NULL,
	role_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

-- 功能
CREATE TABLE tb_function(
 id int not null AUTO_INCREMENT,
 function_cd CHAR(30) NOT NULL,
 description TEXT ,
 status int NOT NULL DEFAULT 0,
 PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_function` ADD UNIQUE (`function_cd`);

-- 角色与功能关联 
CREATE TABLE tb_rel_role_function(
	id int not null AUTO_INCREMENT,	
	role_id INT NOT NULL,
	function_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

-- 二维码
create table tb_qrcode(
 id INT(11) NOT NULL AUTO_INCREMENT,
 scene_id  INT(11) NOT NULL,
 action_name varchar (20) NOT NULL,
 expire_seconds INT(11),
 ticket varchar (200) NOT NULL,
 scan_result varchar(200) NOT NULL,
 -- scan_limit为保留字段，用于设置扫描限制，如，一天只能扫一次，一天能扫多次，永久只能扫一次，等。
 -- 当前没用上，当前的设置是一天允许扫一次。
 scan_limit varchar (30),
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_qrcode` ADD UNIQUE (`scene_id`);

-- 二维码与功能关联 
CREATE TABLE tb_rel_qrcode_function(
	id int not null AUTO_INCREMENT,	
	qrcode_id INT NOT NULL,
	function_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;


-- 办公大楼

CREATE TABLE tb_building(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR( 30 ) NOT NULL ,
description TEXT ,
status INT NOT NULL DEFAULT 0,
PRIMARY KEY (  ID )
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_building` ADD UNIQUE (`name`);

-- 楼层

CREATE TABLE tb_floor(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR( 30 ) NOT NULL ,
description TEXT ,
status INT NOT NULL DEFAULT 0,
PRIMARY KEY (  ID )
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_floor` ADD UNIQUE (`name`);

-- 工位

CREATE TABLE tb_seat(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR( 30 ) NOT NULL ,
description TEXT ,
status INT NOT NULL DEFAULT 0,
PRIMARY KEY (  ID )
) ENGINE = INNODB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_seat` ADD UNIQUE (`name`);


-- 办公大楼与楼层关联 
CREATE TABLE tb_rel_building_floor(
	id int not null AUTO_INCREMENT,	
	building_id INT NOT NULL,
	floor_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

-- 楼层与工位关联 
CREATE TABLE tb_rel_floor_seat(
	id int not null AUTO_INCREMENT,	
	floor_id INT NOT NULL,
	seat_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;


-- 楼层与工位关联 
CREATE TABLE tb_rel_floor_seat(
	id int not null AUTO_INCREMENT,	
	floor_id INT NOT NULL,
	seat_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

-- 二维码与该二维码的扫描目标关联表，这个目标是系统支持的各种对象，可能是一个工位，也可能是一次培训或志愿者活动，取决于function的定义
-- 这样的设计主要是考虑到整个系统功能模块的扩展
-- 这部分需要在添加新的功能模块时由BOA用户和程序员共同完成
-- 感觉这个表的定义还有优化的空间 

CREATE TABLE tb_rel_qrcode_target(
	id int not null AUTO_INCREMENT,	
	qrcode_id INT NOT NULL,
	target_id INT NOT NULL,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;

-- 扫描二维码记录表
CREATE TABLE tb_scan_record(
	id int not null AUTO_INCREMENT,	
	pwid VARCHAR( 10 ) NOT NULL ,
	qrcode_id INT NOT NULL,
	scan_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
) ENGINE = INNODB DEFAULT CHARSET=utf8;


-- 视图

-- user-staff
CREATE VIEW vw_user_staff AS SELECT a.open_id, a.nickname, a.head_img_url, c.pwid, c.name 
from tb_wechat_user a, tb_rel_user_staff b, tb_staff c where a.open_id = b.open_id and c.pwid = b.pwid;

-- building-floor-seat
CREATE VIEW vw_building_floor_seat AS 
select a.id as seat_id, a.name as seat_name, a.description as seat_desc, a.status as seat_status, c.id as floor_id, c.name as floor_name, e.id as building_id, e.name as building_name
from tb_seat a, tb_rel_floor_seat b, tb_floor c, tb_rel_building_floor d, tb_building e
where a.id = b.seat_id and c.id=b.floor_id and c.id = d.floor_id and e.id = d.building_id and c.status = 0 and e.status = 0;

-- 绑定座位和二维码

create view vw_seat_qrcode as
select a.*, b.qrcode_id as qrcode_id from vw_building_floor_seat a left join tb_rel_qrcode_target b on a.seat_id = b.target_id


-- 用户-二维码授权视图，判断该用户open_id是不是被授权访问该二维码 
CREATE VIEW vw_auth_user_qrcode AS
select a.open_id as auth_open_id, a.pwid as auth_pwid, g.qrcode_id as auth_qrcode_id from tb_rel_user_staff a, tb_staff b, tb_rel_staff_role c, 
tb_role d, tb_rel_role_function e, tb_function f, tb_rel_qrcode_function g
where a.pwid = b.pwid and b.id = c.staff_id and c.role_id = d.id and d.id = e.role_id 
and e.function_id = f.id and f.id = g.function_id 


-- 测试数据
-- staff
INSERT INTO tb_staff (pwid, name, department, cost_centre) VALUES ('1436821', 'Cui, Yuanlong', 'CBSD', '8903');
INSERT INTO tb_staff (pwid, name, department, cost_centre) VALUES ('1410382', 'Luo, Tiancheng', 'CBSD', '8903');
INSERT INTO tb_staff (pwid, name, department, cost_centre) VALUES ('1403641', 'Yan, Dora', 'CBSD', '8903');
INSERT INTO tb_staff (pwid, name, department, cost_centre) VALUES ('1403130', 'Li, Berry Ran', 'CBSD', '8903');

-- user
INSERT INTO tb_wechat_user (open_id, nickname, head_img_url) VALUES ('onuqKvy_VI1nKGG2XFlQJrN2Xf1A', '解味道人', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDG3SHzgehUeTfTLaIbMSQxvkic5alOPYteEuicbMjkpxuosrXzwLLanHqZH1nlJNQJQJLTbrpd7GXg/0');
INSERT INTO tb_wechat_user (open_id, nickname, head_img_url) VALUES ('onuqKvxaoeDZP6byY2bM0Z406pgg', 'ltiancheng', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4VKAcF1aY7Fbcr5C6yhUgkWrAuHJ6zJYEA0z2slPgcBo8Bp9qJOjglDNl71CLBPIdNpWXpEWBOpQ/0');

-- user-staff
INSERT INTO tb_rel_user_staff (open_id, pwid) VALUES ('onuqKvy_VI1nKGG2XFlQJrN2Xf1A', '1436821');
INSERT INTO tb_rel_user_staff (open_id, pwid) VALUES ('onuqKvxaoeDZP6byY2bM0Z406pgg', '1410382');

-- role
INSERT INTO tb_role (role_cd, description) VALUES ('ROLE_WECHAT_USER', 'Normal Wechat User');
INSERT INTO tb_role (role_cd, description) VALUES ('ROLE_BOA_SYS_ADMIN', 'Back Office System Admin');

-- staff-role
INSERT INTO tb_rel_staff_role (staff_id, role_id) VALUES (1, 1);
INSERT INTO tb_rel_staff_role (staff_id, role_id) VALUES (2, 2);

-- function

INSERT INTO tb_function (function_cd, description) VALUES ('FUNC_TEST_UNAUTH', 'This function is only for the un-authorization testing purpose. In fact, the function will do not assign to any roles');
INSERT INTO tb_function (function_cd, description) VALUES ('FUNC_WECHAT_SCAN_SEAT', 'This function will assing to allow user to scan QR Code on seat for daily seat utilize statistics');

-- role-function

INSERT INTO tb_rel_role_function (role_id, function_id) VALUES (1, 2);
INSERT INTO tb_rel_role_function (role_id, function_id) VALUES (2, 2);

-- qrcode
INSERT INTO tb_qrcode (scene_id, action_name, ticket, scan_result) VALUES (1, 'QR_LIMIT_SCENE', 'gQHv8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL3IwVFMyVXJsN1EyVTJJd0FFMmhhAAIEatvSVwMEAAAAAA==', 'http://weixin.qq.com/q/r0TS2Url7Q2U2IwAE2ha');
INSERT INTO tb_qrcode (scene_id, action_name, ticket, scan_result) VALUES (2, 'QR_LIMIT_SCENE', 'gQFr8ToAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL0IwUzFjQjdsbWczampTUzVkR2hhAAIEtdzSVwMEAAAAAA==', 'http://weixin.qq.com/q/B0S1cB7lmg3jjSS5dGha');
INSERT INTO tb_qrcode (scene_id, action_name, ticket, scan_result) VALUES (3, 'QR_LIMIT_SCENE', 'gQHm8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL3NVU0NEQVBsdEEzTldwTGNRMmhhAAIECt3SVwMEAAAAAA==', 'http://weixin.qq.com/q/sUSCDAPltA3NWpLcQ2ha');
INSERT INTO tb_qrcode (scene_id, action_name, ticket, scan_result) VALUES (4, 'QR_LIMIT_SCENE', 'gQEe8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL05FU3laSjNsbnczbUtSZXZjMmhhAAIEbN3SVwMEAAAAAA==', 'http://weixin.qq.com/q/NESyZJ3lnw3mKRevc2ha');
INSERT INTO tb_qrcode (scene_id, action_name, ticket, scan_result) VALUES (5, 'QR_LIMIT_SCENE', 'gQE_8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL29rU3RWTmpsaXczeXlvR1ViR2hhAAIErN3SVwMEAAAAAA==', 'http://weixin.qq.com/q/okStVNjliw3yyoGUbGha');

-- qrcode-function

INSERT INTO tb_rel_qrcode_function (qrcode_id, function_id) VALUES (1, 1);
INSERT INTO tb_rel_qrcode_function (qrcode_id, function_id) VALUES (2, 2);
INSERT INTO tb_rel_qrcode_function (qrcode_id, function_id) VALUES (3, 2);
INSERT INTO tb_rel_qrcode_function (qrcode_id, function_id) VALUES (4, 2);
INSERT INTO tb_rel_qrcode_function (qrcode_id, function_id) VALUES (5, 2);

-- building
INSERT INTO tb_building (name, description) VALUES ('MSD', 'MSD B1 at 2nd avenue, TEDA ');
INSERT INTO tb_building (name, description) VALUES ('B2', 'B2 at Tianjin University Tech Park');
INSERT INTO tb_building (name, description) VALUES ('ABP', 'E1 Buiding at Airport Business Park');

-- floor
INSERT INTO tb_floor (name, description) VALUES ('MSD-F27', '27/F, MSD');
INSERT INTO tb_floor (name, description) VALUES ('MSD-F28', '28/F, MSD');
INSERT INTO tb_floor (name, description) VALUES ('MSD-F29', '29/F, MSD');

-- seat
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-001', 'Seat 001 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-002', 'Seat 002 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-003', 'Seat 003 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-004', 'Seat 004 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-005', 'Seat 005 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-006', 'Seat 006 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-007', 'Seat 007 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-008', 'Seat 008 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-009', 'Seat 009 at 28/F, MSD');
INSERT INTO tb_seat (name, description) VALUES ('MSD-F28-010', 'Seat 010 at 28/F, MSD');

-- building-floor
INSERT INTO tb_rel_building_floor (building_id, floor_id) VALUES (1, 1);
INSERT INTO tb_rel_building_floor (building_id, floor_id) VALUES (1, 2);
INSERT INTO tb_rel_building_floor (building_id, floor_id) VALUES (1, 3);

-- floor-seat
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 1);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 2);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 3);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 4);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 5);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 6);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 7);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 8);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 9);
INSERT INTO tb_rel_floor_seat (floor_id, seat_id) VALUES (2, 10);

-- qrcode-target
-- 因为qrcode 2,3,4,5的function_id都是2，对应的function_cd是FUNC_WECHAT_SCAN_SEAT
-- 也就是说，这四张二维码都是用于扫描工位进行统计的，所以target的四个id实际上就是四个seat_id
INSERT INTO tb_rel_qrcode_target (qrcode_id, target_id) VALUES (2, 1);
INSERT INTO tb_rel_qrcode_target (qrcode_id, target_id) VALUES (3, 2);
INSERT INTO tb_rel_qrcode_target (qrcode_id, target_id) VALUES (4, 3);
INSERT INTO tb_rel_qrcode_target (qrcode_id, target_id) VALUES (5, 4);

-- 模拟扫码
INSERT INTO tb_scan_record (pwid, qrcode_id) VALUES ('1436821', 2);

