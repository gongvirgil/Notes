# Roaring BitMap(高效压缩位图)

## 一、BitMap的数据稀疏问题

BitMap的问题在于，不管业务中实际的元素基数有多少，它占用的内存空间都恒定不变。

如果BitMap中的位的取值范围是1到100亿之间，那么BitMap就会开辟出100亿Bit的存储空间。

但是如果实际上值只有100个的话，100亿Bit的存储空间只有100Bit为1，其余全部为0，数据存储空间浪费严重，数据越稀疏，空间浪费越严重。

## 二、Roaring BitMap介绍

为了解决位图稀疏存储浪费空间的问题，出现了很多稀疏位图的压缩算法，RoaringBitmap就是其中的优秀代表。

Roaring Bitmap是高效压缩位图，简称RBM

RBM的历史并不长，它于2016年由S. Chambi、D. Lemire、O. Kaser等人在论文《Better bitmap performance with Roaring bitmaps》与《Consistently faster and smaller compressed bitmaps with Roaring》中提出.

## 三、原理

假设数据的取值范围为int(无符号)

注意：下面所有的讲解均是按照int的取值范围讲，实际上目前RoaringBitMap采用的默认取值范围就是这个，其实也提供对long取值范围的支持，不多讲

232=4294967295，即取值范围为0~43亿左右。

如果用BitMap来实现对应的功能，需要准备需要232 bit的存储空间(0.5G)，但是如果只用来存储少量数据的话，显然造成了严重的储存空间浪费

1、RBM(Roaring BitMap)的基本思路
将数据的前半部分，即216(这里为高16位)部分作为桶的编号，将分为216=65536个桶，RBM中将这些小桶称之为Contriner(容器)

注意：此时Contriner并没有创建

存储数据时，按照数据的高16位做为Contriner的编号去找对应的Contriner(找不到就创建对应的Contriner)，再将低16位放入该Contriner中

所以一个RBM是很多Contriner的集合

示例：如下图所示

将31这个值存储进RBM时

首先获取高位部分得到值为0，所以对应的桶(Container)编号为0

根据桶编号获取到对应的Container，然后将低位的31设置进对应的Container中



2、Container的类型
在roaringbitmap中共有4种Container：arraycontainer(数组容器)，bitmapcontainer(位图容器)，runcontainer(行程步长容器)，sharedcontainer(共享容器)

2.1、ArrayContainer(数组容器)
在创建一个新Container时，如果只插入一个元素，RBM默认会用ArrayContainer来存储。其中每一个元素的类型为 short int 占两个字节。

当ArrayContainer的容量超过4096后，会自动转成BitmapContainer。

4096这个阈值很聪明，低于它时ArrayContainer比较省空间，高于它时BitmapContainer比较省空间。也就是说ArrayContainer存储稀疏数据BitmapContainer存储稠密数据，可以最大限度地避免内存浪费。

下面这个图可以很清楚的看懂这种关系



2.2、bitmapcontainer(位图容器)
这个容器其实就是我们最开讲的位图，只不过这里位图的位数为2^16（65536）个，也就是2 ^ 16个bit,计算下来起所占内存就是8kb。然后每一位用0，1表示这个数不存在或者存在



2.3、runcontainer(行程步长容器)
这是一种利用步长来压缩空间的方法
比如连续的整数序列 11, 12, 13, 14, 15, 27, 28, 29 会被压缩为两个二元组 11, 4, 27, 2 表示：11后面紧跟着4个连续递增的值，27后面跟着2个连续递增的值，那么原先16个字节的空间，现在只需要8个字节，是不是节省了很多空间呢。不过这种容器不常用，所以在使用的时候需要我们自行调用相关的转换函数来判断是不是需要将arraycontiner，或bitmapcontainer转换为runcontainer

2.4、sharedcontainer(共享容器)
这种容器它本身是不存储数据的，只是用它来指向 arraycontainer,bitmapcontainer或runcontainer,就好比指针的作用一样，这个指针可以被多个对象拥有，但是指针所指针的实质东西是被这多个对象所共享的。在我们进行roaringbitmap之间的拷贝的时候，有时并不需要将一个container拷贝多份，那么我们就可以使用sharedcontainer来指向实际的container，然后把sharedcontainer赋给多个roaringbitmap对象持有，这个roaringbitmap对象就可以根据sharedcontainer找到真正存储数据的container,这可以省去不必要的空间浪费
这些container之间的关系可以用下面这幅图来表示：



## 四、性能分析

1、时间复杂度
BitmapContainer只涉及到位运算且可以根据下标直接寻址，显然为O(1)。

ArrayContainer和RunContainer都需要用二分查找在有序数组中定位元素，故为O(logN)。

2、空间占用
BitmapContainer是恒定为8KB的

ArrayContainer的空间占用与基数（c）有关，为(2 + 2c)B；

RunContainer的则与它存储的连续序列数（r）有关，为(2 + 4r)B。

3、与BitMap的性能对比
3.1、计算上的优化
Roaring BitMap本质上是将大块的bitmap分成各个小块，其中每个小块在需要存储数据的时候才会存在。

所以当进行交集或并集运算的时候，roaringbitmap只需要去计算存在的一些块而不需要像bitmap那样对整个大的块进行计算。

如果块内非常稀疏，那么只需要对这些小整数列表进行集合的 AND、OR 运算，这样的话计算量还能继续减轻。

这里既不是用空间换时间，也没有用时间换空间，而是用逻辑的复杂度同时换取了空间和时间。

同时在RBM中32位长的数据，被分割成高 16 位和低 16 位，高 16 位表示块偏移，低16位表示块内位置，单个块可以表达 64k 的位长，也就是 8K 字节。这样可以保证单个块都可以全部放入 L1 Cache，可以显著提升性能

3.2、程序逻辑上的优化
RBM维护了排好序的一级索引以及有序的arraycontainer，当进行交集操作的时候，只需要根据一级索引中对应的值来获取需要合并的容器，而不需要合并的容器则不需要对其进行操作直接过滤掉。
当进行求交集的arraycontainer中数据个数相差过大的时候采用基于二分查找的方法对arraycontainer求交集，避免不必要的线性合并花费的时间开销。
roaingbitmap在做并集的时候同样根据一级索引只对相同的索引的容器进行合并操作，而索引不同的直接添加到新的roaringbitmap上即可，不需要遍历容器。
roaringbitmap在合并容器的时候会先预测结果，生成对应的容器，避免不必要的容器转换操作。

## 五、应用场景

RoaringBitMap在很多产品中都有使用，如redis、lucene、spark等，参见 https://github.com/RoaringBitmap/RoaringBitmap

1、lucene
为了加速搜索，Lucene会将常用的查询过滤条件产生的结果集缓存到内存中，方便复用，称为filter cache。结果集其实就是文档ID（整形数）的集合。从Lucene 5开始，使用了RBM优化过的文档ID集合RoaringDocIdSet作为filter cache，详情可以参见《Frame of Reference and Roaring Bitmaps》。该文除了介绍RBM外，还介绍了压缩倒排索引的Frame of Reference（FOR）编码，值得一读。

2、Spark
在Spark Core的MapStatus组件（用来跟踪ShuffleMapTask的输出结果块）中，利用了RBM来存储块是否非空的状态。今后会在Spark连载里讲到它，所以现在看看该类的源码就可以了，不难理解。

3、Greenplum
GP配合RoaringBitmap非常适合做海量用户的近实时画像，每个RBM代表一维标签即可，根据标签圈选用户也很方便。GP原生并未支持RBM类型数据，需要安装一个扩展插件，见这里。关于GP与RBM的整合与使用，有两篇不错的参考文章：

https://yq.aliyun.com/articles/405191
http://mysql.taobao.org/monthly/2018/08/09

4、Redis
我们在Redis里经常使用位图存储数据（Redis原生以字符串的形式支持位图），当然也就会遇到稀疏位图浪费存储空间的问题。但要让Redis支持RBM，需要引入专门的module，项目地址见这里。它的设计思想与Java版RBM几乎相同。
