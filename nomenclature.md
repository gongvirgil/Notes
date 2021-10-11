# 命名法

## Hungarian

一、匈牙利命名法【Hungarian】： 广泛应用于象 Microsoft Windows 这样的环境中。 Windows 编程中用到的变量（还包括宏）的命名规则匈牙利命名法，这种命名技术是由一 位能干的 Microsoft 程序员查尔斯· 西蒙尼(Charles Simonyi) 提出的。 匈牙利命名法通过在变量名前面加上相应的小写字母的符号标识作为前缀， 标识出变量的作用域， 类型等。这些符号可以多个同时使用，顺序是先 m_（成员变量），再指针，再简单数据类型， 再其他。例如：m_lpszStr, 表示指向一个以 0 字符结尾的字符串的长指针成员变量。 匈牙利命名法关键是：标识符的名字以一个或者多个小写字母开头作为前缀；前缀之后的是 首字母大写的一个单词或多个单词组合，该单词要指明变量的用途。 匈牙利命名法中常用的小写字母的前缀： 前缀类型 a b by c cb cr cx,cy dw fn h i l lp m_ n np p s sz w 数组 (Array) 布尔值 (Boolean) 字节 (Byte) 有符号字符 (Char) 无符号字符 (Char Byte，没有多少人用) 颜色参考值 (ColorRef) 坐标差（长度 ShortInt） Double Word 函数 Handle（句柄） 整型 长整型 (Long Int) Long Pointer 类的成员 短整型 (Short Int) Near Pointer Pointer 字符串型 以 null 做结尾的字符串型 (String with Zero End) Word

## camelCase

骆驼式命令法，正如它的名称所表示的那样，是指混合使用大小写字母来构成变量和函数 的名字。例如，下面是分别用骆驼式命名法和下划线法命名的同一个函数： printEmployeePaychecks()； print_employee_paychecks()； 第一个函数名使用了骆驼式命名法——函数名中的每一个逻辑断点都有一个大写字母来标记； 第二个函数名使用了下划线法----函数名中的每一个逻辑断点都有一个下划线来标记。 骆驼式命名法近年来越来越流行了，在许多新的函数库和 Microsoft Windows 这样的环境中，它使用得当相多。另一方面，下划线法是 c 出现后开始流行起来的，在 许多旧的程序和 UNIX 这样的环境中，它的使用非常普遍。

## PascalCase

三、帕斯卡命名法【PascalCase】： 与骆驼命名法类似。只不过骆驼命名法是首字母小写，而帕斯卡命名法是首字母大写 如：public void DisplayInfo(); string UserName; 二者都是采用了帕斯卡命名法. 【在 C#中，以帕斯卡命名法和骆驼命名法居多。 在 C#中,简单的变量一般用 camelCase 规则,而比较高级的命名使用 PascalCase。 如.net Framework 的公共字段及公共属性。】 简单说 MyData 是一个帕斯卡命名的示例。 myData 是一个骆驼命名法。 iMyData 是一个匈牙利命名法,小些说明了变量的类型或者用途。

## snake_case

蛇形命名法，like_this，常见于Linux内核，C++标准库，Boost以及Ruby，Rust等语言。

## xx-xx

脊柱命名法