# Docker

* [官方文档](https://docs.docker.com/)

大家在协同开发过程中，通常会遇到各人开发环境不同，导致本地部署开发环境浪费时间、扩展库有差异、甚至系统不同等问题，docker就是为了解决这些问题、快速开发环境、让开发人员迅速进入开发状态而生的。

Docker是一个基于Go语言的开源应用容器引擎，可以自动化地部署应用到可移植的的容器中，这些容器独立于硬件、语言、框架、打包系统。

一个标准的Docker容器包含一个软件组件及其所有的依赖——二进制文件，库，配置文件，脚本等等。

Docker扩展了LXC(Linux Container)，使用高层的API，提供轻量虚拟化解决方案来实现进程间隔离。可以运行在任何支持cgroups(control groups)跟AUFS的64位Linux内核上。

LXC是docker的核心技术，借助于namespace的隔离机制和cgroup限额功能，提供了一套统一的API和工具来建立和管理container。(类Hypervisor)
Linux Namespace (ns)
Control Groups (cgroups)

LXC 旨在提供一个共享kernel的OS级虚拟化方法，在执行时不用重复加载kernel, 且container的kernel与host共享，因此可以大大加快container的启动过程，并显著减少内存消耗。

在LXC的基础上, Docker额外提供的Feature包括：
1、标准统一的打包部署运行方案
2、历史版本控制
3、Image的重用
4、Image共享发布等。


## 安装

* [docker-toolbox](https://www.docker.com/products/docker-toolbox)

### windows下安装Docker

http://blog.csdn.net/ownfire/article/details/45847939