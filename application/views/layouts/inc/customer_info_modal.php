<div class="modal-header">
	<h5 class="modal-title" id="exampleModalCenterTitle"><?= lang('customer_info'); ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<form action="<?= base_url('customer/update_customer') ;?>" method="post" class="serviceLogin">
	<?= csrf() ;?>
	<div class="modal-body">
		<span class="reg_msg"></span>
		<div class="form-group">
			<label for=""><?= lang('name'); ?></label>
			<input type="text" name="customer_name" value="<?= isset($customer_data['customer_name'])?$customer_data['customer_name']:auth('customer_name') ;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for=""><?= lang('phone'); ?></label>
			<input type="text" name="phone" value="<?= isset($customer_data['customer_phone'])?$customer_data['customer_phone']:auth('customer_phone') ;?>" class="form-control">
		</div>

		<div class="form-group">
			<label for=""><?= lang('gmap_link'); ?></label>
			<input type="text" name="gmap_link" value="<?= isset($customer_data['gmap_link'])?$customer_data['gmap_link']:auth('gmap_link') ;?>" class="form-control">
		</div>

		<div class="form-group">
			<label for=""><?= lang('address'); ?></label>
			<textarea name="customer_address" id="address" cols="5" rows="5" class="form-control"><?= isset($customer_data['customer_address'])?$customer_data['customer_address']:auth('customer_address') ;?></textarea>
		</div>

		<div class="form-group">
			<div class="mt-15">
				<label><input type="checkbox" name="is_update" value="1"> <?= lang('update_with_my_old_information'); ?></label>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="hidden" name="customer_id" value="<?= isset($customer_data['customer_id'])?$customer_data['customer_id']:auth('customer_id') ;?>">
		<button type="submit" class="btn btn-primary"><?= lang('save_change'); ?></button>
	</div>
</form>