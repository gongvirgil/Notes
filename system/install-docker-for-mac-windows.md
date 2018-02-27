# install-docker-for-mac-windows

## 下载安装

根据自己的电脑系统，在 [install-docker-for-mac-windows](https://get.daocloud.io/#install-docker-for-mac-windows) 下载最新安装包并安装。

选择好目录后下一步，提示需要安装什么组件：

* Docker Compose for Window 勾选
* VirtualBox 虚拟机，如果电脑之前安装过 Oracle VM VirtualBox 可以不勾选
* Kitematic for Windows(Alpha) 使用图形界面来使用 docker，建议勾选
* Git for Windows 一个版本控制 + bash 命令终端，如果没有安装建议勾选

继续下一步

* Create a desktop shortcut
* Add docker binaries to PATH
* Upgrade Boot2Dcoker VM

三个选项全部勾选，下一步就开始安装软件到系统中，等待一会即可完成安装。

## 初始化虚拟机

打开安装目录，不出意外目录结构是这样的：

```
├──kitematic
├──boot2docker.iso
├──docker.exe
├──docker-compose.exe
├──docker-machine.exe
├──docker-quickstart-terminal.ico
├──start.sh
├──unins000.dat
└──unins000.exe
```

将`boot2docker.iso`拷贝至`C:\Users\用户名\.docker\machine\cache`目录下，双击打开`start.sh`文件。

当看到该画面时表示虚拟机已经安装在Virtual Box里面，可以打开Oracle VM VirtualBox查看：

这一步完成后，我们需要了解一个概念，就是现在我们有了两个系统，一个 windows 系统即我们直接操作的图形界面系统，我们称为主机，在主机上安装了VirtualBox，该软件内有 linux 虚拟机，称为docker主机，在 docker 主机中我们之后还会创建 linux 系统，称为容器。

可以通过终端显示的用户名@计算机名来区分

## 主机与 docker 主机共享文件夹

