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
	* curl --form "fileupload=@filename.txt" http://hostname/resource
* 将网站的cookies信息保存到sugarcookies文件中
	* curl -D sugarcookies http://hostname/resource
* 使用上次保存的cookie信息
	* curl -b sugarcookies http://hostname/resource

## 通过字典查询单词

* 查询bash单词的含义
	* curl dict://dict.org/d:bash
* 列出所有可用词典
	* curl dict://dict.org/show:db
* 在foldoc词典中查询bash单词的含义
	* curl dict://dict.org/d:bash:foldoc
