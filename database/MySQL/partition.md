# 分表

## 水平分表

### 使用Merge存储引擎

```
//分表1
CREATE TABLE `test_tb1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
//分表2
CREATE TABLE `test_tb2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
//主表
CREATE TABLE `test_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MERGE UNION=(test_tb1,test_tb2) INSERT_METHOD=LAST DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```


## 垂直分表

# 分区

## 水平分区（根据列属性按行分）

水平分区的几种模式：

|		|	分区模式	|	说明	|
|---|---|---|
|	Range		|	范围		|	将数据划分不同范围。如按年份划分。	|
|	Hash		|	哈希		|	对表的一个或多个列的Hash Key进行计算，最后通过这个Hash码不同数值对应的数据区域进行分区。	|
|	Key			|	键值		|	Hash模式的一种延伸，这里的Hash Key是MySQL系统产生的。	|
|	List		|	预定义列表	|	系统通过DBA定义的列表的值所对应的行数据进行分割。	|
|	Composite	|	复合模式	|	以上模式的组合使用。	|

## 垂直分区（按列分）

