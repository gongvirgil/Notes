# Daily Record

## 2021-06-10

> OpenResty docker

http://openresty.org/cn/


## 2021-07-08

```s
FROM centos
# Maintainer: xizi <591838169@qq.com> (@shuangxi)
MAINTAINER xizi 591838169@qq.com
# Commands install openresty and its dependency
RUN mkdir -p /openresty/logs 
COPY /tools/ /openresty/
# Commands to install openresty and its dependency
RUN yum install -y perl readline-devel pcre-devel openssl-devel gcc make
RUN cd /openresty && tar -zxvf openresty-1.9.7.3.tar.gz && cd openresty-1.9.7.3 && ./configure && make && make install
RUN cd /usr/local/bin && ln -s /usr/local/openresty/nginx/sbin/nginx nginx
RUN cp -f /openresty/nginx.conf /usr/local/openresty/nginx/conf/ && cp /openresty/auth.lua /usr/local/openresty/nginx/conf/
RUN cp -f /openresty/http_headers.lua /usr/local/openresty/lualib/resty/ && cp /openresty/http.lua /usr/local/openresty/lualib/resty/
# Commands for filebit
RUN rpm -vi /openresty/filebeat-1.2.2-x86_64.rpm
RUN cp -f /openresty/filebeat.yml /etc/filebeat/
# Commands when creating a new container:starting filebeat and openresty
RUN cd /openresty && chmod +x startNginx.sh
CMD /openresty/startNginx.sh
```

```s
wget https://openresty.org/download/openresty-1.15.8.1.tar.gz
tar -xzvf openresty-1.15.8.1.tar.gz
cd openresty-1.15.8.1
./configure  --prefix=/home/openresty
make && make install

cd /usr/local/
wget http://yum.baseurl.org/download/3.2/yum-3.2.28.tar.gz
tar zxvf yum-3.2.28.tar.gz
cd /usr/local/yum-3.2.28
./yummain.py install yum


yum -y install perl-Digest-MD5
```


```
brew install nginx
brew install openresty/brew/openresty

openresty -s reload  -p ./ -c ./conf/nginx.conf

nginx -p /Users/gongvirgil/workspace/gq/web/open-comm/bin/.. -c /Users/gongvirgil/workspace/gq/web/open-comm/bin/../conf/nginx.conf
nginx -p ./ -c ./conf/nginx.conf
```

## 2024-01-10

* 迁移电脑环境



## to-do-list

> kafaka docker

> go docker

