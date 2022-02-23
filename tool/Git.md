# git

## git安装

#### Windows下安装

官网下载地址：[https://git-scm.com/downloads](https://git-scm.com/downloads)
安装完毕，将bin目录路径与git-core目录路径添加到系统path变量，就可以在cmd下直接使用git了。

#### sourcetree

## 配置全局用户名和邮箱：

```sh
git config --global user.name "xxx"  # 配置全局用户名，如Github上注册的用户名
git config --global user.email "yyy@mail.com"  #配置全局邮箱，如Github上配置的邮箱
```

--global选项代表全局，是配置的全局user.name和user.email。不同的Git仓库默认的用户名和邮箱都是这个值。由于需要管理多个账户，所以仅使用这个全局值是不够的，需要在每个仓库中单独配置。

如果已配置过，先重置

```sh
git config --global --unset user.name
git config --global --unset user.email

```
查看账户配置

```sh
git config --global user.name
git config --global user.email
```

## 配置多个Git账户

### 对每个账户生成一对密钥

首先进入保存秘钥的目录，该目录下保存秘钥，需要提醒的是这个目录是默认隐藏的，可以打开Finder，按下command + shift + .即可显示全部隐藏文件

```sh
cd ~/.ssh //查看秘钥目录
```

然后，根据账户邮箱生成秘钥。命令为：

```sh
ssh-keygen -t rsa -C "xxxx@qq.com"
```

生成秘钥后，会提示：

```sh
Generating public/private rsa key pair.
Enter file in which to save the key (/Users/liugui/.ssh/id_rsa):
```

可以使用

```sh
cat ~/.ssh/id_rsa.pub  #查看公钥，  id_rsa  没有pub 后缀的是秘钥，也叫私钥
```

注意：
1. (/Users/liugui/.ssh/id_rsa): 冒号后面是让输入秘钥名的；
2. 秘钥默认的文件名是id_rsa。为方便区分，可以自定义名字为id_rsa_Balopy。
3. 接下来的提示都直接进行回车，直到秘钥生成。
4. 通过ls命令，可以看到刚刚生成的密钥id_rsa_Balopy和 公钥id_rsa_Balopy.pub。
同理，对其他账户，使用同样的方法。

### 私钥添加到本地

SSH协议的原理，就是在托管网站上使用公钥，在本地使用私钥，这样本地仓库就可以和远程仓库进行通信。在上一步已经生成了秘钥文件，接下来需要使用秘钥文件，首先是在本地使用秘钥文件：

```sh
ssh-add ~/.ssh/id_rsa_github // 将GitHub私钥添加到本地
ssh-add ~/.ssh/id_rsa_gitlab // 将GitLab私钥添加到本地
```

为了检验本地是否添加成功，可以使用`ssh-add -l`命令进行查看

### 对本地秘钥进行配置

由于添加了多个密钥文件，所以需要对这多个密钥进行管理。在.ssh目录下新建一个config文件：

touch config
文件中的内容如下：

```sh
#网站的别名，随意取
Host Balopy
# 托管网站的域名
HostName gitee.com 
#指定优先使用哪种方式验证，支持密码和秘钥验证方式
PreferredAuthentications publickey 
# 托管网站上的用户名，最好写账户邮箱，否则容易设置失败
User lueng@163.com
# 使用的密钥文件
IdentityFile ~/.ssh/id_rsa_Balopy_gitee

# GitLab的配置相同
Host wang
HostName gitee.com
PreferredAuthentications publickey
User wang@268xue.com
IdentityFile ~/.ssh/id_rsa
```

如果报以下错误，需要检查一下，用户名是否是邮箱，或域名是否按要求设置
配置错误的情况

注意：
Host 是别名，替代的是 gitee.com， 在push/pull代码是，
切记格式:
git@gitee.com:balopy/Demo_Swift_2.0.git  // 原仓库地址
git@Balopy:Balopy/Demo_Swift_2.0.git     // 使用时用别名
git clone Balopy:balopy/Demo_Swift_2.0.git //如clone 时用别名

### 公钥添加到托管网站

以GitHub为例，先在本地复制公钥。进入.ssh目录，使用`vim id_rsa_github.pub`查看生成的GitHub公钥，全选进行复制。

登录GitHub，点击右上角头像选择设置，在打开的页面中选择SSH公钥

添加公钥
托管网站的公钥添加完成。每个托管平台分别生成一对密钥，分别添加到本地和托管网站。

这时候，可以测试一下配置是否成功，测试命令使用别名。例如，对于GitHub，本来应该使用的测试命令是：

```sh
ssh -T gitee.com // 单账号使用原域名，
ssh -T Balopy   // 多账号测试时使用别名
```

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
git rebase -i HEAD~2

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
* git branch -d `<branchName>` : 删除本地`<branchName>`分支，如果在分支中有一些未merge的提交，那么会删除分支失败，此时可以使用-D强制删除
* git branch -D `<branchName>` : 强制删除本地`<branchName>`分支
* git branch -vv : 可以查看本地分支对应的远程分支
* git branch -m `<oldName>` `<newName>` : 给分支重命名

* git checkout `<branchName>` : 切换到`<branchName>`分支
* git checkout -b `<branchName>` : 如果分支存在则只切换分支，若不存在则创建并切换到`<branchName>`分支，repo start是对git checkout -b这个命令的封装，将所有仓库的分支都切换到`<branchName>`分支

* git merge `<branchName>` : 合并该分支到当前所在分支

* git push origin --delete `<branchName>` : 删除远程分支
* git remote prune origin : 远程分支残留清除

* 推送本地分支`local`到远程分支`remote`并建立关联关系
  * 远程已有`remote`分支并且已经关联本地分支`local`且本地已经切换到`local` : git push
  * 远程已有`remote`分支但未关联本地分支`local`且本地已经切换到`local` : git push -u origin/`remote`
  * 远程没有`remote`分支，本地已经切换到`local` : git push origin `local`:`remote`

* 对比两个分支
	* 查看 dev 有，而 master 中没有的：git log dev ^master

## tag

    $ git push origin --delete tag <tagname>

## stash

* `git stash save "save message"` ：执行存储时，添加备注，方便查找，只有git stash 也要可以的，但查找时不方便识别。
* `git stash list` ：查看stash了哪些存储
* `git stash show` ：显示做了哪些改动，默认show第一个存储,如果要显示其他存贮，后面加stash@{$num}，比如第二个 git stash show stash@{1}
* `git stash show -p` ：显示第一个存储的改动，如果想显示其他存存储，命令：git stash show  stash@{$num}  -p ，比如第二个：git stash show  stash@{1}  -p
* `git stash apply` ：应用某个存储,但不会把存储从存储列表中删除，默认使用第一个存储,即stash@{0}，如果要使用其他个，git stash apply stash@{$num} ， 比如第二个：git stash apply stash@{1} 
* `git stash pop` ：命令恢复之前缓存的工作目录，将缓存堆栈中的对应stash删除，并将对应修改应用到当前的工作目录下,默认为第一个stash,即stash@{0}，如果要应用并删除其他stash，命令：git stash pop stash@{$num} ，比如应用并删除第二个：git stash pop stash@{1}
* `git stash drop stash@{$num}` ：丢弃stash@{$num}存储，从列表中删除这个存储
* `git stash clear` ：删除所有缓存的stash

> 暂存部分文件

* add 那些你不想备份的文件（例如： git add file1.js, file2.js）
* `git stash –keep-index` 只会备份那些没有被add的文件。
* `git reset` 取消已经add的文件的备份。

> 撤销merge

第一步：git checkout到你要恢复的那个分支上
git checkout develop
第二步：git reflog查出要回退到merge前的版本号
git reflog
git reset --hard [版本号]

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

git rm -r --cached .
git config core.autocrlf false
git add .
git commit -m 'update .gitignore'
git config core.autocrlf true

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


> git 删除所有历史提交记录方法

```s
切换分支
git checkout --orphan latest_branch
添加所有文件
git add -A
提交更改
git commit -am "no message"
删除分支
git branch -D master
重命名分支
git branch -m master
强制更新
git push -f origin master
```