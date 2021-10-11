# gitlab

* gitlab配置文件: vim /etc/gitlab/gitlab.rb
* 查看版本号: cat /opt/gitlab/embedded/service/gitlab-rails/VERSION
* 更新配置: gitlab-ctl reconfigure
* 查看状态:gitlab-ctl status
* 启动&停止: gitlab-ctl start&stop


* 日志位置：/var/log/gitlab
* 查看所有日志: gitlab-ctl tail
* 查看nginx访问日志: gitlab-ctl tail nginx/gitlab_access.log

## 汉化

```
git clone https://gitlab.com/xhang/gitlab.git
git clone https://gitlab.com/larryli/gitlab.git
cd gitlab/
git fetch

gitlab-ctl stop
//stable是英文稳定版，zh是中文版，两个仓库git diff结果便是汉化补丁了
git diff origin/10-2-stable origin/10-2-stable-zh > /tmp/10.2.diff
//应用汉化
cd /opt/gitlab/embedded/service/gitlab-rails
git apply /tmp/10.2.diff
patch -d /opt/gitlab/embedded/service/gitlab-rails -p1 < 10.2.diff

#这步好像可以不用，我直接打上了
gitlab-ctl reconfigure
#启动
gitlab-ctl start
```