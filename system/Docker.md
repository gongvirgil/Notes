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

* 下载安装[Docker Toolbox](https://get.daocloud.io/#install-docker-for-mac-windows)
    * [https://get.daocloud.io/toolbox/](https://get.daocloud.io/toolbox/)
* 双击“Docker Quickstart Terminal”启动一个终端窗口，自动执行脚本
* 验证安装: docker run hello-world
* 打开Oracle VM VirtualBox，选中“正在运行”状态的 default 虚拟机
    * 进入 设置->共享文件夹，添加共享文件夹，选中docker_study文件夹，勾选“自动挂载”、“固定分配”，确定
    * 在default上右键，重启该虚拟机。
* 使用git作为终端来连接我们的 docker 主机: docker-machine ssh default
* 使用ssh连接，虚拟机IP、端口22、docker/tcuser
* 进入到 docker 主机中，也就是终端显示docker@default:~$的情况，输入命令: mount
* 可以看到docker_study在虚拟机内的路径，进入该路径，查看是否读取到我们主机的文件与文件夹
* 从归档文件中创建镜像: cat docker.tar.gz | docker import - webcc:webcc-demo

## 常用命令

* 查看docker版本: docker version
* 显示docker系统的信息: docker info

* 检索image: docker search image_name

* 下载image: docker pull image_name

* 列出镜像列表: docker images
    * -a, --all=false Show all images
    * --no-trunc=false Don't truncate output
    * -q, --quiet=false Only show numeric IDs
* 删除一个或者多个镜像: docker rmi image_name
    * -f, --force=false Force
    * --no-prune=false Do not delete untagged parents
* 显示一个镜像的历史: docker history image_name
    * --no-trunc=false Don't truncate output
    * -q, --quiet=false Only show numeric IDs
* 保存镜像到一个tar包: docker save image_name -o file_path
    * -o, --output="" Write to an file
* 加载一个tar包格式的镜像: docker load -i file_path
    * -i, --input="" Read from a tar archive file

```
    docker save image_name > /home/save.tar
    docker load < /home/save.tar
```

* 列出当前所有正在运行的container: docker ps
* 列出所有的container: docker ps -a
* 列出最近一次启动的container: docker ps -l
* 删除所有容器: docker rm `docker ps -a -q`
* 删除单个容器: docker rm Name/ID
    * -f, --force=false
    * -l, --link=false Remove the specified link and not the underlying container
    * -v, --volumes=false Remove the volumes associated to the container
* 停止一个容器: docker stop Name/ID
* 启动一个容器: docker start Name/ID
* 杀死一个容器: docker kill Name/ID
* 从一个容器中取日志: docker logs Name/ID
    * -f, --follow=false Follow log output
    * -t, --timestamps=false Show timestamps
* 列出一个容器里面被改变的文件或者目录: docker diff Name/ID
    * list列表会显示出三种事件，A 增加的，D 删除的，C 被改变的
* 显示一个运行的容器里面的进程信息: docker top Name/ID\
* 从容器里面拷贝文件/目录到本地一个路径
    * docker cp Name:/container_path to_path
    * docker cp ID:/container_path to_path
* 重启一个正在运行的容器: docker restart Name/ID
    * -t, --time=10 Number of seconds to try to stop for before killing the container, Default=10
* 附加到一个运行的容器上面: docker attach ID
    * --no-stdin=false Do not attach stdin
    * --sig-proxy=true Proxify all received signal to the process
docker attach 容器名或者容器ID bash     # 进入容器的命令行（退出容器后容器会停止）
docker exec -it 容器名或者容器ID bash   # 进入容器的命令行