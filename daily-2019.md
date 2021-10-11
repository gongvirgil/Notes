# Daily Record

### 2019-11-01

ssh root@192.168.199.100

### 2019-11-02

* Mac
* automator
* terminal
* 新建文件

* docker环境 docker使用
* laradock 常用环境

sudo curl -L "https://github.com/docker/compose/releases/download/1.24.1/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

sudo chmod +x /usr/local/bin/docker-compose

docker-compose version

### 2019-11-03

Client:
 Version:         1.13.1
 API version:     1.26
 Package version: docker-1.13.1-103.git7f2769b.el7.centos.x86_64
 Go version:      go1.10.3
 Git commit:      7f2769b/1.13.1
 Built:           Sun Sep 15 14:06:47 2019
 OS/Arch:         linux/amd64

Server:
 Version:         1.13.1
 API version:     1.26 (minimum version 1.12)
 Package version: docker-1.13.1-103.git7f2769b.el7.centos.x86_64
 Go version:      go1.10.3
 Git commit:      7f2769b/1.13.1
 Built:           Sun Sep 15 14:06:47 2019
 OS/Arch:         linux/amd64
 Experimental:    false

### 2019-11-18

docker pull redis
docker run -itd -p 6379:6379 --name redis_1 redis /bin/bash
docker exec -it redis_1 bash

root@588dbcdcbf4e:/data# redis-cli -v
redis-cli 5.0.6
root@588dbcdcbf4e:/data# redis-server -v
Redis server v=5.0.6 sha=00000000:0 malloc=jemalloc-5.1.0 bits=64 build=24cefa6406f92a1f