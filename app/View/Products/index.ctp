<style>
tr {
    border-bottom: 0px solid black;
    border-collapse: collapse;
}
</style>
<div id="page-wrapper">

   <div class="row">
        <div class="col-lg-12">
        <?php 	echo $this->Session->flash(); ?>
        </div>
    </div>

    <div class="row">
    
    <div class="col-lg-12">
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo __('Products'); ?>
        </div>
   	    <div class="panel-body">
     	   <div class="dataTable_wrapper">
            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover" id="dataTables-example" style="margin-top:15px;">
	<thead>
	<tr>
			<th><?php echo h('Title'); ?></th>
            <th><?php echo h('Total Order Qty'); ?></th>
			<th><?php echo h('Total Order Price'); ?></th>
		    <th><?php echo h('Total Sales Qty'); ?></th>
			<th><?php echo h('Total Sales Price'); ?></th>
            <th><?php echo h('Product Left'); ?></th>
            <th><?php echo h('Amount Profit'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['title']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['order_qty']); ?>&nbsp;</td>
		<td><?php echo h('$'.$product['Product']['order_purchase_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['sale_qty']); ?>&nbsp;</td>
		<td><?php echo h('$'.$product['Product']['sale_sale_price']); ?>&nbsp;</td>
        <td><?php echo $product['Product']['order_qty'] - $product['Product']['sale_qty'];  ?>&nbsp;</td>
		<td><?php echo ($product['Product']['order_purchase_price'] >= $product['Product']['sale_sale_price']) ? '-$'.($product['Product']['order_purchase_price'] - $product['Product']['sale_sale_price']) : '$'.($product['Product']['sale_sale_price'] - $product['Product']['order_purchase_price']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
		</td>
	</tr>
    <tr><td colspan="2">Button1</td> <td colspan="3">Button2</td> <td colspan="3">Button3</td></tr>
<?php endforeach; ?>
	</tbody>
	</table>
    
   			   </div>
       		</div>
		 </div>
	   </div>
	</div>
</div>