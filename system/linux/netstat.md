 在linux一般使用netstat 来查看系统端口使用情况步。

      netstat命令是一个监控TCP/IP网络的非常有用的工具，它可以显示路由表、实际的网络连接以及每一个网络接口设备的

      netstat命令的功能是显示网络连接、路由表和网络接口信息，可以让用户得知目前都有哪些网络连接正在运作。

      该命令的一般格式为：


      netstat [选项]

      命令中各选项的含义如下：

      -a 显示所有socket，包括正在监听的。

      -c 每隔1秒就重新显示一遍，直到用户中断它。

      -i 显示所有网络接口的信息，格式同“ifconfig -e”。

      -n 以网络IP地址代替名称，显示出网络连接情形。

      -r 显示核心路由表，格式同“route -e”。

      -t 显示TCP协议的连接情况。

      -u 显示UDP协议的连接情况。

      -v 显示正在进行的工作。

1. netstat -an | grep LISTEN
      0.0.0.0的就是每个IP都有的服务，写明哪个IP的就是绑定那个IP的服务。

2. netstat -tln
      用来查看linux的端口使用情况

3. /etc/init.d/vsftp start
      是用来启动ftp端口~！

4. netstat
      查看已经连接的服务端口（ESTABLISHED）

5. netstat -a
      查看所有的服务端口（LISTEN，ESTABLISHED）

6. sudo netstat -ap
      查看所有的服务端口并显示对应的服务程序名

7. nmap ＜扫描类型＞＜扫描参数＞
例如：
       nmap localhost

nmap -p 1024-65535 localhost

nmap -PT 192.168.1.127-245

当我们使用　netstat -apn　查看网络连接的时候，会发现很多类似下面的内容：

Proto Recv-Q Send-Q Local Address Foreign Address State PID/Program name

tcp 0 52 218.104.81.152：7710 211.100.39.250：29488 ESTABLISHED 6111/1

显示这台服务器开放了7710端口，那么这个端口属于哪个程序呢？我们可以使用　lsof -i ：7710　命令来查询：

COMMAND PID USER FD TYPE DEVICE SIZE NODE NAME

sshd 1990 root 3u IPv4 4836 TCP *：7710 （LISTEN） 54com.cn

这样，我们就知道了7710端口是属于sshd程序的