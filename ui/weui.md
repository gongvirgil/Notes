# WeUI

https://weui.io/

WeUI 是一套同微信原生视觉体验一致的基础样式库，由微信官方设计团队为微信内网页和微信小程序量身设计，令用户的使用感知更加统一。

WeUI 是微信官方设计团队为微信 Web 开发量身打造的一个 UI 样式库，你可以把它理解为一个前端框架，类似于 Bootstrap 的那种。 由于是微信官方出品，所以对微信的兼容性基本没有太大问题，而且各组件的样式和微信一样，能够和微信很好的融合在一起，给用户较好的体验。

 为微信Web开发量身设计，可以令用户的使用感知更加统一。

如何使用
WeUI 官方 Github：https://github.com/weui/weui

WeUI 官方 Releases：https://github.com/weui/weui/releases【进入该地址下载最新版】

WeUI 官方 Wiki：https://github.com/weui/weui/wiki【快速上手文档～】

Demo：https://weui.io【在线查看为UI Demo】

WeUI 是一个样式库，核心文件就是 weui.css，如果用于生产环境，建议使用官方提供的 CDN 或下载官方最新的 Releases 引入即可，CDN 地址可以在官方 Wiki 中找到，生产环境建议使用压缩后的 weui.min.css 。 

微信官方：http://res.wx.qq.com/open/libs/weui/1.1.3/weui.min.css

微信官方：http://res.wx.qq.com/open/libs/weui/0.4.3/weui.min.css

BootCDN：http://cdn.bootcss.com/weui/0.4.3/style/weui.css

CDNJS：http://cdnjs.cloudflare.com/ajax/libs/weui/0.4.3/style/weui.css



模块： 目前包含12个模块 (Button, Cell, Toast, Dialog, Progress, Msg, Article, ActionSheet, Icons, Panel, Tab, SearchBar).

注意：

<head></head>标签里要加上：

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">

引入：

<link rel="stylesheet" href="http://res.wx.qq.com/open/libs/weui/0.4.0/weui.min.css">

<body>的开始标签要加属性：

<body ontouchstart>

WeUIWeUI这样就搞定了，你可以任意使用各种组件了，关于组件怎么使用，去看官方 Wiki 就好了，或者 F12 去扒官方 Demo 把他们的代码复制过来就行了。

！！如果你需要修改一些样式，建议新建一个 css 文件覆盖原样式而不是修改原文件。
