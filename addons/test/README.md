http://www.thinkphp.cn/extend/860.html

1.
模板中使用钩子
<div>{:hook('testhook', ['id'=>1])}</div>

2.
php业务中使用
hook('testhook', ['id'=>1])

3.
如果插件中需要有链接或提交数据的业务，可以在插件中创建controller业务文件，
要访问插件中的controller时使用addon_url生成url链接。

如下：
<a href="{:addon_url('test://Index/exec')}">test exec</a>
格式为：
test为插件名，Index为controller中的类名，exec为controller中的方法

生成的链接
http://o2.com/addons/execute/test-Index-exec
http://o2.com/addons/execute/test-Index-index
