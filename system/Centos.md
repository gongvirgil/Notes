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

## svn

* [Centos7.X 源码编译安装subversion svn1.8.x](https://www.cnblogs.com/doseoer/p/6065826.html)

https://dist.apache.org/repos/dist/release/apr/apr-1.6.3.tar.gz
https://dist.apache.org/repos/dist/release/apr/apr-util-1.6.1.tar.gz
https://sourceforge.net/projects/scons/files/scons/2.3.5/scons-2.3.5.tar.gz
https://www.openssl.org/source/openssl-1.0.2o.tar.gz
https://www.apache.org/dist/serf/serf-1.3.9.tar.bz2
http://www.apache.org/dist/subversion/subversion-1.8.19.tar.gz
https://www.sqlite.org/2018/sqlite-amalgamation-3240000.zip

### 升级svn1.6

1. 删除svn1.6

```bash
yum remove subverson
```

2.设置svn1.8安装源

```bash
vim /etc/yum.repos.d/wandisco-svn.repo
```

输入如下

```bash
[WandiscoSVN]
name=Wandisco SVN Repo
baseurl=http://opensource.wandisco.com/centos/6/svn-1.8/RPMS/$basearch/
enabled=1
gpgcheck=0
```

3.执行安装

```bash
yum clean all
yum install subversion
```

4.验证安装

```bash
svn --version
```

一次性脚本

```bash
yum remove subverson
sudo tee /etc/yum.repos.d/wandisco-svn.repo <<-'EOF'
[WandiscoSVN]
name=Wandisco SVN Repo
baseurl=http://opensource.wandisco.com/centos/6/svn-1.8/RPMS/$basearch/
enabled=1
gpgcheck=0
EOF
yum clean all
yum install subversion
svn --version
```

yum [Errno 256] No more mirrors to try 解决方法

刚才安装smb时遇到问题yum [Errno 256] No more mirrors to try 解决方法：

```bash
1.yum clean all
2.yum makecache
3.yum update
```