# 异步进程

ftok

msg_get_queue

msg_send

msg_receive

pcntl_waitpid

pcntl_fork

```php
<?php
public function send(){
	$ip = msg_get_queue(12340);
	msg_send($ip,8,"abcd",false,false,$err); 
}
public function recieve(){
	$ip = msg_get_queue(12340);

	msg_receive($ip,0,$msgtype,4,$data,false,null,$err); 
	echo "msgtype {$msgtype} data {$data}\n";

	msg_receive($ip,0,$msgtype,4,$data,false,null,$err); 
	echo "msgtype {$msgtype} data {$data}\n";
}
?>
```
