<?php $pdcwtx_crform_get = get_option('pdcwtx_crform_option');?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php _e('Price Display Change','pdcwtx'); ?></h2>
<style>
.outline {font-size:15px;text-align:center;width:auto;height:auto;border:solid #bababa 1px;background:#f1f1f1;margin:20px 0px 10px;padding:10px 0px;}
.outline-in {width:94%;margin:0px auto;text-align:left;}
.outline-in .tx-box {width:100%;margin-bottom:30px;border-bottom:dashed #bababa 4px;float:left;}
.outline-in .tx-box .title {width:100%;font-size:18px;float:left;}
.outline-in .last {padding-bottom:30px;}
.list1 {margin-bottom:0px;}
.list1 span.left {font-weight:bold;margin-right:20px;}
.list1 span.right {margin-left:20px;}
.list2 {margin-top:3px;margin-bottom:25px;}
.list3,.list4 {width:100%;padding-bottom:3px;border-bottom:2px dotted #bababa;float:left;}
.list4 span {margin-left:10px;color:red;}
.list5 {width:100%;padding-bottom:20px;float:left;}
</style>
<div class="clear"></div>
<div class="outline">
<div class="outline-in">
<div class="tx-box">
<p class="title"><?php _e('Template tag','pdcwtx'); ?></p>
<p><?php _e('I can change pricing by using a template tag.','pdcwtx'); ?></p>
<p class="list1"><span class="left"><?php _e('List Price','pdcwtx'); ?>&nbsp;<?php _e('(Normal Price)','pdcwtx'); ?></span>・・・<span class="right">&lt;&#063;php cprice_view_change_usces()&#059;&#063;&gt;</span></p>
<p class="list2"><?php _e('Please use it in a product details page.','pdcwtx'); ?></p>
<p class="list1"><span class="left"><?php _e('Sale Price','pdcwtx'); ?>&nbsp;<?php _e('(Sales Price)','pdcwtx'); ?></span>・・・<span class="right">&lt;&#063;php price_view_change_usces()&#059;&#063;&gt;</span></p>
<p class="list2"><?php _e('Please use it in a product details page.','pdcwtx'); ?></p>
<p class="list1"><span class="left"><?php _e('List of products','pdcwtx'); ?>&nbsp;<?php _e('(Sales Price)','pdcwtx'); ?></span>・・・<span class="right">&lt;&#063;php firstprice_view_change_usces()&#059;&#063;&gt;</span></p>
<p class="list2"><?php _e('When I display a list of products in a top page and others, please use it.','pdcwtx'); ?></p>
<p class="list1"><span class="left"><?php _e('Cart Page','pdcwtx'); ?></span>・・・<span class="right">&lt;&#063;php cart_consumption_tax_display()&#059;&#063;&gt;</span></p>
<p class="list2">&#047;wc_templates&#047;cart&#047;wc_cart_page.php<br />&lt;th colspan&#061;&quot;2&quot;&gt;&amp;nbsp&#059;【<?php _e('Template tag','pdcwtx'); ?>】&lt;&#047;th&gt;&nbsp;&nbsp;<?php _e('←It is recommended that you write here.','pdcwtx'); ?></p>
</div>
<div class="tx-box">
<p class="title"><?php _e('Setting','pdcwtx'); ?></p>
<p>Welcart Shop→<?php _e('General Setting','pdcwtx'); ?>→<br /><b>「<?php _e('Tax display','pdcwtx'); ?>」&nbsp;「<?php _e('Tax treatment','pdcwtx'); ?>」&nbsp;「<?php _e('Tax target','pdcwtx'); ?>」&nbsp;「<?php _e('Percentage of Consumption tax','pdcwtx'); ?>」&nbsp;「<?php _e('method of Calculation of the tax','pdcwtx'); ?>」</b><p>
<p class="list3">・<?php _e('If you choose not to display in the 『Tax display』, it does not appear.','pdcwtx'); ?></p>
<p class="list4">・<?php _e('『Tax treatment』','pdcwtx'); ?><br /><?php _e('If set to tax, the price will be displayed tax unchanged.','pdcwtx'); ?><span><?php _e('※ Example)','pdcwtx'); ?>&nbsp;<?php _e('Usually $100 (Tax included：$4)','pdcwtx'); ?></span>
<br /><?php _e('If set to tax, it will be the price displayed is changed within the tax.','pdcwtx'); ?><span><?php _e('※ Example)','pdcwtx'); ?>&nbsp;<?php _e('Usually $104 (Tax included：$4)','pdcwtx'); ?></span></p>
<p class="list3">・<?php _e('If you select the total total amount of money in the 『Tax target』,','pdcwtx'); ?><?php _e('and if you have set up a dedicated template tag below cart,','pdcwtx'); ?><?php _e('you may receive the 『other than the commodity price also requires consumption tax』.','pdcwtx'); ?></p>
<p class="list3">・<?php _e('Tax rate that you enter in the 『Percentage of Consumption tax』 will be reflected.','pdcwtx'); ?></p>
<p class="list5">・<?php _e('Calculation method that you select in the 『method of Calculation of the tax』 will be reflected.','pdcwtx'); ?></p>
</div>
<div class="tx-box last">
<form method="post" action="">
<p class="title"><?php _e('You want to change the currency symbol','pdcwtx'); ?></p>
<p><input type="radio" name="pdcwtx_crform_option" value="symbol" <?php $checked = ''; if(isset($pdcwtx_crform_get)){ if($pdcwtx_crform_get === 'symbol'){ echo $checked = "checked";}}?> /><span style="margin-left:7px;margin-right:7px;font-weight:bold;"><?php _e('$','pdcwtx'); ?></span><?php _e('I make notation','pdcwtx'); ?><span style="margin-left:10px;font-size:13px;"><?php _e('※ Example)','pdcwtx'); ?></span><span style="margin-left:10px;font-size:12px;"><?php _e('$100','pdcwtx'); ?></span></p>
<p><input type="radio" name="pdcwtx_crform_option" value="text" <?php $checked = ''; if(isset($pdcwtx_crform_get)){ if($pdcwtx_crform_get === 'text'){ echo $checked = "checked";}}?> /><span style="margin-left:7px;margin-right:7px;font-weight:bold;"><?php _e('USD','pdcwtx'); ?></span><?php _e('I make notation','pdcwtx'); ?><span style="margin-left:10px;font-size:13px;"><?php _e('※ Example)','pdcwtx'); ?></span><span style="margin-left:10px;font-size:12px;"><?php _e('100USD','pdcwtx'); ?></span></p>
</div>
<div class="clear"></div>
<?php wp_nonce_field('pdcwtx_add'); ?>
<p class="submit"><input type="submit" class="button-submit" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>
</div>
</div>