<div class="pricing_3">
    <div class="row">
      <!-- Free Tier -->
      <?php foreach ($packages as $key => $package): ?>
      <div class="col-lg-4 col-sm-6">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center"><?= html_escape($package['package_name']);?></h5>
             <?php if($package['package_type']=='free'): ?>
                <h6 class="card-price text-center"><?= !empty(lang('free'))?lang('free'):'Free';?></h6>
            <?php elseif($package['package_type']=='trial'): ?>
                <h6 class="card-price text-center"><?= !empty(lang('free'))?lang('free'):'Free';?><span class="period">/<?= !empty(lang('month'))?lang('month'):'month';?></span></h6> 

            <?php elseif($package['package_type']=='weekly'): ?>
                <h6 class="card-price text-center"><?= !empty(lang('free'))?lang('free'):'Free';?><span class="period">/<?= !empty(lang('week'))?lang('week'):'week';?></span></h6>

            <?php elseif($package['package_type']=='fifteen'): ?>
                <h6 class="card-price text-center"><?= !empty(lang('free'))?lang('free'):'Free';?><span class="period">/<?= !empty(lang('15_days'))?lang('15_days'):'15 days';?></span></h6>
               
            <?php else: ?>
                <h6 class="card-price text-center"><?= get_currency('icon');?><?= html_escape($package['price']) ;?><span class="period">/<?= !empty(lang(strtolower(get_package_type($package['package_type']))))?lang(strtolower(get_package_type($package['package_type']))):get_package_type($package['package_type']);?></span></h6>
            <?php endif;?>
            <hr>
            <ul class="fa-ul">
                <?php foreach ($all_features as $key2 => $feature): ?>
                  <?php $feature_id = get_price_feature_id($feature['id'],$package['id']); ?>

                  <?php if(LICENSE == '6fa1b959a5580d843a4ea03422873009' && $feature['slug'] == 'online-payment'): ?>
                  <?php else: ?>
                  <?php if(isset($feature_id['feature_id']) && $feature_id['feature_id']==$feature['id']): ?>
                     <li><span class="fa-li"><i class="fas fa-check c_green"></i></span> <?= html_escape($feature['features']);?> <?= html_escape($feature['slug'])=='menu'?' <b>('.limit_text($package['item_limit']).' '. lang('items').') </b>':'' ;?>  <?= html_escape($feature['slug'])=='order'?' <b>('.limit_text($package['order_limit']).') </b>':'' ;?></li>
                     <?php else: ?>
                        <li class="text-muted"><span class="fa-li"><i class="fas fa-times c_red"></i></span> <?= html_escape($feature['features']);?> <?= html_escape($feature['slug'])=='menu'?' <b>('.limit_text($package['item_limit']).' '. lang('items').') </b>':'' ;?>  <?= html_escape($feature['slug'])=='order'?' <b>('.limit_text($package['order_limit']).') </b>':'' ;?></li>
                     <?php endif;?>
                 <?php endif;?>

                <?php endforeach ?>
            </ul>
            <a href="<?= base_url('signup-'.$package['slug']) ;?>" class="btn btn-block btn-primary text-uppercase price_btn"><?= !empty(lang('select_package'))?lang('select_package'):'Select Package' ;?></a></a>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
    </div>
</div>