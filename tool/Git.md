# git

## git安装

#### Windows下安装

官网下载地址：[https://git-scm.com/downloads](https://git-scm.com/downloads)
安装完毕，将bin目录路径与git-core目录路径添加到系统path变量，就可以在cmd下直接使用git了。

#### sourcetree



## git常用命令

$ git init 使用当前目录作为Git仓库

$ git init <新仓库名> 初始化后目录下会出现一个名为 .git 的目录，所有 Git 需要的数据和资源都存放在这个目录中

$ git remote add origin git@github.com:xxx/xxx.git 连接远程仓库

$ git clone <版本库的网址> <本地目录名>

$ git fetch origin master  从远程获取最新版本到本地，不会自动merge

$ git pull origin master  相当于git fetch 和 git merge

$ git status

$ git add .

$ git add -u    自动追踪文件，包括你已经手动删除的，状态为Deleted的文件

$ git rm .../... -r -f

$ git checkout .

$ git commit -m "..."

$ git push origin master

rake post title="文章标题"

rake page name="页面名称.md"

rake page name="pages/页面名称.md"

$ git reset HEAD .

$ git reset HEAD <file>

$ git log

$ git reset --hard <commit_id>

$ git cherry-pick <commit_id>   // 把某个commit id的提交合并到当前分支.

## 合并多次提交

git rebase 命令：将多次commit合并，只保留一次提交历史记录。

## 免密码提交

### linux

在~/下执行：

	cd ~
	git config --global credential.helper store

可以看到多了一个~/.gitconfig文件：

	[credential]
	helper = store

之后cd到项目目录，执行git pull命令，会提示输入账号密码。输完这一次以后就不再需要，并且会在根目录生成一个.git-credentials文件。

### windows

* 方法一：创建文件存储GIT用户名和密码

在%HOME%目录中，一般为C:\users\Administrator，也可以是你自己创建的系统用户名目录，反正都在C:\users\中。文件名为.git-credentials,由于在Window中不允许直接创建以"."开头的文件，所以需要借助git bash进行，打开git bash客户端，进行%HOME%目录，然后用touch创建文件 .git-credentials, 用vim编辑此文件，输入内容格式：

touch .git-credentials

vim .git-credentials

https://{username}:{password}@github.com

1.2 添加Git Config 内容

进入git bash终端， 输入如下命令：

git config --global credential.helper store

执行完后查看%HOME%目录下的.gitconfig文件，会多了一项：

[credential]

helper = store
重新开启git bash会发现git push时不用再输入用户名和密码

* 方法二

2.1 添加环境变量

在windows中添加一个HOME环境变量，变量名:HOME,变量值：%USERPROFILE%

2.2 创建git用户名和密码存储文件

进入%HOME%目录，新建一个名为"_netrc"的文件，文件中内容格式如下：

	machine {git account name}.github.com
	login your-usernmae
	password your-password

重新打开git bash即可，无需再输入用户名和密码

## branch

* git branch : 列出本地已经存在的分支，并且在当前分支的前面用"*"标记
* git branch -r : 查看远程版本库分支列表
* git branch -a : 查看所有分支列表，包括本地和远程
* git branch `<branchName>` : 创建名为`<branchName>`的分支，创建分支时需要是最新的环境，创建分支但依然停留在当前分支
* git branch -d `<branchName>` : 删除`<branchName>`分支，如果在分支中有一些未merge的提交，那么会删除分支失败，此时可以使用-D强制删除
* git branch -D `<branchName>` : 强制删除`<branchName>`分支
* git branch -vv : 可以查看本地分支对应的远程分支
* git branch -m `<oldName>` `<newName>` : 给分支重命名

* git checkout `<branchName>` : 切换到`<branchName>`分支
* git checkout -b `<branchName>` : 如果分支存在则只切换分支，若不存在则创建并切换到`<branchName>`分支，repo start是对git checkout -b这个命令的封装，将所有仓库的分支都切换到`<branchName>`分支

* git merge `<branchName>` : 合并分支

* git push origin --delete `<branchName>` : 删除远程分支

* 推送本地分支`local`到远程分支`remote`并建立关联关系
  * 远程已有`remote`分支并且已经关联本地分支`local`且本地已经切换到`local` : git push
  * 远程已有`remote`分支但未关联本地分支`local`且本地已经切换到`local` : git push -u origin/`remote`
  * 远程没有`remote`分支，本地已经切换到`local` : git push origin `local`:`remote`

## tag

    $ git push origin --delete tag <tagname>


## 要更新本地仓库的远程地址请运行

*(ssh):*
git remote set-url origin git@mail.emi-gitlab.com:webcc/docker-image.git

或 http(s):

git remote set-url origin http://mail.emi-gitlab.com/webcc/docker-image.git


git查看某个文件的提交历史
git log --pretty=oneline 文件名
接下来使用git show显示具体的某次的改动。
git show <git提交版本号> <文件名>

##忽略目录或文件

 touch .gitignore

 在文件夹就生成了一个`.gitignore`的配置文件

###开放模式

过滤文件夹设置：

/mtk/       表示过滤这个文件夹

过滤文件设置

指定过滤某种类型的文件：
*.zip
*.rar
*.via
*.tmp
*.err

指定过滤某个文件：
/mtk/do.c

/mtk/if.h

###保守模式

跟踪某个文件夹

!/plutommi/mmi

跟踪某类文件

!*.c

!*.h

跟踪某个指定文件

!/plutommi/mmi/mmi_features.h

###已经push过的目录或文件

git rm --cached logs/xx.log

然后更新 .gitignore 忽略掉目标文件，最后

git commit -m "We really don't want Git to track this anymore!"

### 恢复删除的分支

git log

找到commit_id

git branch recover_branch[新分支] commit_id

新建一个分支，丢失的东西给恢复到了recover_branch分支上了。

### 大小写敏感

* git config core.ignorecase false

### 忽略文件权限

* git config core.filemode false  // 当前版本库
* git config --global core.fileMode false // 所有版本库
* cat .git/config // 查看git的配置文件

## Git各个状态之间转换指令总结

### 基本状态标识

* A- = untracked 未跟踪
* A = tracked 已跟踪未修改
* A+ = modified - 已修改未暂存
* B = staged - 已暂存未提交
* C = committed - 已提交未PUSH

### 各状态之间变化

* A- -> B : git add <FILE>
* B -> A- : git rm --cached <FILE>
* B -> 删除不保留文件 : git rm -f <FILE>
* A -> A- : git rm --cached <FILE>
* A -> A+ : 修改文件
* A+ -> A : git checkout -- <FILE>
* A+ -> B : git add <FILE>
* B -> A+ : git reset HEAD <FILE>
* B -> C : git commit
* C -> B : git reset --soft HEAD^
* 修改最后一次提交:git commit --amend

## 撤销

> 版本回退

* git reset --hard 版本号

> 绿字变红字(撤销add)

* 撤销所有的已经add的文件: git reset HEAD .
* 撤销某个文件或文件夹：git reset HEAD -filename

> 红字变无 (撤销没add修改)

* git checkout -- filename

> 移除未track的文件

* git clean -df

-d表示同时移除目录,-f表示force,因为在git的配置文件中, clean.requireForce=true,如果不加-f,clean将会拒绝执行.

在编译git库拉下来的代码时，往往会产生一些中间文件，这些文件我们根本不需要，尤其是在成产环节做预编译，检查代码提交是否能编译通过这种case时，我们往往需要编译完成后不管正确与否，还原现场，以方便下次sync代码时不受上一次的编译影响。
> 删除 untracked files
git clean -f

 
> 连 untracked 的目录也一起删掉
git clean -fd

 
> 连 gitignore 的untrack 文件/目录也一起删掉 （慎用，一般这个是用来删掉编译出来的 .o之类的文件用的）
git clean -xfd

 
> 在用上述 git clean 前，强烈建议加上 -n 参数来先看看会删掉哪些文件，防止重要文件被误删
git clean -nxfd
git clean -nf
git clean -nfd




composer create-project --prefer-dist laravel/laravel blog 5.6.24


git fetch --all
git reset --hard origin/master
git pull

## 库源

查看当前远程Git库源地址

git remote -v
git remote -version

修改当前的源地址

git remote set-url origin [GIT URL]

//orgin为当前源地址名，[GIT URL]为欲修改源地址

添加一个新的Git库源地址

$git remote add [NAME] [GIT URL]

//[NAME]为新的Git库源地址名，[GIT URL]为新的git库源地址

删除一个Git库源地址

$git remote remove [NAME]
$git remote rm [NAME]

//[NAME]为Git库源地址名

## 版本问题

在使用git pull、git push、git clone会报类似如下的错误：
error: The requested URL returned error: 401 Unauthorized while accessing https://git.oschina.net/zemo/demo.git/info/refs
fatal: HTTP request failed

一般是由于git版本的问题。
使用如下指令查看版本：

```bash
git --version
git version 1.7.1
```

可以通过安装更高的版本解决问题。

Centos Git1.7.1升级到Git2.2.1

安装需求：

```bash
yum install curl-devel expat-devel gettext-devel openssl-devel zlib-devel asciidoc
yum install  gcc perl-ExtUtils-MakeMaker
wget http://ftp.gnu.org/pub/gnu/libiconv/libiconv-1.14.tar.gz
tar zxvf libiconv-1.14.tar.gz
cd libiconv-1.14
./configure --prefix=/usr/local/libiconv
make && make install
```

卸载Centos自带的git1.7.1:
通过git –version查看系统带的版本，Cento6.5应该自带的是git版本是1.7.1

```bash
yum remove git
```

下载git2.2.1并将git添加到环境变量中

```bash
wget https://github.com/git/git/archive/v2.2.1.tar.gz
tar zxvf v2.2.1.tar.gz
cd git-2.2.1
make configure
./configure --prefix=/usr/local/git --with-iconv=/usr/local/libiconv
make all doc
make install install-doc install-html
echo "export PATH=$PATH:/usr/local/git/bin" >> /etc/bashrc
source /etc/bashrc
```

查看版本号

```bash
git --version
git version 2.2.1
```

centos下升级git版本的操作记录


在使用git pull、git push、git clone的时候，或者在使用jenkins发版的时候，可能会报类似如下的错误：
error: The requested URL returned error: 401 Unauthorized while accessing https://git.oschina.net/zemo/demo.git/info/refs
fatal: HTTP request failed

这个一般是由于服务器本身自带的git版本过低造成的：

[root@uatjenkins01 ~]# git --version
git version 1.7.1
一般只需要将git版本升级到高版本即可。下面说下git升级的操作记录：

0）安装依赖软件
[root@uatjenkins01 ~]# yum install curl-devel expat-devel gettext-devel openssl-devel zlib-devel asciidoc
[root@uatjenkins01 ~]# yum install  gcc perl-ExtUtils-MakeMaker

1）卸载系统自带的底版本git（1.7.1）
[root@uatjenkins01 ~]# git --version
git version 1.7.1
[root@uatjenkins01 ~]# yum remove git

2）编译安装最新的git版本
[root@uatjenkins01 ~]# cd /usr/local/src/
[root@uatjenkins01 src]# wget https://www.kernel.org/pub/software/scm/git/git-2.15.1.tar.xz
[root@uatjenkins01 src]# tar -vxf git-2.15.1.tar.xz
[root@uatjenkins01 src]# cd git-2.15.1
[root@uatjenkins01 git-2.15.1]# make prefix=/usr/local/git all
[root@uatjenkins01 git-2.15.1]# make prefix=/usr/local/git install
[root@uatjenkins01 git-2.15.1]# echo "export PATH=$PATH:/usr/local/git/bin" >> /etc/profile
[root@uatjenkins01 git-2.15.1]# source /etc/profile

[root@uatjenkins01 ~]# git --version
git version 2.15.1

======================================================================
如果是非root用户使用git，则需要配置下该用户下的环境变量
[app@uatjenkins01 ~]$ echo "export PATH=$PATH:/usr/local/git/bin" >> ~/.bashrc
[app@uatjenkins01 ~]$ source ~/.bashrc
[app@uatjenkins01 ~]$ git --version
git version 2.15.1