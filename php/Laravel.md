# Laravel

* [laravel docs](https://docs.golaravel.com/docs/5.6/installation/)
* [Laravel 项目开发规范](https://laravel-china.org/docs/laravel-specification/5.5)
* [Laravel 速查表](https://cs.laravel-china.org)
* [Laravel Illuminate](https://laravel.com/api/master/index.html)

## Laravel 文件夹结构简介

| 文件夹名称 | 简介 |
|---|---|
| app                       | 应用程序的业务逻辑代码存放文件夹
| app/Console               | 存放自定义 Artisian 命令文件
| app/Http/Controllers      | 存放控制器文件
| app/Http/Middleware       | 存放「中间件」文件
| bootstrap                 | 框架启动与自动加载设置相关的文件
| composer.json             | 应用依赖的扩展包
| composer.lock             | 扩展包列表，确保这个应用的副本使用相同版本的扩展包
| config                    | 应用程序的配置文件
| database                  | 数据库操作相关文件（数据库迁移和数据填充）
| node_modules              | 存放 NPM 依赖模块
| package.json              | 应用所需的 NPM 包配置文件
| phpunit.xml               | 测试工具 PHPUnit 的配置文件
| public                    | 前端控制器和资源相关文件（图片、JavaScript、CSS）
| readme.md                 | 项目介绍说明文件
| resources                 | 应用资源
| resources/assets          | 未编译的应用资源文件（图片、JavaScript、CSS）
| resources/lang            | 多语言文件
| resources/views           | 视图文件
| routes/api.php            | 用于定义 API 类型的路由
| routes/channels.php       | 事件转播注册信息
| routes/console.php        | 用于定义 Artisan 命令
| routes/web.php            | 用于定义 Web 类型的路由（重点，大部分情况下本书会用到）
| server.php                | 使用 PHP 内置服务器时的 URL 重写（类似于 Apache 的 "mod_rewrite" ）
| storage                   | 编译后的视图、基于会话、文件缓存和其它框架生成的文件
| storage/app               | 目录可用于存储应用程序使用的任何文件
| storage/framework         | 目录被用于保存框架生成的文件及缓存
| storage/logs              | 应用程序的日志文件
| tests                     | 应用测试相关文件
| vendor                    | Composer 依赖模块
| webpack.mix.js            | Laravel 的前端工作流配置文件
| yarn.lock                 | Yarn 依赖版本锁定文件
| .gitignore                | 被 Git 所忽略的文件
| .env                      | 环境变量配置文件


## artisan 命令

| 命令 | 说明 |
|---|---|
| php artisan list                  | 查看常用 artisan 命令
| php artisan key:generate          | 生成 App Key
| php artisan make:controller       | 生成控制器
| php artisan make:model            | 生成模型
| php artisan make:policy           | 生成授权策略
| php artisan make:seeder           | 生成 Seeder 文件
| php artisan migrate               | 执行迁移
| php artisan migrate:rollback      | 回滚迁移
| php artisan migrate:refresh       | 重置数据库
| php artisan db:seed               | 填充数据库
| php artisan tinker                | 进入 tinker 环境
| php artisan route:list            | 查看路由列表
| php artisan config:cache          | 缓存配置
| php artisan config:clear          | 清除缓存配置


* 查看laravel版本：php artisan --version

### Migration

创建数据表 : php artisan make:migration create_users_table

## Homestead

## laradocker

* git clone https://github.com/LaraDock/laradock.git
* cp env-example .env

dokcer-compose up -d nginx
dokcer-compose up -d mysql

* 修改laravel中的.env文件

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=root
DB_USERNAME=root
DB_PASSWORD=secret

## Laravel扩展


| 排名 | 下载次数 | Star 数 | 扩展包 | 一句话描述 |
|---|---|---|---|---|
| 1   | 2883968 | 3968 | intervention/image                    | 图片处理扩展包，支持裁剪、水印等处理，使用教程请见 https://laravel-china.org/topics/1903
| 2   | 2215372 | 3694 | barryvdh/laravel-debugbar             | 页面调试工具栏 (对 phpdebugbar 的封装)，教程请见：https://laravel-china.org/topics/2531
| 3   | 2173424 | 3570 | barryvdh/laravel-ide-helper           | 使用 IDE 开发 Laravel 项目的好帮手，支持 Facade 方法跳转，相关讨论请见：https://laravel-china.org/topics/2532
| 4   | 1269005 | 2396 | maatwebsite/excel                     | Excel 处理工具，中文处理时会出现乱码，推荐使用 laravel-snappy，历史讨论请见 https://laravel-china.org/topics/2477
| 5   | 1131952 | 702  | aws/aws-sdk-php-laravel               | 亚马逊 AWS 服务的开发者工具包，亚马逊云已经在 2016 年 8 月 正式落地中国，这个包以后会常用到，教程请见：https://laravel-china.org/topics/2533
| 6   | 750405  | 1016 | jenssegers/agent                      | 客户端 User Agent 解析工具（基于 Mobiledetect），教程请见：https://laravel-china.org/topics/782
| 7   | 711842  | 216  | bugsnag/bugsnag-laravel               | Bugsnag 服务集成包（异常捕获服务，可惜国内访问效果不好），教程请见：https://laravel-china.org/topics/2534
| 8   | 683268  | 3268 | zizaco/entrust                        | 基于用户组的用户权限系统（必备），教程请见：https://laravel-china.org/topics/166
| 9   | 644651  | 821  | barryvdh/laravel-cors                 | 跨域资源共享的支持
| 10  | 571221  | 963  | barryvdh/laravel-dompdf               | PDF 操作工具（基于 dompdf ）
| 11  | 548367  | 1172 | laravelbook/ardent                    | 自动 数据模型 验证工具
| 12  | 534650  | 2364 | tymon/jwt-auth                        | JWT (JSON Web Token) 用户认证机制，示例项目 https://laravel-china.org/topics/2023
| 13  | 496656  | 1977 | lucadegasperi/oauth2-server-laravel   | OAuth 2.0 支持，实例教程：https://laravel-china.org/topics/1792
| 14  | 468263  | 595  | maknz/slack                           | Slack 服务的集成
| 15  | 423728  | 1920 | jenssegers/mongodb                    | MongoDB 数据库的支持 ，教程：https://laravel-china.org/topics/309
| 16  | 390006  | 4061 | dingo/api                             | 构建 API 服务器的完整解决方案，教程：https://laravel-china.org/topics/1159
| 17  | 370341  | 912  | itsgoingd/clockwork                   | 配合 Chrome 浏览器下同名插件的调试工具，教程：https://laravel-china.org/topics/23
| 18  | 357552  | 600  | anahkiasen/underscore-php             | Underscore.js 类似的 PHP 语法支持
| 19  | 355742  | 1191 | laracasts/generators                  | Laracasts 出品的代码快速生成工具（推荐） ，使用教程：https://laravel-china.org/topics/2535
| 20  | 344522  | 1200 | cviebrock/eloquent-sluggable          | 文章标题 URL 别名处理工具，教程：https://laravel-china.org/topics/1926
| 21  | 344237  | 382  | laracasts/testdummy                   | Laracasts 出品的假数据创建工具
| 22  | 321543  | 709  | davejamesmiller/laravel-breadcrumbs   | 页面面包屑工具，教程：https://laravel-china.org/topics/1914
| 23  | 309529  | 962  | laracasts/utilities                   | 将 PHP 变量转换为 JavaScript 变量
| 24  | 304501  | 621  | roumen/sitemap                        | Sitemap 生成工具
| 25  | 303660  | 827  | yajra/laravel-datatables-oracle       | jQuery DataTables 的后端支持
| 26  | 302076  | 336  | webpatser/laravel-uuid                | RFC 4122 标准生成的 UUID ，使用教程 https://laravel-china.org/topics/2538
| 27  | 301605  | 535  | rcrowe/twigbridge                     | Twig 模板引擎支持
| 28  | 294356  | 218  | intervention/imagecache               | 图片缓存增强工具
| 29  | 289380  | 958  | indatus/dispatcher                    | 计划任务分发器（直接可替换掉 Cron），L5 内置了类似的功能
| 30  | 234578  | 589  | jenssegers/date                       | 日期处理工具（让 Carbon 支持多语言，中文用户的福音）
| 31  | 234151  | 715  | rap2hpoutre/laravel-log-viewer        | 非常方便的页面 Log 查看工具，必备，不过使用时请注意访问权限控制
| 32  | 204976  | 1109 | baum/baum                             | 嵌套集合 (Nested Set) 模型的支持，教程：https://laravel-china.org/topics/2124
| 33  | 204619  | 2146 | anahkiasen/rocketeer                  | 现代化的服务器代码部署工具
| 34  | 194675  | 1026 | anahkiasen/former                     | 强大的表单构造器，教程请见 https://laravel-china.org/topics/2539
| 35  | 190032  | 375  | barryvdh/laravel-snappy               | HTML 生成 PDF/Image 工具（利用 wkhtmltopdf）
| 36  | 184879  | 361  | thujohn/twitter                       | Twitter API 的支持
| 37  | 184078  | 228  | orchestra/testbench                   | Laravel 扩展包的单元测试工具
| 38  | 181799  | 258  | graham-campbell/flysystem             | 文件系统操作，多平台支持（AWS，Dropbox 等）
| 39  | 180921  | 342  | mews/purifier                         | 用户提交的 Html 白名单过滤，https://laravel-china.org/topics/36
| 40  | 175355  | 349  | laracasts/presenter                   | Laracasts 出品的 Presenter 方案
| 41  | 172640  | 852  | venturecraft/revisionable             | 数据模型的操作记录（如管理员操作日记）
| 42  | 168707  | 995  | mcamara/laravel-localization          | Laravel 本地化功能增强
| 43  | 166917  | 366  | league/factory-muffin                 | 允许更加方便的创建对象，一般在测试中常用（基本上是 ROR 的 factory_girl 的复制版）
| 44  | 165140  | 271  | robclancy/presenter                   | Elequent 的 Presenter 方案
| 45  | 163835  | 150  | intouch/laravel-newrelic              | 应用状态监控服务 NewRelic 开发者工具包
| 46  | 157930  | 855  | xethron/migrations-generator          | 从现存的数据中以 migration 的形式导出数据库表，包括索引和外键，相当于 数据库迁移
| 47  | 149079  | 410  | greggilbert/recaptcha                 | reCAPTCHA 验证码的支持
| 48  | 144971  | 594  | watson/validating                     | 以 Trait 的方式来实现 Eloquent 数据模型保存的时候自动验证
| 49  | 142284  | 814  | dimsav/laravel-translatable           | 数据库的多语言翻译方案
| 50  | 138661  | 120  | laracasts/behat-laravel-extension     | Behat 测试框架的 Laravel 支持
| 51  | 137782  | 200  | jenssegers/rollbar                    | Rollbar 错误监控服务的自动集成
| 52  | 134723  | 330  | torann/geoip                          | 通过 IP 获取到对应的地理位置信息（GeoIP 数据库），请参考：https://laravel-china.org/topics/2537
| 53  | 133803  | 658  | davibennun/laravel-push-notification  | App 的 Push Notification 发送工具，支持苹果的 APNS 和 安卓的 GCM
| 54  | 128523  | 168  | chumper/zipper                        | ZIp 打包工具（基于 ZipArchive）
| 55  | 127700  | 244  | simplesoftwareio/simple-qrcode        | 二维码生成工具
| 56  | 125421  | 374  | graham-campbell/markdown              | Markdown 解析器
| 57  | 125315  | 164  | aloha/twilio                          | Twillio API 支持
| 58  | 123623  | 295  | propaganistas/laravel-phone           | 手机号码，电话号码验证支持
| 59  | 121845  | 421  | orangehill/iseed                      | 将数据从数据库以 seed 的方式导出，数据填充 的逆向操作。（推荐）
| 60  | 121350  | 380  | sammyk/laravel-facebook-sdk           | （非官方）Laravel 的 Facebook 开发者工具包
| 61  | 120891  | 497  | vinkla/hashids                        | Hash ID 生成器，方便把数字的 ID 隐藏（基于Hashids），教程：https://laravel-china.org/topics/2536
| 62  | 116939  | 993  | spatie/laravel-backup                 | 数据备份工具，支持压缩，支持各种文件系统（推荐）
| 63  | 116718  | 459  | mccool/laravel-auto-presenter         | 自动注入 Presenter，教程：https://laravel-china.org/topics/1267
| 64  | 111879  | 270  | graham-campbell/throttle              | 阀门控制工具
| 65  | 106306  | 1766 | frozennode/administrator              | 快速创建基于数据模型的 CRUD 管理员后台，教程：https://laravel-china.org/topics/158 , https://laravel-china.org/topics/2407
| 66  | 105181  | 430  | codesleeve/laravel-stapler            | 专为 ORM 定制的文件上传支持
| 67  | 100442  | 307  | webpatser/laravel-countries           | 世界所有国家数据，包括首都汇率等
| 68  | 97451   | 848  | prettus/l5-repository                 | Repository 开发模式的支持
| 69  | 96491   | 371  | pragmarx/google2fa                    | 用户认证方案，支持谷歌提倡的双向认证和 HOTP 认证算法
| 70  | 94117   | 195  | hisorange/browser-detect              | 浏览器检测工具，包括客户端对 JavaScript 和 CSS 支持情况的检测，教程：https://laravel-china.org/topics/2046
| 71  | 93442   | 277  | graham-campbell/htmlmin               | 基于 minify 的 HTML 压缩工具
| 72  | 90609   | 156  | toin0u/geocoder-laravel               | 地理位置操作工具集（基于Geocoder）
| 73  | 89845   | 491  | edvinaskrucas/notification            | 页面消息提醒的组件
| 74  | 89333   | 403  | laracasts/integrated                  | PHPUnit 的集成测试支持
| 75  | 88682   | 779  | laravel/envoy                         | Laravel 官方出品的简单的部署工具，教程：https://laravel-china.org/topics/24
| 76  | 86793   | 137  | felixkiss/uniquewith-validator        | 表单验证规则增加字段之间的唯一性验证
| 77  | 81211   | 200  | graham-campbell/exceptions            | 错误异常处理工具，支持开发和生产环境，使用 Whoops 进行错误显示
| 78  | 81076   | 163  | thomaswelton/laravel-gravatar         | Gravatar 服务的支持
| 79  | 79494   | 477  | mews/captcha                          | 图片验证码方案，使用教程请见：https://laravel-china.org/topics/2895
| 80  | 79387   | 222  | roumen/feed                           | Feed 生成器
| 81  | 79241   | 164  | cviebrock/image-validator             | 表单验证增加图片专属，如长宽，比例等
| 82  | 77849   | 125  | laravelcollective/annotations         | 基于注解方式生成路由、事件、模型绑定的映射
| 83  | 77061   | 870  | gloudemans/shoppingcart               | 一个简单的购物车模块实现
| 84  | 75852   | 149  | artisaninweb/laravel-soap             | Soap 协议客户端
| 85  | 75476   | 260  | jlapp/swaggervel                      | Swagger API 规范支持
| 86  | 73124   | 480  | barryvdh/laravel-translation-manager  | 翻译辅助工具，包含 Web 界面
| 87  | 72532   | 515  | patricktalmadge/bootstrapper          | Twitter Bootstrap 支持
| 88  | 68952   | 133  | soapbox/laravel-formatter             | 对不同输出格式进行转换，支持Array，CSV，JSON，XML，YAML
| 89  | 66968   | 155  | fedeisas/laravel-mail-css-inliner     | 将 CSS 样式写入 HTML 里，用于邮件发送内容的样式定制
| 90  | 66881   | 747  | nicolaslopezj/searchable              | 以 Trait 的形式为 Eloquent 模型增加搜索功能
| 91  | 65754   | 109  | benconstable/phpspec-laravel          | PHPSpec BDD 测试框架的 Laravel 扩展
| 92  | 65489   | 193  | watson/rememberable                   | 让 Laravel 5 数据模型支持 remember() 方法
| 93  | 63895   | 373  | rtconner/laravel-tagging              | 为 Eloquent 模型增加打标签功能
| 94  | 62932   | 68   | laravelcollective/remote              | LaravelCollective 维护的 SSH 连接管理工具
| 95  | 60917   | 226  | khill/lavacharts                      | Google 图表 JavaScript API 的封装
| 96  | 60203   | 115  | anchu/ftp                             | 让 Laravel 支持 FTP 操作
| 97  | 58556   | 355  | liebig/cron                           | 计划任务分发器（直接可替换掉 Cron），L5 内置了类似的功能
| 98  | 57174   | 348  | lord/laroute                          | JavaScript 读取路由信息的解决方案
| 99  | 57053   | 643  | spatie/laravel-analytics              | Google 统计数据获取工具
| 100 | 56639   | 118  | hieu-le/active                        | 非常方便的方案来判断导航元素的 active 状态，使用教程请见：https://laravel-china.org/topics/2858