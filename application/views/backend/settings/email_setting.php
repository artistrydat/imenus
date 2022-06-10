<div class="row">
	<?php include APPPATH."views/backend/dashboard/admin_inc/alert_info.php"; ?>
</div>
<div class="row">
	<?php include 'inc/leftsidebar.php'; ?>
	<form class="email_setting_form" action="<?= base_url('admin/settings/add_email_settings') ?>" method="post" enctype= "multipart/form-data" autocomplete="off">
		<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" autocomplete="off">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group ">
								<?php $sub = json_decode($settings['subjects']) ?>
								<label class=""><?= !empty(lang('registration_subject'))?lang('registration_subject'):"registration Subject";?></label>
								<div class="">
									<input type="text" name="registration" placeholder="<?= !empty(lang('registration_subject'))?lang('registration_subject'):"registration Subject";?>" class="form-control" value="<?= !empty($sub->registration)?html_escape($sub->registration):'';  ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group ">
								<label class=""><?= !empty(lang('payment_mail_subject'))?lang('payment_mail_subject'):"Payment mail subject";?></label>
								<div class="">
									<input type="text" name="payment" placeholder="<?= !empty(lang('payment_mail_subject'))?lang('payment_mail_subject'):"Paypal email subject";?>" class="form-control" value="<?= !empty($sub->payment)?html_escape($sub->payment):'';  ?>">

								</div>
							</div>
						</div>


						<div class="col-md-12">
							<div class="form-group ">
								<label class=""><?= !empty(lang('email_sub'))?lang('email_sub'):"Email Subject";?> (<?= !empty(lang('recovery_password_heading'))?lang('recovery_password_heading'):"Recovery Passowrd";?>)</label>
								<div class="">
									<input type="text" name="recovery" placeholder="<?= !empty(lang('recovery_password_heading'))?lang('recovery_password_heading'):"Recovery Passowrd";?>" class="form-control" value="<?= !empty($sub->recovery)?html_escape($sub->recovery):'';  ?>">

								</div>
							</div>
						</div>	
					</div><!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="form-group ">
								<label class=""><?= !empty(lang('default_email'))?lang('default_email'):"Default Email";?></label>
								<div class="">
									<select name="email_type"  class="form-control email_option">
										<option value="1" <?= $settings['email_type']==1?'selected':''?>> <?= lang('php_mail'); ?></option>
										<option value="2" <?= $settings['email_type']==2?'selected':''?>> <?= lang('smtp'); ?></option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=""><?= !empty(lang('email_or_username'))?lang('email_or_username'):"Email / username";?></label>
								<div class="">
									<input type="text" name="smtp_mail" placeholder="<?= !empty(lang('email_or_username'))?lang('email_or_username'):"Email / username";?>" class="form-control" value="<?= !empty($settings['smtp_mail'])?html_escape($settings['smtp_mail']):'';  ?>">
								</div>
							</div>
						</div>
						<div class="row smtpArea" >
							<div class="smtpArea col-md-12" style="display: <?= $settings['email_type']==2?'block':'none'?>;">
								<div class="col-md-12">
									<div class="callout callout-primary">
	                                  <h4><i class="fa fa-envelope-o"></i> Gmail Smtp</h4>

	                                  <p>Gmail Host:&nbsp;&nbsp;smtp.gmail.com <br>
	                                  Gmail Port:&nbsp;&nbsp;465</p>

	                                  <p class="text-dark mb-2"><b><i class="fa fa-info-circle"></i> If you are using gmail smtp please make sure you have set below settings before sending mail</b></p>
	                                  <p><i class="fas fa-times-circle text-danger"></i> Two factor authentication off <br>
	                                  <i class="fas fa-check-circle text-success"></i> Less secure app on</p>
	                              </div>
								</div>
								<?php $smtp = json_decode($settings['smtp_config']); ?>
								<div class="form-group col-md-12">
									<label class=""><?= lang('smtp_host'); ?></label>
									<div class="">
										<input type="text" name="smtp_host" placeholder="<?= lang('smtp_host'); ?>" class="form-control" value="<?= !empty($smtp->smtp_host)?html_escape($smtp->smtp_host):'';  ?>">
									</div>
								</div>

								<div class="form-group col-md-12 ">
									<label class=""><?= lang('smtp_port'); ?></label>
									<div class="">
										<input type="text" name="smtp_port" placeholder="<?= lang('smtp_port'); ?>" class="form-control" value="<?= !empty($smtp->smtp_port)?html_escape($smtp->smtp_port):'';  ?>" autocomplete="off">
									</div>
								</div>
								<div class="form-group col-md-12">
									<label><?= lang('smtp_password'); ?></label>
									<div class="">
										<input type="password" name="smtp_password" placeholder="<?= lang('smtp_password'); ?>" class="form-control" value="<?= !empty($smtp->smtp_password)?base64_decode($smtp->smtp_password):'';  ?>" autocomplete="off">
									</div>
								</div>

								<div class="form-group col-md-12 hidden">
									<label><?= !empty(lang('send_mail_from'))?lang('send_mail_from'):"Send Emails From (Email)"; ?></label>
									<div class="">
										<input type="password" name="send_mail_from" placeholder="do-not-reply@xxx.com" class="form-control" value="<?= !empty($smtp->smtp_password)?base64_decode($smtp->smtp_password):'';  ?>" autocomplete="off">
									</div>
								</div>

								<div class="form-group col-md-12 mt-20">
									
									<div class="">
										<a href="<?= base_url('home/test_mail') ;?>" target="blank" class="btn btn-primary"><?= lang('test_mail'); ?></a>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div><!-- card-body -->
				<div class="card-footer">
					<input type="hidden" name="id" value="<?= isset($settings['id'])?html_escape($settings['id']):0; ?>">
					<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> &nbsp;<?= !empty(lang('save_change'))?lang('save_change'):"Save Change";?></button>
				</div>
			</div><!-- card -->
		</div><!-- col-9 -->
	</form>
</div>
