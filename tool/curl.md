# cURL

## 常用命令

* GET方式
	* curl http://hostname/resource
* POST方式（--data/-d）
	* curl -d "param1=value1&param2=value" http://hostname/resource
* POST一个文件
	* curl -d @filename.json http://hostname/resource
* 指定其它协议（-X）
	* curl -X DELETE http://hostname/resource
* 上传文件
	* curl -F "filename=@/path/filename.json" http://hostname/resource
* 模拟`multipart/form-data`形式的`form`上传文件
	* curl -F "a=1" -F "b=2" -F "filename=@/path/filename.json" http://hostname/resource
* 将网站的cookies信息保存到sugarcookies文件中
	* curl -D sugarcookies http://hostname/resource
* 使用上次保存的cookie信息
	* curl -b sugarcookies http://hostname/resource

## 使用curl测试restful api

curl -X GET "http://www.rest.com/api/users"
curl -X POST "http://www.rest.com/api/users"
curl -X PUT "http://www.rest.com/api/users"
curl -X DELETE "http://www.rest.com/api/users"

cURL 是很方便的Rest客戶端，可以很方便的完成許多Rest API測試的需求，甚至，如果是需要先登入或認證的rest api，也可以進行測試，利用curl指令，可以送出HTTP GET, POST, PUT, DELETE, 也可以改變 HTTP header來滿足使用REST API需要的特定條件。

curl的參數很多，這邊僅列出目前測試REST時常用到的:

     -X/--request [GET|POST|PUT|DELETE|…]  使用指定的http method發出 http request
     -H/--header                           設定request裡的header
     -i/--include                          顯示response的header
     -d/--data                             設定 http parameters 
     -v/--verbose                          輸出比較多的訊息
     -u/--user                             使用者帳號、密碼
     -b/--cookie                           cookie  

linux command line 的參數常，同一個功能常會有兩個功能完全相同參數，一個是比較短的參數，前面通常是用-(一個-)導引符號，另一個比較長的參數，通常會用--(兩個-)導引符號

在curl 使用說明

  -X, --request COMMAND  Specify request command to use
      --resolve HOST:PORT:ADDRESS  Force resolve of HOST:PORT to ADDRESS
      --retry NUM   Retry request NUM times if transient problems occur
      --retry-delay SECONDS When retrying, wait this many seconds between each
      --retry-max-time SECONDS  Retry only within this period>
參數-X跟--request兩個功能是一樣的，所以使用時 ex:curl -X POST http://www.example.com/ 跟 curl --request POST http://www.example.com/ 是相等的功能

### GET/POST/PUT/DELETE使用方式

-X 後面加 http method，

curl -X GET "http://www.rest.com/api/users"
curl -X POST "http://www.rest.com/api/users"
curl -X PUT "http://www.rest.com/api/users"
curl -X DELETE "http://www.rest.com/api/users"
url要加引號也可以，不加引號也可以，如果有非純英文字或數字外的字元，不加引號可能會有問題，如果是網碼過的url，也要加上引號

### HEADER

在http header加入的訊息

curl -v -i -H "Content-Type: application/json" http://www.example.com/users

### HTTP Parameter

http參數可以直接加在url的query string，也可以用-d帶入參數間用&串接，或使用多個-d

* 使用`&`串接多個參數

     curl -X POST -d "param1=value1&param2=value2"

* 也可使用多個`-d`，效果同上

     curl -X POST -d "param1=value1" -d "param2=value2"
     curl -X POST -d "param1=a 0space"  

* "a space" url encode後空白字元會編碼成'%20'為"a%20space"，編碼後的參數可以直接使用

     curl -X POST -d "param1=a%20space"     

### post json 格式得資料

如同時需要傳送request parameter跟json，request parameter可以加在url後面，json資料則放入-d的參數，然後利用單引號將json資料含起來(如果json內容是用單引號，-d的參數則改用雙引號包覆)，header要加入”Content-Type:application/json”跟”Accept:application/json”

curl http://www.example.com?modifier=kent -X PUT -i -H "Content-Type:application/json" -H "Accept:application/json" -d '{"boolean" : false, "foo" : "bar"}'
# 不加"Accept:application/json"也可以
curl http://www.example.com?modifier=kent -X PUT -i -H "Content-Type:application/json" -d '{"boolean" : false, "foo" : "bar"}'

### 需先認證或登入才能使用的service

許多服務，需先進行登入或認證後，才能存取其API服務，依服務要求的條件，的curl可以透過cookie，session或加入在header加入session key，api key或認證的token來達到認證的效果。

session 例子:

後端如果是用session記錄使用者登入資訊，後端會傳一個 session id給前端，前端需要在每次跟後端的requests的header中置入此session id，後端便會以此session id識別前端是屬於那個session，以達到session的效果

curl --request GET 'http://www.rest.com/api/users' --header 'sessionid:1234567890987654321'
cookie 例子

如果是使用cookie，在認證後，後端會回一個cookie回來，把該cookie成檔案，當要存取需要任務的url時，再用-b cookie_file 的方式在request中植入cookie即可正常使用

* 將cookie存檔

curl -i -X POST -d username=kent -d password=kent123 -c  ~/cookie.txt  http://www.rest.com/auth

* 載入cookie到request中 

curl -i --header "Accept:application/json" -X GET -b ~/cookie.txt http://www.rest.com/users/1

### 檔案上傳

curl -i -X POST -F 'file=@/Users/kent/my_file.txt' -F 'name=a_file_name'
這個是透過 HTTP multipart POST 上傳資料， -F 是使用http query parameter的方式，指定檔案位置的參數要加上@

### HTTP Basic Authentication (HTTP基本認證)

如果網站是採HTTP基本認證, 可以使用 --user username:password 登入

curl -i --user kent:secret http://www.rest.com/api/foo'    
認證失敗時，會是401 Unauthorized

     HTTP/1.1 401 Unauthorized
     Server: Apache-Coyote/1.1
     X-Content-Type-Options: nosniff
     X-XSS-Protection: 1; mode=block
     Cache-Control: no-cache, no-store, max-age=0, must-revalidate
     Pragma: no-cache
     Expires: 0
     X-Frame-Options: DENY
     WWW-Authenticate: Basic realm="Realm"
     Content-Type: text/html;charset=utf-8
     Content-Language: en
     Content-Length: 1022
     Date: Thu, 15 May 2014 06:32:49 GMT

認證通過時，會回應 200 OK

     HTTP/1.1 200 OK
     Server: Apache-Coyote/1.1
     X-Content-Type-Options: nosniff
     X-XSS-Protection: 1; mode=block
     Cache-Control: no-cache, no-store, max-age=0, must-revalidate
     Pragma: no-cache
     Expires: 0
     X-Frame-Options: DENY
     Set-Cookie: JSESSIONID=A75066DCC816CE31D8F69255DEB6C30B; Path=/mdserver/; HttpOnly
     Content-Type: application/json;charset=UTF-8
     Transfer-Encoding: chunked
     Date: Thu, 15 May 2014 06:14:11 GMT
     
可以把認證後的cookie存起來，重複使用

curl -i --user kent:secret http://www.rest.com/api/foo' -c ~/cookies.txt
登入之前暫存的cookies，可以不用每次都認證

curl -i  http://www.rest.com/api/foo' -b ~/cookies.txt



















## 通过字典查询单词

* 查询bash单词的含义
	* curl dict://dict.org/d:bash
* 列出所有可用词典
	* curl dict://dict.org/show:db
* 在foldoc词典中查询bash单词的含义
	* curl dict://dict.org/d:bash:foldoc

## curl命令选项
-a/--append	上传文件时，附加到目标文件
-A/--user-agent <string>	设置用户代理发送给服务器
-anyauth	可以使用“任何”身份验证方法
-b/--cookie <name=string/file>	cookie字符串或文件读取位置
     --basic	使用HTTP基本验证
-B/--use-ascii	使用ASCII /文本传输
-c/--cookie-jar <file>	操作结束后把cookie写入到这个文件中
-C/--continue-at <offset>	断点续转
-d/--data <data>	HTTP POST方式传送数据
     --data-ascii <data>	以ascii的方式post数据
     --data-binary <data>	以二进制的方式post数据
     --negotiate	使用HTTP身份验证
     --digest	使用数字身份验证
     --disable-eprt	禁止使用EPRT或LPRT
     --disable-epsv	禁止使用EPSV
-D/--dump-header <file>	把header信息写入到该文件中
     --egd-file <file>	为随机数据(SSL)设置EGD socket路径
     --tcp-nodelay	使用TCP_NODELAY选项
-e/--referer	来源网址
-E/--cert <cert[:passwd]>	客户端证书文件和密码 (SSL)
     --cert-type <type>	证书文件类型 (DER/PEM/ENG) (SSL)
     --key <key>	私钥文件名 (SSL)
     --key-type <type>	私钥文件类型 (DER/PEM/ENG) (SSL)
     --pass <pass>	私钥密码 (SSL)
     --engine <eng>	加密引擎使用 (SSL). "--engine list" for list
     --cacert <file>	CA证书 (SSL)
     --capath <directory>	CA目录 (made using c_rehash) to verify peer against (SSL)
     --ciphers <list>	SSL密码
     --compressed	要求返回是压缩的形势 (using deflate or gzip)
     --connect-timeout <seconds>	设置最大请求时间
     --create-dirs	建立本地目录的目录层次结构
     --crlf	上传是把LF转变成CRLF
-f/--fail	连接失败时不显示http错误
     --ftp-create-dirs	如果远程目录不存在，创建远程目录
     --ftp-method [multicwd/nocwd/singlecwd]	控制CWD的使用
     --ftp-pasv	使用 PASV/EPSV 代替端口
     --ftp-skip-pasv-ip	使用PASV的时候,忽略该IP地址
     --ftp-ssl	尝试用 SSL/TLS 来进行ftp数据传输
     --ftp-ssl-reqd	要求用 SSL/TLS 来进行ftp数据传输
-F/--form <name=content>	模拟http表单提交数据
     --form-string <name=string>	模拟http表单提交数据
-g/--globoff	禁用网址序列和范围使用{}和[]
-G/--get	以get的方式来发送数据
-H/--header <line>	自定义头信息传递给服务器
     --ignore-content-length	忽略的HTTP头信息的长度
-i/--include	输出时包括protocol头信息
-I/--head	只显示请求头信息
-j/--junk-session-cookies	读取文件进忽略session cookie
     --interface <interface>	使用指定网络接口/地址
     --krb4 <level>	使用指定安全级别的krb4
-k/--insecure	允许不使用证书到SSL站点
-K/--config	指定的配置文件读取
-l/--list-only	列出ftp目录下的文件名称
     --limit-rate <rate>	设置传输速度
     --local-port<NUM>	强制使用本地端口号
-m/--max-time <seconds>	设置最大传输时间
     --max-redirs <num>	设置最大读取的目录数
     --max-filesize <bytes>	设置最大下载的文件总量
-M/--manual	显示全手动
-n/--netrc	从netrc文件中读取用户名和密码
     --netrc-optional	使用 .netrc 或者 URL来覆盖-n
     --ntlm	使用 HTTP NTLM 身份验证
-N/--no-buffer	禁用缓冲输出
-o/--output	把输出写到该文件中
-O/--remote-name	把输出写到该文件中，保留远程文件的文件名
-p/--proxytunnel	使用HTTP代理
     --proxy-anyauth	选择任一代理身份验证方法
     --proxy-basic	在代理上使用基本身份验证
     --proxy-digest	在代理上使用数字身份验证
     --proxy-ntlm	在代理上使用ntlm身份验证
-P/--ftp-port <address>	使用端口地址，而不是使用PASV
-q	作为第一个参数，关闭 .curlrc
-Q/--quote <cmd>	文件传输前，发送命令到服务器
-r/--range <range>	检索来自HTTP/1.1或FTP服务器字节范围
--range-file	读取（SSL）的随机文件
-R/--remote-time	在本地生成文件时，保留远程文件时间
     --retry <num>	传输出现问题时，重试的次数
     --retry-delay <seconds>	传输出现问题时，设置重试间隔时间
     --retry-max-time <seconds>	传输出现问题时，设置最大重试时间
-s/--silent	静默模式。不输出任何东西
-S/--show-error	显示错误
     --socks4 <host[:port]>	用socks4代理给定主机和端口
     --socks5 <host[:port]>	用socks5代理给定主机和端口
     --stderr <file>	 
-t/--telnet-option <OPT=val>	Telnet选项设置
     --trace <file>	对指定文件进行debug
     --trace-ascii <file>	Like --跟踪但没有hex输出
     --trace-time	跟踪/详细输出时，添加时间戳
-T/--upload-file <file>	上传文件
     --url <URL>	Spet URL to work with
-u/--user <user[:password]>	设置服务器的用户和密码
-U/--proxy-user <user[:password]>	设置代理用户名和密码
-w/--write-out [format]	什么输出完成后
-x/--proxy <host[:port]>	在给定的端口上使用HTTP代理
-X/--request <command>	指定什么命令
-y/--speed-time	放弃限速所要的时间，默认为30
-Y/--speed-limit	停止传输速度的限制，速度时间

## PHP CURL

```php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$head = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
```