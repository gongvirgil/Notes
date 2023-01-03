# postman


Pre-request-Script中添加脚本

```js
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
```

```js
// 创建Base64对象
var Base64 = ""

var appid = "jze6j9JeLlWOPQiNK2chdXo28FaHFrPf"
var secret = "9Q0jh(m!fF2iB@d9N9tyWsRq*yfZTvft"
var trace_id = Math.round(new Date().getTime())
var channel = "SMARTPAD"
var paramsStr = '[{"school_id":62991,"student_id":4455901}]';


//字符串进行md5加密
base64Str = Base64.encode(paramsStr);
var str = appid+trace_id+base64Str+secret;
var token = CryptoJS.MD5(str).toString();

postman.setEnvironmentVariable("POST-PARAMS", paramsStr);
postman.setEnvironmentVariable("WE-APP-ID", appid);
postman.setEnvironmentVariable("WE-TRACE-ID", trace_id);
postman.setEnvironmentVariable("WE-TOKEN", token);
postman.setEnvironmentVariable("WE-CHANNEL", channel);
```

Tests

```js
var Jsondata = JSON.parse(responseBody);
//设置环境变量手机返回信息
pm.environment.set("city",Jsondata.result.city);
//提取出city参数数据
```


```js
// 创建Base64对象
var Base64 = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    encode: function (e) {
        var t = "";
        var n, r, i, s, o, u, a;
        var f = 0;
        e = Base64._utf8_encode(e);
        while (f < e.length) {
            n = e.charCodeAt(f++);
            r = e.charCodeAt(f++);
            i = e.charCodeAt(f++);
            s = n >> 2;
            o = (n & 3) << 4 | r >> 4;
            u = (r & 15) << 2 | i >> 6;
            a = i & 63;
            if (isNaN(r)) {
                u = a = 64
            } else if (isNaN(i)) {
                a = 64
            }
            t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
        }
        return t
    },
    decode: function (e) {
        var t = "";
        var n, r, i;
        var s, o, u, a;
        var f = 0;
        e = e.replace(/[^A-Za-z0-9+/=]/g, "");
        while (f < e.length) {
            s = this._keyStr.indexOf(e.charAt(f++));
            o = this._keyStr.indexOf(e.charAt(f++));
            u = this._keyStr.indexOf(e.charAt(f++));
            a = this._keyStr.indexOf(e.charAt(f++));
            n = s << 2 | o >> 4;
            r = (o & 15) << 4 | u >> 2;
            i = (u & 3) << 6 | a;
            t = t + String.fromCharCode(n);
            if (u != 64) {
                t = t + String.fromCharCode(r)
            }
            if (a != 64) {
                t = t + String.fromCharCode(i)
            }
        }
        t = Base64._utf8_decode(t);
        return t
    },
    _utf8_encode: function (e) {
        e = e.replace(/rn/g, "n");
        var t = "";
        for (var n = 0; n < e.length; n++) {
            var r = e.charCodeAt(n);
            if (r < 128) {
                t += String.fromCharCode(r)
            } else if (r > 127 && r < 2048) {
                t += String.fromCharCode(r >> 6 | 192);
                t += String.fromCharCode(r & 63 | 128)
            } else {
                t += String.fromCharCode(r >> 12 | 224);
                t += String.fromCharCode(r >> 6 & 63 | 128);
                t += String.fromCharCode(r & 63 | 128)
            }
        }
        return t
    },
    _utf8_decode: function (e) {
        var t = "";
        var n = 0;
        var r = c1 = c2 = 0;
        while (n < e.length) {
            r = e.charCodeAt(n);
            if (r < 128) {
                t += String.fromCharCode(r);
                n++
            } else if (r > 191 && r < 224) {
                c2 = e.charCodeAt(n + 1);
                t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                n += 2
            } else {
                c2 = e.charCodeAt(n + 1);
                c3 = e.charCodeAt(n + 2);
                t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                n += 3
            }
        }
        return t
    }
}

// 定义字符串
var string = 'Hello World!';
// 加密
var encodedString = Base64.encode(string);
console.log(encodedString); // 输出: "SGVsbG8gV29ybGQh"
// 解密
var decodedString = Base64.decode(encodedString);
console.log(decodedString); // 输出: "Hello World!"

```