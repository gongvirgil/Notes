# Function

## Function handling Functions

* call_user_func_array
	* call_user_func_array ( callable $callback , array $param_arr ) : mixed
	* 让参数以数组的形式调用一个函数  
* call_user_func
	* 调用一个存在的函数  
* create_function
	* 建立一个函数  
* forward_static_call_array
	* Call a static method and pass the arguments as array
* forward_static_call
	* Call a static method
* func_get_arg
	* 获取函数中某个参数的值  
* func_get_args
	* 获取函数的所有参数并组成数组  
* func_num_args
	* 获取一个函数的参数个数  
* function_exists
	* 判定一个函数是否存在  
* get_defined_functions
	* 获取已有的函数信息，可以获取所有的PHP函数和自定义的函数
* register_shutdown_function
	* 注册一个页面载入完成后运行的函数  
* register_tick_function
	* 注册一个按要求调用的函数  
* unregister_tick_function
	* 取消一个按要求调用的函数  

## 字符串函数

* addcslashes
	* 以 C 语言风格使用反斜线转义字符串中的字符
* addslashes
	* 使用反斜线引用字符串
* bin2hex
	* 函数把包含数据的二进制字符串转换为十六进制值
* chop
	* rtrim 的别名
* chr
	* 返回指定的字符
* chunk_split
	* 将字符串分割成小块
* convert_cyr_string
	* 将字符由一种 Cyrillic 字符转换成另一种
* convert_uudecode
	* 解码一个 uuencode 编码的字符串
* convert_uuencode
	* 使用 uuencode 编码一个字符串
* count_chars
	* 返回字符串所用字符的信息
* crc32
	* 计算一个字符串的 crc32 多项式
* crypt
	* 单向字符串散列
* echo
	* 输出一个或多个字符串
* explode
	* 使用一个字符串分割另一个字符串
* fprintf
	* 将格式化后的字符串写入到流
* get_html_translation_table
	* 返回使用 htmlspecialchars 和 htmlentities 后的转换表
* hebrev
	* 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew）
* hebrevc
	* 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew），并且转换换行符
* hex2bin
	* 转换十六进制字符串为二进制字符串
* html_entity_decode
	* Convert HTML entities to their corresponding characters
* htmlentities
	* 将字符转换为 HTML 转义字符
* htmlspecialchars_decode
	* 将特殊的 HTML 实体转换回普通字符
* htmlspecialchars
	* 将特殊字符转换为 HTML 实体
* implode
	* 将一个一维数组的值转化为字符串
* join
	* 别名 implode
* lcfirst
	* 使一个字符串的第一个字符小写
* levenshtein
	* 计算两个字符串之间的编辑距离
* localeconv
	* Get numeric formatting information
* ltrim
	* 删除字符串开头的空白字符（或其他字符）
* md5_file
	* 计算指定文件的 MD5 散列值
* md5
	* 计算字符串的 MD5 散列值
* metaphone
	* Calculate the metaphone key of a string
* money_format
	* 将数字格式化成货币字符串
* nl_langinfo
	* Query language and locale information
* nl2br
	* 在字符串所有新行之前插入 HTML 换行标记
* number_format
	* 以千位分隔符方式格式化一个数字
* ord
	* 转换字符串第一个字节为 0-255 之间的值
* parse_str
	* 将字符串解析成多个变量
* print
	* 输出字符串
* printf
	* 输出格式化字符串
* quoted_printable_decode
	* 将 quoted-printable 字符串转换为 8-bit 字符串
* quoted_printable_encode
	* 将 8-bit 字符串转换成 quoted-printable 字符串
* quotemeta
	* 转义元字符集
* rtrim
	* 删除字符串末端的空白字符（或者其他字符）
* setlocale
	* 设置地区信息
* sha1_file
	* 计算文件的 sha1 散列值
* sha1
	* 计算字符串的 sha1 散列值
* similar_text
	* 计算两个字符串的相似度
* soundex
	* Calculate the soundex key of a string
* sprintf
	* Return a formatted string
* sscanf
	* 根据指定格式解析输入的字符
* str_getcsv
	* 解析 CSV 字符串为一个数组
* str_ireplace
	* str_replace 的忽略大小写版本
* str_pad
	* 使用另一个字符串填充字符串为指定长度
* str_repeat
	* str_repeat ( string $input , int $multiplier ) : string
	* 重复一个字符串
* str_replace
	* 子字符串替换
* str_rot13
	* 对字符串执行 ROT13 转换
* str_shuffle
	* 随机打乱一个字符串
* str_split
	* 将字符串转换为数组
* str_word_count
	* 返回字符串中单词的使用情况
* strcasecmp
	* 二进制安全比较字符串（不区分大小写）
* strchr
	* 别名 strstr
* strcmp
	* 二进制安全字符串比较
* strcoll
	* 基于区域设置的字符串比较
* strcspn
	* 获取不匹配遮罩的起始子字符串的长度
* strip_tags
	* 从字符串中去除 HTML 和 PHP 标记
* stripcslashes
	* 反引用一个使用 addcslashes 转义的字符串
* stripos
	* 查找字符串首次出现的位置（不区分大小写）
* stripslashes
	* 反引用一个引用字符串
* stristr
	* strstr 函数的忽略大小写版本
* strlen
	* 获取字符串长度
* strnatcasecmp
	* 使用“自然顺序”算法比较字符串（不区分大小写）
* strnatcmp
	* 使用自然排序算法比较字符串
* strncasecmp
	* 二进制安全比较字符串开头的若干个字符（不区分大小写）
* strncmp
	* 二进制安全比较字符串开头的若干个字符
* strpbrk
	* 在字符串中查找一组字符的任何一个字符
* strpos
	* 查找字符串首次出现的位置
* strrchr
	* 查找指定字符在字符串中的最后一次出现
* strrev
	* 反转字符串
* strripos
	* 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
* strrpos
	* 计算指定字符串在目标字符串中最后一次出现的位置
* strspn
	* 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
* strstr
	* 查找字符串的首次出现
* strtok
	* 标记分割字符串
* strtolower
	* 将字符串转化为小写
* strtoupper
	* 将字符串转化为大写
* strtr
	* strtr ( string $str , string $from , string $to ) : string
	* strtr ( string $str , array $replace_pairs ) : string
	* 转换指定字符
* substr_compare
	* 二进制安全比较字符串（从偏移位置比较指定长度）
* substr_count
	* 计算字串出现的次数
* substr_replace
	* 替换字符串的子串
* substr
	* 返回字符串的子串
* trim
	* 去除字符串首尾处的空白字符（或者其他字符）
* ucfirst
	* 将字符串的首字母转换为大写
* ucwords
	* 将字符串中每个单词的首字母转换为大写
* vfprintf
	* 将格式化字符串写入流
* vprintf
	* 输出格式化字符串
* vsprintf
	* 返回格式化字符串
* wordwrap
	* 打断字符串为指定数量的字串

## OpenSSL函数

* openssl_cipher_iv_length
	* 获取密码iv长度
* openssl_csr_export_to_file
	* 将CSR导出到文件
* openssl_csr_export
	* 将CSR作为字符串导出
* openssl_csr_get_public_key
	* 返回CSR的公钥
* openssl_csr_get_subject
	* 返回CSR的主题
* openssl_csr_new
	* 生成一个 CSR
* openssl_csr_sign
	* 用另一个证书签署 CSR (或者本身) 并且生成一个证书
* `openssl_decrypt`
	* 解密数据
* openssl_dh_compute_key
	* 计算远程DH密钥(公钥)和本地DH密钥的共享密钥
* openssl_digest
	* 计算摘要
* `openssl_encrypt`
	* openssl_encrypt ( string $data , string $method , string $key [, int $options = 0 [, string $iv = "" [, string &$tag = NULL [, string $aad = "" [, int $tag_length = 16 ]]]]] ) : string
		* data : 明文
		* method : 加密算法
		* key : 密钥
		* options :
			* 0 : 自动对明文进行 padding, 返回的数据经过 base64 编码.
			* 1 : OPENSSL_RAW_DATA, 自动对明文进行 padding, 但返回的结果未经过 base64 编码.
			* 2 : OPENSSL_ZERO_PADDING, 自动对明文进行 0 填充, 返回的结果经过 base64 编码. 但是, openssl 不推荐 0 填充的方式, 即使选择此项也不会自动进行 padding, 仍需手动 padding.
		* iv : 非空的初始化向量, 不使用此项会抛出一个警告. 如果未进行手动填充, 则返回加密失败.
	* 加密数据，以指定的方式和 key 加密数据，返回原始或 base64 编码后的字符串。
* openssl_error_string
	* 返回 openSSL 错误消息
* openssl_free_key
	* 释放密钥资源
* openssl_get_cert_locations
	* 检索可用的证书位置
* openssl_get_cipher_methods
	* 获取可用的加密算法
* openssl_get_curve_names
	* 获得ECC的可用曲线名称列表
* openssl_get_md_methods
	* 获取可用的摘要算法
* openssl_get_privatekey
	* 别名 openssl_pkey_get_private
* openssl_get_publickey
	* 别名 openssl_pkey_get_public
* openssl_open
	* 打开密封的数据
* openssl_pbkdf2
	* 生成一个 PKCS5 v2 PBKDF2 字符串
* openssl_pkcs12_export_to_file
	* 输出一个 PKCS#12 兼容的证书存储文件
* openssl_pkcs12_export
	* 将 PKCS#12 兼容证书存储文件导出到变量
* openssl_pkcs12_read
	* 将 PKCS#12 证书存储区解析到数组中
* openssl_pkcs7_decrypt
	* 解密一个 S/MIME 加密的消息
* openssl_pkcs7_encrypt
	* 加密一个 S/MIME 消息
* openssl_pkcs7_read
	* 将PKCS7文件导出为PEM格式证书的数组
* openssl_pkcs7_sign
	* 对一个 S/MIME 消息进行签名
* openssl_pkcs7_verify
	* 校验一个已签名的 S/MIME 消息的签名
* openssl_pkey_export_to_file
	* 将密钥导出到文件中
* openssl_pkey_export
	* 将一个密钥的可输出表示转换为字符串
* openssl_pkey_free
	* 释放一个私钥
* openssl_pkey_get_details
	* 返回包含密钥详情的数组
* openssl_pkey_get_private
	* 获取私钥
* openssl_pkey_get_public
	* 从证书中解析公钥，以供使用。
* openssl_pkey_new
	* 生成一个新的私钥
* openssl_private_decrypt
	* 使用私钥解密数据
* openssl_private_encrypt
	* 使用私钥加密数据
* openssl_public_decrypt
	* 使用公钥解密数据
* openssl_public_encrypt
	* 使用公钥加密数据
* openssl_random_pseudo_bytes
	* 生成一个伪随机字节串
* openssl_seal
	* 密封 (加密) 数据
* openssl_sign
	* Generate signature
* openssl_spki_export_challenge
	* 导出与签名公钥和挑战相关的挑战字符串
* openssl_spki_export
	* 通过签名公钥和挑战导出一个可用的PEM格式的公钥
* openssl_spki_new
	* 生成一个新的签名公钥和挑战
* openssl_spki_verify
	* 验证签名公钥和挑战。
* openssl_verify
	* 验证签名
* openssl_x509_check_private_key
	* 检查私钥是否对应于证书
* openssl_x509_checkpurpose
	* 验证是否可以为特定目的使用证书
* openssl_x509_export_to_file
	* 导出证书至文件
* openssl_x509_export
	* 以字符串格式导出证书
* openssl_x509_fingerprint
	* 计算一个给定的x.509证书的指纹或摘要
* openssl_x509_free
	* 释放证书资源
* openssl_x509_parse
	* 解析一个X509证书并作为一个数组返回信息
* openssl_x509_read
	* 解析一个x.509证书并返回一个资源标识符

