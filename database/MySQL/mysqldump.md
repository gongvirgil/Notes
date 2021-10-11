# mysqldump

mysqldump --column-statistics=0 -d -h10.90.29.171 -P7306 -utal_ucenter_rw -phUHyhaTJJmcvwwhfrhshPcZpNCMfxpz6+ tal_uc_export > tal_uc_export.sql

如果报错`mysqldump: Couldn't execute 'SELECT COLUMN_NAME, JSON_EXTRACT(HISTOGRAM, '$."number-of-buckets-specified"') FROM information_schema.COLUMN_STATISTICS WHERE SCHEMA_NAME = 'spv' AND TABLE_NAME = '_task_work';': Unknown table 'COLUMN_STATISTICS' in information_schema (1109)，`这是因为新版的mysqldump默认启用了一个新标志，通过`--column-statistics = 0`来禁用他。
形式如下：

mysqldump --column-statistics=0 -h x.x.x.x -u root -p dbname > db.sql;

## 导出整个数据库 

　　mysqldump -u用户名 -p密码  数据库名 > 导出的文件名 
　　C:\Users\jack> mysqldump -uroot -pmysql sva_rec  > e:\sva_rec.sql 

## 导出一个表，包括表结构和数据 

　　mysqldump -u用户名 -p 密码  数据库名 表名> 导出的文件名 
　　C:\Users\jack> mysqldump -uroot -pmysql sva_rec date_rec_drv> e:\date_rec_drv.sql 

## 导出一个数据库结构 
　　C:\Users\jack> mysqldump -uroot -pmysql -d sva_rec > e:\sva_rec.sql 

     4.导出一个表，只有表结构 

　　mysqldump -u用户名 -p 密码 -d数据库名  表名> 导出的文件名 
　　C:\Users\jack> mysqldump -uroot -pmysql -d sva_rec date_rec_drv> e:\date_rec_drv.sql 

## 导入数据库 

　　常用source 命令 
　　进入mysql数据库控制台， 
　　如mysql -u root -p 
　　mysql>use 数据库 
　　然后使用source命令，后面参数为脚本文件(如这里用到的.sql) 
　　mysql>source d:wcnc_db.sql