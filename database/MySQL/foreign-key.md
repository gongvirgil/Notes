# 外键

外键具有保持数据完整性和一致性的机制，对业务处理有着很好的校验作用，目前MySQL只在InnoDB引擎下支持。

## 基本概念

MySQL中“键”和“索引”的定义相同，所以外键和主键一样也是索引的一种。
不同的是MySQL会自动为所有表的主键进行索引，但是外键字段必须由用户进行明确的索引。
用于外键关系的字段必须在所有的参照表中进行明确地索引，InnoDB不能自动地创建索引。

外键可以是一对一的，一个表的记录只能与另一个表的一条记录连接，
或者是一对多的，一个表的记录与另一个表的多条记录连接。

如果需要更好的性能，并且不需要完整性检查，可以选择使用MyISAM表类型。
如果想要在MySQL中根据参照完整性来建立表并且希望在此基础上保持良好的性能，最好选择表结构为innoDB类型。

外键的使用条件：

* 两个表必须是InnoDB表，MyISAM表暂时不支持外键
* 外键列必须建立了索引，MySQL 4.1.2以后的版本在建立外键时会自动创建索引，但如果在较早的版本则需要显式建立；
* 外键关系的两个表的列必须是数据类型相似，也就是可以相互转换类型的列，比如int和tinyint可以，而int和char则不可以；

外键的好处：可以使得两张表关联，保证数据的一致性和实现一些级联操作。

## 使用方法

### 创建外键的语法：

外键的定义语法：

[CONSTRAINT symbol] FOREIGN KEY [id] (index_col_name, ...)

REFERENCES tbl_name (index_col_name, ...)

[ON DELETE {RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT}]

[ON UPDATE {RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT}]

该语法可以在 CREATE TABLE 和 ALTER TABLE 时使用，如果不指定CONSTRAINT symbol，MYSQL会自动生成一个名字。

ON DELETE、ON UPDATE表示事件触发限制，可设参数：

① RESTRICT（限制外表中的外键改动，默认值）

② CASCADE（跟随外键改动）

③ SET NULL（设空值）

④ SET DEFAULT（设默认值）

⑤ NO ACTION（无动作，默认的）

### 示例

1）创建表1

create table repo_table(

repo_id char(13) not null primary key,

repo_name char(14) not null)

type=innodb;

创建表2

mysql> create table busi_table(

-> busi_id char(13) not null primary key,

-> busi_name char(13) not null,

-> repo_id char(13) not null,

-> foreign key(repo_id) references repo_table(repo_id))

-> type=innodb;

2）插入数据

insert into repo_table values("12","sz"); //success

insert into repo_table values("13","cd"); //success

insert into busi_table values("1003","cd", "13"); //success

insert into busi_table values("1002","sz", "12"); //success

insert into busi_table values("1001","gx", "11"); //failed,提示：

ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`smb_man`.`busi_table`, CONSTRAINT `busi_table_ibfk_1` FOREIGN KEY (`repo_id`) REFERENCES `repo_table` (`repo_id`))

3）增加级联操作

mysql> alter table busi_table

-> add constraint id_check

-> foreign key(repo_id)

-> references repo_table(repo_id)

-> on delete cascade

-> on update cascade;

-----

ENGINE=InnoDB DEFAULT CHARSET=gb2312； //另一种方法，可以替换type=innodb;

3、相关操作

外键约束（表2）对父表（表1）的含义:

在父表上进行update/delete以更新或删除在子表中有一条或多条对应匹配行的候选键时，父表的行为取决于：在定义子表的外键时指定的on update/on delete子句。

关键字

含义

CASCADE

删除包含与已删除键值有参照关系的所有记录

SET NULL

修改包含与已删除键值有参照关系的所有记录，使用NULL值替换(只能用于已标记为NOT NULL的字段)

RESTRICT

拒绝删除要求，直到使用删除键值的辅助表被手工删除，并且没有参照时(这是默认设置，也是最安全的设置)

NO ACTION

啥也不做

4、其他

在外键上建立索引:

index repo_id (repo_id),

foreign key(repo_id) references repo_table(repo_id))
