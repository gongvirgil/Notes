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

### 泛化（Generalization）

继承是我们在 OOP 中最常见的一种方式，让我们可以节约了不少的开发时间。继承也有一些别的文字描述方式：泛化。它是一种特殊的依赖。

继承就是指一个子类继承了另外一个的功能，并且可以增加它自己的新功能的能力。

继承关系用空心三角形 + 实线来表示。

```php
abstract class BaseExample {
    public abstract function method01();
    public abstract function method02();
}

class ExtendsExample extends BaseExample
{
    public function method01()
    {
        // TODO: Implement method01() method.
    }

    public function method02()
    {
        // TODO: Implement method02() method.
    }

    public function method03()
    {

    }
}
```

### 实现（Realization）

实现表示一个类（class）实现 interface 接口（可以实现多个接口）的功能。

实现接口用空心三角形 + 虚线来表示。

```php
interface Camera
{
    public function photograph();
}

interface Printer
{
    public function printer();
}

class Polaroid implements Camera, Printer
{
    public function photograph()
    {
        echo "拍照" . PHP_EOL;
    }

    public function printer()
    {
        echo "冲洗照片" . PHP_EOL;
    }
}
```

### 依赖（Dependency）

对于两个相对独立的对象，当一个对象负责构造另一个对象的实例，或者依赖另一个对象的服务时，这两个对象之间主要体现为依赖关系。

使用依赖的类作为参数传入到对应方法中即可。

依赖关系用虚线箭头来表示。

```php
<?php
class Oxygen
{
}

class Water
{
}

class Person
{
    public function metabolism(Oxygen $oxygen, Water $water)
    {
        // 使用 氧气 水代谢
    }
}
```

### 关联（Association）

对于两个相对独立的对象，当一个对象的实例与另一个对象的一些特定实例存在固定的对应关系时，这两个对象之间为关联关系。

关联关系用实线箭头来表示。

```php
class Climatic
{
    public function getCondition()
    {
        return "秋天";
    }
}

class Cropper
{
    private Climatic $climaticConditions;

    public function __construct(Climatic $climatic)
    {
        $this->climaticConditions = $climatic;
    }

    public function mature()
    {
        if ($this->climaticConditions->getCondition() === "秋天") {
            echo "成熟了" . PHP_EOL;
            return;
        }

        echo "再等等" . PHP_EOL;
    }
}
```

### 聚合（Aggregation）

表示一种弱的 ”拥有” 关系，即 has-a 关系，体现的是 A 对象可以包含 B 对象，但 B 对象不是 A 对象的一部分（可有可无的那种）。

两个对象具有各自的生命周期。

聚合关系用空心菱形 + 实线箭头来表示。

```php
class Person
{
    private float $money;

    public function collectMoney(float $money)
    {
        $this->money += $money;
    }
}

class Group
{
    private array $members = [];

    public function addMember(Person $person)
    {
        $this->members[] = $person;
    }

    // 分钱
    public function cents()
    {
        array_map(function ($person) {
            $person->collectMoney(rand(0, 100));
        }, $this->members);
    }
}
```



### 组合（Composition）

组合是一种强的‘拥有’关系，是一种 contains-a 的关系，体现了严格的部分和整体关系，部分和整体的生命周期一样。

组合关系用实习的菱形 + 实线箭头来表示。连线两端的数字称为基数，表明这一端的类可以有几个实例。

```php
class BigHead
{
}

class SmallHead
{

}

class Man
{
    private BigHead $bigHead;
    private SmallHead $smallHead;

    public function __construct()
    {
        // 代码中这里是我们固定不可替换的
        $this->bigHead = new BigHead();
        $this->smallHead = new SmallHead();
    }
}
```








