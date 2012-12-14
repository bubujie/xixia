<?php echo $header; ?><div class="filling <?php if(trim($column_left)!=''){ echo 'n'; } ?>m<?php if(trim($column_right)!=''){ echo 'n'; } ?>"><?php echo $column_left; ?>
<div id="content" class="ming"><?php echo $content_top; ?><div class="wing">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>
  <div class="content"><?php echo $text_error; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  </div><?php echo $content_bottom; ?></div><?php echo $column_right; ?></div>
<?php echo $footer; ?>