# gvm

## 什么是GVM

GVM是用来控制多版本的一个工具，有点像python中的virtualenv。
使用方法请参考：
用gvm管理Go项目的workspace
Go 语言多版本安装及管理利器 - GVM

## 安装GVM

```bash
bash < <(curl -s -S -L https://raw.githubusercontent.com/moovweb/gvm/master/binscripts/gvm-installer)
source /Users/gongvirgil/.gvm/scripts/gvm
```

(安装完后，要重新打开终端，GVM才能生效)

安装Go1.17
gvm install go1.17

安装成功后，再安装go1.18
gvm install go1.18

设置Go版本
gvm use go1.18

设置默认的Go版本（一打开终端就可以使用）
gvm use go1.18 –default

查看版本
go version

