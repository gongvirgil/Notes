# 


## 产生临时表

我们在执行某些SQL语句的时候有可能会生成临时表.我们应该尽量的去避免临时表.因为临时表会浪费内存和时间.那么什么情况下会产生临时表呢?

### 1

```
If there is an ORDER BY clause and a different GROUP BY clause, or if the ORDER BY or GROUP BY contains columns from tables other than the first table in the join queue, a temporary table is created.[官方说明]
```

ORDER BY 子句和一个不一样的 GROUP BY 子句 或者 ORDER BY 子句和一个不一样的 GROUP BY 子句,或者 ORDER BY 或 GROUP BY 的列不是来自JOIN语句序列的第一个表，就会产生临时表.

个人测试后结论 :

　　1. 如果GROUP BY 的列没有索引,产生临时表.

　　2. 如果GROUP BY时,SELECT的列不止GROUP BY列一个,并且GROUP BY的列不是主键 ,产生临时表.

　　3. 如果GROUP BY的列有索引,ORDER BY的列没索引.产生临时表.

　　4. 如果GROUP BY的列和ORDER BY的列不一样,即使都有索引也会产生临时表.

　　5. 如果GROUP BY或ORDER BY的列不是来自JOIN语句第一个表.会产生临时表.

### 2

```
DISTINCT combined with ORDER BY may require a temporary table.[官方说明]
```

DISTINCT 和 ORDER BY 一起使用时可能需要临时表

个人测试后结论 :

　　1. 如果DISTINCT 和 ORDER BY的列没有索引,产生临时表.

### 3

If you use the SQL_SMALL_RESULT option, MySQL uses an in-memory temporary table, unless the query also contains elements (described later) that require on-disk storage.[官方说明]

用了 SQL_SMALL_RESULT, mysql就会用内存临时表。

个人测试后结论 :

　　1. 从来没用过这个,反正没生成.


最后再说一下filesort.
filesort 这个名字取得太搓逼了。 filesort的意思是只要一个排序无法使用索引来排序，就叫filesort。他和file没半毛钱关系。filesort应该叫做sort。意思是说如果无法用已有index来排序，那么就需要数据库服务器额外的进行数据排序，这样其实是会增加性能开销的。