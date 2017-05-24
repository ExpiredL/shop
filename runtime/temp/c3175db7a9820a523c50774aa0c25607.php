<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"./oscshop/member\view\checkout\index.html";i:1495072598;s:37:"./oscshop/index/view/public/base.html";i:1495072598;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo (isset($SEO['title']) && ($SEO['title'] !== '')?$SEO['title']:''); ?></title>
	<meta name="keywords" content="<?php echo (isset($SEO['keywords']) && ($SEO['keywords'] !== '')?$SEO['keywords']:''); ?>"/>
	<meta name="description" content="<?php echo (isset($SEO['description']) && ($SEO['description'] !== '')?$SEO['description']:''); ?>"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" />	
	<link rel="stylesheet" href="__RES__/common/base.css" />
	<link rel="stylesheet" href="__RES__/home/css/common.css" />	
	
</head>
<body>	
	
	<?php if(is_module_install('member')): ?>	
		<div id="top">		
			<div class="allWrap">
				<ul class="left">
					<?php if(member('uid')): ?>
						<li><a href="<?php echo url('member/order_member/index'); ?>">会员中心</a></li>
						<li><a href="<?php echo url('/logout'); ?>">退出</a></li>
					<?php else: ?>
						<li><a class="pointer" id="reg">注册</a></li>
						<li><a class="pointer" id="login">登录</a></li>
					<?php endif; ?>
				</ul>
				<ul class="right">
					<li id="cart">
						 购物车(<a href="<?php echo url('/cart'); ?>"> <?php if(session('total')): ?><?php echo \think\Session::get('total'); else: ?>0<?php endif; ?> </a>)
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif; ?>
	
	<div id="header" class="allWrap">
		<ul id="home">
			<li><a href="<?php echo \think\Request::instance()->root(true); ?>">首页</a></li>
		</ul>  
		<ul class="nav">
		<?php if(is_array($top_nav) || $top_nav instanceof \think\Collection || $top_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $top_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
			<li><a href="<?php echo url('/category/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
				<?php if(isset($category['children'])): ?>
					<ul>
					<?php if(is_array($category['children']) || $category['children'] instanceof \think\Collection || $category['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?>
						<li><h3><a href="<?php echo url('/category/'.$children['id']); ?>"><?php echo $children['name']; ?></a></h3></li>				
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>	
	
	
<link href="__RES__/home/css/checkout.css" rel="stylesheet" type="text/css">  
<div id="checkout-box" class="allWrap">
	<div class="clearfix">
		<div>
			<h1>商品结算</h1>
		</div>
		<div class="checkout">		   
		    
		    <?php if ($shipping_required) { ?>
			    <div id="shipping-address">
			      <div class="checkout-heading"><span>收货地址</span></div>
			      <div class="checkout-content"></div>
			    </div>
			    <div id="shipping-method">
			      <div class="checkout-heading"><span>货运方式</span></div>
			      <div class="checkout-content"></div>
			    </div>
		    <?php } ?>
		    
		    <div id="payment-method">
		      <div class="checkout-heading"><span>支付方式</span></div>
		      <div class="checkout-content"></div>
		    </div>
		    <div id="confirm">
		      <div class="checkout-heading"><span>完成订单</span></div>
		      <div class="checkout-content"></div>
		    </div>
		  </div>	
	</div>		
</div>			

		
	<div id="footer">
		<div class="allWrap">
		<p>Copyright © 2015-<?php echo date('Y',time()); ?> <?php echo \think\Config::get('SITE_TITLE'); ?>  <?php echo \think\Config::get('SITE_URL'); ?> All Rights Reserved. 备案号：<?php echo \think\Config::get('SITE_ICP'); ?> </p>
		</div>
	</div>	
</body>


<script src="__PUBLIC__/js/jquery/jquery-2.0.3.min.js"></script>
<script src="__PUBLIC__/js/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="__PUBLIC__/artDialog/artDialog.js"></script>
<script src="__PUBLIC__/artDialog/iframeTools.js"></script>
<link href="__PUBLIC__/artDialog/skins/default.css" rel="stylesheet" type="text/css" />	
<script src="__RES__/home/js/common.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?32e3cb4cf7e5c6772c4dc1f5d496b6af";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>


<script>	
//div下滑效果
$('.checkout-heading a').live('click', function() {
	$('.checkout-content').slideUp('slow');
	
	$(this).parent().parent().find('.checkout-content').slideDown('slow');
});
<?php if (osc_service('member','user')->is_login()) { ?> 
//已经登录

<?php if($shipping_required){ ?>
$(document).ready(function() {	
		$.ajax({
			url: '<?php echo url("/shipping_address"); ?>',
			dataType: 'html',
			success: function(html) {
				$('#shipping-address .checkout-content').html(html);				
				$('#shipping-address .checkout-content').slideDown('slow');				
				$('#checkout .checkout-heading a').remove();		
				$('#shipping-address .checkout-heading a').remove();
				$('#shipping-method .checkout-heading a').remove();
				$('#payment-method .checkout-heading a').remove();	
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});		
});
<?php }else{ ?>
$(document).ready(function() {	
		$.ajax({
			url: '<?php echo url("/payment_method"); ?>',
			dataType: 'html',
			success: function(html) {
				$('#payment-method .checkout-content').html(html);
						
				$('#shipping-method .checkout-content').slideUp('slow');
				
				$('#payment-method .checkout-content').slideDown('slow');

				$('#shipping-method .checkout-heading a').remove();
				$('#payment-method .checkout-heading a').remove();
				
				$('#shipping-method .checkout-heading').append('<a>修改</a>');	
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});		
});
<?php } ?>
//收货地址
$('#button-shipping-address').live('click', function() {
	$.ajax({
		url: '<?php echo url("/validate_shipping_address"); ?>',
		type: 'post',
		data: $('#shipping-address input[type=\'text\'],#shipping-address input[type=\'hidden\'], #shipping-address input[type=\'password\'], #shipping-address input[type=\'checkbox\']:checked, #shipping-address input[type=\'radio\']:checked, #shipping-address select'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-shipping-address').attr('disabled', true);
			$('#button-shipping-address').after('<span class="wait">&nbsp;<img src="__PUBLIC__/image/loading.gif" alt="" /></span>');
		},	
		complete: function() {
			$('#button-shipping-address').attr('disabled', false);
			$('.wait').remove();
		},			
		success: function(json) {
			$('.warning, .error').remove();
		//	alert('444');
			if (json['redirect']) {
			//	alert('333');
				location = json['redirect'];
			} else if (json['error']) {
			//	alert('222');
				if (json['error']) {
					$('#shipping-address .checkout-content').prepend('<div class="warning" style="display: none;">' + json['error'] +'</div>');
					
					$('.warning').fadeIn('slow');
				}
				
			
				
			} else {
			//	alert('111');
				$.ajax({
					url: '<?php echo url("/shipping_method"); ?>',
					dataType: 'html',
					success: function(html) {
						$('#shipping-method .checkout-content').html(html);
						
						$('#shipping-address .checkout-content').slideUp('slow');
						
						$('#shipping-method .checkout-content').slideDown('slow');
						
						$('#shipping-address .checkout-heading a').remove();
						$('#shipping-method .checkout-heading a').remove();
						$('#payment-method .checkout-heading a').remove();
						
						$('#shipping-address .checkout-heading').append('<a>修改</a>');							
						
						$.ajax({
							url: '<?php echo url("/shipping_address"); ?>',
							dataType: 'html',
							success: function(html) {
								$('#shipping-address .checkout-content').html(html);
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
							}
						});
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});	
					
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
});

//货运方式
$('#button-shipping-method').live('click', function() {
	$.ajax({
		url: '<?php echo url("/validate_shipping_method"); ?>',
		type: 'post',
		data: $('#shipping-method input[type=\'radio\']:checked, #shipping-method textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-shipping-method').attr('disabled', true);
			$('#button-shipping-method').after('<span class="wait">&nbsp;<img src="__PUBLIC__/image/loading.gif" alt="" /></span>');
		},	
		complete: function() {
			$('#button-shipping-method').attr('disabled', false);
			$('.wait').remove();
		},			
		success: function(json) {
			$('.warning, .error').remove();
			
			if (json['redirect']) {
				location = json['redirect'];
			} else if (json['error']) {
				if (json['error']['warning']) {
					$('#shipping-method .checkout-content').prepend('<div class="warning" style="display: none;">' + json['error']['warning'] + '</div>');
					
					$('.warning').fadeIn('slow');
				}			
			} else {
				$.ajax({
					url: '<?php echo url("/payment_method"); ?>',
					dataType: 'html',
					success: function(html) {
						$('#payment-method .checkout-content').html(html);
						
						$('#shipping-method .checkout-content').slideUp('slow');
						
						$('#payment-method .checkout-content').slideDown('slow');

						$('#shipping-method .checkout-heading a').remove();
						$('#payment-method .checkout-heading a').remove();
						
						$('#shipping-method .checkout-heading').append('<a>修改</a>');	
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});					
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
});

//支付方式
$('#button-payment-method').live('click', function() {
	$.ajax({
		url: '<?php echo url("/validate_payment_method"); ?>', 
		type: 'post',
		data: $('#payment-method input[type=\'radio\']:checked, #payment-method input[type=\'checkbox\']:checked'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-payment-method').attr('disabled', true);
			$('#button-payment-method').after('<span class="wait">&nbsp;<img src="__PUBLIC__/image/loading.gif" alt="" /></span>');
		},	
		complete: function() {
			$('#button-payment-method').attr('disabled', false);
			$('.wait').remove();
		},			
		success: function(json) {
			$('.warning, .error').remove();
			
			if (json['redirect']) {
				location = json['redirect'];
			} else if (json['error']) {
				if (json['error']['warning']) {
					$('#payment-method .checkout-content').prepend('<div class="warning" style="display: none;">' + json['error']['warning'] + '</div>');
					
					$('.warning').fadeIn('slow');
				}			
			} else {
				$.ajax({
					url: '<?php echo url("/confirm"); ?>',
					dataType: 'html',
					success: function(html) {
						$('#confirm .checkout-content').html(html);
						
						$('#payment-method .checkout-content').slideUp('slow');
						
						$('#confirm .checkout-content').slideDown('slow');
						
						$('#payment-method .checkout-heading a').remove();
						
						$('#payment-method .checkout-heading').append('<a>修改</a>');	
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});	
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
});
<?php } ?>	
</script>

</html>