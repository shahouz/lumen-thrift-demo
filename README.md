# lumen-thrift-demo

## 说明

使用默认的ExampleController，新增了一个路由规则和方法javaVisitor()作为测试用；

**路由规则：**

`$app->get('/thrift/java', 'ExampleController@javaVisitor');`


## 调试

**刷新autoload**

`composer dump-autoload -o`

**启动服务**

`php -S localhost:8666 -t public/`

**测试地址**

`http://localhost:8666/thrift/java`