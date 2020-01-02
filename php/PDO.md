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

## 预定义常量

下列常量由此扩展定义，且仅在此扩展编译入 PHP 或在运行时动态载入时可用。

Warning
自 PHP 5.1 起，开始使用类常量。以前的版本使用类似 PDO_PARAM_BOOL 这样的全局常量。

PDO::PARAM_BOOL (integer)
表示布尔数据类型。
PDO::PARAM_NULL (integer)
表示 SQL 中的 NULL 数据类型。
PDO::PARAM_INT (integer)
表示 SQL 中的整型。
PDO::PARAM_STR (integer)
表示 SQL 中的 CHAR、VARCHAR 或其他字符串类型。
PDO::PARAM_STR_NATL (integer)
标记了字符使用的是国家字符集（national character set）。 自 PHP 7.2.0 起。
PDO::PARAM_STR_CHAR (integer)
标记了字符使用的是常规字符集（regular character set）。 自 PHP 7.2.0 起。
PDO::PARAM_LOB (integer)
表示 SQL 中大对象数据类型。
PDO::PARAM_STMT (integer)
表示一个记录集类型。当前尚未被任何驱动支持。
PDO::PARAM_INPUT_OUTPUT (integer)
指定参数为一个存储过程的 INOUT 参数。必须用一个明确的 PDO::PARAM_* 数据类型跟此值进行按位或。
PDO::FETCH_LAZY (integer)
指定获取方式，将结果集中的每一行作为一个对象返回，此对象的变量名对应着列名。PDO::FETCH_LAZY 创建用来访问的对象变量名。在 PDOStatement::fetchAll() 中无效。
PDO::FETCH_ASSOC (integer)
指定获取方式，将对应结果集中的每一行作为一个由列名索引的数组返回。如果结果集中包含多个名称相同的列，则PDO::FETCH_ASSOC每个列名只返回一个值。
PDO::FETCH_NAMED (integer)
指定获取方式，将对应结果集中的每一行作为一个由列名索引的数组返回。如果结果集中包含多个名称相同的列，则PDO::FETCH_ASSOC每个列名 返回一个包含值的数组。
PDO::FETCH_NUM (integer)
指定获取方式，将对应结果集中的每一行作为一个由列号索引的数组返回，从第 0 列开始。
PDO::FETCH_BOTH (integer)
指定获取方式，将对应结果集中的每一行作为一个由列号和列名索引的数组返回，从第 0 列开始。
PDO::FETCH_OBJ (integer)
指定获取方式，将结果集中的每一行作为一个属性名对应列名的对象返回。
PDO::FETCH_BOUND (integer)
指定获取方式，返回 TRUE 且将结果集中的列值分配给通过 PDOStatement::bindParam() 或 PDOStatement::bindColumn() 方法绑定的 PHP 变量。
PDO::FETCH_COLUMN (integer)
指定获取方式，从结果集中的下一行返回所需要的那一列。
PDO::FETCH_CLASS (integer)
指定获取方式，返回一个所请求类的新实例，映射列到类中对应的属性名。
Note: 如果所请求的类中不存在该属性，则调用 __set() 魔术方法

PDO::FETCH_INTO (integer)
指定获取方式，更新一个请求类的现有实例，映射列到类中对应的属性名。
PDO::FETCH_FUNC (integer)
允许在运行中完全用自定义的方式处理数据。（仅在 PDOStatement::fetchAll() 中有效）。
PDO::FETCH_GROUP (integer)
根据值分组返回。通常和 PDO::FETCH_COLUMN 或 PDO::FETCH_KEY_PAIR 一起使用。
PDO::FETCH_UNIQUE (integer)
只取唯一值。
PDO::FETCH_KEY_PAIR (integer)
获取一个有两列的结果集到一个数组，其中第一列为键名，第二列为值。自 PHP 5.2.3 起可用。
PDO::FETCH_CLASSTYPE (integer)
根据第一列的值确定类名。
PDO::FETCH_SERIALIZE (integer)
类似 PDO::FETCH_INTO ，但是以一个序列化的字符串表示对象。自 PHP 5.1.0 起可用。从 PHP 5.3.0 开始，如果设置此标志，则类的构造函数从不会被调用。
PDO::FETCH_PROPS_LATE (integer)
设置属性前调用构造函数。自 PHP 5.2.0 起可用。
PDO::ATTR_AUTOCOMMIT (integer)
如果此值为 FALSE ，PDO 将试图禁用自动提交以便数据库连接开始一个事务。
PDO::ATTR_PREFETCH (integer)
设置预取大小来为你的应用平衡速度和内存使用。并非所有的数据库/驱动组合都支持设置预取大小。较大的预取大小导致性能提高的同时也会占用更多的内存。
PDO::ATTR_TIMEOUT (integer)
设置连接数据库的超时秒数。
PDO::ATTR_ERRMODE (integer)
关于此属性的更多信息请参见 错误及错误处理 部分。
PDO::ATTR_SERVER_VERSION (integer)
此为只读属性；返回 PDO 所连接的数据库服务的版本信息。
PDO::ATTR_CLIENT_VERSION (integer)
此为只读属性；返回 PDO 驱动所用客户端库的版本信息。
PDO::ATTR_SERVER_INFO (integer)
此为只读属性。返回一些关于 PDO 所连接的数据库服务的元信息。
PDO::ATTR_CONNECTION_STATUS (integer)
PDO::ATTR_CASE (integer)
用类似 PDO::CASE_* 的常量强制列名为指定的大小写。
PDO::ATTR_CURSOR_NAME (integer)
获取或设置使用游标的名称。当使用可滚动游标和定位更新时候非常有用。
PDO::ATTR_CURSOR (integer)
选择游标类型。 PDO 当前支持 PDO::CURSOR_FWDONLY 和 PDO::CURSOR_SCROLL。一般为 PDO::CURSOR_FWDONLY，除非确实需要一个可滚动游标。
PDO::ATTR_DRIVER_NAME (string)
返回驱动名称。
Example #1 使用 PDO::ATTR_DRIVER_NAME 的例子

<?php
if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
  echo "Running on mysql; doing something mysql specific here\n";
}
?>
PDO::ATTR_ORACLE_NULLS (integer)
在获取数据时将空字符串转换成 SQL 中的 NULL 。
PDO::ATTR_PERSISTENT (integer)
请求一个持久连接，而非创建一个新连接。关于此属性的更多信息请参见 连接与连接管理 。
PDO::ATTR_STATEMENT_CLASS (integer)
设置返回的 statement 类名。
PDO::ATTR_FETCH_CATALOG_NAMES (integer)
将包含的目录名添加到结果集中的每个列名前面。目录名和列名由一个小数点分开（.）。此属性在驱动层面支持，所以有些驱动可能不支持此属性。
PDO::ATTR_FETCH_TABLE_NAMES (integer)
将包含的表名添加到结果集中的每个列名前面。表名和列名由一个小数点分开（.）。此属性在驱动层面支持，所以有些驱动可能不支持此属性。
PDO::ATTR_STRINGIFY_FETCHES (integer)
强制以字符串方式对待所有的值。
PDO::ATTR_MAX_COLUMN_LEN (integer)
设置字段名最长的尺寸。
PDO::ATTR_DEFAULT_FETCH_MODE (integer)
自 PHP 5.2.0 起可用。
PDO::ATTR_EMULATE_PREPARES (integer)
自 PHP 5.1.3 起可用。
PDO::ATTR_DEFAULT_STR_PARAM (integer)
设置默认 string 参数类型可以是 PDO::PARAM_STR_NATL 和 PDO::PARAM_STR_CHAR。 自 PHP 7.2.0 起可用
PDO::ERRMODE_SILENT (integer)
如果发生错误，则不显示错误或异常。希望开发人员显式地检查错误。此为默认模式。关于此属性的更多信息请参见 错误与错误处理 。
PDO::ERRMODE_WARNING (integer)
如果发生错误，则显示一个 PHP E_WARNING 消息。关于此属性的更多信息请参见 错误与错误处理。
PDO::ERRMODE_EXCEPTION (integer)
如果发生错误，则抛出一个 PDOException 异常。关于此属性的更多信息请参见 错误与错误处理。
PDO::CASE_NATURAL (integer)
保留数据库驱动返回的列名。
PDO::CASE_LOWER (integer)
强制列名小写。
PDO::CASE_UPPER (integer)
强制列名大写。
PDO::NULL_NATURAL (integer)
PDO::NULL_EMPTY_STRING (integer)
PDO::NULL_TO_STRING (integer)
PDO::FETCH_ORI_NEXT (integer)
在结果集中获取下一行。仅对可滚动游标有效。
PDO::FETCH_ORI_PRIOR (integer)
在结果集中获取上一行。仅对可滚动游标有效。
PDO::FETCH_ORI_FIRST (integer)
在结果集中获取第一行。仅对可滚动游标有效。
PDO::FETCH_ORI_LAST (integer)
在结果集中获取最后一行。仅对可滚动游标有效。
PDO::FETCH_ORI_ABS (integer)
根据行号从结果集中获取需要的行。仅对可滚动游标有效。
PDO::FETCH_ORI_REL (integer)
根据当前游标位置的相对位置从结果集中获取需要的行。仅对可滚动游标有效。
PDO::CURSOR_FWDONLY (integer)
创建一个只进游标的 PDOStatement 对象。此为默认的游标选项，因为此游标最快且是 PHP 中最常用的数据访问模式。
PDO::CURSOR_SCROLL (integer)
创建一个可滚动游标的 PDOStatement 对象。通过 PDO::FETCH_ORI_* 常量来控制结果集中获取的行。
PDO::ERR_NONE (string)
对应 SQLSTATE '00000'，表示 SQL 语句没有错误或警告地成功发出。当用 PDO::errorCode() 或 PDOStatement::errorCode() 来确定是否有错误发生时，此常量非常方便。在检查上述方法返回的错误状态代码时，会经常用到。
PDO::PARAM_EVT_ALLOC (integer)
分配事件
PDO::PARAM_EVT_FREE (integer)
解除分配事件
PDO::PARAM_EVT_EXEC_PRE (integer)
执行一条预处理语句之前触发事件。
PDO::PARAM_EVT_EXEC_POST (integer)
执行一条预处理语句之后触发事件。
PDO::PARAM_EVT_FETCH_PRE (integer)
从一个结果集中取出一条结果之前触发事件。
PDO::PARAM_EVT_FETCH_POST (integer)
从一个结果集中取出一条结果之后触发事件。
PDO::PARAM_EVT_NORMALIZE (integer)
在绑定参数注册允许驱动程序正常化变量名时触发事件。
PDO::SQLITE_DETERMINISTIC (integer)
设定 PDO::sqliteCreateFunction() 返回的函数是结果确定的（deterministic）。 举例说明：在同一个 SQL statement 内，函数的参数不变，则返回的结果也不变。 （PHP 7.1.4起有效）