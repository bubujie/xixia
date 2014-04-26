<?php
// Access
defined('_JEXEC') or die('Restricted access');

// Category and Columns Counter
$iCol = 1;
$iCategory = 1;

// Calculating Categories Per Row
$categories_per_row = VmConfig::get('homepage_categories_per_row', 3);
$category_cellwidth = ' width' . floor(100 / $categories_per_row);

// Separator
$verticalseparator = " vertical-separator";
?>

<div class="category-view">

    <h4><?php echo JText::_('COM_VIRTUEMART_CATEGORIES') ?></h4>

    <?php
    // Start the Output
$countCategories = count($this->categories);
$countFilling = $categories_per_row - $countCategories % $categories_per_row;
$endCategory = end($this->categories);
    foreach ($this->categories as $category) {

	// Show the horizontal seperator
	if ($iCol == 1 && $iCategory > $categories_per_row) {
	    ?>
	    <div class="horizontal-separator"></div>
	<?php
	}

	// this is an indicator wether a row needs to be opened or not
	if ($iCol == 1) {
	    ?>
	    <div class="row split">
	    <?php
	    }

	    // Show the vertical seperator
	    if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
		$show_vertical_separator = ' ';
	    } else {
		$show_vertical_separator = $verticalseparator;
	    }

	    // Category Link
	    $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id, FALSE);

	    // Show Category
	    ?>
    	<div class="category s-1-<?php echo $categories_per_row . $show_vertical_separator ?>">
    	    <div class="spacer">
    		<h2>
    		    <a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
    <?php echo $category->category_name ?>
    			<br />
	    <?php
	    if (!empty($category->images)) {
		echo $category->images[0]->displayMediaThumb("", false);
	    }
	    ?>
    		    </a>
    		</h2>
    	    </div>
    	</div>
	<?php
	$iCategory++;

	// Do we need to close the current row now?
if($category===$endCategory) :
	for($i = 1; $i <= $countFilling; $i++) :
		echo   "".'<div class="s-1-' . $categories_per_row . '"></div>';
	endfor;
endif;
	if ($iCol == $categories_per_row) {
	    ?>
		<?php //div class="clear"></div ?>
	    </div>
	<?php
	$iCol = 1;
    } else {
	$iCol++;
    }
}
// Do we need a final closing row tag?
if ($iCol != 1) {
    ?>
        <div class="clear"></div>
    </div>
    <?php
}
?>
</div>