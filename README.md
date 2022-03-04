# Api-Doc-v2

### 描述：
thinkphp6 API文档自动生成。
>如果是thinkphp5，请自行更改下面第三部中apidoc文件夹里的控制器namespace

### 主要功能：
根据接口注释自动生成接口文档

### 版本更新：

### 开源地址：
https://github.com/xianrenqh/api-doc-v2

### 扩展安装：
方法一：composer命令
~~~
composer require xianrenqh/api-doc-php
~~~


### 使用说明：
1、
安装成功之后确认config文件夹下是否创建了 apidoc_v2.php文件，如果没有创建，请复制以下文件到config文件夹下
\vendor\xianrenqh\api-doc-v2\src\config\apidoc_v2.php
或者，直接创建config.php文件并粘贴以下代码：
```php
<?php
return [
    // 文档标题
    'title'           => 'APi接口文档',
    // 版权申明
    'copyright'       => 'Powered By HuiCMF',
    //生成文档的控制器
    'controllers'     => [
        'api\\controller\\IndexController',
    ],
    // 指定公共注释定义的文件地址
    'definitions'     => "xianrenqh\apidoc_v2\lib\Definitions",
    // 设置可选版本
    'versions'        => [
        ['title' => 'V2.0', 'folder' => ''],
    ],
    //作者
    'author'          => '小灰灰',
    // 控制器分组列表
    'groups'          => [],
    // 是否开启缓存
    'with_cache'      => false,
    // 统一的请求响应体
    'responses'       => '{
    "code":"状态码",
    "message":"操作描述",
    "data":"业务数据",
    "timestamp":"响应时间戳"
}',
    // 设置全局Authorize时请求头headers携带的key
    'global_auth_key' => "Authorization",
    // 密码验证配置
    'auth'            => [
        // 是否启用密码验证
        'with_auth'     => false,
        // 验证密码
        'auth_password' => "123456",
        // 验证请求头中apidocToken的字段，默认即可
        'headers_key'   => "apidocToken",
    ],
    // 过滤、不解析的方法名称
    'filter_method'   => [
        '_empty',
        '_initialize',
        '__construct',
        '__destruct',
        '__get',
        '__set',
        '__isset',
        '__unset',
        '__cal',
    ],
];

```
#### 参数修改说明：
controllers数组中的值是你需要显示的接口api的控制器，例如：
~~~
'controllers'     => [
        'api\\controller\\IndexController',
		'api\\controller\\UserController',
    ],
~~~
其他字段均有注释。


2、
复制静态文件到你的public下（如果前端文件没有）：
\vendor\xianrenqh\api-doc-v2\demo\static 所有文件夹

3、
复制执行控制器到你的app项目下：
\vendor\xianrenqh\api-doc-v2\demo\apidoc 所有文件夹
> apidoc文件夹可以重命名，但是命名后需要更改对应控制器中namespace

4、以上完成后，访问网址：
http://你的域名/apidoc

### 在接口控制器中使用：
新建一接口控制器，例如：\app\api\controller\UserController.php
代码：
```php
<?php

namespace app\api\controller;

/**
 * @title      会员接口
 * @controller api\controller\User
 * @group      base
 */
class UserController extends ApiController
{

    /**
     * @title  会员登陆
     * @desc   最基础的接口注释写法
     *
     * @param name:method type:string require:1 default:user.login desc:接口方法
     * @param name:event type:string require:1 desc:事件名称
     *
     * @return name:code type:int default:0 desc:错误码
     * @return name:msg type:string desc:提示信息
     * @return name:data type:string desc:返回的数据 default:
     * @author 小灰灰
     * @url    http://你的域名/api.html
     * @method POST|GET
     * @tag    登陆
     */
    public function login()
    {
        $data           = $this->request->param();
        $data['return'] = 'test';

        return $data;
    }
}
```
以上代码中的注释，即自动会展示在接口文档中
