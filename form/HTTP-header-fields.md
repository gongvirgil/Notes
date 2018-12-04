# HTTP header fields

* [维基百科·HTTP头字段列表](https://zh.wikipedia.org/wiki/HTTP头字段列表)

* 大小限制：标准中没有对每个协议头字段的名称和值的大小设置任何限制，也没有限制字段的个数。然而，出于实际场景及安全性的考虑，大部分的服务器、客户端和代理软件都会实施一些限制。例如，Apache 2.3服务器在默认情况下限制每个字段的大小不得超过8190字节，同时，单个请求中最多有100个头字段。

### 请求字段


协议头字段名	|	说明	|	示例	|	状态
---|---|---|---
Accept					|	能够接受的回应内容类型（Content-Types）。参见内容协商。	|	Accept: text/plain					|	Permanent
Accept-Charset			|	能够接受的字符集										|	Accept-Charset: utf-8				|	Permanent
Accept-Encoding			|	能够接受的编码方式列表。参考HTTP压缩。					|	Accept-Encoding: gzip, deflate		|	Permanent
Accept-Language			|	能够接受的回应内容的自然语言列表。参考 内容协商 。		|	Accept-Language: en-US				|	Permanent
Accept-Datetime			|	能够接受的按照时间来表示的版本							|	Accept-Datetime: Thu, 31 May 2007 20:35:00 GMT		|	Provisional
Authorization			|	用于超文本传输协议的认证的认证信息						|	Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==	|	Permanent
Cache-Control			|	用来指定在这次的请求/响应链中的所有缓存机制 都必须 遵守的指令				|	Cache-Control: no-cache			|	Permanent
Connection				|	该浏览器想要优先使用的连接类型												|	Connection: keep-alive<br>Connection: Upgrade	|	Permanent
Cookie					|	之前由服务器通过 Set- Cookie （下文详述）发送的一个 超文本传输协议Cookie	|	Cookie: $Version=1; Skin=new;	|	Permanent: standard
Content-Length			|	以 `八位字节数组` （8位的字节）表示的请求体的长度							|	Content-Length: 348				|	Permanent
Content-MD5				|	请求体的内容的二进制 MD5 散列值，以 Base64 编码的结果						|	Content-MD5: Q2hlY2sgSW50ZWdyaXR5IQ==	|	Obsolete
Content-Type			|	请求体的 多媒体类型 （用于POST和PUT请求中）									|	Content-Type: application/x-www-form-urlencoded		|	Permanent
Date					|	发送该消息的日期和时间(按照 RFC 7231 中定义的"超文本传输协议日期"格式来发送)	|	Date: Tue, 15 Nov 1994 08:12:31 GMT		|	Permanent
Expect					|	表明客户端要求服务器做出特定的行为	|	Expect: 100-continue	|	Permanent
From					|	发起此请求的用户的邮件地址			|	From: user@example.com	|	Permanent
Host					|	服务器的域名(用于 虚拟 主机 )，以及服务器所监听的 传输控制协议端口 号。如果所请求的端口是对应的服务的标准端口，则 端口 号可被省略。<br>自超文件传输协议版本1.1（HTTP/1.1）开始便是必需字段。	|	Host: en.wikipedia.org:80<br>Host: en.wikipedia.org 	|	Permanent
If-Match				|	仅当客户端提供的实体与服务器上对应的实体相匹配时，才进行对应的操作。<br>主要作用时，用作像 PUT 这样的方法中，仅当从用户上次更新某个资源以来，该资源未被修改的情况下，才更新该资源。				|	If-Match: "737060cd8c284d8af7ad3082f209582d"	|	Permanent
If-Modified-Since		|	允许在对应的内容未被修改的情况下返回304未修改（ 304 Not Modified ）										|	If-Modified-Since: Sat, 29 Oct 1994 19:43:31 GMT	|	Permanent
If-None-Match			|	允许在对应的内容未被修改的情况下返回304未修改（ 304 Not Modified ），参考 超文本传输协议 的实体标记		|	If-None-Match: "737060cd8c284d8af7ad3082f209582d"	|	Permanent
If-Range				|	如果该实体未被修改过，则向我发送我所缺少的那一个或多个部分；否则，发送整个新的实体						|	If-Range: "737060cd8c284d8af7ad3082f209582d"	|	Permanent
If-Unmodified-Since		|	仅当该实体自某个特定时间已来未被修改的情况下，才发送回应。												|	If-Unmodified-Since: Sat, 29 Oct 1994 19:43:31 GMT	|	Permanent
Max-Forwards			|	限制该消息可被代理及网关转发的次数。	Max-Forwards: 10	|	Permanent
Origin					|	发起一个针对 跨来源资源共享 的请求（要求服务器在回应中加入一个‘访问控制-允许来源’（'Access-Control-Allow-Origin'）字段）。	|	Origin: http://www.example-social-network.com	|	Permanent: standard
Pragma					|	与具体的实现相关，这些字段可能在请求/回应链中的任何时候产生 多种效果。	|	HTTP头字段列表	|	Permanent
Proxy-Authorization		|	用来向代理进行认证的认证信息。											|	Proxy-Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==		|	Permanent
Range					|	仅请求某个实体的一部分。字节偏移以0开始。参考 字节服务 。				|	Range: bytes=500-999	|	Permanent
Referer					|	表示浏览器所访问的前一个页面，正是那个页面上的某个链接将浏览器带到了当前所请求的这个页面。(“引导者”（“referrer”）这个单词，在RFC 中被拼错了，因此在大部分的软件实现中也拼错了，以至于，错误的拼法成为了标准的用法，还被当成了正确的术语)	|	Referer: http://en.wikipedia.org/wiki/Main_Page		|	Permanent
TE						|	浏览器预期接受的传输编码方式：可使用回应协议头Transfer-Encoding 字段中的那些值，另外还有一个值可用，"trailers"（与" 分 块 "传输方式相关），用来表明，浏览器希望在最后一个尺寸为0的块之后还接收到一些额外的字段。	|	TE: trailers, deflate	|	Permanent
User-Agent				|	浏览器的浏览器身份标识字符串	|	User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:12.0) Gecko/20100101 Firefox/21.0 	|	Permanent
Upgrade					|	要求服务器升级到另一个协议。	|	Upgrade: HTTP/2.0, SHTTP/1.3, IRC/6.9, RTA/x11							|	Permanent
Via						|	向服务器告知，这个请求是由哪些代理发出的。				|	Via: 1.0 fred, 1.1 example.com (Apache/1.1)		|	Permanent
Warning					|	一个一般性的警告，告知，在实体内容体中可能存在错误。	|	Warning: 199 Miscellaneous warning				|	Permanent


### 回应字段

Field name	|	Description		|	Example		|	Status
---|---|---|---
Access-Control-Allow-Origin	|	指定哪些网站可参与到 跨来源资源共享 过程中										|	Access-Control-Allow-Origin: *				|	Provisional
Accept-Patch				|	Specifies which patch document formats this server supports						|	Accept-Patch: text/example;charset=utf-8	|	Permanent
Accept-Ranges				|	这个服务器支持哪些种类的部分内容范围											|	Accept-Ranges: bytes						|	Permanent
Age							|	这个对象在 代理缓存 中存在的时间，以秒为单位									|	Age: 12										|	Permanent
Allow						|	对于特定资源有效的动作。针对405不允许该方法（ 405 Method not allowed ）而使用	|	Allow: GET, HEAD							|	Permanent
Cache-Control				|	向从服务器直到客户端在内的所有缓存机制告知，它们是否可以缓存这个对象。其单位为秒	|	Cache-Control: max-age=3600				|	Permanent
Connection					|	针对该连接所预期的选项															|	Connection: close							|	Permanent
Content-Disposition			|	An opportunity to raise a "File Download" dialogue box for a known MIME type with binary format or suggest a filename for dynamic content. Quotes are necessary with special characters.	|	Content-Disposition: attachment; filename="fname.ext"	  |   Permanent
Content-Encoding			|	在数据上使用的编码类型。参考 超文本传输协议压缩 。	|	Content-Encoding: gzip					|	Permanent
Content-Language			|	内容所使用的语言									|	Content-Language: da					|	Permanent
Content-Length				|	回应消息体的长度，以 字节 （8位为一字节）为单位		|	Content-Length: 348						|	Permanent
Content-Location			|	所返回的数据的一个候选位置							|	Content-Location: /index.htm			|	Permanent
Content-MD5					|	回应内容的二进制 MD5 散列，以 Base64 方式编码		|	Content-MD5: Q2hlY2sgSW50ZWdyaXR5IQ==	|	Obsolete
Content-Range				|	这条部分消息是属于某条完整消息的哪个部分			|	Content-Range: bytes 21010-47021/47022	|	Permanent
Content-Type				|	当前内容的MIME类型									|	Content-Type: text/html; charset=utf-8	|	Permanent
Date						|	此条消息被发送时的日期和时间(按照 RFC 7231 中定义的“超文本传输协议日期”格式来表示)	|	Date: Tue, 15 Nov 1994 08:12:31 GMT		|	Permanent
ETag						|	对于某个资源的某个特定版本的一个标识符，通常是一个 消息散列		|	ETag: "737060cd8c284d8af7ad3082f209582d"	|	Permanent
Expires						|	指定一个日期/时间，超过该时间则认为此回应已经过期				|	Expires: Thu, 01 Dec 1994 16:00:00 GMT		|	Permanent: standard
Last-Modified				|	所请求的对象的最后修改日期(按照 RFC 7231 中定义的“超文本传输协议日期”格式来表示)	|	Last-Modified: Tue, 15 Nov 1994 12:45:26 GMT	|	Permanent
Link						|	用来表达与另一个资源之间的类型关系，此处所说的类型关系是在 RFC 5988 中定义的	|	Link: </feed>; rel="alternate"	|	Permanent
Location					|	用来 进行 重定向 ，或者在创建了某个新资源时使用。	|	Location: http://www.w3.org/pub/WWW/People.html 	|	Permanent
P3P							|	This field is supposed to set P3P policy, in the form of P3P:CP="your_compact_policy". However, P3P did not take off, most browsers have never fully implemented it, a lot of websites set this field with fake policy text, that was enough to fool browsers the existence of P3P policy and grant permissions for third party cookies.	|	P3P: CP="This is not a P3P policy! See http://www.google.com/support/accounts/bin/answer.py?hl=en&answer=151657 for more info."		|	Permanent
Pragma						|	与具体的实现相关，这些字段可能在请求/回应链中的任何时候产生多种效果。	|	Pragma: no-cache			|	Permanent
Proxy-Authenticate			|	要求在访问代理时提供身份认证信息。										|	Proxy-Authenticate: Basic	|	Permanent
Public-Key-Pins				|	用于缓解中间人攻击，声明网站认证使用的传输层安全协议证书的散列值		|	Public-Key-Pins: max-age=2592000; pin-sha256="E9CZ9INDbd+2eRQozYqqbQ2yXLVKB9+xcprMF+44U1g=";	|	Permanent
Refresh						|	Used in redirection, or when a new resource has been created. This refresh redirects after 5 seconds.	|	Refresh: 5; url=http://www.w3.org/pub/WWW/People.html	Proprietary and non-standard: a header extension introduced by Netscape and supported by most web browsers.
Retry-After					|	如果某个实体临时不可用，则，此协议头用来告知客户端日后重试。其值可以是一个特定的时间段(以秒为单位)或一个超文本传输协议日期。 |	Example 1: Retry-After: 120<br>Example 2: Retry-After: Fri, 07 Nov 2014 23:59:59 GMT |	Permanent
Server						|	服务器的名字	|	Server: Apache/2.4.1 (Unix)								|	Permanent
Set-Cookie					|	HTTP cookie		|	Set-Cookie: UserID=JohnDoe; Max-Age=3600; Version=1		|	Permanent: standard
Status						|	通用网关接口 协议头字段，用来说明当前这个超文本传输协议回应的 状态。普通的超文本传输协议回应，会使用单独的“状态行”（"Status-Line"）作为替代，这一点是在 RFC 7230 中定义的。	|	Status: 200 OK	|	Not listed as a registered field name
Strict-Transport-Security	|	A HSTS Policy informing the HTTP client how long to cache the HTTPS only policy and whether this applies to subdomains.		|	Strict-Transport-Security: max-age=16070400; includeSubDomains	|	Permanent: standard
Trailer						|	The Trailer general field value indicates that the given set of header fields is present in the trailer of a message encoded with chunked transfer coding.	|	Trailer: Max-Forwards	|	Permanent
Transfer-Encoding			|	用来将实体安全地传输给用户的编码形式。 当前定义 的方法 包括： 分 块 、压缩（compress）、缩小（deflate）、压缩（gzip）、实体（identity）。	|	Transfer-Encoding: chunked						|	Permanent
Upgrade						|	要求客户端升级到另一个协议。			|	Upgrade: HTTP/2.0, SHTTP/1.3, IRC/6.9, RTA/x11	|	Permanent
Vary						|	告知下游的代理服务器，应当如何对未来的请求协议头进行匹配，以决定是否可使用已缓存的回应内容而不是重新从原始服务器请求新的内容。	|	Vary: *	|	Permanent
Via							|	告知代理服务器的客户端，当前回应是通过什么途径发送的。	|	Via: 1.0 fred, 1.1 example.com (Apache/1.1)		|	Permanent
Warning						|	一般性的警告，告知在实体内容体中可能存在错误。	|	Warning: 199 Miscellaneous warning	|	Permanent
WWW-Authenticate			|	表明在请求获取这个实体时应当使用的认证模式。	|	WWW-Authenticate: Basic				|	Permanent
X-Frame-Options				|	Clickjacking protection: deny - no rendering within a frame, sameorigin - no rendering if origin mismatch, allow-from - allow from specified location, allowall - non-standard, allow from any location	|	X-Frame-Options: deny	|	Obsolete


### 常见的非标准回应字段

字段名	|	说明	|	示例
---|---|---
X-XSS-Protection		|	跨站脚本攻击 (XSS)过滤器	|	X-XSS-Protection: 1; mode=block
Content-Security-Policy<br>X-Content-Security-Policy<br>X-WebKit-CSP	|	内容安全策略定义。	|	X-WebKit-CSP: default-src 'self'
X-Content-Type-Options	|	The only defined value, "nosniff", prevents Internet Explorer from MIME-sniffing <br>a response away from the declared content-type. <br>This also applies to Google Chrome, when downloading extensions.	|	X-Content-Type-Options: nosniff
X-Powered-By			|	表明用于支持当前网页应用程序的技术（例如PHP）（版本号细节通常放置在 X-Runtime 或 X-Version 中）	|	X-Powered-By: PHP/5.4.0
X-UA-Compatible			|	Recommends the preferred rendering engine (often a backward-compatibility mode) to use to display the content. <br>Also used to activate Chrome Frame in Internet Explorer.		|	X-UA-Compatible: IE=EmulateIE7<br>X-UA-Compatible: IE=edge<br>X-UA-Compatible: Chrome=1
X-Content-Duration		|	Provide the duration of the audio or video in seconds; only supported by Gecko browsers		|	X-Content-Duration: 42.666