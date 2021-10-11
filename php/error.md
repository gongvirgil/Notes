# 错误

https://segmentfault.com/a/1190000014926703

PHP错误级别

```s
# 系统级用户代码的一些错误类型 可由 try ... catch ... 捕获
E_PARSE          解析时错误 语法解析错误 少个分号 多个逗号一类的 致命错误
E_ERROR          运行时错误 比如调用了未定义的函数或方法 致命错误

# 可由 set_error_handler 捕获处理
E_WARNING        运行时警告 调用了未定义的变量
E_NOTICE         运行时提醒
E_DEPRECATED     运行时已废弃的函数或方法

# Zend Engine 相关的一些错误 内存错误一类的 应该也能通过 try ... catch ... 捕获 略难测试
E_CORE_ERROR
E_CORE_WARNING
E_COMPILE_ERROR
E_COMPILE_WARNING

# 用户级自定义错误 可由 trigger_error 触发 可由 set_error_handler 捕获处理
E_USER_ERROR 用户自定义错误 致命错误 未处理也会导致程序退出
E_USER_WARNING
E_USER_NOTICE
E_USER_DEPRECATED

#编码标准化警告(建议如何修改以向前兼容)
E_STRICT 部分 捕获的话 try ... catch ... 部分 set_error_handler
E_RECOVERABLE_ERROR
```

语法解析 -- 解释运行 -- 结束退出


laravel标准组件使用 : filp/whoops


```php
function throw_if($boolean, $exception, $message = '')
{
    if ($boolean) {
        throw (is_string($exception) ? new $exception($message) : $exception);
    }
}

function throw_unless($boolean, $exception, $message)
{
    if (! $boolean) {
        throw (is_string($exception) ? new $exception($message) : $exception);
    }
}
```