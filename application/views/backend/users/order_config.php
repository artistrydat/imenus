<div class="row">
	<?php include APPPATH.'views/backend/users/inc/leftsidebar.php'; ?>
	<div class="col-md-8">
		<form class="email_setting_form" action="<?= base_url('admin/restaurant/add_configuration'); ?>" method="post" enctype= "multipart/form-data" autocomplete="off">
		<?= csrf() ;?>

			<div class="card">
				<div class="card-header">
					<h4><?= lang('configuration'); ?></h4>
				</div>
				<div class="card-body">

					<div class="custom-control  orderConfig custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_coupon" name="is_coupon" class="switch-input "  <?= isset(restaurant()->is_coupon) && restaurant()->is_coupon==1?"checked" : "" ;?>>

								<label for="is_coupon" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('enable_coupon'))?lang('enable_coupon'):'Enable Coupon' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow'))?lang('enable_to_allow'):"Enable to allow "; ?></small></p>
								</div>
								<div class="float-right">
									<span class="custom_badge danger-light-active"><?= lang('new') ;?></span>
								</div>
							</div>
						</div><!-- custom-control -->


					<div class="row pt-0 p-15 orderConfig"  style="padding-top: 0!important;">
						
						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_language" name="is_language" class="switch-input "  <?= isset(restaurant()->is_language) && restaurant()->is_language==1?"checked" : "" ;?>>

								<label for="is_language" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('language_switcher'))?lang('language_switcher'):'language switcher' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow'))?lang('enable_to_allow'):"Enable to allow "; ?></small></p>
								</div>
								<div class="float-right">
									
								</div>
							</div>
						</div><!-- custom-control -->

						



						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="stock_status" name="stock_status" class="switch-input "  <?= isset(restaurant()->stock_status) && restaurant()->stock_status==1?"checked" : "" ;?>>

								<label for="stock_status" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('stock_status'))?lang('stock_status'):'Stock Status' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow_in_your_system'))?lang('enable_to_allow_in_your_system'):"Enable to allow in your system"; ?>.</small></p>
								</div>
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_stock_count" name="is_stock_count" class="switch-input "  <?= isset(restaurant()->is_stock_count) && restaurant()->is_stock_count==1?"checked" : "" ;?>>

								<label for="is_stock_count" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('stock_counter'))?lang('stock_counter'):'Stock Counter' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow_in_your_system'))?lang('enable_to_allow_in_your_system'):"Enable to allow in your system"; ?>.</small></p>
								</div>
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_kds" name="is_kds" class="switch-input "  <?= isset(restaurant()->is_kds) && restaurant()->is_kds==1?"checked" : "" ;?>>

								<label for="is_kds" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('kds'))?lang('kds'):'KDS' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow_in_your_system'))?lang('enable_to_allow_in_your_system'):"Enable to allow in your system"; ?>.</small></p>
								</div>
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_review" name="is_review" class="switch-input "  <?= isset(restaurant()->is_review) && restaurant()->is_review==1?"checked" : "" ;?>>

								<label for="is_review" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('review'))?lang('review'):'review' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow_in_your_system'))?lang('enable_to_allow_in_your_system'):"Enable to allow in your system"; ?>.</small></p>
								</div>
							</div>
						</div><!-- custom-control -->


						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_customer_login" name="is_customer_login" class="switch-input "  <?= isset(restaurant()->is_customer_login) && restaurant()->is_customer_login==1?"checked" : "" ;?>>

								<label for="is_customer_login" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('customer_login'))?lang('customer_login'):'customer_login' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('customer_login_msg'))?lang('customer_login_msg'):"Enabled customer login in checkout page"; ?></small></p>
								</div>
								
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_area_delivery" name="is_area_delivery" class="switch-input "  <?= isset(restaurant()->is_area_delivery) && restaurant()->is_area_delivery==1?"checked" : "" ;?>>

								<label for="is_area_delivery" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('area_based_delivery_charge'))?lang('area_based_delivery_charge'):'Area based delivery charge' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_area_based_delivery_charge'))?lang('enable_area_based_delivery_charge'):"Area based delivery charge"; ?></small></p>
								</div>
								<div class="float-right">
									
								</div>
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_call_waiter" name="is_call_waiter" class="switch-input "  <?= isset(restaurant()->is_call_waiter) && restaurant()->is_call_waiter==1?"checked" : "" ;?>>

								<label for="is_call_waiter" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= !empty(lang('call_waiter'))?lang('call_waiter'):'Call a waiter' ;?></label>
									<p class="text-muted"><small><?= !empty(lang('enable_to_allow_call_waiter'))?lang('enable_to_allow_call_waiter'):"Enable to allow call waiter service"; ?></small></p>
								</div>
								<div class="float-right">
									
								</div>
							</div>
						</div><!-- custom-control -->

						<div class="custom-control custom-switch prefrence-item ml-10">
							<div class="gap">
								<input type="checkbox" id="is_pin" name="is_pin" class="switch-input "  <?= isset(restaurant()->is_pin) && restaurant()->is_pin==1?"checked" : "" ;?>>

								<label for="is_pin" class="switch-label"> <span class="toggle--on"> <i class="fa fa-check c_green"></i> <?= !empty(lang('on'))?lang('on'):"On";?></span><span class="toggle--off"><i class="fa fa-ban c_red"></i> <?= !empty(lang('off'))?lang('off'):"Off";?></span></label>

							</div>
							<div class="preText">
								<div class="">
									<label class="custom-control-label"><?= lang('security_pin') ;?></label>
									<p class="text-muted"><small><?= lang('enable_pin_when_customer_track_order'); ?></small></p>
								</div>
								<div class="float-right">
									
								</div>
							</div>
						</div><!-- custom-control -->


						<div class="row p-15" style="padding-bottom: 0!important;">

							<div class="col-md-6 form-group">
								<label for=""><?= lang('discount'); ?></label>
								<div class="input-group">
					                <input type="text" name="discount" class="form-control" value="<?= !empty(restaurant()->discount)? restaurant()->discount: 0 ;?>">
					                <span class="input-group-addon">%</span>
					              </div>
							</div>

							<div class="col-md-6 form-group">
								<label for=""><?= lang('tax_fee'); ?></label>
								<div class="input-group">
					                <input type="text" name="tax_fee" class="form-control" value="<?= !empty(restaurant()->tax_fee)? restaurant()->tax_fee: 0 ;?>">
					                <span class="input-group-addon">%</span>
					              </div>
							</div>

							<div class="col-md-6 form-group">
								<label for=""><?= lang('minimum_order'); ?></label>
								<div class="input-group">
					                <input type="text" name="min_order" class="form-control" value="<?= !empty(restaurant()->min_order)? restaurant()->min_order: 0 ;?>">
					                <span class="input-group-addon"><?= restaurant()->icon ;?></span>
					              </div>
							</div>


							<div class="col-md-6 form-group">
								<label for=""><?= lang('delivery_charge'); ?></label>
								<input type="text" name="delivery_charge_in" class="form-control" value="<?= !empty(restaurant()->delivery_charge_in)? restaurant()->delivery_charge_in: 0 ;?>">
							</div>

							
						</div>



						<div class="row p-15" style="padding-bottom: 0!important;">
							<div class="col-md-12">
								<label for=""><?= !empty(lang('default_prepared_time'))?lang('default_prepared_time'):"Default Prepared Time" ;?></label>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" name="es_time" class="form-control" value="<?= !empty(restaurant()->es_time)? restaurant()->es_time: 0 ;?>">
							</div>
							<div class="col-md-6 form-group">
								<select name="time_slot" class="form-control" id="">
									<option value="minutes" <?= restaurant()->time_slot=="minutes"?"selected":"" ;?>><?= lang('minutes'); ?></option>
									<option value="hours" <?=  restaurant()->time_slot=="hours"?"selected":"";?>><?= lang('hours'); ?></option>
								</select>
							</div>
						</div>

						<div class="row p-15 pt-0">
							<div class="col-md-6 form-group">
								<label for=""><?= lang('security_pin'); ?></label>
								<input type="text" name="pin_number" class="form-control" placeholder="<?= lang('security_pin'); ?>" value="<?= !empty(restaurant()->pin_number)? restaurant()->pin_number:'' ;?>">
							</div>
						</div>
					</div><!-- row -->
						
				</div><!-- card-body -->
				<div class="card-footer">
					<input type="hidden" name="id" value="<?= isset(restaurant()->id)?restaurant()->id:0; ?>">
					<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> &nbsp;<?= !empty(lang('save_change'))?lang('save_change'):"Save Change";?></button>
				</div>
			</div><!-- card -->



			
		</form>
	</div><!-- col-9 -->
	
</div>