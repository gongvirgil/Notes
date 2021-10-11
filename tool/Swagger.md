# Swagger

[Swagger从入门到精通](https://www.gitbook.com/book/huangwenchao/swagger/details)

## 安装swagger-ui

## 安装swagger-php

	$ composer require zircote/swagger-php

## 生成swagger.json

	./vendor/bin/swagger -o [swagger.json文件目录] [项目目录]

## 注释写法

    /**
     * @SWG\Post(
     *   path="/user",
     *   tags={"auth"},
     *   summary="添加auth用户",
     *   description="Add a new user",
     *   operationId="xxx",
     *   produces={"application/json"},
     *   @SWG\Parameter(in="formData",name="account",type="string",description="账号",required=true),
     *   @SWG\Parameter(in="formData",name="name",type="string",description="名称",required=true),
     *   @SWG\Parameter(in="formData",name="type",type="int",description="类型",required=true),
     *   @SWG\Parameter(in="formData",name="status",type="int",description="状态",required=true),
     *   @SWG\Response(response="200", description="Add a new user")
     * )
     */
    

