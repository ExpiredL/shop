<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:37:"./oscshop/member\view\cart\index.html";i:1495072598;s:37:"./oscshop/index/view/public/base.html";i:1495072598;}*/ ?>
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
	
	
<div id="cart-list" class="allWrap">
	<div class="clearfix">
		<div class="page-title">
			<h1>购物车  (<span id="weight"><?php echo $weight; ?></span>kg ) </h1>
		</div>
		<table class="table">
			<thead>
				<tr>									
					<td  colspan="2" class="text-left">商品名称</td>
					<td class="text-left">货号</td>
					<td class="text-left">数量</td>
					<td class="text-left">单价</td>
					<td class="text-left">总计</td>
					<td class="remove"></td>
				</tr>
			</thead>
			
			<tbody>
				<?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?>
					
					<tr class="goods<?php echo $d['cart_id']; ?>">
						<td style="width:100px;padding:20px;">
							
							<a style="position:relative;display:block;" href="<?php echo url('/goods/'.$d['goods_id']); ?>"><img src="IMG_ROOT<?php echo $d['image']; ?>" />
								<?php if($d['shipping'] == 0): ?>
							 		<span class="no_shipping">免配送商品</span>
							 	<?php endif; ?>
								
							</a>
							
						</td>
						<td ><?php echo $d['name']; if (!$d['stock']) { ?>
							  <span class="stock">***</span>
							  <?php } ?>
							  <div>
								<?php foreach ($d['option'] as $option) { ?>
								<small><?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
								<?php } ?>
			                
							  </div>
						</td>
						<td><?php echo $d['model']; ?></td>
						<td class="quantity" style="width:200px;">
							<div id="select_number<?php echo $d['cart_id']; ?>" class="select_number">
							  <input class="text" type="text" name="quantity<?php echo $d['goods_id']; ?>"  onkeyup='change_quantity("<?php echo $d['goods_id']; ?>",this,"<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>");' value="<?php echo $d['quantity']; ?>" size="1" />
								<div>
									<button onclick='changeQty(1,"<?php echo $d['goods_id']; ?>","<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>"); return false;' class="increase">+</button>
									<button onclick='changeQty(0,"<?php echo $d['goods_id']; ?>","<?php echo $d['cart_id']; ?>","<?php echo $d['cart_id']; ?>"); return false;' class="decrease">-</button>
								</div>
							</div>						
						</td>		
						
						<td class="price">￥<?php echo round($d['price'] ,2); ?></td>
						<td class="total">￥<?php echo round($d['total'] ,2); ?></td>
						
						<td>
							<a href="<?php echo url('/remove/'.$d['cart_id']); ?>">
								<img class="btooltip" data-toggle="tooltip" data-placement="bottom" data-original-title="删除" src="__RES__/home/images/remove.png" alt="删除" title="删除" />
							</a>
						</td>
					</tr>
								
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			
		</table>
		<div class="cart-total ">
		    <table id="total">				      
		      <tr>				
		        <td class="right price last">总计：<?php echo '￥'.$total_price; ?></td>
		      </tr>				      
		    </table>
		 </div>
	     <div id="cart-bottom">					  
		      <a href="<?php echo url('/checkout'); ?>" class="btn checkout">结算</a>
		      <a href="/" class="btn continue">继续购物</a>
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

function update_cart(id,qty,cart_id,key){
	$.post(
		'<?php echo url("/update"); ?>',
		{id:id,q:qty,cart_id:cart_id},
		function(json){			
			
			if (json['success']) {				
				
				$('#cart a').text(json['success']);
				
				$('#select_number' + key).find("input").val(qty);
				
				$('.goods' + key).find("td.price").text('￥ '+json['price']);
				
				$('.goods' + key).find("td.total").text('￥ '+json['total_price']);
				
				$('.last').text('总计： ￥ '+json['total_all_price']);
				
				$('#weight').text(json['weight']);
				
			}else if(json['error']){
				
				alert(json['error']);			
				
			}	
		}
	);
}

function change_quantity(goods_id,input,cart_id,key){
	var qty=input.value;	
	update_cart(goods_id,qty,cart_id,key);
}

function changeQty(increase,goods_id,cart_id,key) {
    var qty = parseInt($('#select_number' + key).find("input").val());  

    if ( !isNaN(qty) ) {
    	//增加
		if(increase){			
			update_cart(goods_id,(qty+1),cart_id,key);
		}else{
			update_cart(goods_id,(qty-1),cart_id,key);
		}     
    }
}	

</script>

</html>