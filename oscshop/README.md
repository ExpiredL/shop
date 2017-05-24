模块介绍
1.
系统基于thinkphp5开发

2.
基本模块 admin，common，其他模块为可安装卸载模块

3.
member  电脑-会员中心模块，包含会员系统，订单系统

payment 电脑端支付模块，支付接口调用，支付回调

index  	电脑-前端展示模块，如需会员功能需安装member模块，需要支付需安装payment模块

mobile 	移动端（包含微信）-该模块为一个整体包括前端和会员中心，依赖member模块

4.
index   模块可以只做展示使用，卸载member模块即可

index，mobile不相互依赖可以单独安装，共用后台订单系统和后台商品管理系统，微信客户信息是独立的和pc端手机端不互通（pc端和手机端用户信息相同）

order订单类，cart购物车类，两模块共用

5.
admin,common,index,member,payment五个模块免费

mobile需要付费购买后安装
