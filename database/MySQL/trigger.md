# 触发器

CREATE TRIGGER `trigger_name` `trigger_time` `trigger_event` ON `tb_name` FOR EACH ROW `trigger_stmt`
    * trigger_name：触发器的名称
    * tirgger_time：触发时机，为BEFORE或者AFTER
    * trigger_event：触发事件，为INSERT、DELETE或者UPDATE
    * tb_name：表示建立触发器的表名
    * trigger_stmt：触发器的程序体，可以是一条SQL语句或者是用BEGIN和END包含的多条语句

所以可以说MySQL创建以下六种触发器：
BEFORE INSERT,BEFORE DELETE,BEFORE UPDATE
AFTER INSERT,AFTER DELETE,AFTER UPDATE

| 触发器类型 | 激活触发器的语句 | NEW | OLD |
|---|---|---|---|
| INSERT型触发器 | INSERT LOAD DATA REPLACE | 将要或已经新增的数据 | 无 |
| UPDATE型触发器 | UPDATE | 将要或已经修改的数据 | 将要或已经删除的数据 |
| DELETE型触发器 | DELETE REPLACE | 无 | 将要或已经删除的数据 |


* 查看触发器
    * show triggers;
    * select * from information_schema.triggers where trigger_name='xxx';
* 删除触发器
    * drop trigger `{trigger_name}`;