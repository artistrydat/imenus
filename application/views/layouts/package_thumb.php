<div class="homeSingle_packages">
	<div class="packageImg img menu-img" style="background: url(<?= base_url($item['item_thumb'])?>);"></div>
	<div class="singleItemDetails homePackages">
		<div class="topPackageItem lineTitle">
			<h4><?= html_escape($item['title']) ;?> <?php if(isset($item['veg_type']) && $item['veg_type'] !=0): ?> <i class="fa fa-circle veg_type <?= $item['veg_type']==1?'c_green':'c_red';?>" data-placement="top" data-toggle="tooltip" title="<?= veg_type($item['veg_type']);?>"></i><?php endif;?></h4>
			<p><?= currency_position($item['item_price'],$shop_id); ?></p>
		</div>
		<p><?= character_limiter(html_escape($item['overview']),52) ;?></p>
		<div class="p-0">
			<p>
				<?php if(!empty($item['allergen'])): ?>
					<span class="capital fz-13"><?= !empty(lang('allergens'))?lang('allergens'):'allregens' ;?>: <?= html_escape($item['allergen']) ;?></span>
				<?php endif;?>
			</p>
		</div>
	</div>
</div>
