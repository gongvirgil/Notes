# Makefile

* https://blog.csdn.net/weixin_38391755/article/details/80380786

## Makefile 介绍

make命令执行时，需要一个 Makefile 文件，以告诉make命令需要怎么样的去编译和链接程序。

首先，我们用一个示例来说明Makefile的书写规则。以便给大家一个感兴认识。这个示例来源于GNU的make使用手册，在这个示例中，我们的工程有8个C文件，和3个头文件，我们要写一个Makefile来告诉make命令如何编译和链接这几个文件。我们的规则是：

* 如果这个工程没有编译过，那么我们的所有C文件都要编译并被链接。
* 如果这个工程的某几个C文件被修改，那么我们只编译被修改的C文件，并链接目标程序。
* 如果这个工程的头文件被改变了，那么我们需要编译引用了这几个头文件的C文件，并链接目标程序。

只要我们的Makefile写得够好，所有的这一切，我们只用一个make命令就可以完成，make命令会自动智能地根据当前的文件修改的情况来确定哪些文件需要重编译，从而自己编译所需要的文件和链接目标程序。


## Makefile的规则

在讲述这个Makefile之前，还是让我们先来粗略地看一看Makefile的规则。

```makefile
    target... : prerequisites ...
    command
    ...
```

target也就是一个目标文件，可以是Object File，也可以是执行文件。还可以是一个标签（Label），对于标签这种特性，在后续的“伪目标”章节中会有叙述。

prerequisites就是，要生成那个target所需要的文件或是目标。

command也就是make需要执行的命令。（任意的Shell命令）


这是一个文件的依赖关系，也就是说，target这一个或多个的目标文件依赖于prerequisites中的文件，其生成规则定义在command中。说白一点就是说，prerequisites中如果有一个以上的文件比target文件要新的话，command所定义的命令就会被执行。这就是Makefile的规则。也就是Makefile中最核心的内容。

十分重要的三个变量：$@，$^，$<，所代表的含义分别是：

* $@--目标文件
* $^--所有的依赖文件
* $<--第一个依赖文件
