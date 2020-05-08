# postman


Pre-request-Script中添加脚本

// 获取全局变量
uid = postman.getGlobalVariable("uid")
sid = postman.getGlobalVariable("sid")

//设置当前时间戳
postman.setGlobalVariable("time",Math.round(new Date().getTime()));
time = postman.getGlobalVariable('time')

//设置KEY_WORD为全局变量
postman.setGlobalVariable("Key","******")
KEY_WORD = postman.getGlobalVariable("Key");

//字符串进行md5加密
var str = uid+sid+time+KEY_WORD;
var strmd5= CryptoJS.MD5(str).toString();
postman.setGlobalVariable("sign",strmd5)


Tests

```js
var Jsondata = JSON.parse(responseBody);
//设置环境变量手机返回信息
pm.environment.set("city",Jsondata.result.city);
//提取出city参数数据
```