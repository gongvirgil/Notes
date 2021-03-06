# vim

## 光标移动

```shell
h,j,k,l h   #表示往左，j表示往下，k表示往右，l表示往上
Ctrl f      #上一页
Ctrl b      #下一页
w, e, W, E  #跳到单词的后面，小写包括标点
b, B        #以单词为单位往前跳动光标，小写包含标点
O           #开启新的一行
^           #一行的开始
$           #一行的结尾
gg          #文档的第一行
[N]G        #文档的第N行或者最后一行
```

## 插入模式

```shell
h,j,k,l h   #表示往左，j表示往下，k表示往右，l表示往上
Ctrl f      #上一页
Ctrl b      #下一页
w, e, W, E  #跳到单词的后面，小写包括标点
b, B        #以单词为单位往前跳动光标，小写包含标点
O           #开启新的一行
^           #一行的开始
$           #一行的结尾
gg          #文档的第一行
[N]G        #文档的第N行或者最后一行
```

## 编辑

```shell
dd    #删除一行
dw    #删除一个单词
x     #删除后一个字符
X     #删除前一个字符
D     #删除一行最后一个字符
[N]yy #复制一行或者N行
yw    #复制一个单词
p     #粘贴
```

## 关闭

```shell
:w      #保存
:wq, :x #保存并关闭
:q      #关闭（已保存）
:q!     #强制关闭
```

## 搜索

```shell
/pattern #搜索（非插入模式)
?pattern #往后搜索
n        #光标到达搜索结果的前一个目标
N        #光标到达搜索结果的后一个目标
```

## 视觉模式

```shell
v #选中一个或多个字符
V #选中一行
```

## 剪切和复制

```shell
dd    #删除一行
dw    #删除一个单词
x     #删除后一个字符
X     #删除前一个字符
D     #删除一行最后一个字符
[N]yy #复制一行或者N行
yw    #复制一个单词
p     #粘贴
```

## 窗口

```shell
:split  #水平方向分割出一个窗口
:vsplit #垂直方向分割出一个窗口
:close  #关闭窗口
Ctrl W  #切换窗口, h到左边窗口，j到下方窗口，k到上方窗口，l到右边窗口
```
