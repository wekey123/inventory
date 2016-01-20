<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
        <?php 	echo $this->Session->flash('success');echo $this->Session->flash('error');echo $this->Session->flash('warning');echo $this->Session->flash('notice');?>
        </div>
        <!-- /.col-lg-12 -->
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
            <th><?php echo h('Order Qty'); ?></th>
			<th><?php echo h('Order Price'); ?></th>
<!--			<th><?php echo h('Fulfill Qty'); ?></th>
			<th><?php echo h('Fulfill Price'); ?></th>
	-->		<th><?php echo h('Sales Qty'); ?></th>
			<th><?php echo h('Sales Price'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['title']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['order_qty']); ?>&nbsp;</td>
		<td><?php echo h('$'.$product['Product']['order_purchase_price']); ?>&nbsp;</td>
<!--		<td><?php echo h($product['Product']['fulfill_qty']); ?>&nbsp;</td>
        <td><?php echo h('$'.$product['Product']['fulfill_purchase_price']); ?>&nbsp;</td>
-->		<td><?php echo h($product['Product']['sale_qty']); ?>&nbsp;</td>
		<td><?php echo h('$'.$product['Product']['sale_sale_price']); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
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