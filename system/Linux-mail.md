# mail命令

## 安装

    apt-get install mailutils

## 配置 

vim /etc/mail.rc

文件尾增加以下内容 

    set from=test@qq.com smtp="smtp.qq.com"
    set smtp-auth-user="test@qq.com" smtp-auth-password="123456"
    set smtp-auth=login

说明：
* from: 对方收到邮件时显示的发件人
* smtp: 指定第三方发送邮件的smtp服务器地址
* smtp-auth: SMTP的认证方式。默认是LOGIN，也可改为CRAM-MD5或PLAIN方式
* smtp-auth-user: 第三方发邮件的用户名
* smtp-auth-password: 用户名对应密码

## Mail命令

    % mail --h
    mail: illegal option -- -
    Usage: mail -eiIUdEFntBDNHRV~ -T FILE -u USER -h hops -r address -s SUBJECT -a FILE -q FILE -f FILE -A ACCOUNT -b USERS -c USERS -S OPTION users

注：部分系统参数稍有差异，最好看帮助
 

### 无邮件正文

mail -s "主题"  收件地址

    mail -s "测试"  test@qq.com
 

### 有邮件正文

mail -s "主题"  收件地址< 文件(邮件正文.txt)

    mail -s "邮件主题"  test@qq.com < /data/findyou.txt

echo "邮件正文" | mail -s 邮件主题  收件地址

    echo "邮件正文内容" | mail -s "邮件主题"  test@qq.com

cat 邮件正文.txt | mail -s 邮件主题  收件地址 

    cat  /data/findyou.txt | mail -s "邮件主题"  test@qq.com
 

### 带附件

mail -s "主题"  收件地址  -a 附件 < 文件(邮件正文.txt) 

    mail -s "邮件主题"  test@qq.com -a /data/findyou.tar.gz < /data/findyou.txt

## 脚本

sendmail.sh

    #!/bin/bash
    #author:findyou
    help(){
       echo "eg: $0 [Subject] [address] [content_file] [file]"
       echo ""
       exit 1
    }

    if [ ! -n "$1" ] ; then
        help
    fi

    cDate=`date +%Y%m%d`

    if [ ! -n "$2" ] ; then
        help
    else
        mail_to=$2
        echo "      Send Mail to ${mail_to}"
    fi

    if [ ! -n "$4" ] ; then
        mail -s $1 ${mail_to}<$3
    else
        mail -s $1 -a $4 ${mail_to}<$3
    fi

 

使用

    ./sendmail.sh  test  test@qq.com  test.txt