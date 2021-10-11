# 设计模式

## 工厂模式

```
<?php  
/** 
 * 基本工厂模式
 * */  
class User {   
    private $username;   
    public function __construct($username) {   
        $this->username = $username;   
    }   
      
    public function getUser() {   
        return $this->username;   
    }   
}  
  
class userFactory {   
    static public function createUser() {   
        return new User('Jack');   
    }   
}  
  
$user = userFactory::createUser();echo $user->getUser();  
  
/** 
 *简单工厂模式 
 * */  
interface userProperties {  
    function getUsername();  
    function getGender();  
    function getJob();  
}  
class User implements userProperties{  
    private $username;  
    private $gender;  
    private $job;  
    public function __construct($username, $gender, $job) {  
        $this->username = $username;  
        $this->gender = $gender;  
        $this->job = $job;  
    }  
  
    public function getUsername() {  
        return $this->username;  
    }  
  
    public function getGender() {  
        return $this->gender;  
    }  
  
    public function getJob() {  
        return $this->job;  
    }  
}  
  
class userFactory {  
    static public function createUser($properties = []) {  
        return new User($properties['username'], $properties['gender'], $properties['job']);  
    }  
}  
  
$employers = [  
    ['username' => 'Jack', 'gender' => 'male', 'job' => 'coder'],  
    ['username' => 'Marry', 'gender' => 'female', 'job' => 'designer'],  
    ];  
$user = userFactory::createUser($employers[0]);  
echo $user->getUsername();  
  
/** 
 * 工厂方法模式 
 **/  
interface userProperties {  
    function getUsername();  
    function getGender();  
    function getJob();  
}  
  
interface createUser {  
    function create($properties);  
}  
  
class User implements userProperties{  
    private $username;  
    private $gender;  
    private $job;  
    public function __construct($username, $gender, $job) {  
        $this->username = $username;  
        $this->gender = $gender;  
        $this->job = $job;  
    }  
  
    public function getUsername() {  
        return $this->username;  
    }  
  
    public function getGender() {  
        return $this->gender;  
    }  
  
    public function getJob() {  
        return $this->job;  
    }  
}  
  
class userFactory {  
    private $user;  
    public function __construct($properties = []) {  
        $this->user =  new User($properties['username'], $properties['gender'], $properties['job']);  
    }  
  
    public function getUser() {  
        return $this->user;  
    }  
}  
  
class FactoryMan implements createUser {  
    function create($properties) {  
        return new userFactory($properties);   
    }  
}   
  
class FactoryWoman implements createUser {  
    function create($properties) {  
        return new userFactory($properties);  
    }  
}  
  
class clientUser {  
    static public function getClient($properties) {  
        $fac = new FactoryMan;  
        $man = $fac->create($properties);  
        echo $man->getUser()->getUsername();  
    }  
}  
  
$employers = [  
    ['username' => 'Jack', 'gender' => 'male', 'job' => 'coder'],  
    ['username' => 'Marry', 'gender' => 'female', 'job' => 'designer'],  
    ];  
$user = clientUser::getClient($employers[0]);  
  
/** 
 * 抽象工厂模式 
 * */  
  
interface userProperties {  
    function getUsername();  
    function getGender();  
    function getJob();  
}  
  
interface createUser { //将对象的创建抽象成一个接口  
    function createOpen($properties);//内向创建  
    function createIntro($properties);//外向创建  
}  
  
class User implements userProperties{  
    private $username;  
    private $gender;  
    private $job;  
    public function __construct($username, $gender, $job) {  
        $this->username = $username;  
        $this->gender = $gender;  
        $this->job = $job;
    }  
  
    public function getUsername() {  
        return $this->username;  
    }  
  
    public function getGender() {  
        return $this->gender;  
    }  
  
    public function getJob() {  
        return $this->job;  
    }  
}  
  
class userFactory {  
    private $user;  
    public function __construct($properties = []) {  
        $this->user =  new User($properties['username'], $properties['gender'], $properties['job']);  
    }  
  
    public function getUser() {  
        return $this->user;  
    }  
}  
  
class FactoryMan implements createUser {  
    function createOpen($properties) {  
        return new userFactory($properties);   
    }  
  
    function createIntro($properties) {  
        return new userFactory($properties);   
    }  
}   
  
class FactoryWoman implements createUser {  
    function createOpen($properties) {  
        return new userFactory($properties);  
    }  
  
    function createIntro($properties) {  
        return new userFactory($properties);  
    }  
}  
  
class clientUser {  
    static public function getClient($properties) {  
        $fac = new FactoryMan;  
        $man = $fac->createOpen($properties);  
        echo $man->getUser()->getUsername();  
    }  
}  
  
$employers = [  
    ['username' => 'Jack', 'gender' => 'male', 'job' => 'coder'],  
    ['username' => 'Marry', 'gender' => 'female', 'job' => 'designer'],  
    ];  
$user = clientUser::getClient($employers[0]);
```