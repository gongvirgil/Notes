# MySQL

Linux->MySQL:
ps -el | grep mysqld
ps -ef | grep mysql
which mysql
mysql -uroot -p

## 查看mysql版本：

	mysql> select version();
	mysql> show databases;
	mysql> use xxx;
	mysql> show tables;

## MySQL授权远程用户

	mysql> GRANT ALL PRIVILEGES ON *.* TO 'username'@'%'IDENTIFIED BY 'password' WITH GRANT OPTION; 
	mysql> GRANT ALL PRIVILEGES ON *.* TO 'username'@'ip'IDENTIFIED BY 'password' WITH GRANT OPTION; 

	mysql> FLUSH PRIVILEGES;

	mysql> show grants for username;
	mysql> show grants for username@ip;

## MySQL语句小技巧

随机数
SELECT FLOOR((RAND() * 999999));
字符串拼接
SELECT CONCAT('工号为:',FNumber,'的员工的幸福指数:',FSalary/(FAge-21));
md5加密
SELECT md5('molier');   
时间戳->date:
SELECT UNIX_TIMESTAMP('2015-05-31');
SELECT FROM_UNIXTIME(1234567890, '%Y-%m-%d %H:%i:%S');

Insert into Table2(a, c, d) select a,c,5 from Table1

设置自增起始值：
ALTER TABLE `mygame_spend_log` AUTO_INCREMENT = 1;
创建索引：
唯一键索引=》CREATE UNIQUE INDEX uid ON mygame_member_extend_info(uid);

select自增
select (@i:=@i+1) as i FROM table,(select @i:=0) as a

查询一张表不在另一表的数据
select a.* from mygame_member a where not exists (select 1 from mygame_member_extend_info b where b.uid = a.uid)

将表中数据重新排序更换ID
DROP TEMPORARY TABLE tmp;
CREATE TEMPORARY TABLE tmp SELECT * FROM `gong_city` ORDER BY province_id asc;
DELETE FROM `gong_city`;
ALTER TABLE `gong_city` AUTO_INCREMENT = 1;
INSERT INTO `gong_city`(city_name,province_id) SELECT city_name,province_id FROM tmp;


show processlist;
show full processlist;

外部IP进mysql
grant all privileges  ON *.* TO dwjs@'58.241.113.75' IDENTIFIED BY 'shdw.com';


































uc表

INSERT INTO uc_members(username,password,email,regip,regdate,lastloginip,lastlogintime,salt) SELECT username,password,'',regip,regdate,lastip,lastvisit,FLOOR((RAND() * 999999)) FROM `cdb_members` WHERE field_5 = 'molier';

INSERT INTO uc_memberfields(uid,blacklist) SELECT a.uid,'' FROM `uc_members` a LEFT JOIN `cdb_members` b ON a.username=b.username WHERE b.field_5 = 'molier';

main表
SELECT (SELECT max(uid) FROM `mygame_member`),username,nickname,'',first_pay,(@i:=@i+1) as i FROM `cdb_members`,(select @i:=0) as a WHERE field_5='molier';


INSERT INTO mygame_member(uid,username,nickname,email,frist_pay) SELECT (SELECT max(uid) FROM `mygame_member`),username,nickname,'',first_pay FROM `cdb_members` WHERE field_5='molier';

INSERT INTO mygame_member_extend_info(uid,register_ip,register_time,lastlogin_ip,lastlogin_time,total_channels,sub_channels,gid,sid) SELECT b.uid,a.regip,a.regdate,a.lastip,a.lastvisit,a.field_5,a.field_5,'0','0' FROM `cdb_members` a LEFT JOIN `mygame_member` b ON a.username=b.username WHERE a.field_5='molier';

bbs表
INSERT INTO `pre_common_member`(username,email,password,regdate) SELECT username,'',password,regdate FROM `cdb_members` WHERE username = 'molier111';



2323wan 


导入文章

INSERT INTO `mygame_article`(title,titlecorlor,keywords,description,content,addtime,updatetime,imgurl,article_img,weight,hits,webconfig_id,typeid,author,`status`)
SELECT a.title,a.color,a.keywords,a.description,b.body,a.pubdate,a.senddate,a.litpic,a.litpic,a.weight,a.click,3,34,'2323wan小编',0 FROM `jjsgweb`.`dede_archives` a,`jjsgweb`.`dede_addonarticle` b WHERE a.typeid = 16 and a.id=b.aid;

CREATE TEMPORARY TABLE AAA SELECT * FROM `mygame_article` ORDER BY addtime ASC;
delete from `mygame_article`;
INSERT `mygame_article` SELECT * FROM AAA;


导入玩家
1、uc表
INSERT INTO `uc_members`(username,password,email,myid,myidkey,regip,regdate,lastloginip,lastlogintime,salt,secques)
SELECT username,password,email,myid,myidkey,regip,regdate,lastloginip,lastlogintime,salt,secques FROM `cdb_uc_members`;
UPDATE `uc_members` a , `cdb_uc_members` b SET a.uid = b.uid+10000000 WHERE a.username = b.username;
UPDATE `uc_members` SET uid = uid-10000000;
2、main表

INSERT INTO `mygame_member`(uid,username,email)
SELECT uid,username,email FROM `cdb_uc_members`;

INSERT INTO `mygame_member_extend_info`(uid,register_time,register_ip)
SELECT uid,regdate,regip FROM `cdb_uc_members`;

3导入区服

INSERT INTO `mygame_server`(gid,servername,start_time,server_url,server_payurl,add_time,stop_notice,is_display,`status`,gameid,serverid,line,content,server_img,sid_h)
SELECT 1,`server`,opentime,interface_login,interface_exchage,opentime-10000,'',Display,IsEnabled,'',diji,diji,'','',0 FROM `zsg_server` WHERE g_id = 17 ORDER BY diji;

UPDATE `mygame_game` SET game_key = (SELECT interface_key FROM `zsg_server` WHERE g_id = 17 and diji = 1) WHERE gid = 1;

wz 41
lc 14
aszt 17





INSERT INTO `mygame_pay_ok1` SELECT *,'992you' FROM `mygame_pay_ok`;



INSERT INTO mygame_member(uid,username) SELECT uid,username FROM `uc_members` b where not exists (select 1 from `mygame_member` a where a.uid = b.uid);



//新开平台清空表

main:
DELETE FROM `mygame_member` WHERE uid>1;
DELETE FROM `mygame_member_extend_info` WHERE uid>1;
DELETE FROM `mygame_pay_ok`;
ALTER TABLE `mygame_pay_ok` AUTO_INCREMENT = 1;
DELETE FROM `mygame_spend_log`;
ALTER TABLE `mygame_spend_log` AUTO_INCREMENT = 1;
DELETE FROM `mygame_game`;
ALTER TABLE `mygame_game` AUTO_INCREMENT = 1;
DELETE FROM `mygame_server`;
ALTER TABLE `mygame_server` AUTO_INCREMENT = 1;
DELETE FROM `mygame_game_log`;
ALTER TABLE `mygame_game_log` AUTO_INCREMENT = 1;
DELETE FROM `mygame_card`;
ALTER TABLE `mygame_card_log` AUTO_INCREMENT = 1;
DELETE FROM `mygame_qd_edit`;
ALTER TABLE `mygame_qd_edit` AUTO_INCREMENT = 1;
DELETE FROM `mygame_qd_pay_edit`;
ALTER TABLE `mygame_qd_pay_edit` AUTO_INCREMENT = 1;


uc:
DELETE FROM `uc_members` WHERE uid>1;
ALTER TABLE `uc_members` AUTO_INCREMENT = 2;



INSERT INTO `cdb_uc_members`(username,`password`,email,regip,regdate,lastloginip,lastlogintime,salt) 
SELECT username,`password`,email,regip,regdate,lastloginip,lastlogintime,salt FROM `cdb_uc_members11` WHERE uid != 1;