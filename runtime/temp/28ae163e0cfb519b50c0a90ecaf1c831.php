<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:37:"./oscshop/index\view\goods\index.html";i:1495072598;s:37:"./oscshop/index\view\public\base.html";i:1495072598;}*/ ?>
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
	
<script>
	function changeQty(increase) {
	    var qty = parseInt($('.select_number').find("input").val());
	    if ( !isNaN(qty) ) {
	        qty = increase ? qty+1 : (qty ><?php echo $goods['minimum']; ?>?qty-1:<?php echo $goods['minimum']; ?>);
	        $('.select_number').find("input").val(qty);
	    }
	}		
</script>

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
	
	
<div id="goods-info">
		<div  class="allWrap">
		<div id="left-content">
			
			<div class="product-view">
			<div id="gallery">
				<div class="product-image">
					<div class="large-image"> 
	                  <a href="/public/uploads/<?php echo $goods['image']; ?>" class="cloud-zoom" id="zoom1" rel="" > 
	                    <img src="IMG_ROOT<?php echo resize($goods['image'],300,300); ?>"> 
	                  </a> 
	                </div>
	                
	                <div class="flexslider flexslider-thumb">
	                    <ul class="previews-list slides">                     
	                       	<?php if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$image): $mod = ($i % 2 );++$i;?>
		                       <li>
		                        <a href="/public/uploads/<?php echo $image['image']; ?>" title="" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: 'IMG_ROOT<?php echo resize($image['image'],300,300); ?>'">
		                          <img src="IMG_ROOT<?php echo resize($image['image'],75,75); ?>" alt = "Thumbnail 1"/>
		                        </a>
		                       </li>
	                      <?php endforeach; endif; else: echo "" ;endif; ?>
	                    </ul>
	                </div>
				</div>
			</div>
		</div>
		
		</div>
		<div id="right-content">
			<div id="info">
				<dl>
					<dt><?php echo $goods['name']; ?></dt>					
					<dd><span>价格：</span>￥<?php echo $goods['price']; ?></dd>
					<dd><span>货号：</span><?php echo $goods['model']; ?></dd>
					<dd><span>产地：</span><?php echo $goods['location']; ?></dd>
					<?php if($goods['subtract']): ?>
					<dd><span>数量：</span><?php echo $goods['quantity']; ?><?php echo $goods['sku']; ?></dd>
					<?php endif; if(!empty($discount)): $disc=0; if(is_array($discount) || $discount instanceof \think\Collection || $discount instanceof \think\Paginator): $i = 0; $__LIST__ = $discount;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;$disc+=1; if($disc == 1): ?>						
							<dd><span>折扣：</span><?php echo $v['quantity'].$goods['sku'].' 或更多 ￥'.$v['price']; ?></dd>
						<?php else: ?>
							<dd><span></span><?php echo $v['quantity'].$goods['sku'].' 或更多 ￥'.$v['price']; ?></dd>
						<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
					
					
				</dl>
				
				
				  <?php if($options): ?>	
			      <div class="options">
			        <h2>可选项</h2>			        
			        <?php if(is_array($options) || $options instanceof \think\Collection || $options instanceof \think\Paginator): $i = 0; $__LIST__ = $options;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option): $mod = ($i % 2 );++$i;if($option['type'] == 'select'): ?>			        	
				        <div class="boss_check">
					        <div class="box-check">	
						        <div id="option-<?php echo $option['goods_option_id']; ?>" class="option">
						          <div class="title_text"><b><?php echo $option['name']; ?>:</b>
							          <?php if($option['required'] == 1): ?>
							          	<span class="required">*</span>
							          	<?php endif; ?>
						          </div>
						          <select name="option[<?php echo $goods['goods_id']; ?>,<?php echo $option['option_id']; ?>]">
						            <option value=""> --- 请选择 --- </option>
						            <?php if(is_array($option['goods_option_value']) || $option['goods_option_value'] instanceof \think\Collection || $option['goods_option_value'] instanceof \think\Paginator): $i = 0; $__LIST__ = $option['goods_option_value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option_value): $mod = ($i % 2 );++$i;?>	
							            <option title="数量<?php echo $option_value['quantity']; ?>" value="<?php echo $option_value['option_value_id']; ?>"><?php echo $option_value['name']; if($option_value['goods_price'] != '0.00'): ?>		
							            		(<?php echo $option_value['price_prefix']; ?>￥<?php echo $option_value['price']; ?>)
							            	<?php endif; ?>
							            </option>
						            <?php endforeach; endif; else: echo "" ;endif; ?>
						          </select>
						        </div>
					         </div>
				         </div>
				        <?php endif; if($option['type'] == 'radio'): ?>
							<div class="boss_check">
								<div class="box-check">
							        <div id="option-<?php echo $option['goods_option_id']; ?>">
							          <p><b><?php echo $option['name']; ?>:</b>						      
								          	<?php if($option['required'] == 1): ?>
								          	<span class="required">*</span>
								          	<?php endif; ?>						          
							          </p>
							          <?php if(is_array($option['goods_option_value']) || $option['goods_option_value'] instanceof \think\Collection || $option['goods_option_value'] instanceof \think\Paginator): $i = 0; $__LIST__ = $option['goods_option_value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option_value): $mod = ($i % 2 );++$i;?>					          									          	
							          <label for="option-value-<?php echo $option_value['goods_option_value_id']; ?>">								          	
							          	<input  class="option" type="radio" name="option[<?php echo $goods['goods_id']; ?>,<?php echo $option['option_id']; ?>]" value="<?php echo $option_value['option_value_id']; ?>" id="option-value-<?php echo $option_value['goods_option_value_id']; ?>" />								          	       										          	
								          
								          	<?php if(!empty($option_value['image'])): ?>			
									          	<a title="数量<?php echo $option_value['quantity']; ?>" href="/public/uploads/<?php echo $option_value['image']; ?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: 'IMG_ROOT<?php echo resize($option_value['image'],300,300); ?>'">
									          		<img src="IMG_ROOT<?php echo resize($option_value['image'],30,30); ?>" />									          										          
									          	</a>
								          	 <?php endif; ?>
								          	<span title="数量<?php echo $option_value['quantity']; ?>"><?php echo $option_value['name']; ?></span> 						          
								            <?php if($option_value['goods_price'] != '0.00'): ?>		
								            	(<?php echo $option_value['price_prefix']; ?>￥<?php echo $option_value['price']; ?>)
								            <?php endif; ?>								            
							          </label>
							          <br />
							          <?php endforeach; endif; else: echo "" ;endif; ?>
							        </div>
								</div>
							</div>	
					     <?php endif; if($option['type'] == 'checkbox'): ?>	
						<div class="box-check">
					        <div id="option-<?php echo $option['goods_option_id']; ?>" class="option">
					          <p><b><?php echo $option['name']; ?>:</b>
						          <?php if($option['required'] == 1): ?>
									   <span class="required">*</span>
								  <?php endif; ?>	
					          </p>		        
					          <?php if(is_array($option['goods_option_value']) || $option['goods_option_value'] instanceof \think\Collection || $option['goods_option_value'] instanceof \think\Paginator): $i = 0; $__LIST__ = $option['goods_option_value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$option_value): $mod = ($i % 2 );++$i;?>	
						          <input type="checkbox" name="option[<?php echo $goods['goods_id']; ?>,<?php echo $option['option_id']; ?>][]" value="<?php echo $option_value['option_value_id']; ?>" id="option-value-<?php echo $option_value['goods_option_value_id']; ?>" />
						          <label for="option-value-<?php echo $option_value['goods_option_value_id']; ?>">
							           <?php if(!empty($option_value['image'])): ?>			
							          	<a title="数量<?php echo $option_value['quantity']; ?>" href="/public/uploads/<?php echo $option_value['image']; ?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: 'IMG_ROOT<?php echo resize($option_value['image'],300,300); ?>'">
							          		<img src="IMG_ROOT<?php echo resize($option_value['image'],30,30); ?>" />									          										          
							          	</a>
						          	   <?php endif; ?>
							          <span title="数量<?php echo $option_value['quantity']; ?>"><?php echo $option_value['name']; ?></span> 						          
							           <?php if($option_value['goods_price'] != '0.00'): ?>		
							            	(<?php echo $option_value['price_prefix']; ?>￥<?php echo $option_value['price']; ?>)
							           <?php endif; ?>
						          </label>
						          <br />
					          <?php endforeach; endif; else: echo "" ;endif; ?>
					        </div>
				        </div>											       
				       <?php endif; endforeach; endif; else: echo "" ;endif; ?>
		      </div>
		      <?php endif; if(is_module_install('member')): ?>
				<div class="add-to-box">                       
	            	<div class="add-to-cart">
		                <div class="pull-left">
			                <div class="select_number">	
								<input class="text" type="text" id="quantity" value="<?php echo $goods['minimum']; ?>" size="2" name="quantity">
								<button class="increase" onclick="changeQty(1); return false;">+</button>
								<button class="decrease" onclick="changeQty(0); return false;">-</button>
							</div>
							<input type="hidden" value="<?php echo $goods['goods_id']; ?>" size="2" name="goods_id">
		                </div> 					
		                <div class="pull-left">
			                <button id="button-cart" class="button btn-cart" data-loading-text="Loading..." type="button">
								<span>加入购物车</span>
							</button>					              
		            	</div>
	          		</div>							
				</div>	
				<?php endif; ?>
				<div class="clearfix">
					<br />
				</div>
			</div>
			
			<div id="description">
				<h2>商品详情</h2>
				<div>
					<?php if(!empty($mobile_description)): if(is_array($mobile_description) || $mobile_description instanceof \think\Collection || $mobile_description instanceof \think\Paginator): $i = 0; $__LIST__ = $mobile_description;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mobile): $mod = ($i % 2 );++$i;?>
							<img src="IMG_ROOT<?php echo resize($mobile['image'],630); ?>" />
						<?php endforeach; endif; else: echo "" ;endif; else: ?>
						<?php echo htmlspecialchars_decode($goods['description']); endif; ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
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


<link rel="stylesheet" href="__PUBLIC__/font-awesome/css/font-awesome.min.css" />		
<link href="__PUBLIC__/js/flexslider/flexslider.css" rel="stylesheet" type="text/css"> 	
<link href="__PUBLIC__/js/cloud-zoom/cloud-zoom.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/cloud-zoom/cloud-zoom.js"></script>
<script src="__PUBLIC__/js/flexslider/jquery.flexslider.js"></script>
<?php if(is_module_install('member')): ?>
<script>
$(function(){
	
$('#button-cart').bind('click', function() {

	$.ajax({
		url: "<?php echo url('/add'); ?>",
		type: 'post',
		data: $('input[type=\'text\'],input[type=\'hidden\'],input[type=\'radio\']:checked,input[type=\'checkbox\']:checked,select'),
		dataType: 'json',
		success: function(json) {
			$('.box-check').removeClass('text-error');			
			$('.text-danger').remove();	
			if(json){						
				if(json.error){
					if (json['goods_option_id']) {
				         
				         var id=json['goods_option_id'];
				         
				            var element = $('#option-'+id);
				
				            if (element.parent().hasClass('box-check')) {
				              element.parent().addClass('text-error').after('<div class="text-danger">' + json.error + '</div>');
				            } else {
				              element.after('<div class="text-danger">' + json.error+ '</div>');
				            }
				          
					}
					alert(json.error);
				}else if(json.success){
					alert(json.success);
					$('#cart a').text(json.total);
				}
			}
		}
	});	
});
});	
</script>
<?php endif; ?>

</html>