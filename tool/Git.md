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