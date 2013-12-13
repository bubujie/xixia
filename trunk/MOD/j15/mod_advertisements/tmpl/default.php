<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div class="advertisementgroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">

<?php if ($headerText) : ?>
	<div class="advertisementheader"><?php echo $headerText ?></div>
<?php endif;

foreach($list as $item) :

	?><div class="advertisementitem<?php echo $params->get( 'moduleclass_sfx' ) ?>"><?php
	echo modAdvertisementsHelper::renderBanner($params, $item);
	?><div class="clr"></div>
	</div>
<?php endforeach; ?>

<?php if ($footerText) : ?>
	<div class="advertisementfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
<?php endif; ?>
</div>