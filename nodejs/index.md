# nodejs

## 安装

首先在官网查看当前最新的版本: https://nodejs.org/dist/

当前最新的是: https://nodejs.org/dist/v8.11.3/node-v8.11.3.tar.gz

移动到目录

```bash
cd /usr/local/
```

在centos中执行命令下载（可根据当前的版本情况下载最新的版本）
/usr/local/目录中可能会需要root读写权限
wget https://nodejs.org/dist/v8.11.3/node-v8.11.3.tar.gz
 
 
下载完成后解压并重命名为node

```bash
tar zxvf node-v8.11.3.tar.gz
mv node-v8.1.4-linux-x64 node
```

配置环境变量

```bash
vim /etc/profile
```

在最后边添加

#set for nodejs
export NODE_HOME=/usr/local/node
export PATH=$NODE_HOME/bin:$PATH
 
保存退出（:wq）执行命令是更改生效

```bash
source /etc/profile
```

我执行之后依然不行，重启之后才可以使用命令

使用命令查看版本，出现相应版本号则表示成功

```bash
node -v
npm -v
```


https://nodejs.org/dist/v8.11.3/node-v8.11.3.tar.gz