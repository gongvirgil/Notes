# nmon

## 安装nmon


* Ubuntu: sudo apt-get install nmon

## 数据采集

```
nmon [-h] [-s <seconds>] [-c <count>] [-f -d <disks> -t -r <name>] [-x]
```

* nmon -f -t -s 30 -c 180 -m /home/xxx
	* -f：按标准格式输出文件：<hostname>_YYYYMMDD_HHMM.nmon；
	* -t：输出中包括占用率较高的进程；
	* -s 30：每30秒进行一次数据采集
	* -c 180：一共采集180次
	* -m 生成的数据文件的存放目录。



* 转换为csv文件：sort -A test1_090308_1313.nmon > test1_090308_1313.csv
* [nmon analyser分析工具下载地址](https://www.ibm.com/developerworks/community/wikis/home?lang=zh#!/wiki/Power%20Systems/page/nmon_analyser)