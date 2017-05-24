<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"./oscshop/member\view\checkout\shipping_method.html";i:1495072598;}*/ ?>
<?php if(isset($sm['error'])) { ?>
<div class="warning"><?php echo $sm['error']; ?></div>
<?php }else{ ?>
<p>选择货运方式</p>
<table class="radio">
  <?php if(isset($sm)&&is_array($sm)){ foreach ($sm as $k => $v){ ?>
		  <tr>
		    <td colspan="3"><b><?php echo $v['name']; ?></b></td>
		  </tr>		 
		  <?php if(!isset($v['info']['error'])){ ?>
		  <tr class="highlight">
		    <td>
		      <input type="radio" name="shipping_method" value="<?php echo $v['id']; ?>" checked="checked" />
		    </td> 
		    <td><?php echo $v['info']['info'].' ，运费 ￥'.$v['info']['price']; ?></td>
		  </tr>		
		  <?php }else{ ?>  
		   <tr class="highlight">
		    <td colspan="2">
		      <?php echo $v['info']['error']; ?>
		    </td> 
		    
		  </tr>	
		  <?php } } } ?>
</table>
<br />
<b>添加订单备注</b>
<textarea name="comment" rows="8" style="width: 98%;"></textarea>
<br />
<br />
<div class="buttons">
  <div class="left">
    <input type="button" value="继续" id="button-shipping-method" class="btn btn-primary btn-continue" />
  </div>
</div>
<?php } ?>