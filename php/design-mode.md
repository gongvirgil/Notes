# 设计模式

## 基础
## UML类图
## 设计原则
## 创建型模式
## 简单工厂模式
## 工厂模式
## 抽象工厂模式
## 单例模式

```php
<?php
class Singleton{
    //私有属性，用于保存实例
    private static $instance;
    //构造方法私有化，防止外部创建实例
    private function __construct(){}
    //公有属性，用于测试
    public $a;
    //公有方法，用于获取实例
    public static function getInstance(){
        //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //克隆方法私有化，防止复制实例
    private function __clone(){}

}
```
## 结构性模式
## 适配器模式
## 组合模式
## 外观模式
## 代理模式
## 行为型模式
## 命令模式
## 迭代器模式
## 策略模式
## 观察者模式
## 模式总结

## IoC

```php
class B
{}
class C
{}
class D
{}
class Ioc
{
    public $objs = [];
    public $containers = [];

    public function __construct()
    {
        $this->objs['b'] = function () {
            return new B();
        };
        $this->objs['c'] = function () {
            return new C();
        };
        $this->objs['d'] = function () {
            return new D();
        };
    }
    public function bind($name)
    {
        if (!isset($this->containers[$name])) {
            if (isset($this->objs[$name])) {
                $this->containers[$name] = $this->objs[$name]();
            } else {
                return null;
            }
        }
        return $this->containers[$name];
    }
}

$ioc = new Ioc();
$bClass = $ioc->bind('b');
$cClass = $ioc->bind('c');
$dClass = $ioc->bind('d');

var_dump($bClass); // B
var_dump($cClass); // C
var_dump($dClass); // D
var_dump($eClass); // NULL
```
