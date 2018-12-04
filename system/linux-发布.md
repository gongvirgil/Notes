Last login: Thu Apr 14 13:55:20 2016 from 10.0.0.126
root@ubuntu:~# cd /var/pbx
root@ubuntu:/var/pbx# ll
total 36
drwxrwxrwx  9 www-data www-data 4096 Nov  5 15:47 ./
drwxrwxrwx 14 root     root     4096 Jul  7  2015 ../
drwxrwxrwx  3 www-data www-data 4096 Jul  6  2015 crontab/
drwxrwxrwx  3 www-data www-data 4096 Nov  9 20:01 file/
drwxrwxrwx  2 www-data www-data 4096 Nov 17 14:55 mt/
drwxrwxrwx  2 root     root     4096 Nov  5 15:50 oauth/
drwxrwxrwx  8 www-data www-data 4096 Oct  9  2015 ThinkPHP/
drwxrwxrwx  4 www-data www-data 4096 Nov 30 14:25 tk/
drwxrwxrwx  8 www-data www-data 4096 Feb 16 14:16 tmp/
root@ubuntu:/var/pbx# cd mt
root@ubuntu:/var/pbx/mt# ll
total 8
drwxrwxrwx 2 www-data www-data 4096 Nov 17 14:55 ./
drwxrwxrwx 9 www-data www-data 4096 Nov  5 15:47 ../
lrwxrwxrwx 1 root     root       48 Nov 17 14:55 CliForMt -> /home/cxl/emic_phone/web_distribute/web/CliForMt
lrwxrwxrwx 1 root     root       51 Nov 17 14:55 maintenance -> /home/cxl/emic_p
hone/web_distribute/web/maintenance
root@ubuntu:/var/pbx/mt# rm *
root@ubuntu:/var/pbx/mt# ll
total 8
drwxrwxrwx 2 www-data www-data 4096 Apr 14 18:26 ./
drwxrwxrwx 9 www-data www-data 4096 Nov  5 15:47 ../
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/
emic_phone/         teq.sql             test.mp3
e_mobile.sql        test/               ThinkPHP/
sensitive_word.txt  test1/              zq/
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/emic_phone/
.buildpath               new_maintenance/         web_enterprise/
crm/                     new_talk/                web_enterprise_original/
maintenance/             oauth_server/            web_file_server/
marketing/               .project                 web_info/
marketing_own/           .settings/               wocall_info/
mihua/                   .svn/                    
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/emic_phone/new_maintenance/
CliForMt/                  maintenance/
initnew_maintenance.sql    updatenew_maintenance.sql
install_shell/             
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/emic_phone/new_maintenance maintenance
root@ubuntu:/var/pbx/mt# rm *
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/emic_phone/new_maintenance/maintenance 
 maintenance
root@ubuntu:/var/pbx/mt# ln -s /home/cxl/emic_phone/new_maintenance/CliForMt CliForMt
root@ubuntu:/var/pbx/mt# ll
total 8
drwxrwxrwx 2 www-data www-data 4096 Apr 14 18:28 ./
drwxrwxrwx 9 www-data www-data 4096 Nov  5 15:47 ../
lrwxrwxrwx 1 root     root       45 Apr 14 18:28 CliForMt -> /home/cxl/emic_phone/new_maintenance/CliForMt/
lrwxrwxrwx 1 root     root       48 Apr 14 18:27 maintenance -> /home/cxl/emic_p
hone/new_maintenance/maintenance/
root@ubuntu:/var/pbx/mt# cd /etc/apache2/
conf.d/          mods-enabled/    sites-enabled/   
mods-available/  sites-available/ 
root@ubuntu:/var/pbx/mt# cd /etc/apache2/sites-enabled/
root@ubuntu:/etc/apache2/sites-enabled# ll
total 20
drwxr-xr-x 2 root root 4096 Jan 13 19:03 ./
drwxr-xr-x 7 root root 4096 Mar 13 11:35 ../
-rwxr-xr-x 1 root root  952 Oct 26 14:45 1045-default*
lrwxrwxrwx 1 root root   31 Nov  2 16:16 1046-default -> ../sites-available/1046-default*
lrwxrwxrwx 1 root root   27 Nov  2 16:16 1047-ssl -> ../sites-available/1047-ssl
lrwxrwxrwx 1 root root   31 Nov  4 16:15 1055-default -> ../sites-available/1055-default*
lrwxrwxrwx 1 root root   31 Nov  4 16:15 1056-default -> ../sites-available/1056-default
lrwxrwxrwx 1 root root   31 Nov  5 15:54 1057-default -> ../sites-available/1057-default*
lrwxrwxrwx 1 root root   27 Nov  5 15:54 1058-ssl -> ../sites-available/1058-ssl
-rw-r--r-- 1 root root 7469 Oct 26 14:45 default-ssl
root@ubuntu:/etc/apache2/sites-enabled# vi 1046-default 
<VirtualHost *:1046>
        ServerAdmin webmaster@localhost

        DocumentRoot /var/pbx/mt/maintenance
        <Directory />
                Options FollowSymLinks
                AllowOverride All
        </Directory>
        <Directory  /var/pbx/mt/maintenance/>
                Options -Indexes FollowSymLinks
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>

        ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
        <Directory "/usr/lib/cgi-bin">
                AllowOverride All
                Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
                Order allow,deny
                Allow from all
        </Directory>

root@ubuntu:/etc/apache2/sites-enabled# vi 1047-default 

~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
root@ubuntu:/etc/apache2/sites-enabled# ll
total 20
drwxr-xr-x 2 root root 4096 Apr 14 18:29 ./
drwxr-xr-x 7 root root 4096 Mar 13 11:35 ../
-rwxr-xr-x 1 root root  952 Oct 26 14:45 1045-default*
lrwxrwxrwx 1 root root   31 Nov  2 16:16 1046-default -> ../sites-available/1046-default*
lrwxrwxrwx 1 root root   27 Nov  2 16:16 1047-ssl -> ../sites-available/1047-ssl
lrwxrwxrwx 1 root root   31 Nov  4 16:15 1055-default -> ../sites-available/1055-default*
lrwxrwxrwx 1 root root   31 Nov  4 16:15 1056-default -> ../sites-available/1056-default
lrwxrwxrwx 1 root root   31 Nov  5 15:54 1057-default -> ../sites-available/1057-default*
lrwxrwxrwx 1 root root   27 Nov  5 15:54 1058-ssl -> ../sites-available/1058-ssl
-rw-r--r-- 1 root root 7469 Oct 26 14:45 default-ssl
root@ubuntu:/etc/apache2/sites-enabled# vi 1047-ssl 
<IfModule mod_ssl.c>
<VirtualHost _default_:1047>
        ServerAdmin webmaster@localhost

        DocumentRoot /var/pbx/mt/maintenance
        <Directory />
                Options FollowSymLinks
                AllowOverride All
        </Directory>
        <Directory /var/pbx/mt/maintenance/>
                Options -Indexes FollowSymLinks
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>

        ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
        <Directory "/usr/lib/cgi-bin">
                AllowOverride All
                Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
                Order allow,deny
                Allow from all
        </Directory>
root@ubuntu:/etc/apache2/sites-enabled# /etc/init.d/apache2 restart
 * Restarting web server apache2
apache2: apr_sockaddr_info_get() failed for ubuntu
apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.0.1 for ServerName
[Thu Apr 14 18:29:24 2016] [warn] NameVirtualHost *:80 has no VirtualHosts
 ... waiting apache2: apr_sockaddr_info_get() failed for ubuntu
apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.0.1 for ServerName
[Thu Apr 14 18:29:25 2016] [warn] NameVirtualHost *:80 has no VirtualHosts
   ...done.
root@ubuntu:/etc/apache2/sites-enabled# ^C
root@ubuntu:/etc/apache2/sites-enabled# 





