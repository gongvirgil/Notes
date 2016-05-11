# Apache

headers module 丢失，导致 配置 `Header always set Access-Control-Allow-Origin "*"` 失败。

运行`a2enmod headers`注册模块，然后重启就可以了。