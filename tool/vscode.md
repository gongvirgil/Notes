# vscode

## 常用插件

* 图标用 vscode-icons
* 主题用 One Dark Pro
* [调试php](https://blog.csdn.net/x356982611/article/details/52664334)
* setting sync
  * setting sync token : 3aede12d2cffb1add4f560898f0fe915
  * 上传配置：option+shift+U
  * 下载配置：option+shift+D

* `PHP Symbols`: 函数列表 ctrl+shift+O
* `Code alignment`: 对齐 ctrl+= ctrl+=x
* `Markdown PDF`
* `vscode-pdf`
* `HTML Snippets`：增强了zen-coding，增加了H5的自动补全，安装后每次打开自动启用(可能与其他插件冲突)。
* `Angular 1.x Snippets`：增加了AngularJs 1在.html和.js中的代码补全，安装后每次打开自动启用。
* `Git Easy`：增加了vscode中自带的git操作，安装后按F1调出控制台，输入git easy [options]完成git操作，代替git bash。
* `HTML CSS Support`: 增加.html中css的代码补全，可以手动增加配置文件来增加外部css中的class补全。详情见插件说明。
* `VScode-icons`： 美化VSCode的界面，在文件名前面显示小图标，安装后每次打开自动启用。
* `Git Blame`：可以查看当前光标所在位置的Git Log，最近一次提交的人和时间，显示在左下角，安装后每次打开自动启用。
* `HTML CSS Class Completion`：扫描项目中的所有css中的class名，在html中自动补全，安装后每次打开自动启用。注意：如果css过多容易卡死。
* `Debugger for Chrome`：方便js调试的插件，前端项目在Chrome中运行起来之后，可以直接在VSCode中打断点、查看输出、查看控制台，需要配置launch.json,详情见插件说明。
* `background`：VSCode美化插件，修改界面背景，详情见插件说明。
* `Bracket Pair Colorizer`： 为括号添加颜色，便于区分作用域范围。

1.Bracket Pair Colorizer：为括号添加颜色，便于区分作用域范围。
2.open in browser：用浏览器快捷打开并预览html文件
3.Path Intellisense：路径自动补全与提示
4.Npm Intellisense：require三方文件时路径与文件名提示补全
5.beautiful：代码美化格式化
6.Auto Rename Tag：修改HTML标签，修改一个另一个自动同步修改
7.CSS Peek：按住ctrl+左键点击class类名可快速定位到样式表位置，快捷修改

Code   runner   测试代码用的
VIM   --- 喜欢用VIM操作的小伙伴可以加上这个，不要用amVIM(用得不爽，好多vim功能都没有)
Better Align  --- 对齐用的，设置一下快捷键 Ctrl + Alt + =,对块自动等号对齐
Auto Close Tag    自动标签闭合
Auto Rename Tag  自动标签重命名
Code Outline    函数变量列表  （目前有点小问题，显示的函数列表是双份的）
ftp-simple      FTP远程同步工具   
HTML Snippets     HTML小片段工具
IntelliSense for CSS class names   CSS类名工具
JavaScript code snippets     
JS-CSS-HTML Formatter
jshint      js代码检查工具
MetaGO    类是easymotion ，可以用键盘快速移动的工具
npt Intellisense       其他软件需要这个辅助工具，（具体不是很清楚）
Path Intellisense     路径管理工具
PHP  Debug   
PHP Extension  Pack  PHP扩展包
PHP Intellisense       PHP自动补全工具
PHP Intellisense -Crane   PHP自动补全工具
Project Manager     多个项目之间切换的工具
Typing Installer    不是很清楚，但很有用




## 常用快捷键

### 编辑器与窗口管理

自动换行：首选项 -> 设置 -> editor.wordWrap

同时打开多个窗口（查看多个项目）

* 打开一个新窗口：Ctrl+Shift+N
* 关闭窗口：Ctrl+Shift+W
* 查看终端：Ctrl+~
* ctrl + , 并搜索 workbench， `Edit in settings.json`

同时打开多个编辑器（查看多个文件）

* 新建文件 Ctrl+N
* 历史打开文件之间切换 Ctrl+Tab，Alt+Left，Alt+Right
* 切出一个新的编辑器（最多3个）Ctrl+\，也可以按住Ctrl鼠标点击Explorer里的文件名
* 左中右3个编辑器的快捷键Ctrl+1 Ctrl+2 Ctrl+3
* 3个编辑器之间循环切换 Ctrl+`
* 编辑器换位置，Ctrl+k然后按Left或Right

一、vscode常用快捷键
1.新建文件：chtr+n
2.新开窗口：ctrl+shift+n
3.分屏：ctrl+1/2/3
4.切换文件：alt+1/2/3或ctrl+tab
5.关闭当前窗口：ctrl+w
6.关闭所有已保存窗口：ctrl+k+w
7.显示/隐藏左侧边栏：ctrl+b
8.文件重命名：鼠标选中+f2
9.自动换行：alt+z（标签过长需要拖动编辑器下方滚动条阅读时不太方便，可以一键换行）
10.注释：ctrl+/
11.多行编辑：alt+鼠标左键
12.隐藏/显示终端：ctrl+~
13.查找并打开文件：ctrl+p
14.选中当前单词：ctrl+d
如果想选中所有此单词，ctrl+shift+L
15.文件内容查找替换：ctrl+f  ctrl+h ，替换一个ctrl+shift+1，替换所有ctrl+alt+enter
16.项目全局搜索：ctrl+shift+f
17.移动当前行，向上alt+up（方向键↑）  向下alt+down
18.在当前行上方插入一行：ctrl+shift+enter
20.跳转到文件头部/尾部：ctrl+home/end
21.选中光标到行首/行尾文本：shift+home/end
22.选中部分文字：shift+left/right/up/down
23.删除当前行：ctrl+shift+k，会与搜狗输入法软键盘冲突（我更喜欢ctrl+x，把剪切当删除用）
24.更改语言模式：建议自定义修改为ctrl+k


### 代码编辑

格式调整

* 代码行缩进Ctrl+[， Ctrl+]
* 折叠打开代码块 Ctrl+Shift+[， Ctrl+Shift+]
* Ctrl+C Ctrl+V如果不选中，默认复制或剪切一整行
* 代码格式化：Shift+Alt+F，或Ctrl+Shift+P后输入format code
* 修剪空格Ctrl+Shift+X
* 上下移动一行： Alt+Up 或 Alt+Down
* 向上向下复制一行： Shift+Alt+Up或Shift+Alt+Down
* 在当前行下边插入一行：Ctrl+Enter
* 在当前行上方插入一行：Ctrl+Shift+Enter
* 同竖列插入多行光标：Alt+Shift   

光标相关

* 移动到行首：Home
* 移动到行尾：End
* 移动到文件结尾：Ctrl+End
* 移动到文件开头：Ctrl+Home
* 移动到后半个括号 Ctrl+Shift+]
* 选中当前行Ctrl+i（双击）
* 选择从光标到行尾Shift+End
* 选择从行首到光标处Shift+Home
* 删除光标右侧的所有字Ctrl+Delete
* Shrink/expand selection： Shift+Alt+Left和Shift+Alt+Right
* Multi-Cursor：可以连续选择多处，然后一起修改，Alt+Click添加cursor或者Ctrl+Alt+Down 或 Ctrl+Alt+Up
* 同时选中所有匹配的Ctrl+Shift+L
* Ctrl+D下一个匹配的也被选中(被我自定义成删除当前行了，见下边Ctrl+Shift+K)
* 回退上一个光标操作Ctrl+U

重构代码

* 跳转到定义处：F12
* 定义处缩略图：只看一眼而不跳转过去Alt+F12
* 列出所有的引用：Shift+F12
* 同时修改本文件中所有匹配的：Ctrl+F12
* 重命名：比如要修改一个方法名，可以选中后按F2，输入新的名字，回车，会发现所有的文件都修改过了。
* 跳转到下一个Error或Warning：当有多个错误时可以按F8逐个跳转
* 查看diff 在explorer里选择文件右键 Set file to compare，然后需要对比的文件上右键选择Compare with 'file_name_you_chose'.

查找替换

* 查找 Ctrl+F
* 查找替换 Ctrl+H
* 整个文件夹中查找 Ctrl+Shift+F

显示相关

* 全屏：F11
* zoomIn/zoomOut：Ctrl + =/Ctrl + -
* 侧边栏显/隐：Ctrl+B
* 预览markdown Ctrl+Shift+V

其他

* 自动保存：File -> AutoSave ，或者Ctrl+Shift+P，输入 auto
