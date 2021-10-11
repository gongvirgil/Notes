# sublime theme

> Numix

Preferences -> setting - User

```
"theme": "Numix Dark Light Blue.sublime-theme",
"numix_folder_icons": true,
"tabs_large": true,
"sidebar_tree_xlarge": true,
"overlay_scroll_bars": "enabled",
```

import urllib.request,os,hashlib; h = '2915d1851351e5ee549c20394736b442' + '8bc59f460fa1548d1514676163dafc88'; pf = 'Package Control.sublime-package'; ipp = sublime.installed_packages_path(); urllib.request.install_opener( urllib.request.build_opener( urllib.request.ProxyHandler()) ); by = urllib.request.urlopen( 'http://packagecontrol.io/' + pf.replace(' ', '%20')).read(); dh = hashlib.sha256(by).hexdigest(); print('Error validating download (got %s instead of %s), please try manual install' % (dh, h)) if dh != h else open(os.path.join( ipp, pf), 'wb' ).write(by)


## sublime常用快捷鍵

| Windows                     | Mac                   | 功能 |
|---|---|---|
| Ctrl+L                      |   | 选择整行（按住-继续选择下行）
| Ctrl+KK                     |   | 从光标处删除至行尾
| Ctrl+K                      |   | Backspace，从光标处删除至行首
| Ctrl+J                      |   | 合并行（已选择需要合并的多行时）
| Ctrl+KU                     |   | 改为大写
| Ctrl+KL                     |   | 改为小写
| Ctrl+D                      | command+D  | 选中相同的字符串（按住-继续选择下个相同的字符串）
| Ctrl+M                      |   | 光标移动至括号内开始或结束的位置
| Ctrl+/                      |   | 注释整行（如已选择内容，同“Ctrl+Shift+/”效果）
| Ctrl+Shift+c                |   | 转换为utf8
| Ctrl+R                      | command+R  | 搜索指定文件的函数标签
| Ctrl+G                      |   | 跳转到指定行
| Ctrl+KT                     |   | 折叠属性
| Ctrl+K0                     |   | 展开所有
| Ctrl+U                      |   | 软撤销
| Ctrl+T                      |   | 词互换
| Ctrl+Enter                  |   | 光标后插入行
| Ctrl+Shift+Enter            |   | 光标前插入行
| Ctrl+Shift+[                |   | 折叠代码
| Ctrl+Shift+]                |   | 展开代码
| Ctrl+Shift+↑                |   | 与上行互换
| Ctrl+Shift+↓                |   | 与下行互换
| Ctrl+Shift+A                |   | 选择光标位置父标签对儿
| Ctrl+Shift+D                |   | 复制光标所在整行，插入在该行之前
| ctrl+shift+F                |   | 在文件夹内查找，与普通编辑器不同的地方是sublime允许添加多个文件夹进行查找
| Ctrl+Shift+K                |   | 删除整行
| Ctrl+Shift+L                |   | 鼠标选中多行（按下快捷键），即可同时编辑这些行
| Ctrl+Shift+M                |   | 选择括号内的内容（按住-继续选择父括号）
| Ctrl+Shift+P                |   | 打开命令面板
| Ctrl+Shift+/                |   | 注释已选择内容
| Ctrl+PageDown<br>Ctrl+PageUp|   | 文件按开启的前后顺序切换
| Ctrl+鼠标左键               |   | 可以同时选择要编辑的多处文本
| Tab                         |   | 缩进、自动完成
| Shift+Tab                   |   | 去除缩进
| Ctrl+F2                     |   | 设置书签.
| F2                          |   | 下一个书签
| Shift+F2                    |   | 上一个书签
| shift+鼠标右键              |   | 列选择
| Alt+F3                      |   | 选中文本按下快捷键，即可一次性选择全部的相同文本进行同时编辑
| Alt+.                       |   | 闭合当前标签
| Alt+Shift+1~9               |   | 分屏
| F6                          |   | 检测语法错误
| F9                          |   | 行排序(按a-z)
| F11                         |   | 全屏模式
| Shift+鼠标中/右键           |   | 可以用鼠标进行竖向多行选择
| Shift+Tab                   |   | 去除缩进
| selected+F12                |   | 跳转到定义处 |

## 常用设置

### 将TAB转换为空格

Preferences -> setting - User

```
"tabs": 4, //设置缩进长度
"translate_tabs_to_spaces": true,
"expand_tabs_on_save": true  //设置保存时自动转换
```



## sublime常用插件

* Package Control
* Alignment (快捷键改为 ctrl+shift+a)
* BracketHighlighter
* Color Highlighter
* Colorpicker
* DocBlockr （注释）
* PyV8 / Emmet
* jQuery
* SidebarEnhancements
* OmniMarkupPreviewer
* HTML-CSS-JS Prettify
* DeleteBlankLines
* FileDiffs
* SublimeLinter
* Monokai extended
* Sublimerge

###Package Control

Sublime Text提供了绝对必要的包管理器。这是安装下面列出的所有插件和主题的最佳方式。继续，在包控制在安装插件。

使用方法：进入命令面板（`ctrl + shift+ p`），然后键入 install。

###Alignment

功能：”=”号对齐

简介：变量定义太多，长短不一，可一键对齐

使用：默认快捷键`Ctrl+ Alt + A`和QQ截屏冲突，可设置其他快捷键如：`Ctrl+Shift+Alt+A`；先选择要对齐的文本

Preferences=>Package Settings=>Alignment=>Key Bindding - User
```
    { "keys": ["ctrl+alt+a"], "command": "alignment"}
```


###AlignTab

AlignTab是调整你的代码的插件。它有一个“预览模式”，你可以在它实际应用前，看到对齐是如何应用的(在给定正则表达式符号)。它也有“Table模式”，使你能够为通过管道符：| 设置的Markdown表格来设置合适的对齐方式。AlignTab是一个方便的扩展，它整理代码对齐,让它更容易阅读。

###AutoFileName

功能：快捷输入文件名

简介：自动完成文件名的输入，如图片选取

使用：输入”/”即可看到相对于本项目文件夹的其他文件

### BracketHighlighter

点击对应代码 可匹配[], (), {}, “”, ”, <tag></tag>，高亮标记，便于查看起始和结束标记

### CSScomb

CSS属性排序

### Clickable URLs

### Color Highlighter

ColorHighlighter是一个显示选中颜色代码的视觉颜色的插件。如果您选择“# fff“，它将向您展示白色。ColorHighlighter支持所有CSS颜色格式，如Hex,RGB,HSL,HSV,同时包括颜色关键词,如“red”“green”,等等。它还为你显示包含颜色值的LESS,Sass,和Stylus变量。它是一个帮助您更直观处理颜色的插件。

### Colorpicker

使用一个取色器改变颜色，Ctrl / Cmd + Shift + C

###CTags

###CSScomb

`ctrl+shift+c` 重新排列CSS中定义的属性，帮助你按照你预定义的排序格式生成新的CSS。

### CSS Compact Expand

CSS属性展开收缩

###DeleteBlankLines

ctrl+alt+backspace 删除空行

###DocBlockr

功能：生成优美注释

简介：标准的注释，包括函数名、参数、返回值等，并以多行显示，手动写比较麻烦

使用：输入/*、/**然后回车，还有很多用法，请参照 https://sublime.wbond.net/packages/DocBlockr

```
{
    "jsdocs_extra_tags":[
        "${1:[description]}",
    ],
    "jsdocs_function_description": false
}
```

###Emmet

Emmet绝对的节省时间。您可以轻松快速地编写HTML。

###PyV8

Emmet 依赖包

###FileDiffs

功能：强大的比较代码不同工具

简介：比较当前文件与选中的代码、剪切板中代码、另一文件、未保存文件之间的差别。可配置为显示差别在外部比较工具，精确到行。

使用：右键标签页，出现FileDiffs Menu或者Diff with Tab…选择对应文件比较即可

### FileHeader

将一个模板文件分为header和body两部分。允许用户自定义自己的模板文件。
FileHeader能够自动的监测创建新文件动作，自动的添加模板。
不仅支持创建已经使用模板初始化好的文件，而且支持将header添加到已经存在的文件头部，并且支持批量添加。
使用了非常强大并且很容易使用的Jinja2模板系统，在模板文件里你可以完成很多复杂的初始化。
几乎支持所有的编程语言，并且支持用户自定义语言。
能够自动的更新文件最后修改时间。
能够自动的更新文件最后的修改者，这在协同开发中是一个很有用的功能。
同时支持ST2/ST3。

### Git

功能：git管理

简介：插件基本上实现了git的所有功能

使用：https://github.com/kemayo/sublime-text-git/wiki

### HTML-CSS-JS Prettify

`ctrl + shift+ h` 格式化HTML/CSS/JS文档
依赖本地node环境

### jQuery

jQ函数提示和自动补全

### MarkdownEditing

### Markdown Preview

### Monokai extended

字体方案，支持markdown语法高亮

### MultiEditUtils

[MultiEditUtils](https://github.com/philippotto/Sublime-MultiEditUtils)插件增强了SublimeText内置的“multi-cursor”和“multi-selection”功能,在编辑冗长的代码行时为我们节省了时间。例如:您可以在选择的行之间合并或交换,它还增强了SublimeText的“split selection”，允许您指定符号来分离选定的行。我认为这是专业码农必须安装的一个插件。

### SidebarEnhancements

在侧边栏的文件上右击时，这个插件提供了大量更多的选择。打开，查找，复制和粘贴，等等。


### OmniMarkupPreviewer

`ctrl + alt+ o` 用来预览markdown 编辑的效果，同样支持渲染代码高亮的样式。

### phpFormat

### SublimeLinter

是前端编码利器——Sublime Text 的一款插件，用于高亮提示用户编写的代码中存在的不规范和错误的写法，支持 JavaScript、CSS、HTML、Java、PHP、Python、Ruby 等十多种开发语言。这篇文章介绍如何在 Windows 中配置 SublimeLinter 进行 JS & CSS 校验。

### SublimeTmpl

快速生成文件模板