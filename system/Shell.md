# Shell

* [Shell基础教程](http://www.runoob.com/linux/linux-shell.html)

[root@localhost ~]# bash hello.sh
[root@localhost ~]# sh hello.sh

shell脚本输出格式化的json数据：echo `curl -s "要请求的URL地址"` | python -m json.tool 

查找是哪个文件带BOM头: grep -r -I -l $'^\xEF\xBB\xBF' ./
vim 打开文件，输入命令`:set nobomb`，保存退出。