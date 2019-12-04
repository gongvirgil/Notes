# iTerm2

https://www.cnblogs.com/soyxiaobi/p/9695931.html
https://github.com/sirius1024/iterm2-with-oh-my-zsh
https://www.jianshu.com/p/7de00c73a2bb

* 安装iTerm2 https://www.iterm2.com/

安装完成后，在/bin目录下会多出一个zsh的文件。
Mac系统默认使用dash作为终端，可以使用命令修改默认使用zsh：
chsh -s /bin/zsh

* [Zsh和Bash有何不同](https://www.xshell.net/shell/bash_zsh.html)

## 使用脚本自动登录远程服务器

新建一个expect脚本 login.exp

```sh
#!/usr/bin/expect
if { [llength $argv] < 4 } {
puts "Usage: $argv0 ip port user passwd"
exit 1
}

set ip [lindex $argv 0]
set port [lindex $argv 1]
set user [lindex $argv 2]
#set passwd [lindex $argv 3]
set passwd "virgil19930312@xes"
set timeout 30

spawn ssh -q -l$user -p$port $ip

expect {
"assword:" {
send "$passwd\r"
}
"FATAL" {
puts "\nCONNECT ERROR: $ip occur FATAL ERROR!!!\n"
exit 1
}
"No route to host" {
puts "\nCONNECT ERROR: $ip No route to host!!!\n"
exit 1
}
}

puts "\n—> Connected: $ip, pls enjoy yourself!\n"
interact
```

该脚本需要四个参数:
* 远程地址
* 远程端口
* 远程用户名
* 用户密码

将expect脚本copy到$PATH下（例如/usr/local/bin）
cp login.exp /usr/local/bin/login.exp

在profiles中 脚本使用：login.exp 地址 端口 用户名 密码