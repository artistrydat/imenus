<div class="payment_content text-center">
	<div class="payment_icon payment">
		<img src="<?php echo base_url('assets/frontend/images/offline.png'); ?>" alt="">
	</div>
	<div class="payment_details">
		<h4> <?= isset($u_info['username'])?html_escape($u_info['username']):'';?></h4>
		<div class="">
			<h2><?= get_currency('icon');?> <?= isset($package['price'])?html_escape($package['price']):'';?> / <?= !empty(lang($package['package_type']))?lang($package['package_type']):$package['package_type']?></h2>
			<p><b><?= lang('package'); ?> : </b> <?= html_escape($package['package_name']);?></p>
		</div>
	</div>
	<?php if(is_demo()==0): ?>
		<a href="<?php echo base_url('offline-payment/'.html_escape($u_info['username']).'/'.html_escape($package['slug'])); ?>" class="btn btn-success pay_now"><?= !empty(lang('send_payment_req'))?lang('send_payment_req'):"Send a payment request"?></a>
	<?php endif;?>
</div><!-- payment_content -->