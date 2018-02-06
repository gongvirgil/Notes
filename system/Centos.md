# Centos

## 安装Nginx

nginx依赖以下模块：
* gzip模块: 需要zlib库
* rewrite模块: 需要pcre库
* ssl功能: 需要openssl库

获取pcre编译安装包，在http://www.pcre.org/上可以获取当前最新的版本
解压缩pcre-xx.tar.gz包。
进入解压缩目录，执行./configure。
make & make install

获取openssl编译安装包，在http://www.openssl.org/source/上可以获取当前最新的版本。
解压缩openssl-xx.tar.gz包。
进入解压缩目录，执行./config。
make & make install

获取zlib编译安装包，在http://www.zlib.net/上可以获取当前最新的版本。
解压缩openssl-xx.tar.gz包。
进入解压缩目录，执行./configure。
make & make install

获取nginx，在http://nginx.org/en/download.html上可以获取当前最新的版本。
解压缩nginx-xx.tar.gz包。
进入解压缩目录，执行./configure
make & make install