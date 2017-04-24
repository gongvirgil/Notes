# Apache

## 配置

headers module 丢失，导致 配置 `Header always set Access-Control-Allow-Origin "*"` 失败。

运行`a2enmod headers`注册模块，然后重启就可以了。

## 状态

查看apache当前并发访问数和进程数
作者：rainwang　和php相关  
1、查看apache当前并发访问数：
netstat -an | grep ESTABLISHED | wc -l
对比httpd.conf中MaxClients的数字差距多少。
2、查看有多少个进程数：
ps aux|grep httpd|wc -l
3、可以使用如下参数查看数据
server-status?auto
#ps -ef|grep httpd|wc -l
1388
统计httpd进程数，连个请求会启动一个进程，使用于Apache服务器。
表示Apache能够处理1388个并发请求，这个值Apache可根据负载情况自动调整。
#netstat -nat|grep -i "80"|wc -l
4341
netstat -an会打印系统当前网络链接状态，而grep -i "80"是用来提取与80端口有关的连接的，wc -l进行连接数统计。
最终返回的数字就是当前所有80端口的请求总数。
#netstat -na|grep ESTABLISHED|wc -l
376
netstat -an会打印系统当前网络链接状态，而grep ESTABLISHED 提取出已建立连接的信息。 然后wc -l统计。
最终返回的数字就是当前所有80端口的已建立连接的总数。
netstat -nat||grep ESTABLISHED|wc - 可查看所有建立连接的详细记录
查看Apache的并发请求数及其TCP连接状态：
Linux命令：
netstat -n | awk '/^tcp/ {++S[$NF]} END {for(a in S) print a, S[a]}'
返回结果示例：
LAST_ACK 5
SYN_RECV 30
ESTABLISHED 1597
FIN_WAIT1 51
FIN_WAIT2 504
TIME_WAIT 1057
其中的
SYN_RECV表示正在等待处理的请求数；
ESTABLISHED表示正常数据传输状态；
TIME_WAIT表示处理完毕，等待超时结束的请求数。 