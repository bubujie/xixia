<?php echo $header; ?><div class="filling <?php if(trim($column_left)!=''){ echo 'n'; } ?>m<?php if(trim($column_right)!=''){ echo 'n'; } ?>"><?php echo $column_left; ?>
<div id="content" class="ming"><?php echo $content_top; ?><div class="wing">
<h1 style="display: none;"><?php echo $heading_title; ?></h1>
</div><?php echo $content_bottom; ?></div><?php echo $column_right; ?></div>
<?php echo $footer; ?>