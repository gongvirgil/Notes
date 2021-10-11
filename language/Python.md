# python

## 安装

### Windows

* 环境变量配置
** Path：`;D:\python27`
** PATHEXT：`;.PY;.PYM`

### Linux

### Mac

## 基础模块

模块名|功能|说明
---|---|---
urllib			|	|	
urllib2			|	|
Image			|	|
PIL				|	|
cStringIO		|	|
BeautifulSoup	|	|
MySQLdb			|	|


## xlrd （Excel-read模块）

### 导入模块

	import xlrd

### 打开Excel文件读取数据

	data = xlrd.open_workbook('excelFile.xls')



### 获取一个工作表

	table = data.sheets()[0]          #通过索引顺序获取
	table = data.sheet_by_index(0) #通过索引顺序获取
	table = data.sheet_by_name(u'Sheet1')#通过名称获取
 
### 获取整行和整列的值（数组）
 　　
	table.row_values(i)
	table.col_values(i)
 
### 获取行数和列数
　　
	nrows = table.nrows
	ncols = table.ncols
       
### 循环行列表数据
	for i in range(nrows ):
		print table.row_values(i)
 
### 单元格

	cell_A1 = table.cell(0,0).value
	cell_C4 = table.cell(2,3).value
 
### 使用行列索引

	cell_A1 = table.row(0)[0].value
	cell_A2 = table.col(1)[0].value
 
### 简单的写入

	row = 0
	col = 0
	ctype = 1  # 类型 0 empty,1 string, 2 number, 3 date, 4 boolean, 5 error
	value = '单元格的值'
	xf = 0  # 扩展的格式化
	table.put_cell(row, col, ctype, value, xf)
	table.cell(0,0)  #单元格的值'
	table.cell(0,0).value #单元格的值'

## Web.py.0.38

### Mysql

#### 导入模块，定义数据库连接db。

	import web
	db = web.database(dbn='postgres', db='mydata', user='dbuser', pw='')

#### select

	# 查询表
	entries = db.select('mytable')

	# where 条件
	myvar = dict(name="Bob")
	results = db.select('mytable', myvar, where="name = $name")
	results = db.select('mytable', where="id>100")

	# 查询具体列
	results = db.select('mytable', what="id,name")

	# order by
	results = db.select('mytable', order="post_date DESC")

	# group
	results = db.select('mytable', group="color")

	# limit
	results = db.select('mytable', limit=10)

	# offset
	results = db.select('mytable', offset=10)

#### update

	db.update('mytable', where="id = 10", value1 = "foo")

#### delete

	db.delete('mytable', where="id=10")

#### 复杂查询

	# count
	results = db.query("SELECT COUNT(*) AS total_users FROM users")
	print results[0].total_users

	# join
	results = db.query("SELECT * FROM entries JOIN users WHERE entries.author_id = users.id")

	# 防止SQL注入可以这么干
	results = db.query("SELECT * FROM users WHERE id=$id", vars={'id':10})

	6 多数据库操作 (web.py大于0.3)

	db1 = web.database(dbn='mysql', db='dbname1', user='foo')
	db2 = web.database(dbn='mysql', db='dbname2', user='foo')

	print db1.select('foo', where='id=1')
	print db2.select('bar', where='id=5')

#### 事务

	t = db.transaction()
	try:
	    db.insert('person', name='foo')
	    db.insert('person', name='bar')
	except:
	    t.rollback()
	    raise
	else:
	    t.commit()

	# Python 2.5+ 可以用with
	from __future__ import with_statement
	with db.transaction():
	    db.insert('person', name='foo')
	    db.insert('person', name='bar')

## Django

## 知识点

* 中文注释需要在python文件的最前面加上

	# -* - coding: UTF-8 -* -

* 

### 列表（动态数组） list

a = ["I","you","he","she"]      ＃元素可为任何类型。  
  
下标：按下标读写，就当作数组处理  
以0开始，有负下标的使用  
0第一个元素，-1最后一个元素，  
-len第一个元素，len-1最后一个元素  
取list的元素数量                  
len(list)   #list的长度。实际该方法是调用了此对象的__len__(self)方法。   
  
创建连续的list  
L = range(1,5)      #即 L=[1,2,3,4],不含最后一个元素  
L = range(1, 10, 2) #即 L=[1, 3, 5, 7, 9]  
  
list的方法  
L.append(var)   #追加元素  
L.insert(index,var)  
L.pop(var)      #返回最后一个元素，并从list中删除之  
L.remove(var)   #删除第一次出现的该元素  
L.count(var)    #该元素在列表中出现的个数  
L.index(var)    #该元素的位置,无则抛异常   
L.extend(list)  #追加list，即合并list到L上  
L.sort()        #排序  
L.reverse()     #倒序  
list 操作符:,+,*，关键字del  
a[1:]       #片段操作符，用于子list的提取  
[1,2]+[3,4] #为[1,2,3,4]。同extend()  
[2]*4       #为[2,2,2,2]  
del L[1]    #删除指定下标的元素  
del L[1:3]  #删除指定下标范围的元素  
list的复制  
L1 = L      #L1为L的别名，用C来说就是指针地址相同，对L1操作即对L操作。函数参数就是这样传递的  
L1 = L[:]   #L1为L的克隆，即另一个拷贝。  
          
list comprehension  
   [ <expr1> for k in L if <expr2> ]  

### 字典 dictionary

dict = {'ob1':'computer', 'ob2':'mouse', 'ob3':'printer'}  
每一个元素是pair，包含key、value两部分。key是Integer或string类型，value 是任意类型。  
键是唯一的，字典只认最后一个赋的键值。  
  
dictionary的方法  
D.get(key, 0)       #同dict[key]，多了个没有则返回缺省值，0。[]没有则抛异常  
D.has_key(key)      #有该键返回TRUE，否则FALSE  
D.keys()            #返回字典键的列表  
D.values()          #以列表的形式返回字典中的值，返回值的列表中可包含重复元素  
D.items()           #将所有的字典项以列表方式返回，这些列表中的每一项都来自于(键,值),但是项在返回时并没有特殊的顺序           
  
D.update(dict2)     #增加合并字典  
D.popitem()         #得到一个pair，并从字典中删除它。已空则抛异常  
D.clear()           #清空字典，同del dict  
D.copy()            #拷贝字典  
D.cmp(dict1,dict2)  #比较字典，(优先级为元素个数、键大小、键值大小)  
                    #第一个大返回1，小返回-1，一样返回0  
              
dictionary的复制  
dict1 = dict        #别名  
dict2=dict.copy()   #克隆，即另一个拷贝。

### 元组（常量数组） tuple

tuple = ('a', 'b', 'c', 'd', 'e')  
可以用list的 [],:操作符提取元素。就是不能直接修改元素。

### 字符串 string

str = "Hello My friend"  
子字符串的提取：str[:6]  
字符串包含判断操作符：in，not in 

	"He" in str  
	"she" not in str  
  
string模块，还提供了很多方法，如  

	S.find(substring, [start [,end]]) #可指范围查找子串，返回索引值，否则返回-1  
	S.rfind(substring,[start [,end]]) #反向查找  
	S.index(substring,[start [,end]]) #同find，只是找不到产生ValueError异常  
	S.rindex(substring,[start [,end]])#同上反向查找  
	S.count(substring,[start [,end]]) #返回找到子串的个数  
	S.lowercase()  
	S.capitalize()      #首字母大写  
	S.lower()           #转小写  
	S.upper()           #转大写  
	S.swapcase()        #大小写互换  
	S.split(str, ' ')   #将string转list，以空格切分  
	S.join(list, ' ')   #将list转string，以空格连接  
  
处理字符串的内置函数  

	len(str)                #串长度  
	cmp("my friend", str)   #字符串比较。第一个大，返回1  
	max('abcxyz')           #寻找字符串中最大的字符  
	min('abcxyz')           #寻找字符串中最小的字符  
  
string的转换  
              
	float(str) #变成浮点数，float("1e-1")  结果为0.1  
	int(str)        #变成整型，  int("12")  结果为12  
	int(str,base)   #变成base进制整型数，int("11",2) 结果为2  
	long(str)       #变成长整型，  
	long(str,base)  #变成base进制长整型，  


去空格及特殊符号

	s.strip().lstrip().rstrip(',')

复制字符串

	#strcpy(sStr1,sStr2)
	sStr1 = 'strcpy'
	sStr2 = sStr1
	sStr1 = 'strcpy2'
	print sStr2

连接字符串

	#strcat(sStr1,sStr2)
	sStr1 = 'strcat'
	sStr2 = 'append'
	sStr1 += sStr2
	print sStr1

查找字符

	#strchr(sStr1,sStr2)
	# < 0 为未找到
	sStr1 = 'strchr'
	sStr2 = 's'
	nPos = sStr1.index(sStr2)
	print nPos

比较字符串

	#strcmp(sStr1,sStr2)
	sStr1 = 'strchr'
	sStr2 = 'strch'
	print cmp(sStr1,sStr2)

扫描字符串是否包含指定的字符

	#strspn(sStr1,sStr2)
	sStr1 = '12345678'
	sStr2 = '456'
	#sStr1 and chars both in sStr1 and sStr2
	print len(sStr1 and sStr2)

字符串长度

	#strlen(sStr1)
	sStr1 = 'strlen'
	print len(sStr1)

将字符串中的大小写转换

	#strlwr(sStr1)
	sStr1 = 'JCstrlwr'
	sStr1 = sStr1.upper()
	#sStr1 = sStr1.lower()
	print sStr1

追加指定长度的字符串

	#strncat(sStr1,sStr2,n)
	sStr1 = '12345'
	sStr2 = 'abcdef'
	n = 3
	sStr1 += sStr2[0:n]
	print sStr1

字符串指定长度比较

	#strncmp(sStr1,sStr2,n)
	sStr1 = '12345'
	sStr2 = '123bc'
	n = 3
	print cmp(sStr1[0:n],sStr2[0:n])

复制指定长度的字符

	#strncpy(sStr1,sStr2,n)
	sStr1 = ''
	sStr2 = '12345'
	n = 3
	sStr1 = sStr2[0:n]
	print sStr1

将字符串前n个字符替换为指定的字符

	#strnset(sStr1,ch,n)
	sStr1 = '12345'
	ch = 'r'
	n = 3
	sStr1 = n * ch + sStr1[3:]
	print sStr1

扫描字符串

	#strpbrk(sStr1,sStr2)
	sStr1 = 'cekjgdklab'
	sStr2 = 'gka'
	nPos = -1
	for c in sStr1:
	    if c in sStr2:
	        nPos = sStr1.index(c)
	        break
	print nPos

翻转字符串

	#strrev(sStr1)
	sStr1 = 'abcdefg'
	sStr1 = sStr1[::-1]
	print sStr1

查找字符串

	#strstr(sStr1,sStr2)
	sStr1 = 'abcdefg'
	sStr2 = 'cde'
	print sStr1.find(sStr2)

分割字符串

	#strtok(sStr1,sStr2)
	sStr1 = 'ab,cde,fgh,ijk'
	sStr2 = ','
	sStr1 = sStr1[sStr1.find(sStr2) + 1:]
	print sStr1
	#或者
	s = 'ab,cde,fgh,ijk'
	print(s.split(','))

连接字符串

	delimiter = ','
	mylist = ['Brazil', 'Russia', 'India', 'China']
	print delimiter.join(mylist)

PHP 中 addslashes 的实现

	def addslashes(s):
	    d = {'"':'\\"', "'":"\\'", "\0":"\\\0", "\\":"\\\\"}
	    return ''.join(d.get(c, c) for c in s)
	 
	s = "John 'Johny' Doe (a.k.a. \"Super Joe\")\\\0"
	print s
	print addslashes(s)

只显示字母与数字

	def OnlyCharNum(s,oth=''):
	    s2 = s.lower();
	    fomart = 'abcdefghijklmnopqrstuvwxyz0123456789'
	    for c in s2:
	        if not c in fomart:
	            s = s.replace(c,'');
	    return s;
	 
	print(OnlyStr("a000 aa-b"))


 
截取字符串

	str = ’0123456789′
	print str[0:3] #截取第一位到第三位的字符
	print str[:] #截取字符串的全部字符
	print str[6:] #截取第七个字符到结尾
	print str[:-3] #截取从头开始到倒数第三个字符之前
	print str[2] #截取第三个字符
	print str[-1] #截取倒数第一个字符
	print str[::-1] #创造一个与原字符串顺序相反的字符串
	print str[-3:-1] #截取倒数第三位与倒数第一位之前的字符
	print str[-3:] #截取倒数第三位到结尾
	print str[:-5:-3] #逆序截取


### 文件I/O

* python对文件的处理的两个内建函数：open()、file()，这个两函数提供了初始化输入\输出（I\O）操作的通用接口。两函数的功能相同。

	open(filename, access_mode='r', buffering=-1)

access_mode(打开文件的模式):

access_mode	|	说明
---|---
r		|	以读方式打开
rU或Ua	|	以读方式打开同时提供通用换行符支持
w		|	以写方式打开
a		|	以追加方式打开
r+ 		|	以读写方式打开
w+ 		|	以读写方式打开
a+ 		|	以读写方式打开




