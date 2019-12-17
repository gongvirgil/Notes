# PDO

* 预定义常量
* PHP PDO连接连接管理
* PHP PDO 事务与自动提交
* PHP PDO 预处理语句与存储过程
* PHP PDO 错误与错误处理
* PHP PDO 大对象 (LOBs)

## PDO 类：

* PDO::beginTransaction — 启动一个事务
* PDO::commit — 提交一个事务
* PDO::__construct — 创建一个表示数据库连接的 PDO 实例
* PDO::errorCode — 获取跟数据库句柄上一次操作相关的 SQLSTATE
* PDO::errorInfo — 返回最后一次操作数据库的错误信息
* PDO::exec — 执行一条 SQL 语句，并返回受影响的行数
* PDO::getAttribute — 取回一个数据库连接的属性
* PDO::getAvailableDrivers — 返回一个可用驱动的数组
* PDO::inTransaction — 检查是否在一个事务内
* PDO::lastInsertId — 返回最后插入行的ID或序列值
* PDO::prepare — 备要执行的SQL语句并返回一个 PDOStatement 对象
* PDO::query — 执行 SQL 语句，返回PDOStatement对象,可以理解为结果集
* PDO::quote — 为SQL语句中的字符串添加引号。
* PDO::rollBack — 回滚一个事务
* PDO::setAttribute — 设置属性

## PDOStatement 类：

* PDOStatement::bindColumn — 绑定一列到一个 PHP 变量
* PDOStatement::bindParam — 绑定一个参数到指定的变量名
* PDOStatement::bindValue — 把一个值绑定到一个参数
* PDOStatement::closeCursor — 关闭游标，使语句能再次被执行。
* PDOStatement::columnCount — 返回结果集中的列数
* PDOStatement::debugDumpParams — 打印一条 SQL 预处理命令
* PDOStatement::errorCode — 获取跟上一次语句句柄操作相关的 SQLSTATE
* PDOStatement::errorInfo — 获取跟上一次语句句柄操作相关的扩展错误信息
* PDOStatement::execute — 执行一条预处理语句
* PDOStatement::fetch — 从结果集中获取下一行
* PDOStatement::fetchAll — 返回一个包含结果集中所有行的数组
* PDOStatement::fetchColumn — 从结果集中的下一行返回单独的一列。
* PDOStatement::fetchObject — 获取下一行并作为一个对象返回。
* PDOStatement::getAttribute — 检索一个语句属性
* PDOStatement::getColumnMeta — 返回结果集中一列的元数据
* PDOStatement::nextRowset — 在一个多行集语句句柄中推进到下一个行集
* PDOStatement::rowCount — 返回受上一个 SQL 语句影响的行数
* PDOStatement::setAttribute — 设置一个语句属性
* PDOStatement::setFetchMode — 为语句设置默认的获取模式。