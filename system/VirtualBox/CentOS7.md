# CentOS7

## 新建虚拟机

* 新建
  * 名称：xxx
  * 类型：Linux
  * 版本：Red Hat 64
* 分配内存
* 虚拟硬盘：
  * 文件位置：
  * 文件大小：

* 设置
  * 存储
  * 控制器（IDE）

* 启动
  * 选择启动盘：选择centos7镜像文件

* 安装centos系统
  * 语言
  * 分区
  * ROOT密码
  * 开始安装...
  * 重启

## 桥接模式

桥接模式下，虚拟机和主机使用相同网卡，处于一个平行的关系，而不是从属的关系，虚拟机也会独占一个内网ip。

* 设置
  * 网络
  * 连接方式：桥接网卡
  * 界面名称：选择主机网卡

## 静态IP

vi /etc/sysconfig/network-scripts/ifcfg-enp0s3

```php
TYPE="Ethernet"
BOOTPROTO="static"  #静态ip，默认为dhcp，修改为static
NM_CONTROLLED="no"  #不使用网络管理器，而使用配置文件，这个配置要有
DEFROUTE="yes"
PEERDNS="yes"
PEERROUTES="yes"
IPV4_FAILURE_FATAL="no"
IPV6INIT="yes"
IPV6_AUTOCONF="yes"
IPV6_DEFROUTE="yes"
IPV6_PEERDNS="yes"
IPV6_PEERROUTES="yes"
IPV6_FAILURE_FATAL="no"
IPV6_ADDR_GEN_MODE="stable-privacy"
NAME="enp0s3"
UUID="c0dfc357-22d6-4b5d-abce-a7d8a9a95a67"
DEVICE="enp0s3"
ONBOOT="yes"     #开机启动，默认为no，修改为yes
#
IPADDR=192.168.1.120      #新增，ip地址
NETMASK=255.255.255.0     #新增，子网掩码
GATEWAY=192.168.1.1     #新增，网关
DNS1=114.114.114.114
DNS2=8.8.8.8
```

* 重启network使配置生效
  * 执行network重启命令 `service network restart`
* 查看IP配置：`ip addr`

## 查看IP配置

* centos 7 默认不再使用 `ifconfig`。需要使用 `ip addr`。

## ssh连接

ip地址：192.168.1.120
端口：默认为22

## yum

* 修改为阿里的yum源
  * 备份本地yum源: `mv /etc/yum.repos.d/CentOS-Base.repo /etc/yum.repos.d/CentOS-Base.repo_bak`
* 获取阿里yum源配置文件
  * scp root@10.0.1.49:/etc/yum.repos.d/ /etc/yum.repos.d/CentOS-Base.repo 
  * wget -O /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo 
* 更新cache: `yum makecache`
* 查看: `yum -y update`

## 安装基础工具

* yum -y install wget
* yum -y install vim

## 安装samba

* yum -y install samba