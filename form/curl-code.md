# curl错误码列表

状态码 | 状态原因 | 解释
---|---|---
0  | 正常访问 | 
1  | 错误的协议 | 未支持的协议。此版cURL 不支持这一协议。
2  | 初始化代码失败 | 初始化失败。
3  | URL格式不正确 | URL 格式错误。语法不正确。
4  | 请求协议错误 | 
5  | 无法解析代理 | 无法解析代理。无法解析给定代理主机。
6  | 无法解析主机地址 | 无法解析主机。无法解析给定的远程主机。
7  | 无法连接到主机 | 无法连接到主机。
8  | 远程服务器不可用 | FTP 非正常的服务器应答。cURL 无法解析服务器发送的数据。
9  | 访问资源错误 | FTP 访问被拒绝。服务器拒绝登入或无法获取您想要的特定资源或目录。最有可能的是您试图进入一个在此服务器上不存在的目录。
11 | FTP密码错误 | FTP 非正常的PASS 回复。cURL 无法解析发送到PASS 请求的应答。
13 | 结果错误 | FTP 非正常的的PASV 应答，cURL 无法解析发送到PASV 请求的应答。
14 | FTP回应PASV命令 | FTP 非正常的227格式。cURL 无法解析服务器发送的227行。
15 | 内部故障 | FTP 无法连接到主机。无法解析在227行中获取的主机IP。
17 | 设置传输模式为二进制 | FTP 无法设定为二进制传输。无法改变传输方式到二进制。
18 | 文件传输短或大于预期 | 部分文件。只有部分文件被传输。
19 | RETR命令传输完成 | FTP 不能下载/访问给定的文件， RETR (或类似)命令失败。
21 | 命令成功完成 | FTP quote 错误。quote 命令从服务器返回错误。
22 | 返回正常 | HTTP 找不到网页。找不到所请求的URL 或返回另一个HTTP 400或以上错误。此返回代码只出现在使用了-f/--fail 选项以后。
23 | 数据写入失败 | 写入错误。cURL 无法向本地文件系统或类似目的写入数据。
25 | 无法启动上传 | FTP 无法STOR 文件。服务器拒绝了用于FTP 上传的STOR 操作。
26 | 回调错误 | 读错误。各类读取问题。
27 | 内存分配请求失败 | 内存不足。内存分配请求失败。
28 | 访问超时 | 操作超时。到达指定的超时期限条件。
30 | FTP端口错误 | FTP PORT 失败。PORT 命令失败。并非所有的FTP 服务器支持PORT 命令，请尝试使用被动(PASV)传输代替！
31 | FTP错误 | FTP 无法使用REST 命令。REST 命令失败。此命令用来恢复的FTP 传输。
33 | 不支持请求 | HTTP range 错误。range "命令"不起作用。
34 | 内部发生错误 | HTTP POST 错误。内部POST 请求产生错误。
35 | SSL/TLS握手失败 | SSL 连接错误。SSL 握手失败。
36 | 下载无法恢复 | FTP 续传损坏。不能继续早些时候被中止的下载。
37 | 文件权限错误 | 文件无法读取。无法打开文件。权限问题？
38 | LDAP可没有约束力 | LDAP 无法绑定。LDAP 绑定(bind)操作失败。
39 | LDAP搜索失败 | LDAP 搜索失败。
41 | 函数没有找到 | 功能无法找到。无法找到必要的LDAP 功能。
42 | 中止的回调 | 由回调终止。应用程序告知cURL 终止运作。
43 | 内部错误 | 内部错误。由一个不正确参数调用了功能。
45 | 接口错误 | 接口错误。指定的外发接口无法使用。
47 | 过多的重定向 | 过多的重定向。cURL 达到了跟随重定向设定的最大限额跟
48 | 无法识别选项 | 指定了未知TELNET 选项。
49 | TELNET格式错误 | 不合式的telnet 选项。
51 | 远程服务器的SSL证书 | peer 的SSL 证书或SSH 的MD5指纹没有确定。
52 | 服务器无返回内容 | 服务器无任何应答，该情况在此处被认为是一个错误。
53 | 加密引擎未找到 | 找不到SSL 加密引擎。
54 | 设定默认SSL加密失败 | 无法将SSL 加密引擎设置为默认。
55 | 无法发送网络数据 | 发送网络数据失败。
56 | 衰竭接收网络数据 | 在接收网络数据时失败。
57 |  | 
58 | 本地客户端证书 | 本地证书有问题。
59 | 无法使用密码 | 无法使用指定的SSL 密码。
60 | 凭证无法验证 | peer 证书无法被已知的CA 证书验证。
61 | 无法识别的传输编码 | 无法辨识的传输编码。
62 | 无效的LDAP URL | 无效的LDAP URL。
63 | 文件超过最大大小 | 超过最大文件尺寸。
64 | FTP失败 | 要求的FTP 的SSL 水平失败。
65 | 倒带操作失败 | 发送此数据需要的回卷(rewind)失败。
66 | SSL引擎失败 | 初始化SSL 引擎失败。
67 | 服务器拒绝登录 | 用户名、密码或类似的信息未被接受，cURL 登录失败。
68 | 未找到文件 | 在TFTP 服务器上找不到文件。
69 | 无权限 | TFTP 服务器权限有问题。
70 | 超出服务器磁盘空间 | TFTP 服务器磁盘空间不足。
71 | 非法TFTP操作 | 非法的TFTP 操作。
72 | 未知TFTP传输的ID | 未知TFTP 传输编号(ID)。
73 | 文件已经存在 | 文件已存在(TFTP) 。
74 | 错误TFTP服务器 | 无此用户(TFTP) 。
75 | 字符转换失败 | 字符转换失败。
76 | 必须记录回调 | 需要字符转换功能。
77 | CA证书权限 | 读SSL 证书出现问题(路径？访问权限？ ) 。
78 | URL中引用资源不存在 | URL 中引用的资源不存在。
79 | 错误发生在SSH会话 | SSH 会话期间发生一个未知错误。
80 | 无法关闭SSL连接 | 未能关闭SSL 连接。
81 | 服务未准备 | 
82 | 无法载入CRL文件 | 无法加载CRL 文件，丢失或格式不正确(在7.19.0版中增加) 。
83 | 发行人检查失败 | 签发检查失败(在7.19.0版中增加) 。