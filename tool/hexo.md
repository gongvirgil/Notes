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

* $ hexo n blogname     # 新建文章 hexo new xxx
* $ hexo clean          # 清除缓存文件
* $ hexo g              # 生成静态文件 hexo generate
* $ hexo s              # 启动本地服务器，预览网页 hexo server
* $ hexo d              # 部署文件到指定的仓库 hexo deploy

记住上述命令就可以进行日常的个人博客维护工作。

## 插件

### hexo-admin

### hexo-tag-cloud

### hexo-migrator-rss


执行下列命令，从 RSS 迁移所有文章。source 可以是文件路径或网址。

```bash
$ hexo migrate rss <source>
```

### hexo-generator-feed

打开站点配置文件 ，字段Extensions，添加如下

```
# Extensions
## Plugins: http://hexo.io/plugins/
plugins: hexo-generate-feed
```

打开主题配置文件 ，字段rss，添加如下

```
rss: /atom.xml
```

配置完成，执行下列命令，可以看到/public文件夹中多了一个atom.xml文件

```
$ hexo g
```

发布之后，在侧边栏会生成一个RSS图标

### hexo-deployer-git

修改配置

```
deploy:
 type: git
 repo: <repository url>
 branch: [branch]
 message: [message]
```

参数	描述
repo	库（Repository）地址
branch	分支名称。如果您使用的是 GitHub 或 GitCafe 的话，程序会尝试自动检测。
message	自定义提交信息 (默认为 Site updated: {{ now('YYYY-MM-DD HH:mm:ss') }})


## 修改主题

Themes: https://hexo.io/themes/

【强烈推荐】NexT主题，非常漂亮。

git clone https://github.com/theme-next/hexo-theme-next themes/next

hexo默认主题不是特别好看，不过Themes里面列出了相当多不错的主题，这里我选择了alberta，然后对其进行了进一步的简化。

主题的安装、使用简单的不能再简单了，这里不再啰嗦，主要写一下我对主题的删减、修改部分吧：

删去开始部分的图片（加载起来浪费时间）
删掉页面底部的版权说明（这玩意儿没人看吧）
删掉很炫的fancybox（这么炫，我不敢用）
去掉分享文章的链接（又不是鸡汤文，没人会分享的）
部署国内CND（jquery和google字体…丧心病狂！）
修改了blockquote，code，table的样式。

## 迁移

### RSS

首先，安装 hexo-migrator-rss 插件。

$ npm install hexo-migrator-rss --save
插件安装完成后，执行下列命令，从 RSS 迁移所有文章。source 可以是文件路径或网址。

$ hexo migrate rss <source>

### Jekyll

把 _posts 文件夹内的所有文件复制到 source/_posts 文件夹，并在 _config.yml 中修改 new_post_name 参数。

new_post_name: :year-:month-:day-:title.md

### Octopress

把 Octopress source/_posts 文件夹内的所有文件转移到 Hexo 的 source/_posts 文件夹，并修改 _config.yml 中的 new_post_name 参数。

new_post_name: :year-:month-:day-:title.md

### WordPress

首先，安装 hexo-migrator-wordpress 插件。

$ npm install hexo-migrator-wordpress --save
在 WordPress 仪表盘中导出数据(“Tools” → “Export” → “WordPress”)（详情参考WP支持页面）。

插件安装完成后，执行下列命令来迁移所有文章。source 可以是 WordPress 导出的文件路径或网址。

$ hexo migrate wordpress <source>

https://www.jianshu.com/p/dda25ffcfd43