### git安装

#### Windows下安装

官网下载地址：[https://git-scm.com/downloads](https://git-scm.com/downloads)
安装完毕，将bin目录路径与git-core目录路径添加到系统path变量，就可以在cmd下直接使用git了。

### git常用命令

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



###查看远程分支

    $ git branch -a

###创建分支

    $ git branch <branchName>

###切换分支

    $ git checkout <branchName>

###合并分支

    $ git merge <branchName>

###删除远程分支

    $ git push origin --delete <branchName>

###删除远程tag

    $ git push origin --delete tag <tagname>  

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




###恢复删除的分支

git log

找到commit_id

git branch recover_branch[新分支] commit_id

新建一个分支，丢失的东西给恢复到了recover_branch分支上了。

### 大小写敏感

	git config core.ignorecase false

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