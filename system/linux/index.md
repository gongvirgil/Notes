# Linux

## 系统目录

| 根目录 | Info |
|---|---|
| /home | 用户工作目录，和个人配置文件，如个人环境变量等，所有的账号分配一个工作目录。一般是一个独立的分区。|

drwxr-xr-x   2 root root  4096 8月   4 21:33 bin
drwxr-xr-x   3 root root  4096 8月   4 21:38 boot
drwxrwxr-x   2 root root  4096 10月 23  2016 cdrom
drwxr-xr-x  19 root root  4220 8月   4 21:27 dev
drwxr-xr-x 136 root root 12288 8月   4 21:38 etc
drwxr-xr-x   3 root root  4096 10月 23  2016 home
lrwxrwxrwx   1 root root    32 8月   4 21:37 initrd.img -> boot/initrd.img-4.4.0-83-generic
lrwxrwxrwx   1 root root    32 10月 23  2016 initrd.img.old -> boot/initrd.img-4.4.0-21-generic
drwxr-xr-x  22 root root  4096 8月   4 21:33 lib
drwx------   2 root root 16384 10月 23  2016 lost+found
drwxr-xr-x   2 root root  4096 4月  21  2016 media
drwxr-xr-x   2 root root  4096 4月  21  2016 mnt
drwxr-xr-x   2 root root  4096 4月  21  2016 opt
dr-xr-xr-x 206 root root     0 8月   4 21:27 proc
drwx------   8 root root  4096 7月   4 22:47 root
drwxr-xr-x  32 root root  1080 8月   4 21:37 run
drwxr-xr-x   2 root root 12288 8月   4 21:34 sbin
drwxr-xr-x   2 root root  4096 4月  19  2016 snap
drwxr-xr-x   2 root root  4096 4月  21  2016 srv
dr-xr-xr-x  13 root root     0 8月   4 21:27 sys
drwxrwxrwt  11 root root  4096 8月   4 22:09 tmp
drwxr-xr-x  11 root root  4096 4月  21  2016 usr
drwxr-xr-x  15 root root  4096 11月 23  2016 var
lrwxrwxrwx   1 root root    29 8月   4 21:37 vmlinuz -> boot/vmlinuz-4.4.0-83-generic
lrwxrwxrwx   1 root root    29 10月 23  2016 vmlinuz.old -> boot/vmlinuz-4.4.0-21-generic


/
第一层次结构的根、整个文件系统层次结构的根目录。
/bin/
需要在单用户模式可用的必要命令（可执行文件）；面向所有用户，例如：cat、ls、cp，和/usr/bin类似。
/boot/
引导程序文件，例如：kernel、initrd；时常是一个单独的分区[6]
/dev/
必要设备, 例如：, /dev/null.
/etc/
特定主机，系统范围内的配置文件。
关于这个名称目前有争议。在贝尔实验室关于UNIX实现文档的早期版本中，/etc 被称为/etcetra 目录，[7]这是由于过去此目录中存放所有不属于别处的所有东西（然而，FHS限制/etc存放静态配置文件，不能包含二进制文件）。[8]自从早期文档出版以来，目录名称已被以各种方式重新称呼。最近的解释包括反向缩略语如："可编辑的文本配置"（英文 "Editable Text Configuration"）或"扩展工具箱"（英文 "Extended Tool Chest")。[9]
/etc/opt/
/opt/的配置文件
/etc/X11/
X_Window系统(版本11)的配置文件
/etc/sgml/
SGML的配置文件
/etc/xml/
XML的配置文件
/home/
用户的家目录，包含保存的文件、个人设置等，一般为单独的分区。
/lib/
/bin/ and /sbin/中二进制文件必要的库文件。
/media/
可移除媒体(如CD-ROM)的挂载点 (在FHS-2.3中出现)。
/lost+found
在ext3文件系统中，当系统意外崩溃或机器意外关机，会产生一些文件碎片在这里。当系统在开机启动的过程中fsck工具会检查这里，并修复已经损坏的文件系统。当系统发生问题。可能会有文件被移动到这个目录中，可能需要用手工的方式来修复，或移到文件到原来的位置上。
/mnt/
临时挂载的文件系统。比如cdrom,u盘等，直接插入光驱无法使用，要先挂载后使用
/opt/
可选应用软件包。
/proc/
虚拟文件系统，将内核与进程状态归档为文本文件（系统信息都存放这目录下）。例如：uptime、 network。在Linux中，对应Procfs格式挂载。该目录下文件只能看不能改（包括root）
/root/
超级用户的家目录
/sbin/
必要的系统二进制文件，例如： init、 ip、 mount。sbin目录下的命令，普通用户都执行不了。
/srv/
站点的具体数据，由系统提供。
/tmp/
临时文件(参见 /var/tmp)，在系统重启时目录中文件不会被保留。
/usr/
默认软件都会存于该目录下。用于存储只读用户数据的第二层次；包含绝大多数的(多)用户工具和应用程序。
/var/
变量文件——在正常运行的系统中其内容不断变化的文件，如日志，脱机文件和临时电子邮件文件。有时是一个单独的分区。如果不单独分区，有可能会把整个分区充满。如果单独分区，给大给小都不合适。