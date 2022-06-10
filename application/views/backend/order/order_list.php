<?php if(isset($is_filter) && $is_filter==TRUE): ?>
<div class="filterarea">
	<div class="filterContent">
		<div class="filtercontentBody">
			<form action="" method="get" class="filterForm">
				<div class="filterBody">
					<div class="form-group">
						<label for=""><?= lang('order_id'); ?></label>
						<input type="text" name="uid" class="form-control" value="<?=  isset($_GET['uid'])?$_GET['uid']:'';?>">
					</div>
					<div class="form-group">
						<label for=""><?= lang('customer_name'); ?></label>
						<input type="text" name="name" class="form-control" value="<?=  isset($_GET['name'])?$_GET['name']:'';?>" placeholder="<?= lang('customer_name'); ?> / <?= lang('phone'); ?>">
					</div>
					<div class="form-group">
						<label for=""><?= lang('order_type'); ?></label>
						<select name="order_type" id="" class="form-control">
							<?php $order_type = $this->admin_m->select('order_types'); ?>
							<option value=""><?= lang('select'); ?></option>
							<?php foreach ($order_type as $key => $type): ?>
								<option value="<?=  $type['id'];?>" <?= isset($_GET['order_type']) && $_GET['order_type']==$type['id']?"selected":'' ;?>><?= $type['name']; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label><?= lang('status'); ?></label>
						<select name="status" id="status" class="form-control">
							<option value='all' <?= isset($_GET['status']) && $_GET['status']=='all'?"selected":'' ;?>><?= lang('select'); ?></option>
						<option value="0" <?= isset($_GET['status']) && $_GET['status']=='0'?"selected":'' ;?>><?= lang('pending'); ?></option>
							<option value="1" <?= isset($_GET['status']) && $_GET['status']=='1'?"selected":'' ;?>><?= lang('accepted'); ?></option>
							<option value="2" <?= isset($_GET['status']) && $_GET['status']=='2'?"selected":'' ;?>><?= lang('completed'); ?></option>
							<option value="3" <?= isset($_GET['status']) && $_GET['status']=='3'?"selected":'' ;?>><?= lang('rejected'); ?></option>
						</select>
					</div>

					<div class="form-group">
						<label><?= lang('date'); ?></label>
						<div class="input-group date">
							<input type="text" name="daterange" class="form-control dateranges" value="<?= isset($_GET['daterange'])?$_GET['daterange']:'';?>"> 
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
					</div>

					<div class="form-group mt-15">
						<button type="submit" class="btn btn-primary filterBtn"><i class="icofont-filter"></i> <?= lang('filter'); ?></button>
					</div>

					<div class="form-group mt-15">
						<a href="<?= base_url('admin/restaurant/all_order_list') ;?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"></i></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php endif;?>

<div id="list_load">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?= !empty(lang('order_list'))?lang('order_list'):"order list";?> &nbsp; &nbsp;
					<?php if(isset($page_type) && $page_type=="restaurant"): ?>
					 	<a href="<?= base_url('admin/restaurant/order_list') ;?>" class="btn btn-success success-light btn-flat"><i class="fa fa-list"></i> &nbsp;<?= !empty(lang('live_orders'))?lang('live_orders'):"Live Orders";?> </a>
					 <?php else: ?>
					 	<a href="<?= base_url('admin/restaurant/all_order_list') ;?>" class="btn btn-success success-light btn-flat"><i class="fa fa-list"></i> &nbsp;<?= !empty(lang('all_orders'))?lang('all_orders'):"All Orders";?> </a>
					<?php endif;?>
						<a href="<?= base_url('admin/restaurant/todays_dine') ;?>" class="btn btn-info info-light-active btn-flat ml-10 p-r"><i class="fa fa-bell"></i> <span class="notify_light label danger-light-active"><?=  $this->admin_m->get_new_dine_order(restaurant()->id);?></span> &nbsp;<?= !empty(lang('table_order'))?lang('table_order'):"Table Order";?> </a>
					</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="upcoming_events">
						<div class="table-responsive min-h-350">
							<table class="table table-bordered table-condensed table-striped" id="">
								<thead>
									<tr>
										<th width=""><?= !empty(lang('sl'))?lang('sl'):"sl";?></th>
										<th width=""><?= !empty(lang('order_number'))?lang('order_number'):"order number";?></th>
										<th width=""><?= !empty(lang('customer_info'))?lang('customer_info'):"customer info";?></th>
										<th width=""><?= !empty(lang('order_type'))?lang('order_type'):"order type";?></th>
										<th width=""><?= !empty(lang('overview'))?lang('overview'):"Overview";?></th>
										<th width=""><?= !empty(lang('status'))?lang('status'):"Status";?></th>
										<th width="20%"><?= !empty(lang('action'))?lang('action'):"action";?></th>
										
										
									</tr>
								</thead>
								<tbody>
								<?php foreach ($order_list as $key => $row): ?>
									<tr>
										<td><?= $key+1; ;?></td>
										<td><span class="uid">#<?= html_escape($row['uid']);?> </span>
											<?php if($row['status']==0): ?>
												<label class="label danger-light-active ml-10"><?= get_time_ago($row['created_at']) ;?></label> 
											<?php endif;?>
										</td>
										<td>
											<div class="customerInfo">
												<p><?= html_escape($row['name']);?></p>
												<p><?=  !empty(staff($row['customer_id'])->dial_code)?staff($row['customer_id'])->dial_code:"";?> <?= html_escape($row['phone']);?></p>
												<p><?= html_escape($row['address']);?></p>
											</div>
										</td>
										<td>
											<label class="label bg-primary-soft"><?= order_type($row['order_type']);?> </label> &nbsp;
											<?php if($row['order_type']==7): ?>
														<label class="label default-light-active" data-toggle="tooltip" title="Table No"><?= lang('table'); ?> : <?= single_select_by_id($row['table_no'],'table_list')['name'] ;?></label> &nbsp;
												<?php endif;?>
											<?php if($row['order_type']==1 || $row['order_type']==5): ?>
												<div class="mt-5">
													<?php if($row['shipping_id'] !=0): ?>
													<?php $shipping_info = shipping($row['shipping_id'],restaurant()->id) ?>
														<label class="label default-light-active"><?= !empty(lang('shipping'))?lang('shipping') : "Shipping" ;?> -- <?= $row['delivery_charge']!=0? $shipping_info['area'].' : '.currency_position($shipping_info['cost'],restaurant()->id):'Free';?> </label>
													<?php else: ?>
														<label class="label default-light-active"><?= !empty(lang('shipping'))?lang('shipping') : "Shipping" ;?> -- <?= $row['delivery_charge']!=0?currency_position($row['delivery_charge'],restaurant()->id):'Free';?> </label>
													<?php endif;?>
												</div>
											<?php endif; ?>
											<div class="mt-2">
												
												<?php if($row['order_type']==2): ?>
													<label class="label default-light" data-toggle="tooltip" title="Booking Date"><?= full_time($row['reservation_date'],restaurant()->id) ;?></label> &nbsp;
													<label class="label default-light" data-toggle="tooltip" title="Total Person Number"><?= lang('total_person'); ?>: <?= $row['total_person'] ;?></label>
												<?php endif;?>

												<?php if($row['order_type']==4): ?>
													<?php if(isset($row['pickup_date']) && !empty($row['pickup_date'])): ?>
														<label class="label default-light " data-toggle="tooltip" title="<?= lang('pickup_date'); ?>"><?= lang('pickup_date'); ?>: <?=!empty($row['pickup_date'])?cl_format($row['pickup_date'],restaurant()->id): time_format_12($row['reservation_date'],restaurant()->id) ;?></label> &nbsp;
													<?php endif;?>
													<div class=" mt-4">
														<label class="label bg-light-purple-soft " data-toggle="tooltip" title="Pickup Time"><?= lang('pickup_time'); ?>: <?=!empty($row['pickup_time'])?$row['pickup_time']: time_format_12($row['reservation_date'],restaurant()->id) ;?></label> &nbsp;
													</div>
												<?php endif;?>

												<?php if($row['is_payment']==1): ?>
													<?php if($row['is_payment']==1): ?>
														<label class="label success-light" ><?= lang('paid'); ?></label> &nbsp;
														<label class="label default-light" data-toggle="tooltip" title="Payment paid by"><?= lang($row['payment_by']); ?></label> &nbsp;
													<?php else: ?>
														<label class="label danger-light" ><?= lang('rejected'); ?></label>
													<?php endif;?>
													
												<?php endif;?>

												<?php if($row['order_type']==6): ?>
													<div class="mt-10">
														<label class="label default-light-active" data-toggle="tooltip" title="Table No"><?= lang('table'); ?> : <?= single_select_by_id($row['table_no'],'table_list')['name'] ;?></label> &nbsp;
														<label class="label default-light-active" data-toggle="tooltip" title="Total Person Number"><?= lang('total_person'); ?> : <?= $row['total_person'] ;?></label>
													</div>
												<?php endif;?>

												


											</div>
										</td>
										<td>
											<?php if($row['order_type']==7): ?>
												<label class="label default-light" data-toggle="tooltip" title="Total Price"> <?= lang('price'); ?> : <?= currency_position($row['total'],restaurant()->id) ;?> </label>
											<div class="mt-2">
												<label class="label bg-primary-soft" data-toggle="tooltip" title="Order Time"> <?= lang('order'); ?> Time: <?= full_time(html_escape($row['created_at']),restaurant()->id);?></label>
											</div>
											<?php else: ?>

											<label class="label default-light" data-toggle="tooltip" title="Total Qty"> <?= lang('qty'); ?> : <?= $row['total_item'] ;?></label>
											<label class="label default-light-active" data-toggle="tooltip" title="Total Price"> <?= lang('price'); ?> : <?= currency_position(grand_total($row['total_price'],$row['delivery_charge'],$row['discount'],$row['tax_fee'],$row['coupon_percent'],$row['tips'],$row['order_type']),restaurant()->id);?></label>
											<div class="mt-2">
												<label class="label bg-primary-soft" data-toggle="tooltip" title="Order Time"> <?= lang('order'); ?> Time: <?= full_time(html_escape($row['created_at']),restaurant()->id);?></label>
											</div>
											<?php endif;?>
										</td>

										<td>
											<?php if($row['status']==0): ?>
												<label class="label danger-light" data-toggle="tooltip" title="Pending order"> <?= lang('pending'); ?> <i class="fa fa-spinner"></i></label>
												</div>
											<?php elseif($row['status']==1): ?>
												<label class="label info-light" data-toggle="tooltip" title="Accept By Shop"><i class="fa fa-check"></i> <?= lang('accept'); ?></label>
												<div class="mt-2">
													
												<?php if($row['estimate_time'] > d_time()): ?>
													<label class="label default-light">
														<?= lang('prepared_time') ;?> : <?= $row['es_time'].' '.lang($row['time_slot']) ;?> 
														</label> &nbsp; &nbsp;
													<?php if($row['status']==1 && $row['is_preparing']==2): ?>
														<label class="label default-light-active"><?= lang('prepared_finish'); ?></label> 
													<?php else: ?>
														<label class="label default-light-active get_time" id="show_time_<?= $row['id'] ;?>" data-time="<?= $row['estimate_time'] ;?>" data-id="<?= $row['id'];?>"></label> 	
													<?php endif;?>
												<?php endif;?>

													

												</div>
											<?php elseif($row['status']==2): ?>
												<label class="label success-light-active" data-toggle="tooltip" title="Completed Order"><i class="fa fa-check-square-o"></i> <?= lang('completed'); ?></label>

												<?php if($row['order_type']==1 || $row['order_type']==5): ?>
													<div class="deliveryStatus mt-5">
														<?php if($row['dboy_status']==1): ?>
														<label class="label default-light-active" data-toggle="tooltip" title="Accept By Delivery Saff"><i class="fa fa-check"></i> <?= lang('accepted_by_delivery_staff'); ?></label>
													<?php elseif($row['dboy_status']==2): ?>
														<label class="label default-light-active" data-toggle="tooltip" title="Picked By Delivery Saff"><i class="fa fa-check"></i> <?= lang('picked'); ?></label>
													<?php elseif($row['dboy_status']==3): ?>
														<label class="label default-light-active" data-toggle="tooltip" title="Completed By Delivery Saff"><i class="fa fa-check"></i> <?= lang('completed'); ?></label>
													<?php endif;?>
													</div>
													
												<?php endif;?>
											<?php elseif($row['status']==3): ?>
												<?php if(is_access('order-cancel')==1): ?>
													<label class="label danger-light-active" data-toggle="tooltip" title="Order Canceled"><i class="fa fa-ban"></i> <?= lang('canceled'); ?></label>
												<?php endif; ?>
											<?php endif;?>
											<?php if(!empty($row['customer_rating'])): ?>
												<div class="startRating mt-5" title="<?=$row['customer_rating'].' '. lang('stars'); ?>" data-toggle="tooltip">
													<?php for ($i=1; $i <=5; $i++) { ?>

													<span><i class="fa <?= $i<=$row['customer_rating']?"fa-star":"fa-star-o" ;?>"></i></span>

													<?php }; ?>
												</div>
											<?php endif;?>
										</td>
										<td class="actionTd">
											<?php if(isset($is_filter) && $is_filter==FALSE): ?>
												<?php if($row['order_type']==7): ?>
													<a href="<?= base_url('admin/restaurant/todays_dine') ;?>" target="_blank"  class="btn success-light btn-sm btn-flat "><i class="fa fa-eye"></i></a>
												<?php else: ?>
													<a href="javascript:;" data-id="<?=  $row['uid'];?>" class="btn success-light btn-sm btn-flat quick_view sm-mb-10"><i class="fa fa-eye"></i></a>
												<?php endif;?>
											<?php endif; ?>
											
											<div class="btn-group">
												<a href="javascript:;" class="dropdown-btn dropdown-toggle btn btn-danger btn-sm btn-flat" data-toggle="dropdown" aria-expanded="false">
													<span class="drop_text"><?= lang('action'); ?> </span> <span class="caret"></span>
												</a>
							                 <?php if(isset($is_filter) && $is_filter==TRUE): ?>
							                 	<ul class="dropdown-menu dropdown-ul" role="menu">

							                 		<?php if($row['order_type']!=7): ?>
							                 			<li class="cl-primary-soft"><a href="<?= base_url('admin/restaurant/get_item_list_by_order_id/'.$row['uid']) ;?>" ><i class="fa fa-eye"></i> <?= lang('order_details'); ?></a></li>
							                 		<?php endif;?>

							                 		<?php if($row['status'] == 0): ?>
							                 			<li class="cl-info-soft">
							                 				<?php if(restaurant()->es_time==0): ?>
							                 					<a href="<?= base_url('admin/restaurant/order_status/'.$row['uid']).'/1' ;?>" data-shop="<?= $row['shop_id'] ;?>"  title="Mark as Accept"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('accept'); ?> </a>
							                 				<?php else: ?>
							                 					<a href="javascript:;" class="showTimeModal" data-shop="<?= $row['shop_id'] ;?>" data-id="<?= $row['uid'] ;?>"><i class="fa fa-check"></i> <?= lang('accept'); ?></a>
							                 				<?php endif ?>
														</li>
							                 		<?php endif;?>
							                 		<?php if($row['status'] == 0 || $row['status'] == 1): ?>

							                 			<li class="cl-success-soft"><a href="<?= base_url('admin/restaurant/order_status/'.$row['uid']).'/2' ;?>" data-shop="<?= $row['shop_id'] ;?>" class="" data-toggle="tooltip" title="Mark as Completed"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('completed'); ?> </a></li>
							                 		<?php endif;?>

							                 		<?php if($row['status'] == 0): ?>
							                 			<?php if(is_access('order-cancel')==1): ?>
							                 				<li class="cl-warning-soft" ><a href="<?= base_url('admin/restaurant/order_status/'.$row['uid']).'/3' ;?>" data-shop="<?= $row['shop_id'] ;?>" class="" data-toggle="tooltip" title="Mark as Cancel"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('cancel'); ?></span> </a></li>
							                 			<?php endif; ?>
							                 		<?php endif;?>

							                 		<?php if($row['status'] == 3): ?>
							                 			<li class="cl-danger-soft"><a href="<?= base_url('admin/menu/delete/'.$row['id']) ;?>" data-shop="<?= $row['shop_id'] ;?>" data-msg="<?= !empty(lang('want_to_delete'))?lang('want_to_delete'):"want to delete";?>" class="action_btn"><i class="fa fa-trash"></i> <?= lang('delete'); ?></a></li>
							                 		<?php endif;?>
							                 	</ul>

							                 	<?php if($row['order_type']!=7): ?>
							                 		<a href="<?= base_url('admin/restaurant/get_item_list_by_order_id/'.$row['uid']) ;?>" target="_blank"  class="btn success-light btn-sm btn-flat ml-5 "><i class="fa fa-eye"></i></a>
							                 		
								                 	<a class="btn btn-success btn-flat btn-sm ml-5" target="blank" href="<?= base_url('invoice/'.auth('username').'/'.$row['uid']); ?>">
								                 		<i class="fa fa-file-pdf-o"></i> &nbsp;
								                 		<?= !empty(lang('invoice'))?lang('invoice'):"Invoice" ;?>
								                 	</a>
								                 <?php endif;?>
							                 <?php else: ?>
							                  <ul class="dropdown-menu dropdown-ul" role="menu">

							                  	<?php if($row['order_type']!=7): ?>
							                  	<li class="cl-primary-soft"><a href="<?= base_url('admin/restaurant/get_item_list_by_order_id/'.$row['uid']) ;?>" ><i class="fa fa-eye"></i> <?= lang('order_details'); ?></a></li>
							                  	<?php endif;?>

							                  	<?php if($row['status'] == 0): ?>
							                    	<li class="cl-info-soft">

							                    		<?php if(restaurant()->es_time==0): ?>
							                    			<a href="<?= base_url('admin/restaurant/order_status_by_ajax/'.$row['uid']).'/1' ;?>" class="orderStatus" data-shop="<?= $row['shop_id'] ;?>"  title="Mark as Accept"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('accept'); ?> </a> 
							                    		<?php else: ?>
							                    			<a href="javascript:;" class="showTimeModal" data-shop="<?= $row['shop_id'] ;?>" data-id="<?= $row['uid'] ;?>"><i class="fa fa-check"></i> <?= lang('accept'); ?></a>
							                    		<?php endif; ?>

							                    	</li>
							                	<?php endif;?>
							                	<?php if($row['status'] == 0 || $row['status'] == 1): ?>

								                    <li class="cl-success-soft"><a href="<?= base_url('admin/restaurant/order_status_by_ajax/'.$row['uid']).'/2' ;?>" data-shop="<?= $row['shop_id'] ;?>" class="orderStatus" data-toggle="tooltip" title="Mark as Completed"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('completed'); ?> </a></li>
								                <?php endif;?>

								                <?php if($row['status'] == 0): ?>
								                	<?php if(is_access('order-cancel')==1): ?>
									                    <li class="cl-warning-soft" ><a href="<?= base_url('admin/restaurant/order_status_by_ajax/'.$row['uid']).'/3' ;?>" data-shop="<?= $row['shop_id'] ;?>" class="orderStatus" data-toggle="tooltip" title="Mark as Cancel"><i class="icofont-hand-drag1"></i> &nbsp; <?= lang('cancel'); ?></span> </a></li>
									                  <?php endif; ?>
								                <?php endif;?>

								                <?php if($row['status'] == 3): ?>
								                    <li class="cl-danger-soft"><a href="<?= base_url('admin/menu/delete/'.$row['id']) ;?>" data-shop="<?= $row['shop_id'] ;?>" data-msg="<?= !empty(lang('want_to_delete'))?lang('want_to_delete'):"want to delete";?>" class="action_btn"><i class="fa fa-trash"></i> <?= lang('delete'); ?></a></li>
								                <?php endif;?>
							                  </ul>
							                  <?php if($row['order_type']!=7): ?>
							                  <a class="btn btn-success btn-flat btn-sm ml-5" target="blank" href="<?= base_url('invoice/'.auth('username').'/'.$row['uid']); ?>">
							                 		<i class="fa fa-file-pdf-o"></i> &nbsp;
							                 		<?= !empty(lang('invoice'))?lang('invoice'):"Invoice" ;?>
							                 	</a>
							                 <?php endif;?>

							                <?php endif; ?>
							            </div><!-- button group -->
										</td>
									</tr>
									
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="pagination">
								<?= $this->pagination->create_links(); ;?>
							</div>
						</div>
					</div>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div><!-- #list_load -->
	<div class="view_orderList">
		
	</div>




<?php include 'estimate_time_modal.php' ?>



<script type="text/javascript">

  
  var text = '<?= lang('remaining') ;?>';
  $(".get_time").each(function(i,e){
    var id = $(this).data('id');
    var time = $(this).data('time');
    var countDownDate = new Date(time).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      if(days > 0){
        $('#show_time_'+id).html(text+': '+days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
         
      }else if(hours > 0){
        $('#show_time_'+id).html(text+': '+ hours + "h "+ minutes + "m " + seconds + "s ");
          
      }else if(minutes > 0){
        $('#show_time_'+id).html(text+': '+ minutes + "m " + seconds + "s ");
          
      }else if(seconds > 0){
        $('#show_time_'+id).html(text+': '+ seconds + "s ");
      }else{
         $('#show_time_'+id).html('');
      }

  
      if (distance < 0) {
        clearInterval(x);
        $('#show_time_'+id).html('');
      }
    }, 1000);
  });
</script>
