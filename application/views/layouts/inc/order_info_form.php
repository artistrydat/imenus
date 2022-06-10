	
	<?php $shop_info = $this->common_m->shop_info($shop_id); ?>
	 <div class="step_1">
	  	<span class="reg_msg"></span>

	  	<?php  if(shop($shop_id)->is_customer_login==0):?>
		  	<div class="row">
		  		<div class="form-group col-md-6">
		  			<label for=""><?= lang('name'); ?> <span class="error">*</span></label>
		  			<input type="text" name="name" class="form-control" placeholder="<?= lang('name'); ?>">
		  		</div>
		  		<div class="form-group col-md-6">
		  			<label for=""><?= lang('phone'); ?> <span class="error">*</span></label>
		  			<input type="text" name="phone" class="form-control remove_char" data-char="+" placeholder="<?= lang('phone'); ?>">
		  		</div>
		  	</div>
		  <?php endif;?>
	  	<div class="row">
	  		<div class="form-group col-md-6">
	  			<label><?= !empty(lang('order_type'))?lang('order_type'):'order type' ;?> <span class="error">*</span></label>

	  			<?php $order_type =  $this->admin_m->get_users_order_types_by_shop_id($shop_id); ?>

	  			<select name="order_type" class="form-control order_type">
	  				<option value=""><?= !empty(lang('select_order_type'))?lang('select_order_type'):'select order type' ;?></option>

		  				<?php foreach ($order_type as $key => $types): ?>
		  				<?php if(LICENSE != MY_LICENSE && $types['slug']=='pay-in-cash'): ?>

		  				<?php elseif(is_feature($shop_info['user_id'],'online-payment')==1 && !is_active($shop_info['user_id'],'online-payment') && $types['slug']=='pay-in-cash'): ?>

		  				<?php elseif(is_feature($shop_info['user_id'],'online-payment')==0 && $types['slug']=='pay-in-cash'): ?>

		  				<?php else: ?>
		  					<option value="<?=  $types['type_id'];?>" data-required="<?= $types['is_required'];?>"  data-pay="<?= $types['is_payment'];?>" data-slug="<?=  $types['slug'];?>"><?=  $types['type_name'];?></option>
		  				<?php endif; ?>
		  			<?php endforeach ?>
	  			</select>
	  		</div>
	  		<div class="priceEmpty col-md-12 dis_none ">
	  			<div class="priceCheck ">
	  				<h4><?= lang('minimum_price_msg_for_cod'); ?></h4>
	  				<p><?= lang('minimum_price'); ?> : <b><?= $shop_info['min_order'] ;?> 	<?=  shop($shop_id)->icon;?></b></p>
	  			</div>
	  		</div>
	    </div><!-- row -->
	    <div class="order_type_body dis_none">
			<div class="row">
				<div class="form-group col-md-6 booking dis_none">
					<label ><?= !empty(lang('person'))?lang('person'):'Person' ;?> <span class="error">*</span></label>
					<select name="total_person" class="form-control" id="">
						<option value=""><?= !empty(lang('select_person'))?lang('select_person'):'select person' ;?></option>
						<?php for ($i=1; $i < 10 ; $i++) { ?>
							<option value="<?=  $i;?>"><?=  $i;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6 col-6">
					<label><?= !empty(lang('booking_date'))?lang('booking_date'):'Booking date' ;?> <span class="error">*</span></label>
					<div class="input-group date flatpickr" id="datetimepicker1" data-target-input="nearest">
						<input type="text" name="reservation_date" class="form-control datetimepicker" data-target="#datetimepicker1" data-input/>
						<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
			</div> 
		</div><!-- order_type_body -->

		<div class="pickup dis_none">
			<?php $time =$this->common_m->get_single_appoinment(date('w'),$shop_id); ?>
			<?php $pickup_area =$this->common_m->get_pickup_area($shop_id); ?>
			<div class="row">
				<div class="col-md-12">
					<label class=""><?= lang('select_pickup_area'); ?>
					<?php if(shop($shop_id)->is_gmap == 1 || shop($shop_id)->is_admin_gmap==1): ?>
						<a href="javascript:;" class="checkmap"><?= lang('show_map'); ?></a>
					<?php endif;?>
				</label>
				<div class="pickup_area_list">
					<?php foreach ($pickup_area as $key => $area): ?>
						<label class="single_pickup_area" id="active_point_<?= $area['id'] ;?>" data-id="<?=  $area['id'];?>" data-toggle="tooltip" title="<?= $area['address'] ;?>"><?= $area['name'] ;?></label>
					<?php endforeach ?>
					<input type="hidden" name="pickup_point_id" class="add_pickpoint_value" value="">
				</div>
				</div>
				<?php if(isset($time) && !empty($time)): ?>
				
				<div class="form-group col-md-6 col-6 mt-20">
					<label><?= !empty(lang('pickup_date'))?lang('pickup_date'):'Pickup date' ;?> <span class="error">*</span></label>
					<div class="pickupCheckDate mt-5 mb-10">
						<label class="badge  custom-radio-2"><input type="radio" class="pickup_date_checker" name="today" value="1" checked><?= lang('today'); ?></label>
						<label class="badge ml-10 custom-radio-2"><input type="radio" class="pickup_date_checker" name="today" value="2"><?= lang('others'); ?></label>
					</div>
					<div class="pickupTime" style="display: none;">
						
						<div class="input-group date flatpickr" id="datepicker" data-target-input="nearest">
							<input type="text" name="pickup_date" class="form-control datepicker-1" data-target="#datepicker" data-input/>
							<div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
					</div>
				</div>

				<?php $pickup_slots = json_decode($shop_info['pickup_time_slots']); ?>
				<div class="form-group col-md-12 col-lg-12 col-12 mt-5">
					<label ><?= !empty(lang('pickup_time'))?lang('pickup_time'):'pickup time' ;?> <span class="error">*</span></label>
					<div class="slots_area">
						<?php foreach ($pickup_slots as $key => $slots): ?>
							<label class="single_slots"> <input type="radio" name="pickup_time" value="<?= $slots ;?>" class="timeChecked"><?= $slots ;?></label>
						<?php endforeach ?>
						
					</div>
				</div>
				<?php else: ?>
				<div class="form-group col-md-6 col-12 mt-10">
					<label><?= !empty(lang('pickup_time'))?lang('pickup_time'):'pickup time' ;?> <span class="error">*</span></label>
					<div class="pickup_up" >
						<h4><?= lang('pickup_time_alert'); ?></h4>
					</div>
				</div>
				<?php endif; ?>
				
			</div> 
		</div><!-- order_type_body -->

	</div><!-- step_1 -->
	<div class="step_2">
		<!-- dine in -->
		<div class="dineInsection">
			<div class="dinein mb-10 dis_none">
				<?php $dinein =$this->common_m->get_table_list($shop_id); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="dineInList">
							<label for=""><?= lang('select_table'); ?></label>
							<select name="table_no" class="form-control" id="table_no">
								<option value=""><?= lang('select'); ?></option>
								<?php foreach ($dinein as $key => $dine): ?>
									<option value="<?= $dine['id'];?>" data-size="<?=  $dine['size'];?>"><?=  $dine['name'];?> - <?= $dine['area_name'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="table_person dis_none">
							<label for=""><?= lang('select_person'); ?></label>
							<select name="person" class="form-control" id="table_person">

							</select>
						</div>
					</div>

				</div> 
			</div>
		</div>

		
		<!-- dine in -->
		<div class="dis_none show_address">
			<?php if($shop_info['is_area_delivery']==1): ?>
				<div class="row">
					<div class="col-md-12">
						<div class="slots_area mb-20">
							<?php foreach (delivery_area($shop_id) as $key => $area): ?>
								<label class="single_slots"> 
									<input type="radio" name="shipping_area" data-cost="<?= $area['cost'] ;?>" data-id="<?= $area['id'] ;?>" value="<?= $area['id'] ;?>" class="shippingArea"><?= $area['area'].' - '.currency_position($area['cost'],$shop_id) ;?>
								</label>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="form-group col-md-12">
					<input type="hidden" name="customer_phone" class="customer_phone" value="<?= !empty(auth('customer_phone'))?auth('customer_phone'):"" ;?>">
					<textarea name="address" id="address" cols="5" rows="5" class="form-control shippingAddress" placeholder="<?= !empty(lang('shipping_address'))?lang('shipping_address'):'shipping address' ;?> *"><?= !empty(auth('customer_address'))?auth('customer_address'):"" ;?></textarea>
				</div>

				<div class="form-group col-md-12">
					<?php if(shop($shop_id)->is_gmap == 1 || shop($shop_id)->is_admin_gmap==1): ?>
						<div class="gmapLink" id="locator-input-section">
							<select id="editable-select" name="delivery_area" class="form-control gmap_link autocomplete" placeholder="<?= !empty(lang('google_map_link'))?lang('google_map_link'):'Google map link' ;?>">
								<?php if(!empty(auth('gmap_link'))): ?>
									<option><?= !empty(auth('gmap_link'))?auth('gmap_link'):"" ;?></option>
								<?php endif ?>
								<option value=""></option>
							</select>
							<i class="fa fa-dot-circle" id="locator-button"></i>
						</div>
					<?php else: ?>
						<input type="text" name="delivery_area" class="form-control" value="<?= !empty(auth('gmap_link'))?auth('gmap_link'):"" ;?>" placeholder="<?= !empty(lang('google_map_link'))?lang('google_map_link'):'Google map link' ;?>">
					<?php endif ?>
				</div>
			</div>
		</div><!-- show_address -->


		<div class="couponArea" style="display:none;">
			<a href="javascript:;" class="couponBtn"><?= lang('do_you_have_coupon'); ?></a>
			<div class="couponField" style="display:none;">
				<div class="couponInput-group">
					<input type="text" name="coupon_code" class="form-control coupon_code" placeholder="<?= lang('coupon_code');?>">
					<input type="hidden" name="shop_id"  class="shop_id" value="<?= $shop_id ;?>">
					<input type="hidden" name="all_price" class="all_price"  value="<?= $this->cart->total();?>">
					<input type="hidden" name="is_coupon" class="form-control is_coupon" value="0">
					<input type="hidden" name="coupon_percent" class="form-control coupon_percent" value="0">
					<input type="hidden" name="coupon_id" class="form-control coupon_id" value="0">
					<input type="hidden" name="shipping_cost" class="form-control shipping_cost" value="0">
					<button type="button" class="btn btn-secondary couponFormBtn"><?= lang('apply'); ?></button>
				</div>
			</div>
		</div>

		<?php if(is_feature($shop_info['user_id'],'online-payment')==1 && is_active($shop_info['user_id'],'online-payment') && overlay==1): ?>		
			<div class="makePayment <?= is_package;?>" style="display:none;">
				<div class="form-group">
					<div class="">
						<label class="custom-radio-2 f-color mr-5 pay_now"><input type="radio" name="use_payment" value="1"> <b><?= lang('pay_now');?></b></label> &nbsp;

						<label class="custom-radio-2 f-color pay_later"><input type="radio" name="use_payment" value="0" checked> <b><?= lang('pay_later');?></b></label>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>
	<div class="row">
		<div class="col-md-12">
			<textarea name="comments" id="comments" class="form-control" cols="5" rows="5" placeholder="<?= lang('comments'); ?>"></textarea>
		</div>
	</div>


<div class="modal-footer">

	<input type="hidden" name="get_price" class="getPrice" value="<?= $this->cart->total() ;?>">
	<input type="hidden" name="minPrice" class="minPrice" value="<?=  isset($shop_info['min_order'])?$shop_info['min_order']:0;?>">

	<input type="hidden" name="is_payment" class="is_payment" value="0">
	<button type="submit" class="btn btn-primary confirm_btn"><?= !empty(lang('confirm_oder'))?lang('confirm_oder'):'confirm oder' ;?></button>
</div><!-- modal-footer -->


