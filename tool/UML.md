# UML类图

UML这三个字母的全称是 `Unified Modeling Language`，直接翻译就是统一建模语言，简单地说就是一种有特殊用途的语言。

UML的分类：

* 结构型的图(Structure Diagram)
  * 类图(Class Diagram)
  * 对象图(Object Diagram)
  * 构件图(Component Diagram)
  * 部署图(Deployment Diagram)
  * 包图(Package Diagram)
* 行为型的图(Behavior Diagram)
  * 活动图(Activity Diagram)
  * 状态机图(State Machine Diagram)
  * 顺序图(Sequence Diagram)
  * 通信图(Communication Diagram)
  * 用例图(Use Case Diagram)
  * 时序图(Timing Diagram)

## 类图

类图用矩形框表示，代表一个类（Class）。类图分三层:

* 第一层显示类的名称，如果是抽象类，则就用斜体显示。
* 第二层是类的特性，通常就是字段和属性。
* 第三层是类的操作，通常是方法或行为。
  * 前面的符号，+ 表示public，- 表示private，# 表示protected。

## 接口图

与类图的区别主要是顶端的 `<<interface>>` 显示。

* 第一层是接口名称
* 第二层是接口方法

接口还有另一种表示方法，俗称棒棒糖表示法。

## 类与类，类与接口之间的关系

* 继承关系用空心三角形 + 实线来表示。
* 实现接口用空心三角形 + 虚线来表示。
* 关联关系（association）用实线箭头来表示。
* 聚合关系（Aggregation）用空心菱形 + 实线箭头来表示。
  * 聚合表示一种弱的拥有关系，体现的是A对象可以包含B对象，但B对象不是A对象的一部分。
* 组合关系（Composition）用实习的菱形 + 实线箭头来表示。连线两端的数字称为基数，表明这一端的类可以有几个实例。
  * 组合是一种强的拥有关系，体现了严格的部分和整体的关系，部分和整体的生命周期一样。
* 依赖关系（Dependency）用虚线箭头来表示。