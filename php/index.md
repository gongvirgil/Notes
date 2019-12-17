# PHP

## 相关

* [PHPer](./php/phper.md)
* [php.ini](./php/php-ini.md)
* [环境](./environment.md)
* [Linux](./system/linux/index.md)
* [Apache](./system/apache/index.md)
* [Nginx](./system/nginx/index.md)
* [MySQL](./database/MySQL/index.md)

## PHP规范

[PHP编码规范（中文版）](https://github.com/PizzaLiu/PHP-FIG)

## 基础知识

* [基础教程](http://www.runoob.com/php/php-tutorial.html)

### 异常Exception

```php
try {

} catch(Exception $e) {
  $e->getTrace();
  $e->getTraceAsString();
}
```

## 设计模式

[五种常见设计模式](https://www.ibm.com/developerworks/cn/opensource/os-php-designptrns/)
[PHP设计模式](http://www.awaimai.com/patterns)

### 工厂模式

工厂模式 是一种类，它具有为您创建对象的某些方法。您可以使用工厂类创建对象，而不直接使用`new`。这样，如果您想要更改所创建的对象类型，只需更改该工厂即可。使用该工厂的所有代码会自动更改。

* 工厂模式
	* 简单工厂模式
	* 工厂方法模式
	* 抽象工厂模式
	
### 单元素模式

某些应用程序资源是独占的，因为有且只有一个此类型的资源。例如，通过数据库句柄到数据库的连接是独占的。您希望在应用程序中共享数据库句柄，因为在保持连接打开或关闭时，它是一种开销，在获取单个页面的过程中更是如此。
单元素模式可以满足此要求。如果应用程序每次包含且仅包含一个对象，那么这个对象就是一个单元素（Singleton）。

### 观察者模式

观察者模式为您提供了避免组件之间紧密耦合的另一种方法。该模式非常简单：一个对象通过添加一个方法（该方法允许另一个对象，即观察者 注册自己）使本身变得可观察。当可观察的对象更改时，它会将消息发送到已注册的观察者。这些观察者使用该信息执行的操作与可观察的对象无关。结果是对象可以相互对话，而不必了解原因。

```

	<?php
	interface IObserver
	{
	  function onChanged( $sender, $args );
	}
	 
	interface IObservable
	{
	  function addObserver( $observer );
	}
	 
	class UserList implements IObservable
	{
	  private $_observers = array();
	 
	  public function addCustomer( $name )
	  {
	    foreach( $this->_observers as $obs )
	      $obs->onChanged( $this, $name );
	  }
	 
	  public function addObserver( $observer )
	  {
	    $this->_observers []= $observer;
	  }
	}
	 
	class UserListLogger implements IObserver
	{
	  public function onChanged( $sender, $args )
	  {
	    echo( "'$args' added to user list\n" );
	  }
	}
	 
	$ul = new UserList();
	$ul->addObserver( new UserListLogger() );
	$ul->addCustomer( "Jack" );
	?>
```

### 命令链模式

命令链模式以松散耦合主题为基础，发送消息、命令和请求，或通过一组处理程序发送任意内容。每个处理程序都会自行判断自己能否处理请求。如果可以，该请求被处理，进程停止。您可以为系统添加或移除处理程序，而不影响其他处理程序。

### 策略模式


## 数据结构

## 函数

### 回调函数

### 匿名函数

## 魔术方法

## 算法

## 测试

## 框架

## ORM