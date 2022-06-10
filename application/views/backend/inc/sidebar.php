  <?php $my_info = get_user_info(); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(!empty(html_escape($my_info['thumb']))?html_escape($my_info['thumb']):'assets/frontend/images/avatar.png')?>" class="img-circle uploaded_img" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= !empty(html_escape($my_info['name']))?html_escape($my_info['name']):$my_info['username'] ; ?></p>
          <span id="time"></span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="nav-drawer-header"><?= lang('general'); ?></li>
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="<?= isset($page_title) && $page_title =="Dashboard"?"active":""; ?>">
          <a href="<?= base_url('admin/dashboard') ?>">
            <i class="icofont-dashboard fz-20"></i> <span><?= !empty(lang('dashboard'))?lang('dashboard'):"Dashboard";?></span>
          </a>
        </li>
      <?php if($this->settings['is_update']==0): ?>
        <?php if(isset($this->auth['user_role']) && $this->auth['user_role']==1): ?>
            <?php if($this->is_redirect==0){ ?>
                <li class="nav-drawer-header"><?= lang('account_management'); ?></li>
                <li class="treeview <?= isset($page) && $page=="Users"?"active":"";?>">
                  <a href="#">
                    <i class="fa fa-users"></i>
                    <span><?= !empty(lang('restaurant_list'))?lang('restaurant_list'):"restaurant list";?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= $page_title =="Total Users"?"active":"";?>">
                        <a href="<?= base_url('admin/dashboard/total_users') ?>">
                          <i class="fa fa-users"></i> <span><?= !empty(lang('total_restaurant'))?lang('total_restaurant'):"total restautant";?></span>
                        </a>
                      </li>

                      <li class="<?= $page_title =="Add User"?"active":"";?>">
                        <a href="<?= base_url('admin/dashboard/add_user') ?>">
                          <i class="fa fa-plus"></i> <span><?= !empty(lang('add_restaurant'))?lang('add_restaurant'):"Add New restaurant";?></span>
                        </a>
                      </li>
                  </ul>
              </li>

              <!-- settings --> 
            <li class="nav-drawer-header"><?= lang('settings'); ?></li>
            <li class="treeview <?= isset($page) && $page=="Settings" || isset($page) && $page=="Banner Settings" ||  isset($page) && $page=="Upgrade" ||  isset($page) && $page=="Change Domain"?"active":"";?>">
                <a href="#">
                  <i class="fa fa-cogs"></i>
                  <span><?= !empty(lang('settings'))?lang('settings'):"Settings";?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= isset($page) && $page =="Settings"?"active":"";?>">
                      <a href="<?= base_url('admin/settings/settings') ?>">
                        <i class="fa fa-cog"></i> <span><?= !empty(lang('site_settings'))?lang('site_settings'):"Site Settings";?></span>
                      </a>
                    </li>

                    <li class="<?= $page_title =="Home Banner Settings"?"active":"";?>">
                      <a href="<?= base_url('admin/settings/banner_settings') ?>">
                        <i class="fa fa-file-image-o"></i> <span><?= !empty(lang('home_banner_setting'))?lang('home_banner_setting'):"Banner settings";?></span>
                      </a>
                    </li>

                    <li class="<?= $page_title =="Upgrade"?"active":"";?>">
                      <a href="<?= base_url('admin/dashboard/upgrade/'); ?>">
                        <i class="fa fa-cloud-upload"></i> <span><?= !empty(lang('upgrade_license'))?lang('upgrade_license'):"Upgrade License";?></span>
                      </a>
                    </li> 

                    <li class="<?= $page_title =="Change Domain"?"active":"";?>">
                      <a href="<?= base_url('admin/dashboard/change_domain/'); ?>">
                        <i class="icofont-exchange"></i> <span><?= lang('change_domain');?></span>
                      </a>
                    </li>
                    
                </ul>
            </li>
            <!-- settings -->

              <li class="nav-drawer-header"><?= lang('packages_management'); ?></li>
                <li class="treeview <?= isset($page) && $page=="Dashboard"?"active":"";?>">
                      <a href="#">
                        <i class="icofont-addons fz-20"></i>
                        <span><?= !empty(lang('packages'))?lang('packages'):"packages";?></span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                          
                        <li class="<?= $page_title =="Packages"?"active":"";?>">
                          <a href="<?= base_url('admin/dashboard/packages') ?>">
                            <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('package_list'))?lang('package_list'):"Package List";?></span>
                          </a>
                        </li>
                         <li class="<?= $page_title =="Order Types"?"active":"";?>">
                          <a href="<?= base_url('admin/dashboard/order_types') ?>">
                            <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('order_types'))?lang('order_types'):"Order Types";?></span>
                          </a>
                        </li>

                         <li class="<?= $page_title =="Features"?"active":"";?>">
                          <a href="<?= base_url('admin/dashboard/features') ?>">
                            <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('features'))?lang('features'):"Features";?></span>
                          </a>
                        </li>

                       
                          
                      </ul>  
                </li>
                <li class="nav-drawer-header"><?= lang('site_management'); ?></li>
                <li class="treeview <?= isset($page) && $page=="Home"?"active":"";?>">
                      <a href="#">
                        <i class="fa fa-home"></i>
                        <span><?= !empty(lang('home'))?lang('home'):"Home";?></span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                          
                        <li class="<?= $page_title =="Services"?"active":"";?>">
                          <a href="<?= base_url('admin/home/services') ?>">
                            <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('services'))?lang('services'):"Services";?></span>
                          </a>
                        </li>
                        
                        <li class="<?= $page_title =="FAQ"?"active":"";?>">
                          <a href="<?= base_url('admin/home/faq') ?>">
                            <i class="fa fa-angle-double-right"></i> <?= !empty(lang('faq'))?lang('faq'):"Faq / others";?>
                          </a>
                        </li>

                        <li class="<?= $page_title =="Site Features"?"active":"";?>">
                          <a href="<?= base_url('admin/home/site_features') ?>">
                            <i class="fa fa-angle-double-right"></i> <?= !empty(lang('site_features'))?lang('site_features'):"Site Features";?>
                          </a>
                        </li>

                        <li class="<?= $page_title =="Team Members"?"active":"";?>">
                          <a href="<?= base_url('admin/home/team') ?>">
                            <i class="fa fa-angle-double-right"></i> <?= !empty(lang('team'))?lang('team'):"Team";?>
                          </a>
                        </li>


                        <li class="<?= $page_title =="How It Works"?"active":"";?>">
                          <a href="<?= base_url('admin/home/how_it_works') ?>">
                            <i class="fa fa-angle-double-right"></i> <?= !empty(lang('how_it_works'))?lang('how_it_works'):"how it works";?>
                          </a>
                        </li>
                          
                      </ul>  
                </li>
            
            <li class="nav-drawer-header"><?= lang('international'); ?></li>
            <li class="treeview <?= isset($page) && $page=="Languages"?"active":"";?>">
                  <a href="#">
                    <i class="fa fa-language"></i>
                    <span><?= !empty(lang('languages'))?lang('languages'):"Languages";?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?= $page_title =="Language"?"active":"";?>"><a href="<?= base_url('admin/home/languages') ?>"><i class="fa fa-angle-double-right"></i> <?= lang('language_list');?></a></li>

                       <li class="<?= $page_title =="Dashboard Language"?"active":"";?>"><a href="<?= base_url('admin/home/dashboard_languages') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('language_data'))?lang('language_data'):"Languages Data";?></a></li>
                       
                    

                     
                      
                  </ul>
            </li>

            
            <li class="nav-drawer-header"><?= lang('content'); ?></li>
            <li class="treeview <?= isset($page) && $page=="Pages"?"active":"";?>">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span><?= !empty(lang('pages'))?lang('pages'):"Pages";?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">

                    <li class="<?= isset($page_title) && $page_title=="Create Pages"?"active":"";?>">
                      <a href="<?= base_url('admin/dashboard/pages') ?>">
                        <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('add_page'))?lang('add_page'):"Add Pages";?></span>
                      </a>
                    </li>

                    <li class="<?= isset($page_title) && $page_title =="Terms & Conditions"?"active":""; ?>">
                      <a href="<?= base_url('admin/dashboard/terms') ?>">
                        <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('terms_condition'))?lang('terms_condition'):"Terms & Conditions";?> </span>
                      </a>
                    </li>

                    <li class="<?= isset($page_title) && $page_title =="Cookies & Privacy"?"active":""; ?>">
                      <a href="<?= base_url('admin/dashboard/privacy') ?>">
                        <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('cookies_privacy'))?lang('cookies_privacy'):"Cookie & Privacy";?> </span>
                      </a>
                    </li>

                    
                    
                </ul>
              
            </li>


            <li class="<?= isset($page_title) && $page_title =="Offline Payments"?"active":""; ?>">
              <a href="<?= base_url('admin/dashboard/offline_payments') ?>">
                <i class="fa fa-credit-card-alt" ></i> <span><?= !empty(lang('offline_payments'))?lang('offline_payments'):"Offline Payments";?><?php if($this->admin_m->count_table_by_status(0,'offline_payment') > 0): ?> <span class="notify"><?= $this->admin_m->count_table_by_status(0,'offline_payment') ;?></span><?php endif; ?></span>
              </a>
            </li>


            <li class="<?= isset($page_title) && $page_title =="Transactions"?"active":""; ?>">
              <a href="<?= base_url('admin/dashboard/transactions') ?>">
                <i class="fa fa-exchange"></i> <span><?= !empty(lang('user_transaction'))?lang('user_transaction'):"User's Transactions";?> </span>
              </a>
            </li>

              

              <li class="<?= $page_title =="Documentation"?"active":"";?>">
                <a href="https://phplime-envato.gitbook.io/qrexorder/" target="blank">
                  <i class="icofont-law-document fz-20"></i> <span><?= !empty(lang('documentation'))?lang('documentation'):"Documentations";?></span>
                </a>
              </li>

            <li class="<?= isset($page_title) && $page_title =="Database"?"active":""; ?>">
              <a href="<?= base_url('admin/dashboard/backup_db') ?>">
                <i class="fa fa-upload"></i> <span><?= !empty(lang('backup_database'))?lang('backup_database'):"Backup Database";?></span>
              </a>
            </li>

            <?php };?> <!-- is redirect -->
        <?php endif;?> <!-- end user role 1 -->
  <?php endif; ?><!-- is_update -->
<?php if(isset($this->auth['user_role']) && $this->auth['user_role']==0): ?>
  <?php if($this->auth['is_verify']==1): ?>
      <?php if($this->my_info['is_deactived']==0): ?>
        <?php if(!auth('is_staff')): ?>
          <li class="<?= isset($page_title) && $page_title =="Subscriptions"?"active":""; ?>">
            <a href="<?= base_url('admin/auth/subscriptions') ?>">
              <i class="icofont-repair fz-20"></i> <span><?= !empty(lang('subscriptions'))?lang('subscriptions'):"Subscriptions";?></span>
            </a>
          </li>
        <?php endif;?>

        <?php if($this->auth['is_payment']==1 && $this->auth['is_expired']==0 && shop_id() > 0): ?>

          <?php if(is_access('order-control')==1): ?>

          <li class="nav-drawer-header"><?= lang('order'); ?></li>
            <li class="<?= isset($page_title) && $page_title =="Order List"?"active":""; ?>">
            <?php $today_order = $this->admin_m->get_todays_notify(restaurant()->id); ?>
              <a href="<?= base_url('admin/restaurant/order_list') ?>" class="flex_between liveOrder">
                <i class="icofont-live-support fz-20"></i> 
                <span class="flex_between">
                  <span><?= !empty(lang('live_order'))?lang('live_order'):"Live Orders";?> </span><span class="blob <?= isset($today_order) && $today_order >0?"red":"green" ;?>"></span>
                </span> 
              </a>


            </li><li class="<?= isset($page) && $page =="Reservation List"?"active":""; ?>">
              <?php $todays_reservation = $this->admin_m->get_todays_reservations_notify(restaurant()->id); ?>
              <a href="<?= base_url('admin/restaurant/todays_reservation') ?>" class="flex_between liveOrder">
                <i class="icofont-delivery-time fz-20"></i>
                <span class="flex_between">
                  <span><?= !empty(lang('reservation'))?lang('reservation'):"Reservation";?> </span><span class="blob <?= isset($todays_reservation) && $todays_reservation > 0?"red":"green" ;?>"></span>
                </span> 
              </a>
            </li>

          <?php if(restaurant()->is_call_waiter==1): ?>
          </li><li class="<?= isset($page) && $page =="Call Waiter"?"active":""; ?> hidden">
              <a href="<?= base_url('admin/restaurant/call_waiter') ?>" class="flex_between liveOrder">
                <i class="icofont-waiter fz-20"></i>
                <span class="flex_between">
                  <span><?= lang('call_waiter');?> </span>
                </span> 
              </a>
            </li>
          <?php endif;?>

        <?php endif; ?>

      <?php if(restaurant()->is_kds==1): ?>
      </li><li class="<?= isset($page) && $page =="KDS"?"active":""; ?>">
          <a href="<?= base_url('admin/kds/live/'.md5(restaurant()->id)) ?>" class="flex_between liveOrder" target="_blank">
            <i class="icofont-prestashop fz-20"></i>
            <span class="flex_between">
              <span><?= !empty(lang('kds'))?lang('kds'):"KDS";?> 
            </span> 
          </a>
        </li>
      <?php endif;?>
        <?php if(is_access('setting-control')==1): ?>
            <li class="nav-drawer-header"><?= lang('settings'); ?></li>
            <li class="<?= isset($page) && $page =="Profile"?"active":"";?>"><a href="<?= base_url('admin/restaurant/general') ?>"><i class="fa fa-user-circle"></i> <?= !empty(lang('shop_configuration'))?lang('shop_configuration'):"shop configuration";?></a></li>
           
             <!-- settings --> 
                
                <li class="<?= isset($page) && $page=="Settings"?"active":"";?>">
                  <a href="<?= base_url('admin/auth/settings') ?>">
                    <i class="fa fa-cogs"></i> <span><?= !empty(lang('settings'))?lang('settings'):"Settings";?></span>
                  </a>
                </li>
              <!-- settings -->
          
             <?php if(is_feature(auth('id'),'whatsapp')==1): ?>
                <li class="<?= isset($page_title) && $page_title =="Whatsapp Config"?"active":""; ?>">
                  <a href="<?= base_url('admin/auth/whatsapp_config') ?>">
                    <i class="fa fa-whatsapp fz-20"></i> <span><?= !empty(lang('whatsapp_config'))?lang('whatsapp_config'):"whatsapp config";?></span> 
                  </a>
                </li>
               <?php endif; ?>
           <?php endif; ?>
          <?php if(!empty(restaurant()->phone) && restaurant()->country_id !=0): ?>

          <li class="nav-drawer-header"><?= lang('menu'); ?></li>
          <li class="treeview <?= isset($page) && $page=="Menu"?"active":"";?>">
            <a href="#">
              <i class="icofont-tasks fz-20"></i>
              <span><?= !empty(lang('menu'))?lang('menu'):"menu";?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

                <li class="<?= $page_title =="Category"?"active":"";?>"><a href="<?= base_url('admin/menu/category') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('menu_categories'))?lang('menu_categories'):"Menu Categories";?></a></li>
                
              <?php if(is_feature(auth('id'),'menu')==1): ?>
                <li class="<?= $page_title =="Items"?"active":"";?>"><a href="<?= base_url('admin/menu/item') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('items'))?lang('items'):"Items";?></a></li>
              <?php endif; ?>

              <?php if(is_feature(auth('id'),'packages')==1): ?>
               <li class="<?= $page_title =="Packages"?"active":"";?>"><a href="<?= base_url('admin/menu/packages') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('packages'))?lang('packages'):"Packages";?></a></li>
             <?php endif; ?>

               <?php if(is_feature(auth('id'),'specialities')==1): ?>

                 <li class="<?= $page_title =="Specialties"?"active":"";?>"><a href="<?= base_url('admin/menu/specialties') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('specialties'))?lang('specialties'):"Specialties";?></a></li>
               <?php endif; ?>

              <?php if(is_feature(auth('id'),'qr-code')==1): ?>
                  <li class="<?= $page_title =="QR Builder"?"active":"";?>"><a href="<?= base_url('admin/menu/dine_in') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('pacage_qr_builder'))?lang('pacage_qr_builder'):"Package QR builder";?></a></li>
              <?php endif ?>

                <li class="<?= $page_title =="Allergens"?"active":"";?>"><a href="<?= base_url('admin/menu/allergens') ?>"><i class="fa fa-angle-double-right"></i> <?= !empty(lang('allergens'))?lang('allergens'):"allergens";?></a></li>


                <li class="<?= $page_title =="Extras"?"active":"";?>"><a href="<?= base_url('admin/menu/extras') ?>"><i class="fa fa-angle-double-right"></i> <?= lang('extras');?> <span class="ab-position custom_badge danger-light-active"><?= lang('new') ;?></span></a></li>

            </ul>
          </li>

          <li class="<?= isset($page_title) && $page_title =="Coupon List"?"active":""; ?>">
            <a href="<?= base_url('admin/coupon/') ?>">
              <i class="fa fa-gift"></i> <span><?= lang('coupon_list');?></span>
            </a>
          </li>



       
      <?php if(auth('account_type') !=0 && !auth('is_staff')): ?>
        <li class="<?= isset($page_title) && $page_title =="Manage Features"?"active":""; ?>">
          <a href="<?= base_url('admin/auth/manage_features') ?>">
            <i class="fa fa-toggle-on"></i> <span><?= !empty(lang('manage_features'))?lang('manage_features'):"Manage Features";?></span>
          </a>
        </li>

          <li class="treeview <?= isset($page) && $page=="Staff"?"active":"";?>">
            <a href="#">
              <i class="icofont-users-social fz-20"></i>
              <span><?= !empty(lang('staffs'))?lang('staffs'):"Staffs";?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="<?= isset($page_title) && $page_title =="Staff"?"active":""; ?>">
                <a href="<?= base_url('admin/restaurant/staff_list') ?>">
                 <i class="fa fa-angle-double-right"></i> <?= !empty(lang('staff'))?lang('staff'):"staff";?></span>
                </a>
              </li>  
              <?php if(check()==1): ?>
              <li class="<?= isset($page_title) && $page_title =="Delivery Staff"?"active":""; ?>">
                <a href="<?= base_url('admin/restaurant/dboy_list') ?>">
                  <i class="fa fa-angle-double-right"></i> <span><?= !empty(lang('delivery_staff'))?lang('delivery_staff'):"Delivery staff";?></span>
                </a>
              </li>
            <?php endif;?>

              <li class="<?= isset($page_title) && $page_title =="Customer List"?"active":""; ?>">
                <a href="<?= base_url('admin/restaurant/customer_list') ?>">
                 <i class="fa fa-angle-double-right"></i> <?= lang('customer_list');?></span>
               </a>
             </li> 


            </ul>
          </li>
          
         

        
      <?php endif; ?>

        <?php endif; ?> <!-- check empty phone, country -->


          <li class="<?= isset($page_title) && $page_title =="Statistics"?"active":""; ?>">
            <a href="<?= base_url('admin/restaurant/statistics?status=2') ?>">
              <i class="icofont-sound-wave fz-20"></i> <span><?= !empty(lang('statistics'))?lang('statistics'):"Statistics";?></span>
            </a>
          </li>

          <li class="<?= isset($page_title) && $page_title =="Payment History"?"active":""; ?>">
            <a href="<?= base_url('admin/restaurant/payment_history') ?>">
              <i class="fa fa-credit-card-alt"></i> <span><?= !empty(lang('payment_history'))?lang('payment_history'):"Payment History";?></span>
            </a>
          </li>


          

          <li class="<?= $page_title =="Profiles"?"active":"";?>">
            <a href="<?= base_url(html_escape($this->my_info['username'])); ?>">
              <i class="fa fa-eye"></i> <span><?= !empty(lang('view_shop'))?lang('view_shop'):"View Shop";?></span>
            </a>
          </li>

          

        <?php endif;?> <!-- is payment 1 -->
      <?php endif;?> <!-- end deactve -->
  <?php endif;?> <!-- end is_verify -->
    <?php if(!auth('is_staff')): ?>
        <?php if($this->my_info['is_deactived']==0): ?>
          <li class="<?= $page_title =="Deactive"?"active":"";?>">
            <a href="<?= base_url('admin/auth/deactive_account/1/'.html_escape($this->my_info['username'])); ?>" class="action_btn" data-msg="<?= lang('want_to_deactive_account'); ?>">
              <i class="fa fa-ban"></i> <span><?= !empty(lang('deactive_account'))?lang('deactive_account'):"Deactive Account";?></span>
            </a>
          </li>
        <?php else: ?> <!-- is_deactive -->
          <li class="<?= $page_title =="Deactive"?"active":"";?>">
            <a href="<?= base_url('admin/auth/deactive_account/0/'.html_escape($my_info['username'])); ?>" data-msg="<?= lang('want_to_active_account'); ?>" class="action_btn">
              <i class="fa fa-check"></i> <span><?= !empty(lang('active_account'))?lang('active_account'):"Active Account";?></span>
            </a>
          </li>
        <?php endif;?> <!-- deactive -->
    <?php endif;?>
<?php endif;?> <!-- end user role 0 -->

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <?php include 'waiter_notification.php'; ?>

     