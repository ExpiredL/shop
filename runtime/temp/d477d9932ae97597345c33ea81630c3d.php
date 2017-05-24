<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./oscshop/member\view\checkout\payment_method.html";i:1495072598;}*/ ?>

<p>选择支付方式</p>
<table class="radio">
  <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payment): $mod = ($i % 2 );++$i;?>
  <tr class="highlight">
    <td>    	
      <input type="radio" name="payment_method" <?php if($payment['code'] == 'alipay'): ?> checked="checked"<?php endif; ?> value="<?php echo $payment['code']; ?>" />    
      </td>
    <td><label><?php echo $payment['name']; ?></label></td>
  </tr>
 <?php endforeach; endif; else: echo "" ;endif; ?>	
</table>
<br />


<br />

<div class="buttons">
  <div class="left">
    <input type="button" value="继续" id="button-payment-method" class="btn btn-primary btn-continue" />
  </div>
</div>

