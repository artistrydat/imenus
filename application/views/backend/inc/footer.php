  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php if (isset($page_title) && $page_title !="Admin Login") {?>
<footer class="main-footer">
    <strong><?= !empty(lang('copyright'))?lang('copyright'):"Copyright" ;?> &copy; <?php echo date('Y'); ?>
    <strong class="pull-right"><?= lang('version'); ?> <?= settings()['version'];?></strong>
  </footer>
<?php } ?>  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<a href="<?php echo base_url() ?>" id="base_url"></a>
<a href="<?php echo $this->security->get_csrf_hash(); ?>" id="csrf_value"></a>
<a href="<?php echo $this->security->csrf_token(); ?>" id="csrf_data"></a>

<a href="<?= !empty(lang('yes'))?lang('yes'):"Yes";?>" id="yes"></a>
<a href="<?= !empty(lang('no'))?lang('no'):"No";?>" id="no"></a>
<a href="<?= !empty(lang('cancel'))?lang('cancel'):"cancel";?>" id="cancel"></a>
<a href="<?= !empty(lang('are_you_sure'))?lang('are_you_sure'):"are you sure";?>" id="are_you_sure"></a>
<a href="<?= !empty(lang('success'))?lang('success'):"Success";?>" id="success"></a>
<a href="<?= !empty(lang('warning'))?lang('warning'):"Warning";?>" id="warning"></a>
<a href="<?= !empty(lang('error'))?lang('error'):"error";?>" id="error"></a>
<a href="<?= !empty(lang('success_text'))?lang('success_text'):'Save Change Successful';?>" id="success_msg"></a>
<a href="<?= !empty(lang('error_text'))?lang('error_text'):'Somethings Were Wrong!';?>" id="error_msg"></a>
<a href="<?= !empty(lang('item_deactive_now'))?lang('item_deactive_now'):'Item is deactive now';?>" id="item_deactive"></a>
<a href="<?= !empty(lang('item_active_now'))?lang('item_active_now'):'Item is active now';?>" id="item_active"></a>
<a href="<?= !empty(lang('want_to_reset_password'))?lang('want_to_reset_password'):'Want to reset password?';?>" id="want_to_reset_password"></a>

<?php if(LICENSE!=MY_LICENSE): ?>
      
  <style>
    .card.stripe_fpx, .mercado, .flutterwave, .paystack, .paytm{
      display:none!important;
      visibility: hidden!important;
      opacity:0!important;
    }
  </style>
        
 <?php endif;?>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url()?>assets/admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/bower_components/morris.js/morris.min.js"></script>

<!-- select2 -->
<script src="<?php echo base_url()?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/admin/plugins/chart/jquery.flot.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/canvas.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/chart/jquery.flot.categories.min.js"></script>


<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/admin/bower_components/moment/min/moment.min.js"></script>

<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap color picker -->
<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- datetime picker.js -->
<script src="<?php echo base_url()?>assets/admin/datetime/datetimepicker.js"></script>


<!-- time picker.js -->
<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- datepicker -->
<script src="<?php echo base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url()?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url()?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url()?>assets/frontend/plugins/sweetalert/sweet-alert.js"></script>

<?php if(isset($page_title) && $page_title=="Qr Builder" || $page_title=="Table Qr Builder"): ?>
  <script src="<?php echo base_url()?>assets/admin/plugins/jqueryqr/pickr.js"></script>
  <script src="<?php echo base_url()?>assets/admin/plugins/jqueryqr/jqueryqr.js"></script>
  <script src="<?php echo base_url()?>assets/admin/plugins/jqueryqr/active_pickr.js"></script>
   <script src="<?php echo base_url()?>assets/admin/plugins/jqueryqr/qrscripts.js"></script>
<?php endif ?>

<!-- FastClick -->
<script src="<?php echo base_url()?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- summernote -->
<script src="<?php echo base_url()?>assets/admin/plugins/summernote/summernote-bs4.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/tag_inputs/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/iconpicker/bootstrap-iconpicker.bundle.min.js"></script>
<!-- Image Uploader -->
<script src="<?php echo base_url()?>assets/admin/uploader/uploadify.js"></script>

<!-- chosen -->
<script src="<?php echo base_url()?>assets/admin/plugins/chosen/chosen.jquery.js"></script>
<script src="<?= base_url();?>assets/frontend/plugins/animate/wow.js" ></script>
<!-- notify -->
<script src="<?php echo base_url()?>assets/admin/plugins/notify/notify.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/formValidation.js"></script>

<script>$.fn.slider = null</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js"></script>


<?php if(isset($page_title) && $page_title=='Stripe Payment'): ?>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<?php endif;?>
<?php if(isset($page_title) && $page_title=='Payment Method'): ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php endif;?>

<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/admin/bootstrapToggle.js"></script>
<script src="<?php echo base_url()?>assets/admin/dist/js/demo.js?v=<?= settings()['version'];?>&time=<?= time();?>"></script>

<?php if(isset($page) && $page !="KDS"): ?>
  <script src="<?php echo base_url()?>assets/admin/main.js?v=<?= settings()['version'];?>&time=<?= time();?>"></script>
 
<?php endif;?>

<?php if(auth('is_user')==TRUE): ?>
  <script src="<?php echo base_url()?>assets/admin/notify.js?v=<?= settings()['version'];?>&time=<?= time();?>"></script>
<?php endif; ?>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
           format:'YYYY-MM-DD HH:mm:ss',
        });
    });

  $(function(){
      function load_image(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#preview_load_image').attr('src', e.target.result);
              $('#preview_load_image').removeClass('opacity_0');
              $('.preview_load_image, .view_img').show();
              $('.preview_load_image').hide();
              $('.img_text, .view_img ').hide();
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      $(document).on('change','#load_image',function($){
        load_image(this);
      });
  });
</script>
<?php if(isset($page_title) && $page_title=="Dashboard"): ?>
<script>
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [
        <?php foreach (get_month() as $key => $value): ?>
          ["<?= $value ;?>", <?= income($key,0);?>], 
        <?php endforeach; ?>
      ],
      color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
</script>
<?php if(USER_ROLE==0): ?>
<script>

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainers", {
  backgroundColor: "#fff ",
  animationEnabled: true,
  theme: "light2",
  title:{
    text: ""
  },
  data: [{        
    type: "line",
        indexLabelFontSize: 16,
    dataPoints: [
    <?php foreach (get_month() as $key => $value): ?>
      { y: <?= user_income($key,0);?>,label:"<?= $value ;?>"},
    <?php endforeach; ?>
    ]
  }]
});
chart.render();

}


  
</script>
<?php endif;?>
<?php endif; ?>


  <?php if ($this->session->flashdata('success')) { ?>
      <span id="alert_title" data-msg="<?= !empty(lang('success'))?lang('success'):"Success";?>!"></span>
      <span id="alert" data-msg="<?php echo $this->session->flashdata('success'); ?>"></span>
      <script>
        $.notify({
            icon: 'fa fa-check',
            title: $('#alert_title').data('msg'),
            message:$('#alert').data('msg')
          },{
            type: 'success'
          },{
              animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
              }
          });
      </script>
    <?php } ?>
     <?php if ($this->session->flashdata('error')) { ?>
      <span id="alert_title" data-msg="<?= !empty(lang('error'))?lang('error'):"Error";?>!!"></span>
       <span id="alert" data-msg="<?php echo $this->session->flashdata('error'); ?>"></span>
          <script>
              $.notify({
                icon: 'fa fa-close',
                  title: $('#alert_title').data('msg'),
                  message:$('#alert').data('msg')
                },{
                  type: 'danger'
              },{
                animate: {
                  enter: 'animated fadeInRight',
                  exit: 'animated fadeOutRight'
                }
              });
      </script>
    <?php } ?>


    <?php include APPPATH."views/frontend/inc/onsignal_footer.php"; ?>
</body>
</html>




<script>
  
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
<?php if(isset($page_title) && $page_title !='Edit profile' && isset($page_title) && $page_title !='Restaurant Configuration' && isset($page_title) && $page_title !='Profile'): ?>
  <?php include "alertModal.php"; ?>
<?php endif;?>