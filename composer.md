Composer是 PHP 用来管理依赖（dependency）关系的工具。你可以在自己的项目中声明所依赖的外部工具库（libraries），Composer 会帮你安装这些依赖的库文件。

官网：https://getcomposer.org/

中文相关网站：http://www.phpcomposer.com/

一、下载安装文件安装，https://getcomposer.org/Composer-Setup.exe

二、在php.ini文档中打开extension=php_openssl.dll

三、下载php_ssh2.dll、php_ssh2.pdb，http://windows.php.net/downloads/pecl/releases/ssh2/0.12/

四、把php_ssh2.dll、php_ssh2.pdb文件放php的ext文件夹

五、重启nginx及php

六、执行cmd，运行：composer -V 能看到版本，表示安装成功