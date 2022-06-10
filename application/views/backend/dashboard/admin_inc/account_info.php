<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12 pr-5 pl-5">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header profile" style="background-color: #<?= trim($this->my_info['colors']) ;?>">
          <h3 class="widget-user-username"><?= isset($this->my_info['name']) && !empty($this->my_info['name'])?$this->my_info['name']:$this->my_info['username'];?></h3>
          		<b><?= get_info(md5(settings()['site_info'])) ;?></b>
            
                <p class="description-text mt-5"><?= lang('expired_date'); ?>: <b><?= full_date(settings()['supported_until']);?></b></p>
            </h5>
          
          
       
        </div>
        <div class="widget-user-image profile-img">
          <img class="img-circle" src="<?= base_url(!empty(html_escape($my_info['thumb']))?html_escape($my_info['thumb']):'assets/frontend/images/avatar.png')?>" alt="User Avatar">
        </div>

        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header"><?= number_format($this->admin_m->get_total_income_admin(0,0),2); ?> <?= get_currency('icon') ;?></h5>
                <span class="description-text"><?= !empty(lang('toatl_revenue'))?lang('toatl_revenue'):"toatl revenue"?></span>
               
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header"> <?= number_format($this->admin_m->get_total_income_admin('year',0),2); ?> <?= get_currency('icon') ;?> </h5>
                <span class="description-text"><?= !empty(lang('revenue'))?lang('revenue'):"revenue"?> (<?=  date('Y');?>)</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header"> <?= number_format($this->admin_m->get_total_income_admin('month',0),2); ?> <?= get_currency('icon') ;?> </h5>
                <span class="description-text"><?= !empty(lang('revenue'))?lang('revenue'):"revenue"?> (<?=  date('M');?>)</span>

              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            
          </div>

          <!-- /.row -->
        </div>
        <div class="profile_btn">
          <a href="<?= base_url('admin/auth') ;?>" class=""><?= !empty(lang('profile'))?lang('profile'):"Profile"?></a>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>