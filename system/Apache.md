# Apache

## 配置

headers module 丢失，导致 配置 `Header always set Access-Control-Allow-Origin "*"` 失败。

运行`a2enmod headers`注册模块，然后重启就可以了。

## 状态

查看apache当前并发访问数和进程数

watch -n 1 -d "netstat -ant | grep 104 | wc -l"

1、查看apache当前并发访问数：
watch -n 1 -d "netstat -an | grep ESTABLISHED | wc -l"
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

## centos

/etc/httpd/conf/httpd.conf

## ubuntu

## Apache的最大并发连接数

Apache是一个跨平台的web服务器，由于其简单高效、稳定安全的特性，被广泛应用于计算机技术的各个领域。现在，Apache凭借其庞大的用户数，已成为用户数排名第一的web服务器。

尽管如此，在实际的生产环境中，我们仍然不可能直接使用默认配置的Apache来充当服务器。毕竟，为了更充分合理地利用Apache服务器，我们都应该根据自己的实际需要对Apache的默认配置作出一些必要的调整。而针对Apache的优化配置过程中，修改Apache的最大并发连接数就显得尤为重要。

在修改Apache的最大并发连接数之前，我们需要预先了解一些Apache的相关知识。

众所周知，Apache是一个跨平台的、采用模块化设计的服务器。为了应对不同的平台和不同的环境产生的各种不同的需求，也为了在具体的平台或环境下达到最佳的效果，Apache在web服务器的基础功能方面(端口绑定、接收请求等)也同样采用了模块化设计，这个Apache的核心模块就叫做多路处理模块(Multi-Processing Module，简称MPM)。

Apache针对不同的操作系统提供了多个不同的MPM模块，例如：mpm_beos、mpm_event、mpm_netware、mpmt_os2、mpm_prefork、mpm_winnt、mpm_worker。如果条件允许，我们可以根据实际需求将指定的MPM模块编译进我们自己的Apache中(Apache的源码是开放的，允许用户自行编译)。不过，如果在编译时我们没有选择，Apache将按照如下表格根据不同的操作系统自行选择对应的MPM模块，这也是Apache针对不同平台推荐使用的MPM模块。

不同操作系统上默认的MPM模块
操作系统	MPM模块	描述
Windows	mpm_winnt	不用介绍了吧:)
Unix/Linux	mpm_prefork	不用介绍了吧:)
BeOS	mpm_beos	由Be公司开发的一种多媒体操作系统，官方版已停止更新。
Netware	mpm_netware	由NOVELL公司推出的一种网络操作系统
OS/2	mpmt_os2	一种最初由微软和IBM共同开发的操作系统，现由IBM单独开发(微软放弃OS/2，转而开发Windows)
mpm_event模块可以看作是mpm_worker模块的一个变种，不过其具有实验性质，一般不推荐使用。

当然，Apache在其官方网站上也提供了根据不同操作系统已经编译好对应MPM模块的成品Apache。你可以点击此处进入Apache官方网站下载。

此外，如果我们想要知道某个Apache内部使用的是何种MPM模块，我们可以以命令行的方式进入Apache安装目录\bin，然后键入命令httpd -l，即可查看到当前Apache内部使用的何种MPM模块。

使用httpd -l命令查看编译模块
使用httpd -l命令查看编译模块

由于在平常的开发工作中，BeOS、NetWare、OS/2等操作系统并不常见，这里我们主要针对Windows和Unix/Linux操作系统上的MPM模块进行讲解。在Windows和Unix/Linux操作系统上，MPM模块主要有mpm_winnt、mpm_prefork、mpm_worker三种。

mpm_prefork模块
mpm_prefork模块主要应用于Unix/Linux平台的Apache服务器，其主要工作方式是：当Apache服务器启动后，mpm_prefork模块会预先创建多个子进程(默认为5个)，当接收到客户端的请求后，mpm_prefork模块再将请求转交给子进程处理，并且每个子进程同时只能用于处理单个请求。如果当前的请求数将超过预先创建的子进程数时，mpm_prefork模块就会创建新的子进程来处理额外的请求。Apache总是试图保持一些备用的或者是空闲的子进程用于迎接即将到来的请求。这样客户端的请求就不需要在接收后等候子进程的产生。

由于在mpm_prefork模块中，每个请求对应一个子进程，因此其占用的系统资源相对其他两种模块而言较多。不过mpm_prefork模块的优点在于它的每个子进程都会独立处理对应的单个请求，这样，如果其中一个请求出现问题就不会影响到其他请求。同时，mpm_prefork模块可以应用于不具备线程安全的第三方模块(比如PHP的非线程安全版本)，且在不支持线程调试的平台上易于调试。此外，mpm_prefork模块还具有比mpm_worker模块更高的稳定性。

mpm_worker模块
mpm_worker模块也主要应用于Unix/Linux平台的Apache服务器，它可以看作是mpm_prefork模块的改进版。mpm_worker模块的工作方式与mpm_prefork模块类似。不过，由于处理相同请求的情况下，基于进程(例如mpm_prefork)比基于线程的处理方式占用的系统资源要多。因此，与mpm_prefork模块不同的是，mpm_worker模块会让每个子进程创建固定数量的服务线程和一个监听线程，并让每个服务线程来处理客户端的请求，监听线程用于监听接入请求并将其传递给服务线程处理和应答。Apache总是试图维持一个备用或是空闲的服务线程池。这样，客户端无须等待新线程或新进程的建立即可得到处理。

与mpm_prefork模块相比，mpm_worker模块可以进一步减少系统资源的开销。再加上它也使用了多进程，每个进程又有多个线程，因此它与完全基于线程的处理方式相比，又增加了一定的稳定性。

mpm_winnt模块
mpm_winnt模块是专门针对Windows操作系统而优化设计的MPM模块。它只创建一个单独的子进程，并在这个子进程中轮流产生多个线程来处理请求。

修改MPM模块配置
在对Apache的MPM模块具备一定了解后，我们就可以针对不同的MPM模块来修改Apache的最大并发连接数配置了。

1.启用MPM模块配置文件

在Apace安装目录/conf/extra目录中有一个名为httpd-mpm.conf的配置文件。该文件主要用于进行MPM模块的相关配置。不过，在默认情况下，Apache的MPM模块配置文件并没有启用。因此，我们需要在httpd.conf文件中启用该配置文件，如下所示：

# Server-pool management (MPM specific)
Include conf/extra/httpd-mpm.conf (去掉该行前面的注释符号"#")
2.修改MPM模块配置文件中的相关配置

在启动MPM模块配置文件后，我们就可以使用文本编辑器打开该配置文件，我们可以看到，在该配置文件中有许多<IfModule>配置节点，如下图所示：

只有Apache使用对应MPM模块时，对应配置才会生效
只有Apache使用对应MPM模块时，对应配置才会生效

此时，我们就需要根据当前Apache服务器所使用的MPM模块，来修改对应<IfModule>节点下的参数配置。首先，我们来看看mpm_winnt模块下的默认配置：

#由于mpm_winnt模块只会创建1个子进程，因此这里对单个子进程的参数设置就相当于对整个Apache的参数设置。

<IfModule mpm_winnt_module>
ThreadsPerChild      150 #推荐设置：小型网站=1000 中型网站=1000~2000 大型网站=2000~3500
MaxRequestsPerChild    0 #推荐设置：小=10000 中或大=20000~100000
</IfModule>
对应的配置参数作用如下：

ThreadsPerChild
每个子进程的最大并发线程数。
MaxRequestsPerChild
每个子进程允许处理的请求总数。如果累计处理的请求数超过该值，该子进程将会结束(然后根据需要确定是否创建新的子进程)，该值设为0表示不限制请求总数(子进程永不结束)。
该参数建议设为非零的值，可以带来以下两个好处：

可以防止程序中可能存在的内存泄漏无限进行下去，从而耗尽内存。
给进程一个有限寿命，从而有助于当服务器负载减轻的时候减少活动进程的数量。
注意：在以上涉及到统计请求数量的参数中，对于KeepAlive的连接，只有第一个请求会被计数。

接着，我们再来看看mpm_perfork模块和mpm_worker模块下的默认配置:

#mpm_perfork模块

<IfModule mpm_prefork_module>
StartServers          5 #推荐设置：小=默认 中=20~50 大=50~100
MinSpareServers       5 #推荐设置：与StartServers保持一致
MaxSpareServers      10 #推荐设置：小=20 中=30~80 大=80~120 
MaxClients          150 #推荐设置：小=500 中=500~1500 大型=1500~3000
MaxRequestsPerChild   0 #推荐设置：小=10000 中或大=10000~500000
(此外，还需额外设置ServerLimit参数，该参数最好与MaxClients的值保持一致。)
</IfModule>
#mpm_worker模块

<IfModule mpm_worker_module>
StartServers          2 #推荐设置：小=默认 中=3~5 大=5~10
MaxClients          150 #推荐设置：小=500 中=500~1500 大型=1500~3000
MinSpareThreads      25 #推荐设置：小=默认 中=50~100 大=100~200
MaxSpareThreads      75 #推荐设置：小=默认 中=80~160 大=200~400 
ThreadsPerChild      25 #推荐设置：小=默认 中=50~100 大型=100~200
MaxRequestsPerChild   0 #推荐设置：小=10000 中或大=10000~50000
(此外，如果MaxClients/ThreadsPerChild大于16，还需额外设置ServerLimit参数，ServerLimit必须大于等于 MaxClients/ThreadsPerChild 的值。)
</IfModule>
对应的配置参数作用如下：

StartServers
启动Apache时创建的子进程数。
MinSpareServers
处于空闲状态的最小子进程数。
所谓空闲子进程是指没有正在处理请求的子进程。如果当前空闲子进程数少于MinSpareServers，那么Apache将以最大每秒一个的速度产生新的子进程。只有在非常繁忙机器上才需要调整这个参数。此值不宜过大。

MaxSpareServers
处于空闲状态的最大子进程数。
只有在非常繁忙机器上才需要调整这个参数。此值不宜过大。如果你将该指令的值设置为比MinSpareServers小，Apache将会自动将其修改成MinSpareServers+1。

MaxClients
允许同时连接的最大请求数量。
任何超过MaxClients限制的请求都将进入等待队列，直到达到ListenBacklog指令限制的最大值为止。

对于非线程型的MPM(也就是mpm_prefork)，MaxClients表示可以用于处理客户端请求的最大子进程数量，默认值是256。要增大这个值，你必须同时增大ServerLimit。

对于线程型或者混合型的MPM(也就是mpm_beos或mpm_worker)，MaxClients表示可以用于处理客户端请求的最大线程数量。线程型的mpm_beos的默认值是50。对于混合型的MPM默认值是16(ServerLimit)乘以25(ThreadsPerChild)的结果。因此要将MaxClients增加到超过16个进程才能提供的时候，你必须同时增加ServerLimit的值。

MinSpareThreads
处于空闲状态的最小线程数。
不同的MPM对这个指令的处理是不一样的：

mpm_worker的默认值是75。这个MPM将基于整个服务器监视空闲线程数。如果服务器中总的空闲线程数太少，子进程将产生新的空闲线程。mpm_netware的默认值是10。既然这个MPM只运行单独一个子进程，此MPM当然亦基于整个服务器监视空闲线程数。mpm_beos和mpmt_os2的工作方式与mpm_netware差不多，mpm_beos的默认值是1；mpmt_os2的默认值是5。

MaxSpareThreads
处于空闲状态的最大线程数。
不同的MPM对这个指令的处理是不一样的：

mpm_worker的默认值是250。这个MPM将基于整个服务器监视空闲线程数。如果服务器中总的空闲线程数太多，子进程将杀死多余的空闲线程。mpm_netware的默认值是100。既然这个MPM只运行单独一个子进程，此MPM当然亦基于整个服务器监视空闲线程数。mpm_beos和mpmt_os2的工作方式与mpm_netware差不多，mpm_beos的默认值是50；mpmt_os2的默认值是10。

备注：ServerLimit表示Apache允许创建的最大进程数。 值得注意的是，Apache在编译时内部有一个硬限制ServerLimit 20000(对于mpm_prefork模块为ServerLimit 200000)。你不能超越这个限制。
使用这个指令时要特别当心。如果将ServerLimit设置成一个高出实际需要许多的值，将会有过多的共享内存被分配。如果将ServerLimit和MaxClients设置成超过系统的处理能力，Apache可能无法启动，或者系统将变得不稳定。

注意：在配置相关参数时，请先保证服务器具备足够的硬件性能(例如：CPU、内存等)。 如果发现自启动后，随着服务器的运行时间增加，服务器的内存占用也随之增加，可能是程序中出现内存泄露，请向下调整参数MaxRequestsPerChild的值以降低内存泄露带来的影响，然后尽快找出程序中的问题之所在。