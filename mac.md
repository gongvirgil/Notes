-- Active: 1672755110557@@mysql-test-udcxiaoneng-dbproxy-test.xesv5.com@4700@baodian
# Mac

安装xcode
sudo xcode-select --switch /Library/Developer/CommandLineTools/
xcode-select --install
gcc -v

安装brew
/bin/zsh -c "$(curl -fsSL https://gitee.com/cunkai/HomebrewCN/raw/master/Homebrew.sh)"

安装git
brew install git

配置git账户

cd ~/.ssh
ssh-keygen -t rsa -C "xxxx@qq.com"
ssh-add ~/.ssh/id_rsa_github
github-添加公钥
ssh -T git@github.com

cd ~/.ssh
source config

```sh
TCPKeepAlive=yes

#客户端主动向服务端请求响应的间隔
ServerAliveInterval 60

# 配置文件参数
# Host : Host可以看作是一个你要识别的模式，对识别的模式，进行配置对应的的主机名和ssh文件
# HostName : 要登录主机的主机名
# User : 登录名
# IdentityFile : 指明上面User对应的identityFile路径

# github.com
Host github.com
    HostName github.com
    PreferredAuthentications publickey
    User gongvirgil@gmail.com
    IdentityFile ~/.ssh/id_rsa_github

# git.100tal.com
Host git.100tal.com
    HostName git.100tal.com
    PreferredAuthentications publickey
    User gongqiang1@tal.com
    IdentityFile ~/.ssh/id_rsa_100tal
```

安装docker

安装iterm

安装go

brew install go
brew info go
brew install go@1.17
brew unlink go@1.16
brew link go@1.17
echo 'export PATH="/usr/local/opt/go@1.17/bin:$PATH"' >> ~/.zshrc

go env -w GOPROXY=https://goproxy.cn,direct



package: name='com.autonavi.minimap' versionCode='120200' versionName='12.02.1.2415' compileSdkVersion='31' compileSdkVersionCodename='12'