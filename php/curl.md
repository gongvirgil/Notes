# PHP CURL

```php
<?php
$url = "";
$header = [];
$params = [];
$path = [
    'sslCert' => '',
    'sslKey' => '',
];

$ch = curl_init();//创建curl对象
curl_setopt($ch, CURLOPT_URL, $url);//请求URL
curl_setopt($ch, CURLOPT_HEADER, 0);//过滤HTTP头
curl_setopt($ch, CURLOPT_TIMEOUT, 15);//设置超时
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置Header头

//不验证证书
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

//验证SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
curl_setopt($ch, CURLOPT_CAINFO, $path['sslCert']);//验证的文件地址

//需要pem证书双向认证
curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');//证书的类型
curl_setopt($ch, CURLOPT_SSLCERT, $path['sslCert']);//PEM文件地址
curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');//私钥的加密类型
curl_setopt($ch, CURLOPT_SSLKEY, $path['sslKey']);//私钥地址


curl_setopt($ch, CURLOPT_POST, true);//使用POST方式传输
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);//POST传输数据

$data = curl_exec($ch);
curl_close($ch);//释放curl对象

var_dump($data);
```



## curl_setopt

> curl_setopt ( resource $ch , int $option , mixed $value ) : bool

| Option | Vaule Data Type | Set value to | Notes |
|---|---|---|---|
| CURLOPT_AUTOREFERER               | bool   | | |
| CURLOPT_BINARYTRANSFER            | bool   | | |
| CURLOPT_COOKIESESSION             | bool   | | |
| CURLOPT_CERTINFO                  | bool   | | |
| CURLOPT_CONNECT_ONLY              | bool   | | |
| CURLOPT_CRLF                      | bool   | | |
| CURLOPT_DNS_USE_GLOBAL_CACHE      | bool   | | |
| CURLOPT_FAILONERROR               | bool   | | |
| CURLOPT_SSL_FALSESTART            | bool   | | |
| CURLOPT_FILETIME                  | bool   | | |
| CURLOPT_FOLLOWLOCATION            | bool   | | |
| CURLOPT_FORBID_REUSE              | bool   | | |
| CURLOPT_FRESH_CONNECT             | bool   | | |
| CURLOPT_FTP_USE_EPRT              | bool   | | |
| CURLOPT_FTP_USE_EPSV              | bool   | | |
| CURLOPT_FTP_CREATE_MISSING_DIRS   | bool   | | |
| CURLOPT_FTPAPPEND                 | bool   | | |
| CURLOPT_TCP_NODELAY               | bool   | | |
| CURLOPT_FTPASCII                  | bool   | | |
| CURLOPT_FTPLISTONLY               | bool   | | |
| CURLOPT_HEADER                    | bool   | | |
| CURLINFO_HEADER_OUT               | bool   | | |
| CURLOPT_HTTPGET                   | bool   | | |
| CURLOPT_HTTPPROXYTUNNEL           | bool   | | |
| CURLOPT_MUTE                      | bool   | | |
| CURLOPT_NETRC                     | bool   | | |
| CURLOPT_NOBODY                    | bool   | | |
| CURLOPT_NOPROGRESS                | bool   | | |
| CURLOPT_NOSIGNAL                  | bool   | | |
| CURLOPT_PATH_AS_IS                | bool   | | |
| CURLOPT_PIPEWAIT                  | bool   | | |
| CURLOPT_POST                      | bool   | | |
| CURLOPT_PUT                       | bool   | | |
| CURLOPT_RETURNTRANSFER            | bool   | | |
| CURLOPT_SAFE_UPLOAD               | bool   | | |
| CURLOPT_SASL_IR                   | bool   | | |
| CURLOPT_SSL_ENABLE_ALPN           | bool   | | |
| CURLOPT_SSL_ENABLE_NPN            | bool   | | |
| CURLOPT_SSL_VERIFYPEER            | bool   | | |
| CURLOPT_SSL_VERIFYSTATUS          | bool   | | |
| CURLOPT_TCP_FASTOPEN              | bool   | | |
| CURLOPT_TFTP_NO_OPTIONS           | bool   | | |
| CURLOPT_TRANSFERTEXT              | bool   | | |
| CURLOPT_UNRESTRICTED_AUTH         | bool   | | |
| CURLOPT_UPLOAD                    | bool   | | |
| CURLOPT_VERBOSE                   | bool   | | |
| CURLOPT_BUFFERSIZE                | int    | | |
| CURLOPT_CLOSEPOLICY               | int    | | |
| CURLOPT_CONNECTTIMEOUT            | int    | | |
| CURLOPT_CONNECTTIMEOUT_MS         | int    | | |
| CURLOPT_DNS_CACHE_TIMEOUT         | int    | | |
| CURLOPT_EXPECT_100_TIMEOUT_MS     | int    | | |
| CURLOPT_FTPSSLAUTH                | int    | | |
| CURLOPT_HEADEROPT                 | int    | | |
| CURLOPT_HTTP_VERSION              | int    | | |
| CURLOPT_HTTPAUTH                  | int    | | |
| CURLOPT_INFILESIZE                | int    | | |
| CURLOPT_LOW_SPEED_LIMIT           | int    | | |
| CURLOPT_LOW_SPEED_TIME            | int    | | |
| CURLOPT_MAXCONNECTS               | int    | | |
| CURLOPT_MAXREDIRS                 | int    | | |
| CURLOPT_PORT                      | int    | | |
| CURLOPT_POSTREDIR                 | int    | | |
| CURLOPT_PROTOCOLS                 | int    | | |
| CURLOPT_PROXYAUTH                 | int    | | |
| CURLOPT_PROXYPORT                 | int    | | |
| CURLOPT_PROXYTYPE                 | int    | | |
| CURLOPT_REDIR_PROTOCOLS           | int    | | |
| CURLOPT_RESUME_FROM               | int    | | |
| CURLOPT_SSL_OPTIONS               | int    | | |
| CURLOPT_SSL_VERIFYHOST            | int    | | |
| CURLOPT_SSLVERSION                | int    | | |
| CURLOPT_STREAM_WEIGHT             | int    | | |
| CURLOPT_TIMECONDITION             | int    | | |
| CURLOPT_TIMEOUT                   | int    | | |
| CURLOPT_TIMEOUT_MS                | int    | | |
| CURLOPT_TIMEVALUE                 | int    | | |
| CURLOPT_MAX_RECV_SPEED_LARGE      | int    | | |
| CURLOPT_MAX_SEND_SPEED_LARGE      | int    | | |
| CURLOPT_SSH_AUTH_TYPES            | int    | | |
| CURLOPT_IPRESOLVE                 | int    | | |
| CURLOPT_FTP_FILEMETHOD            | int    | | |
| CURLOPT_CAINFO                    | string | | |
| CURLOPT_CAPATH                    | string | | |
| CURLOPT_COOKIE                    | string | | |
| CURLOPT_COOKIEFILE                | string | | |
| CURLOPT_COOKIEJAR                 | string | | |
| CURLOPT_CUSTOMREQUEST             | string | | |
| CURLOPT_DEFAULT_PROTOCOL          | string | | |
| CURLOPT_DNS_INTERFACE             | string | | |
| CURLOPT_DNS_LOCAL_IP4             | string | | |
| CURLOPT_DNS_LOCAL_IP6             | string | | |
| CURLOPT_EGDSOCKET                 | string | | |
| CURLOPT_ENCODING                  | string | | |
| CURLOPT_FTPPORT                   | string | | |
| CURLOPT_INTERFACE                 | string | | |
| CURLOPT_KEYPASSWD                 | string | | |
| CURLOPT_KRB4LEVEL                 | string | | |
| CURLOPT_LOGIN_OPTIONS             | string | | |
| CURLOPT_PINNEDPUBLICKEY           | string | | |
| CURLOPT_POSTFIELDS                | string | | |
| CURLOPT_PRIVATE                   | string | | |
| CURLOPT_PROXY                     | string | | |
| CURLOPT_PROXY_SERVICE_NAME        | string | | |
| CURLOPT_PROXYUSERPWD              | string | | |
| CURLOPT_RANDOM_FILE               | string | | |
| CURLOPT_RANGE                     | string | | |
| CURLOPT_REFERER                   | string | | |
| CURLOPT_SERVICE_NAME              | string | | |
| CURLOPT_SSH_HOST_PUBLIC_KEY_MD5   | string | | |
| CURLOPT_SSH_PUBLIC_KEYFILE        | string | | |
| CURLOPT_SSH_PRIVATE_KEYFILE       | string | | |
| CURLOPT_SSL_CIPHER_LIST           | string | | |
| CURLOPT_SSLCERT                   | string | | |
| CURLOPT_SSLCERTPASSWD             | string | | |
| CURLOPT_SSLCERTTYPE               | string | | |
| CURLOPT_SSLENGINE                 | string | | |
| CURLOPT_SSLENGINE_DEFAULT         | string | | |
| CURLOPT_SSLKEY                    | string | | |
| CURLOPT_SSLKEYPASSWD              | string | | |
| CURLOPT_SSLKEYTYPE                | string | | |
| CURLOPT_UNIX_SOCKET_PATH          | string | | |
| CURLOPT_URL                       | string | | |
| CURLOPT_USERAGENT                 | string | | |
| CURLOPT_USERNAME                  | string | | |
| CURLOPT_USERPWD                   | string | | |
| CURLOPT_XOAUTH2_BEARER            | string | | |
| CURLOPT_CONNECT_TO                | array  | | |
| CURLOPT_HTTP200ALIASES            | array  | | |
| CURLOPT_HTTPHEADER                | array  | | |
| CURLOPT_POSTQUOTE                 | array  | | |
| CURLOPT_PROXYHEADER               | array  | | |
| CURLOPT_QUOTE                     | array  | | |
| CURLOPT_RESOLVE                   | array  | | |
| CURLOPT_FILE                      | stream resource | | |
| CURLOPT_INFILE                    | stream resource | | |
| CURLOPT_STDERR                    | stream resource | | |
| CURLOPT_WRITEHEADER               | stream resource | | |
| CURLOPT_HEADERFUNCTION            | function/Closure name | | |
| CURLOPT_PASSWDFUNCTION            | function/Closure name | | |
| CURLOPT_PROGRESSFUNCTION          | function/Closure name | | |
| CURLOPT_READFUNCTION              | function/Closure name | | |
| CURLOPT_WRITEFUNCTION             | function/Closure name | | |
| CURLOPT_SHARE                     | Other Value | | |