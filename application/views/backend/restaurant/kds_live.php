<div class="section_kds">
  <div class="container-fluid">
    <div class="shop_area">
      <div class="shopName">
          <img src="<?= base_url($shop['thumb']) ;?>" alt="<?=  $shop['thumb'];?>" class="shopImg">
          <h4><?= !empty($shop['name'])?$shop['name']:$shop['username'] ;?></h4>
          <p><?= $shop['currency_code'] ;?> (<?= $shop['icon'] ;?>)</p>
      </div>
      <div id="kdsView">
        <div class="view_kds" >
          <?php include 'kds_details.php'; ?>
        </div>
      </div>
    </div>
  </div>

</div>
<a href="<?php echo base_url() ?>" id="base_url"></a>
<a href="<?php echo $this->security->get_csrf_hash(); ?>" id="csrf_value"></a>
<a href="<?php echo $id; ?>" id="id"></a>
<script src="<?php echo base_url()?>assets/admin/kds.js?v=<?= settings()['version'];?>&time=<?= time();?>"></script>


