<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./oscshop/member\view\order_backend\show.html";i:1495072598;s:37:"./oscshop/admin/view/public/base.html";i:1495072598;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo \think\Config::get('SITE_NAME'); ?>-后台管理中心</title>

		<meta name="description" content="<?php echo \think\Config::get('SITE_NAME'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="__PUBLIC__/js/bt/bootstrap.min.css" />
		<link rel="stylesheet" href="__ADMIN__/ace/font-awesome/4.2.0/css/font-awesome.min.css" />


		<!-- ace styles -->
		<link rel="stylesheet" href="__ADMIN__/ace/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="__ADMIN__/ace/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="__ADMIN__/ace/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="__ADMIN__/ace/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="__ADMIN__/ace/js/html5shiv.min.js"></script>
		<script src="__ADMIN__/ace/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.table thead > tr > td, .table tbody > tr > td {
			    vertical-align: middle;
			}	
			.table thead td span[data-toggle="tooltip"]:after, label.control-label span:after {
				font-family: FontAwesome;
				color: #1E91CF;
				content: "\f059";
				margin-left: 4px;
			}
		</style>
		
		
			
		
		
		
		<script src="__PUBLIC__/js/jquery/jquery-2.0.3.min.js"></script>
		<script src="__PUBLIC__/js/jquery/jquery-migrate-1.2.1.min.js"></script>
			
		
		<script src="__PUBLIC__/artDialog/artDialog.js"></script>
		<link href="__PUBLIC__/artDialog/skins/default.css" rel="stylesheet" type="text/css" />			
		
		<script>
			var filemanager_url="<?php echo url('admin/FileManager/index'); ?>";
		</script>
		<script src="__PUBLIC__/js/oscshop_common.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo url('admin/Index/index'); ?>" class="navbar-brand">
						<small>							
							<?php echo \think\Config::get('SITE_NAME'); ?> 后台管理
						</small>
					</a>
					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<?php echo session('user_auth.username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a target="_blank" href="<?php echo \think\Request::instance()->root(true); ?>">网站前台</a>
								</li>
								
								<li>
									<a href="<?php echo url('admin/User/edit',array('id'=>session('user_auth.uid'))); ?>">修改密码</a>
								</li>
								
								<li><a href="<?php echo url('admin/Index/clear'); ?>">清空缓存</a></li>

								<li>
									<a href="<?php echo url('admin/Index/logout'); ?>">退出系统</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			
			<div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
				
				<ul class="nav nav-list">
					<li class="hover">
						<a target="_blank" href="<?php echo \think\Request::instance()->root(true); ?>">
							<i class="menu-icon fa fa fa-home fa-lg"></i>
							<span class="menu-text">前台 </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
					</li>
					
					<?php if(is_array($admin_menu) || $admin_menu instanceof \think\Collection || $admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>					
					<li class="hover <?php if(isset($breadcrumb1) AND ($breadcrumb1 == $m["title"])): ?> active open <?php endif; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa <?php echo $m['icon']; ?>"></i>
							<span class="menu-text"> <?php echo $m['title']; ?> </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<?php if(isset($m['children'])): ?>
						<ul class="submenu">
							
							<?php if(is_array($m['children']) || $m['children'] instanceof \think\Collection || $m['children'] instanceof \think\Paginator): if( count($m['children'])==0 ) : echo "" ;else: foreach($m['children'] as $key=>$vo): ?>   
							<li class="hover">
								<a href="<?php echo \think\Request::instance()->root(true); ?>/<?php echo $vo['url']; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo $vo['title']; if(isset($vo['children'])): ?>
										<b class="arrow fa fa-angle-down"></b>
									<?php endif; ?>
								</a>

								<b class="arrow"></b>
								
									<?php if(isset($vo['children'])): ?>
										<ul class="submenu">
											<?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v2): ?> 
												<li class="hover">
													<a href="<?php echo \think\Request::instance()->root(true); ?>/<?php echo $v2['url']; ?>">
														<i class="menu-icon fa fa-caret-right"></i>
														<?php echo $v2['title']; ?>
													</a>
			
													<b class="arrow"></b>
												</li> 
											<?php endforeach; endif; else: echo "" ;endif; ?> 
										</ul>	
									<?php endif; ?>
								
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							
						</ul>
						<?php endif; ?>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				</ul><!-- /.nav-list -->

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						
<?php use think\Db; ?>
 
	<div class="page-header">
		<h1>
			<?php echo $breadcrumb2; ?>
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				<?php echo $crumbs; ?>
			</small>
		</h1>
	</div>	
	<ul class="nav nav-tabs">
		
	  <li class="active"><a href="#tab-order" data-toggle="tab">订单详情</a></li>
	 <?php if($data['order']['shipping_method']): ?>
	  <li><a href="#tab-shipping" data-toggle="tab">收货地址</a></li>
	 <?php endif; ?>
	  <li><a href="#tab-product" data-toggle="tab">商品清单</a></li>
	  
	  <li><a href="#tab-history" data-toggle="tab">订单历史</a></li>          
	  
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab-order">
			<table class="table table-bordered">
				<tr>
				    <td>订单ID</td>
				    <td><?php echo $data['order']['order_id']; ?></td>
				</tr>
				<tr>
					<td>订单编号</td>
					<td><?php echo $data['order']['order_num_alias']; ?></td>
				</tr>
				 <tr>
		            <td>支付方式</td>
		            <td>
		            	<?php switch($data['order']['payment_code']): case "alipay": ?>支付宝<?php break; case "weixin": ?>微信支付<?php break; case "points": ?>积分兑换<?php break; endswitch; ?>
		            </td>
		          </tr>
				<tr>
					<td>会员名称</td>
					<td>					
						
							<?php echo $data['order']['username']; ?>
						
					</td>
				</tr>
				<tr>
				    <td>电子邮件</td>
				    <td><?php echo $data['order']['email']; ?></td>
				</tr>
				  <tr>
				    <td>联系电话</td>
				    <td><?php echo $data['order']['telephone']; ?></td>
				</tr> 
				<?php if($data['order']['points_order']==0){ ?>
				<tr>
				    <td>合计金额</td>
				    <td>
				    	￥<?php echo $data['order']['total']; ?>
				    </td>
				</tr>
				<?php }elseif($data['order']['points_order']==1){ ?>
				<tr>
				    <td>兑换积分</td>
				    <td>
				    	<?php echo $data['order']['pay_points']; ?>
				    </td>
				</tr>	
				<?php } ?>
				<tr>
				    <td>订单状态</td>
				    <td id="order-status"> <?php echo get_order_status_name($data['order']['order_status_id']); ?></td>
				</tr>     
				<tr>
					<td>IP地址</td>
					<td><?php echo $data['order']['ip']; ?></td>
				</tr>  
				<tr>
					<td>用户系统</td>
					<td><?php echo $data['order']['user_agent']; ?></td>
				</tr>
				<tr>
					<td>下单时间</td>
					<td><?php echo date('Y/m/d H:i:s',$data['order']['date_added']); ?></td>
				</tr>
				<tr>
					<td>修改时间</td>
					<td>
						<?php if($data['order']['date_modified'] != 0): ?>
							<?php echo date('Y/m/d H:i:s',$data['order']['date_modified']); else: ?>
							无
						<?php endif; ?>
					</td>
				</tr>
				</table>
		</div>
		<?php if($data['order']['shipping_method']): ?>
		<div class="tab-pane" id="tab-shipping">
            <table class="table table-bordered">
          <tr>
            <td>收货人姓名</td>
            <td><?php echo $data['order']['shipping_name']; ?></td>
          </tr>
                  
          <tr>
            <td>所在地</td>
            <td>
            	<?php echo get_area_name($data['order']['shipping_province_id']); ?>，
            	<?php echo get_area_name($data['order']['shipping_city_id']); ?>，
            	<?php echo get_area_name($data['order']['shipping_country_id']); ?>
            </td>
          </tr>
          
          <tr>
            <td>地址</td>
            <td><?php echo $data['order']['address']; ?></td>
          </tr>
         
         
           <tr>
          	<td>货运方式</td>
          	<td><?php echo get_shipping_name($data['order']['shipping_method']); ?></td>
          </tr>
          <tr>
          	<td>联系电话</td>
          	<td><?php echo $data['order']['shipping_tel']; ?></td>
          </tr>
          
        </table>        
      </div>
      <?php endif; ?>
      <div id="tab-product" class="tab-pane">
       <table class="table table-bordered">
          <thead>
            <tr>
              <td class="left">商品品名</td>
              <td class="left">型号</td>
              <td class="right">数量</td>
              <?php if($data['order']['points_order']==0){ ?>
              <td class="right">价格</td>              
              <td class="right">总计</td>
              <?php } ?>
            </tr>
          </thead>
          
          <?php if($data['order']['points_order']==0){ ?>
          
          <tbody>
          	<?php if(isset($data['order_product'])&&is_array($data['order_product'])){ foreach ($data['order_product'] as $product) { ?>
	            <tr>
	              <td class="left">
	              	<a><?php echo $product['name']; ?></a>
	              	<?php if($option_list=Db::query('select * from '.config('database.prefix').'order_option where order_goods_id='.$product['order_goods_id'].' and order_id='.$product['order_id'])){ foreach ($option_list as $option) { ?>
	                <br />
	                &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small>
	                <?php } } ?>
	              </td>
	              <td class="left"><?php echo $product['model']; ?></td>
	              <td class="right">	              	
	              	<input name="quantity" type="text" size="2" class="quantity" order_id="<?php echo $data['order']['order_id']; ?>" order_goods_id="<?php echo $product['order_goods_id']; ?>" value="<?php echo $product['quantity']; ?>" />
	              </td>
	              
	              <td class="right">￥
	              	<input name="price" type="text" size="8" class="price" order_id="<?php echo $data['order']['order_id']; ?>" order_goods_id="<?php echo $product['order_goods_id']; ?>" value="<?php echo $product['price']; ?>" />
	              </td>
	              <td class="right">￥<?php echo $product['total']; ?></td>
	            </tr>
	            <?php } } ?>
    
          </tbody>
          <?php if(isset($data['order_total'])&&is_array($data['order_total'])){ foreach ($data['order_total'] as $totals) { ?>
	          <tbody>
	            <tr>
	              <?php if($totals['code']=='shipping'){ ?>	
	              	<td colspan="4" class="right"><?php echo $totals['title']; ?>:</td>
	              	<td class="right">￥
	                	<input id="shipping" order_id="<?php echo $data['order']['order_id']; ?>" type="text" size="8" value="<?php echo $totals['value']; ?>" />
	                </td>
	              <?php }else{ ?>	
		              <td colspan="4" class="right"><?php echo $totals['title']; ?>:</td>
		              
		              <td class="right"><?php echo $totals['text']; ?></td>
	              <?php } ?>
	              
	              
	            </tr>
	          </tbody>
	          <?php } } }elseif($data['order']['points_order']==1){ ?>
          	<tbody>
          	<?php if(isset($data['order_product'])&&is_array($data['order_product'])){ foreach ($data['order_product'] as $product) { ?>
	            <tr>
	              <td class="left">
	              	<a href="<?php echo url('Goods/edit',array('id'=>$product['goods_id'])); ?>"><?php echo $product['name']; ?></a>
	              	<?php if($option_list=Db::query('select * from '.config('database.prefix').'order_option where order_goods_id='.$product['order_goods_id'].' and order_id='.$product['order_id'])){ foreach ($option_list as $option) { ?>
	                <br />
	                &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small>
	                <?php } } ?>
	              </td>
	              <td class="left"><?php echo $product['model']; ?></td>
	              <td class="right">	              	
	              	<?php echo $product['quantity']; ?>
	              </td>
	              
	            </tr>
	            <?php } } ?>
    
          </tbody>
          
	          <tbody>
	            <tr>	             
		              <td colspan="2" class="right">积分: <?php echo $data['order']['pay_points']; ?> </td>
		              
		              <td class="right"></td>	              
	            </tr>
	          </tbody>
	     
          <?php } ?>	
        </table>
  
      </div>
	
	
		 <div id="tab-history" class="tab-pane">
        <div id="history"></div>
        <table class="table table-bordered">
          <tr>
            <td>订单状态</td>
            <td>
              <input type="hidden" name="old_order_status_id" value="<?php echo $data['order']['order_status_id']; ?>" id="old_order_status_id" />
              <select name="order_status_id">
                <?php foreach ($data['order_statuses'] as $order_statuses) { ?>
                	
                 <option value="<?php echo $order_statuses['order_status_id']; ?>" <?php if ($order_statuses['order_status_id'] == $data['order']['order_status_id']) { echo ' selected="selected"'; }?> ><?php echo $order_statuses['name']; ?></option>
               
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>通知会员</td>
            <td><input type="checkbox" checked="checked" name="notify" value="1" /></td>
          </tr>
          <tr>
            <td>订单附言</td>
            <td><textarea name="comment" cols="40" rows="8" style="width: 99%"></textarea>
            </td>
           </tr>
           <tr>
           	<td colspan="2">
          <div class="text-right">
			<button id="button-history" class="btn btn-primary" data-loading-text="Loading...">
			<i class="fa fa-plus-circle"></i>
			添加订单记录
			</button>
		  </div>
		  </td>
          </tr>
        </table>
      </div>	
		
	</div>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='__ADMIN__/ace/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='__ADMIN__/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='__ADMIN__/ace/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='__ADMIN__/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="__PUBLIC__/js/bt/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="__ADMIN__/ace/js/ace-elements.min.js"></script>
		<script src="__ADMIN__/ace/js/ace.min.js"></script>

		
<script>	
//更新数量
$('.quantity').blur(function(){		
	$.post(
		"<?php echo url('OrderBackend/update_order',array('type'=>'quantity')); ?>",
		{shipping:$('#shipping').val(),quantity:$(this).val(),order_id:$(this).attr('order_id'),order_goods_id:$(this).attr('order_goods_id')},
		function(data){
			if(data){
				window.location.reload();
			}
		}
	);
});
//更新价格
$('.price').blur(function(){		
	$.post(
		"<?php echo url('OrderBackend/update_order',array('type'=>'price')); ?>",
		{shipping:$('#shipping').val(),price:$(this).val(),order_id:$(this).attr('order_id'),order_goods_id:$(this).attr('order_goods_id')},
		function(data){
			if(data){
				window.location.reload();
			}
		}
	);
});
//更新运费
$('#shipping').blur(function(){		
	$.post(
		"<?php echo url('OrderBackend/update_shipping'); ?>",
		{shipping:$('#shipping').val(),order_id:$(this).attr('order_id')},
		function(data){
			if(data){
				window.location.reload();
			}
		}
	);
});

$('#history').load('<?php echo url("OrderBackend/history",array("id"=>input("param.id"))); ?>');
$('#button-history').live('click', function() {

	$.ajax({
		url: '<?php echo url("OrderBackend/history",array("id"=>input("param.id"))); ?>',
		type: 'post',
		dataType: 'html',
		data: 'order_status_id=' + encodeURIComponent($('select[name=\'order_status_id\']').val()) + '&notify=' + encodeURIComponent($('input[name=\'notify\']').attr('checked') ? 1 : 0)  + '&comment=' + encodeURIComponent($('textarea[name=\'comment\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-history').attr('disabled', true);
			$('#history').prepend('<div class="attention"><img src="__PUBLIC__/image/loading.gif" alt="" />加载中...</div>');
		},
		complete: function() {
			$('#button-history').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(html) {
			$('#history').html(html);
			
			$('textarea[name=\'comment\']').val('');
			
			$('#order-status').html($('select[name=\'order_status_id\'] option:selected').text());
		}
	});
});
</script>

	</body>
</html>
