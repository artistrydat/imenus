		</div> 
	</div> 
</div>
		
	<a href="<?php echo base_url() ?>" id="base_url"></a>
	<a href="<?php echo $this->security->get_csrf_hash(); ?>" id="csrf_value"></a>
	<?php $country_info = get_country(!empty($settings['country_id'])?$settings['country_id']:15); ?>
	<a href="<?= $country_info['code'];?>" id="code"></a>
	<a href="<?= $country_info['dial_code'];?>" id="dial_code"></a>
	<a href="<?= !empty(lang('yes'))?lang('yes'):"Yes";?>" id="yes"></a>
	<a href="<?= !empty(lang('no'))?lang('no'):"No";?>" id="no"></a>
	<a href="<?= !empty(lang('cancel'))?lang('cancel'):"cancel";?>" id="cancel"></a>
	<a href="<?= !empty(lang('are_you_sure'))?lang('are_you_sure'):"are you sure";?>" id="are_you_sure"></a>
	<a href="<?= !empty(lang('success'))?lang('success'):"Success";?>" id="success"></a>
	<a href="<?= !empty(lang('warning'))?lang('warning'):"Warning";?>" id="warning"></a>
	<a href="<?= !empty(lang('error'))?lang('error'):"error";?>" id="error"></a>
	<a href="<?= !empty(lang('success_text'))?lang('success_text'):'Save Change Successful';?>" id="success_msg"></a>
	<a href="<?= !empty(lang('error_text'))?lang('error_text'):'Somethings Were Wrong!';?>" id="error_msg"></a>
 	<!-- ==========
   		 Default Js
    =============== -->
    

    <script src="<?= base_url();?>assets/frontend/js/popper.min.js"></script>
    <script src="<?= base_url();?>assets/frontend/js/bootstrap.min.js" ></script>
    <?php if(direction()=='rtl'): ?>
	    <link rel="stylesheet" href="<?= base_url()?>assets/frontend/js/bootstrap-rtl.js">
	    <a href="javascript:;" data-id="rtl" id="rtl"></a>
	  <?php endif ?>
	 <?php if(isset($id)): ?>
	 <a href="javascript:;" data-id="<?=  is_xs($id);?>" id="is_xs"></a>
	<?php endif;?>
	<!-- ==========
   		End Default Js
    =============== -->

	<!-- parallax -->
		<script src="<?= base_url()?>assets/frontend/plugins/jstars.js"></script>
		<script src="<?= base_url()?>assets/frontend/plugins/parallax.js"></script>
	<!-- parallax -->


	<!--isotope-->
		<script src="<?= base_url()?>assets/frontend/plugins/isotope.pkgd.min.js"></script>
	<!-- isotope -->

	<!--venobox-->
		 <script src="<?= base_url()?>assets/frontend/plugins/venobox/venobox.min.js"></script>
	<!-- venobox -->

    <!-- slick slider js -->
	
		<script src="<?php echo base_url()?>assets/frontend/plugins/sweetalert/sweet-alert.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" ></script>
	<!-- slick slider js -->

	<!-- datetimepicker -->
		<script src="<?= base_url();?>assets/admin/bower_components/moment/min/moment.min.js" ></script>
		<script type="text/javascript"  src="<?= base_url();?>assets/frontend/plugins/datetime_picker/datetime.js" ></script>
	<!-- datetimepicker -->


	<!-- aos-animation -->
		<script src="<?= base_url();?>assets/frontend/plugins/animation/aos-animation.js" ></script>
	<!-- aos-animation -->



	<!-- wow -->
		<script src="<?= base_url();?>assets/frontend/plugins/animate/wow.js" ></script>
	<!-- wow -->

	<script src="<?php echo base_url()?>assets/admin/plugins/notify/notify.js"></script>

	<?php if(isset($page_title) && $page_title != "Checkout"):?>
		<!-- intelinput -->
		<script src="<?= base_url();?>assets/frontend/plugins/country/intelinput.js" ></script>
		<!-- intelinput -->
	<?php endif;?>

	<!-- appear -->
		<script src="<?= base_url();?>assets/frontend/plugins/jquery.appear.js" ></script>
		<script src="<?= base_url();?>assets/frontend/plugins/editableSelect/editableSelect.js" ></script>
	<!-- appear -->
		<script src="<?= base_url();?>assets/frontend/plugins/jquery.scrollTo.min.js" ></script>
		<script src="<?= base_url();?>assets/frontend/plugins/scroller.js" ></script>

	<!-- pwa config -->
	<?php if(check()==1): ?>
		<?php include 'pwa_footer_config.php'; ?>
	<?php endif ?>
	<!-- pwa config -->

	<?php if(isset($id)): ?>
		<?php $u_info = user_info_by_id($id); ?>
		<?php $shop = restaurant($id); ?>
		<script src="<?= base_url();?>assets/frontend/plugins/jquery.scrollTo.min.js" ></script>
		<div class="scroll-top">
			<a href="javascript:;" class="bounce"><i class="fa fa-chevron-up"></i></a>
		</div>
		<!-- restaurant country -->
		<?php $reg_country_info = get_country(!empty($shop->country_id)?$shop->country_id:15); ?>
		<a href="<?= $reg_country_info['code'];?>" id="reg_code"></a>
		<a href="<?= $reg_country_info['dial_code'];?>" id="reg_dial_code"></a>



		<?php $days = get_days();
		 $off_day = [];
		 ?>
	 <?php foreach ($days as $key => $day): 
	 	$my_days =$this->common_m->get_single_appoinment($key,$shop->id);
	 	if(isset($my_days['days']) && html_escape($my_days['days'])==$key){

	 	}else{
	 		$off_day[] = $key;
	 	}
 		endforeach ?>

 			<?php $time =$this->common_m->get_single_appoinment(date('w'),$shop->id); ?>
 			<?php if(!empty($time)): ?>
	 			<?php  
	 				$now = get_time();
	 				$start_time = isset($time['start_time'])? $time['start_time']:'';
	 				$end_time =  isset($time['end_time'])?$time['end_time']:"";
	 				if(isBetween($start_time,$end_time,$now)==1){
	 					$is_time = 0;
	 				}else{
	 					$is_time = 1;
	 				}

	 			?>

	 			<div class="close_time" data-id="<?=  $shop->id;?>" data-status='<?= isset($is_time)?$is_time:0 ;?>'></div>  

	 			<div class="off_days" data-id="<?=  $shop->id;?>" data-day='<?= json_encode($off_day) ;?>'></div> 
	 			
	 			<div class="off_time" data-id="<?=  $shop->id;?>" data-start="<?= isset($time['start_time'])?$time['start_time']:0;?>" data-end="<?= isset($time['end_time'])?$time['end_time']:0;?>"></div>

 			<?php endif;?>
 			
 			<?php $gmap_settings = !empty(settings()['gmap_config'])?json_decode(settings()['gmap_config']):'' ?>
			<?php 
				if((isset($shop->is_admin_gmap) && $shop->is_admin_gmap==1) && (!empty($gmap_settings->is_gmap_key) && $gmap_settings->is_gmap_key==1)):
					$gmap = !empty(settings()['gmap_config'])?json_decode(settings()['gmap_config']):'';
					$gmap_key = $gmap->gmap_key;
				elseif(isset($shop->is_gmap) && $shop->is_gmap ==1 && !empty($shop->gmap_key)):
					$gmap_key = $shop->gmap_key;
				else:
					$gmap_key = '';
				endif;
			?>

 			<!-- pickup point map -->
 			<?php if(isset($gmap_key) && !empty($gmap_key)): ?>
	 			<?php $this->load->view('layouts/pickup_point_map',['id' => $shop->id,'key' =>$gmap_key]); ?>
	 			<a href="<?= $gmap_key;?>" id="gmapKey" ></a>
	 			<script src="https://maps.googleapis.com/maps/api/js?key=<?=$gmap_key ;?>&libraries=places"></script>
	 			<script src="<?= base_url("assets/frontend/plugins/gmap.js");?>"></script>
	 		<?php endif; ?>
	 		<!-- pickup point map -->
	 		<?php if($u_info['is_active']==0 || $u_info['is_verify']==0 || $u_info['is_expired']==1 || $u_info['is_payment']==0 || $u_info['is_deactived']==1): ?>
				<?php include APPPATH.'views/frontend/inc/popupModal.php'; ?>
			<script>
				$(document).ready(function(){
					$('#popupModal').modal('show');
				});
				$('#popupModal').modal({
				  keyboard: false,
				  backdrop:'static'
				});
			</script>
		<?php endif ?>

	 		
	<?php endif;?>
	
	<?php include APPPATH.'views/frontend/inc/alertMsg.php' ?>

	<!-- main js -->
		<script src="<?= base_url();?>assets/frontend/js/plugins.js?v=<?= settings()['version'];?>&time=<?= time();?>" ></script>
		<script src="<?= base_url();?>assets/frontend/js/auth.js?v=<?= settings()['version'];?>&time=<?= time();?>" ></script>
		<script src="<?= base_url();?>assets/frontend/js/main.js?v=<?= settings()['version'];?>&time=<?= time();?>" ></script>
	<!-- main js -->
		<!--payment Modal -->
  
    </body>
</html>

<script type="text/javascript">
	window.addEventListener('DOMContentLoaded', (event) => {
		setTimeout(function(){ jQuery("#preloader").fadeOut('slow'); }, 1000);
    });
</script>


<script>
	/* Activate scrollspy menu */
     $('body').scrollspy({target: '#nav', offset: 100});
        
        /* Smooth scrolling */
      $('a.scrollto').on('click', function(e){
            //store hash
            var target = this.hash;    
            e.preventDefault();
        $('body').scrollTo(target, 800, {offset: 10, 'axis':'y'});
        
      });
</script>

<script>
	$(window).on('load', function(){
		setTimeout(function(){
			amarLeazyLoad();
			amarbgLoad();
		},500);

	});

	var amarbgLoad = function(){
		$('.bg_loader').each(function() {

			var lazy = $(this);
			var src = lazy.data('src');
			lazy.css("background-image", "url(" + src + ")");
			$('.bg_loader').removeClass('bg_loader');
		});
	}

	var amarLeazyLoad = function(){
		$('.img_loader').each(function() {
			var lazy = $(this);
			var src = lazy.data('src');
			lazy.attr('src', src);
			$('.img_loader').removeClass('.bg_loader');

		});
	}
</script>
	
<script>
	$(".background").parallaxify();

</script>

<?php if(isset($_GET['q']) && $_GET['q']=='table'): ?>
	<script>
		$(document).ready(function(){
			$('#waiterModal').modal('show');

		});
	</script>
<?php endif;?>

<div class="modal fade" id="tableModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?= $this->session->flashdata('msg'); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang('close'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- onSignal js  -->
<?php include 'onsignal_footer.php'; ?>