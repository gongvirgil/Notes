##windows

###连接远程服务器

    mstsc

###磁盘清理

    disk cleanup

##cmd

###wlan 开启wifi

1. 第一步、保证你自己笔记本上的无线网卡驱动支持，建议右键点击—我的电脑—设备管理器，找到无线网卡更新一下无线网卡驱动。
2. 第二步、右击左下角（win8，win10都懂得），打开命令提示符（管理员），输入：
netsh wlan set hostednetwork mode=allow ssid=自己喜欢的ID key=自己可以设置一个密码
3. 第三步、然后打开网络控制中心—更改适配器设置—宽带连接（或本地连接）—右击属性—共享选项卡—第一个复选框打上对勾。
4. 第四步、在命令提示符中输入：netsh wlan start hostednetwork
OK！你的无线共享就打开了，想要关闭那就把上面命令的 start 改为 stop，就是这么简单！
想要了解更多的东西，你可以在cmd中输入：netsh wlan

###批量重命名文件

将文件夹中的文件名在rename.xlsx文件中列出

    dir /b>rename.xlsx

Excel表格公式构造DOS命令

    ="ren "&A1&" "&B1

将全部命令复制，创建bat文件并执行

### 隐藏文件夹
	attrib +s +h e:/SECRET
	attrib -h -s e:/SECRET
	
attrib命令用来显示或更改文件属性。 
ATTRIB [+R | -R] [+A | -A ] [+S | -S] [+H | -H] [[drive:] [path] filename] [/S [/D]] 
+ 设置属性。 – 清除属性。 
R 只读文件属性。 
A 存档文件属性。 
S 系统文件属性。 
H 隐藏文件属性。 
[drive:][path][filename] 指定要处理的文件属性。 
/S 处理当前文件夹及其子文件夹中的匹配文件。 
/D 也处理文件夹。