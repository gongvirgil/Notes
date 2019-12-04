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


## 镜像加速

* [镜像加速](https://yeasy.gitbooks.io/docker_practice/content/install/mirror.html)

* win7镜像加速
  docker-machine ssh default
  sudo sed -i "s|EXTRA_ARGS='|EXTRA_ARGS='--registry-mirror=https://registry.docker-cn.com |g" /var/lib/boot2docker/profile
  exit
  docker-machine restart default

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

* 创建容器: docker create 容器名或者容器ID
* 启动容器: docker start [-i] 容器名
* 运行容器: docker run [OPTIONS] IMAGE [COMMAND] [ARG...]
  * 相当于docker create + docker start
  * 数据卷：其实就是一个正常的容器，专门用来提供数据卷供其它容器挂载的
  * OPTIONS说明：
    * -a stdin: 指定标准输入输出内容类型，可选 STDIN/STDOUT/STDERR 三项；
    * -d: 后台运行容器，并返回容器ID；
    * -i: 以交互模式运行容器，通常与 -t 同时使用；
    * -P: 随机端口映射，容器内部端口随机映射到主机的高端口
    * -p: 指定端口映射，格式为：主机(宿主)端口:容器端口
    * -t: 为容器重新分配一个伪输入终端，通常与 -i 同时使用；
    * --name="nginx-lb": 为容器指定一个名称；
    * --dns 8.8.8.8: 指定容器使用的DNS服务器，默认和宿主一致；
    * --dns-search example.com: 指定容器DNS搜索域名，默认和宿主一致；
    * -h "mars": 指定容器的hostname；
    * -e username="ritchie": 设置环境变量；
    * --env-file=[]: 从指定文件读入环境变量；
    * --cpuset="0-2" or --cpuset="0,1,2": 绑定容器到指定CPU运行；
    * -m :设置容器使用内存最大值；
    * --net="bridge": 指定容器的网络连接类型，支持 bridge/host/none/container: 四种类型；
    * --link=[]: 添加链接到另一个容器；
    * --expose=[]: 开放一个端口或一组端口；
    * --volume , -v: 绑定一个卷
* 查看正在运行的容器: docker ps
* 查看所有容器: docker ps -a
* 查看最近一次运行的容器: docker ps -l
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
* 进入容器的命令行: docker attach 容器名或者容器ID bash
    * 退出容器后容器会停止
* 进入容器的命令行: docker exec -it 容器名或者容器ID bash
* 查看WEB应用程序容器的进程: docker top 容器名
* 查看Docker的底层信息: docker inspect 容器名
    * 查看容器所挂载的目录: docker inspect container_name | grep Mounts -A 20

docker exec -it <container_id> bash -c 'cat > /path/to/container/file' < /path/to/host/file/



## Dockerfile

Dockerfile文件中的关键字：

### FROM

语法：FROM <image>[:<tag>]
解释：设置要制作的镜像基于哪个镜像，FROM指令必须是整个Dockerfile的第一个指令，如果指定的镜像不存在默认会自动从Docker Hub上下载。

### MAINTAINER

语法：MAINTAINER <name>
解释：MAINTAINER指令允许你给将要制作的镜像设置作者信息。

### ADD

语法：ADD <src> <dest>
解释：ADD指令用于从指定路径拷贝一个文件或目录到容器的指定路径中，<src>是一个文件或目录的路径，也可以是一个url，路径是相对于该Dockerfile文件所在位置的相对路径，<dest>是目标容器的一个绝对路径。

### WORKDIR

语法：WORKDIR /path/to/workdir
解释：WORKDIR指令用于设置Dockerfile中的RUN、CMD和ENTRYPOINT指令执行命令的工作目录(默认为/目录)，该指令在Dockerfile文件中可以出现多次，如果使用相对路径则为相对于WORKDIR上一次的值，例如WORKDIR /data，WORKDIR logs，RUN pwd最终输出的当前目录是/data/logs。

### RUN

语法：① RUN <command>   #将会调用/bin/sh -c <command>
      ② RUN ["executable", "param1", "param2"] #将会调用exec执行，以避免有些时候shell方式执行时的传递参数问题，而且有些基础镜像可能不包含/bin/sh
解释：RUN指令会在一个新的容器中执行任何命令，然后把执行后的改变提交到当前镜像，提交后的镜像会被用于Dockerfile中定义的下一步操作，RUN中定义的命令会按顺序执行并提交，这正是Docker廉价的提交和可以基于镜像的任何一个历史点创建容器的好处，就像版本控制工具一样。

### ENV

语法：ENV <key> <value>
解释：ENV指令用于设置环境变量，在Dockerfile中这些设置的环境变量也会影响到RUN指令，当运行生成的镜像时这些环境变量依然有效，如果需要在运行时更改这些环境变量可以在运行docker run时添加–env <key>=<value>参数来修改。
注意：最好不要定义那些可能和系统预定义的环境变量冲突的名字，否则可能会产生意想不到的结果。

### EXPOSE

语法：EXPOSE <port> [ ...]
解释：EXPOSE指令用来告诉Docker这个容器在运行时会监听哪些端口，Docker在连接不同的容器(使用–link参数)时使用这些信息。

### CMD

语法： ① CMD ["executable", "param1", "param2"]    #将会调用exec执行，首选方式
      ② CMD ["param1", "param2"]        #当使用ENTRYPOINT指令时，为该指令传递默认参数
      ③ CMD <command> [ <param1>|<param2> ]        #将会调用/bin/sh -c执行
解释：CMD指令中指定的命令会在镜像运行时执行，在Dockerfile中只能存在一个，如果使用了多个CMD指令，则只有最后一个CMD指令有效。当出现ENTRYPOINT指令时，CMD中定义的内容会作为ENTRYPOINT指令的默认参数，也就是说可以使用CMD指令给ENTRYPOINT传递参数。
注意：RUN和CMD都是执行命令，他们的差异在于RUN中定义的命令会在执行docker build命令创建镜像时执行，而CMD中定义的命令会在执行docker run命令运行镜像时执行，另外使用第一种语法也就是调用exec执行时，命令必须为绝对路径。

### USER
### ENTRYPOINT
### VOLUME
### ONBUILD

## docker-compose

### 安装docker-compose

apt-get update
apt-get install python-pip
pip uninstall docker-compose( 如果有老版的，先删除掉)
pip install docker-compose
docker-compose --vesion



### docker-compose.yml

一份标准配置文件应该包含 version、services、networks 三大部分

* [docker-compose.yml](https://www.jianshu.com/p/2217cfed29d7)

```
version: '2'
services:
  `服务名称-自定义`:
    image: `指定服务的镜像名称或镜像 ID`
    ports:
      - 8080
    networks:
      - front-tier
      - back-tier

  redis:
    image: redis
    links:
      - web
    networks:
      - back-tier

  lb:
    image: dockercloud/haproxy
    ports:
      - 80:80
    links:
      - web
    networks:
      - front-tier
      - back-tier
    volumes:
      - /var/run/docker.sock:/var/run/docker.sock

networks:
  front-tier:
    driver: bridge
  back-tier:
driver: bridge
```

#### services