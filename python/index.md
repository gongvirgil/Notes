# Python

## 安装

1. Mac 下 安装 python

查看是否已有  python，方式：打开终端，输入 python，如出现如下，则说明已有默认安装的 python：
说明：一般 Mac 电脑上默认安装了 python，版本一般为 2.7 或 2.6
位置在：/System/Library/Frameworks/Python.framework/Versions/2.7


安装 python3:

1. 安装OS X的套件管理器 Homebrew
2. 安装配置 python 版本管理器 pyenv, 可使用命令：
3. brew update
4. brew install pyenv
5. 使用命令

6. sudo -H pip install python3.5.4 （python3 目录自动添加到 .bash_profile 中了，通过命令 open .bash_profile 查看，默认安装地址：/Library/Frameworks/Python.framework/Versions/3.5/bin）
7. brew install python3 (默认安装为新版本,地址：/usr/local/Cellar/python/3.6.5）
8. pyenv:
查看能安裝的版本: $ pyenv install --list
使用 pyenv 安装 python3: $ pyenv install 3.5.0 -v //此法安装需要配置环境变量，操作如下：
操作：打开环境变量文件，用命令 open .bash_profile，添加安装路径：
PATH="/Users/linda/.pyenv/versions/3.5.4/bin:${PATH}" 
export PATH
之后就可以使用 python 和 python3 在 版本2和3之间切换
安装完成后，更新数据库: $ pyenv rehash
查看目前系统已安装的 Python 版本:$ pyenv versions //* 表示系统当前正在使用的版本
切换 Python 版本:$ pyenv global 3.5.4 //想运行的版本号



alias python2='/System/Library/Frameworks/Python.framework/Versions/2.7/bin/python2.7'
alias python3='/usr/local/Cellar/python/3.6.5/bin/python3.6'
# alias python=python3
