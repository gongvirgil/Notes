# hexo

博客管理工具-hexo
hexo是一个轻量级的博客管理系统，这里要注意，hexo是一个管理系统，它负责新建、部署等博客管理工作。如果使用过git做版本控制的话应该很容易理解，它可以类比为git，可以通过一些命令生成静态网页、把静态网页推送到远程仓库。

## hexo安装

由于hexo是基于node.js制作的一款博客管理工具，所以要按照hexo就需要事先安装node，http://nodejs.cn/download/

npm install -g hexo-cli

## hexo初始化

安装hexo之后需要对hexo进行初始化，首先需要新建文件夹，进入到新建文件夹之后再进行初始化，

$ mkdir hexo
$ cd hexo
$ hexo init
然后安装一些依赖包，

$ npm install
最后可以得到如下目录，

* 文章
* 关于
* 分类
* 标签

themes中包含的是博客的主题相关内容，其中默认的主题是landscape。

## hexo使用

前面提到过，hexo其实类似于git，通过一些命令来实现静态网页生成、部署等工作，我们在维护博客过程中主要使用的有如下几个命令，

* $ hexo n blogname     # 新建文章，例如，hexo n ComputerScience
* $ hexo clean          # 清除缓存文件
* $ hexo g              # 生成静态文件
* $ hexo s              # 启动本地服务器，预览网页
* $ hexo d              # 部署文件到指定的仓库

记住上述命令就可以进行日常的个人博客维护工作。