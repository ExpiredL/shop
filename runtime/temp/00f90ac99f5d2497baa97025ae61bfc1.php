<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:37:"./oscshop/admin\view\goods\links.html";i:1495072598;s:37:"./oscshop/admin\view\public\base.html";i:1495072598;}*/ ?>
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
							
<div class="page-header">
	<h1>
		<?php echo $breadcrumb1; ?>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $breadcrumb2; ?>
		</small>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $crumbs; ?>
		</small>			
	<button type="submit" style="float:right;" form="form-goods"  class="btn button btn-sm btn-primary">提交</button>
	</h1>
</div>
	<div class="row">
	<div class="col-xs-12">	
		<div class="panel-body">
        <form action="<?php echo url('Goods/edit_links'); ?>" method="post" enctype="multipart/form-data" id="form-goods" class="form-horizontal">
        
        <?php if(\think\Request::instance()->param('id')): ?>
			<input name="goods_id" type="hidden" value="<?php echo \think\Request::instance()->param('id'); ?>" />
		<?php endif; ?>
          <ul class="nav nav-tabs">
          	
          	<li class="active"><a href="#tab-data" data-toggle="tab">关联</a></li>
           
          </ul>
          <div class="tab-content">
          		
	       	<!-- 关联 START -->
	          	<div class="tab-pane active" id="tab-data">	          		
	         
	          		<div class="form-group">
	                <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="(自动完成)">商品分类</span></label>
	                <div class="col-sm-10">
	                  <input type="text" name="category" value="" placeholder="商品分类" id="input-category" class="form-control" />
	                  <div id="goods-category" class="well well-sm" style="height: 150px; overflow: auto;">
	                  	<?php if(isset($goods_categories)){ foreach ($goods_categories as $goods_category) { ?>
			                    <div id="goods-category<?php echo $goods_category['category_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $goods_category['name']; ?>
			                      <input type="hidden" name="goods_category[]" value="<?php echo $goods_category['category_id']; ?>" />
			                    </div>
		                    <?php } } ?>
	                  </div>
	                </div>
	              </div>
	              
	              <div class="form-group">
		                <label class="col-sm-2 control-label" for="input-attribute"><span data-toggle="tooltip" title="(自动完成)">商品属性</span></label>
		                <div class="col-sm-10">
		                  <input type="text" name="attribute" value="" placeholder="商品属性" id="input-attribute" class="form-control" />
		                  <div id="goods-attribute" class="well well-sm" style="height: 150px; overflow: auto;">
		                  	<?php if(isset($goods_attribute)){ foreach ($goods_attribute as $attribute) { ?>
			                    <div id="goods-attribute<?php echo $attribute['attribute_value_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $attribute['value_name']; ?>
			                      <input type="hidden" name="goods_attribute[]" value="<?php echo $attribute['attribute_value_id']; ?>" />
			                    </div>
		                    <?php } } ?>
		                  	
		                  </div>	                  
		                </div>
	              	</div>	
	              	
	              	<div class="form-group">
		                <label class="col-sm-2 control-label" for="input-brand"><span data-toggle="tooltip" title="(自动完成)">商品品牌</span></label>
		                <div class="col-sm-10">
		                  <input type="text" name="brand" value="" placeholder="商品品牌" id="input-brand" class="form-control" />
		                  <div id="goods-brand" class="well well-sm" style="height: 150px; overflow: auto;">
		                  	<?php if(isset($goods_brand)){ foreach ($goods_brand as $brand) { ?>
			                    <div id="goods-brand<?php echo $brand['brand_id']; ?>"><i class="fa fa-minus-circle"></i> <?php echo $brand['name']; ?>
			                      <input type="hidden" name="goods_brand[]" value="<?php echo $brand['brand_id']; ?>" />
			                    </div>
		                    <?php } } ?>
		                  	
		                  </div>	                  
		                </div>
	              	</div>

	              
	          
	          	<!-- 关联 END -->
	          	
        		</div>
          </div>
        </form>
	</div>
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
$(function(){

		
$('input[name=\'category\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: '<?php echo url("Category/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['category_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'category\']').val('');
		
		$('#goods-category' + item['value']).remove();
		
		$('#goods-category').append('<div id="goods-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_category[]" value="' + item['value'] + '" /></div>');	
	}
});	
$('#goods-category').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	


$('input[name=\'attribute\']').autocomplete({
	'source': function(request, response) {

		$.ajax({
			url: '<?php echo url("Attribute/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item.attribute_group,
						label: item.name,
						value: item.attribute_id
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'attribute\']').val('');
		
		$('#goods-attribute' + item['value']).remove();
		
		$('#goods-attribute').append('<div id="goods-attribute' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_attribute[]" value="' + item['value'] + '" /></div>');	
	
	}
});

$('#goods-attribute').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	

$('input[name=\'brand\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: '<?php echo url("Brand/autocomplete"); ?>' +'/filter_name/'+  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['brand_id']
					}
				}));
			}
		});
	},
	'select': function(item) {
		$('input[name=\'brand\']').val('');
		
		$('#goods-brand' + item['value']).remove();
		
		$('#goods-brand').append('<div id="goods-brand' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="goods_brand[]" value="' + item['value'] + '" /></div>');	
	}
});	

$('#goods-brand').delegate('.fa-minus-circle', 'click', function() {
	$(this).parent().remove();
});	


});

</script>

	</body>
</html>
