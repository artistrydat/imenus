<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?= !empty(lang('packages'))?lang('packages'):"packages";?> &nbsp; &nbsp; <a href="<?= base_url('admin/dashboard/pricing') ;?>" class="btn btn-info info-light btn-flat"><i class="fa fa-plus"></i> &nbsp;<?= !empty(lang('add_new'))?lang('add_new'):"Add New";?> </a></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<?php foreach ($packages as $key => $row): ?>
					<div class="col-md-3 col-sm-4 col-lg-3">
						<div class="package_type_area">
							<div class="package_type_header">
								<div class="package_header_count">
									<span><?= $this->admin_m->count_total_user_by_package_id($row['id']);?> <i class="ion ion-ios-people"></i></span>
									<a href="javascript:;" title="Click here to change status" data-toggle="tooltip" data-placement="top"  class=" status_text  <?= $row['status']==1?'bg_green':'bg_red'?> change_status" data-id="<?= html_escape($row['id']);?>" data-status="<?= html_escape($row['status']);?>" data-table="packages"> <i class="fa <?= $row['status']==1?'fa-check':'fa-close'?>"></i>&nbsp; <?= $row['status']==1? (!empty(lang('live'))?lang('live'):"Live"): (!empty(lang('hide'))?lang('hide'):"Hide");?></a>
								</div>
								<h4><?= html_escape($row['package_name']) ;?></h4>
								<?php if($row['package_type']=='free' || $row['package_type']=='trial'): ?>
									<p><?= lang('free'); ?></p>
								<?php else: ?>
									<p><?= get_currency('icon');?> <?= html_escape($row['price']); ?> / <?= html_escape(lang($row['package_type']));?></p>
								<?php endif;?>
								
							</div>
							<div class="package_type_body">
								<ul>
									<?php foreach ($features as $key => $feature): ?>
										<?php $feature_id = get_price_feature_id($feature['id'],$row['id']); ?>
										<li><i class="fa <?= isset($feature_id['feature_id']) && $feature_id['feature_id']==$feature['id']?'fa-check c_green':'fa-times c_red';?> "></i> <?= html_escape($feature['features']);?> <?= html_escape($feature['slug'])=='menu'?' <b>('.limit_text($row['item_limit']).' items) </b>':'' ;?>  <?= html_escape($feature['slug'])=='order'?' <b>('.limit_text($row['order_limit']).') </b>':'' ;?></li>
									<?php endforeach ?>
								</ul>
							</div>
							<div class="package_type_footer">
								<a href="<?= base_url('admin/dashboard/edit_packages/'.html_escape($row['id'])); ?>" class="btn btn-info"><i class="fa fa-edit"></i> &nbsp;<?= !empty(lang('add_change_feature'))?lang('add_change_feature'):"Change/add Features";?></a>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				
			</div>
		</div>
	</div>
</div>

