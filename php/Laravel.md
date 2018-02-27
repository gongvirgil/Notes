# Laravel

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

## Homestead

## laradocker

* git clone https://github.com/LaraDock/laradock.git
* cp env-example .env

dokcer-compose up -d nginx
dokcer-compose up -d mysql