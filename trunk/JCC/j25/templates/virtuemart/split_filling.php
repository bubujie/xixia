<?php
$countCategories = count($this->categories);
$countFilling = $categories_per_row - $countCategories % $categories_per_row;
$endCategory = end($this->categories);

foreach ($this->categories as $category) :
//需要在foreach内部判断是否是最后一个row
if($category===$endCategory) :
	for($i = 1; $i <= $countFilling; $i++) :
		echo   "".'<div class="s-1-' . $categories_per_row . '"></div>';
	endfor;
endif;
endforeach;









$countProducts = count($this->productList);
$countFilling = $products_per_row - $countProducts % $products_per_row;
$endProduct = end($this->productList);
foreach ($this->productList as $product) :
//需要在foreach内部判断是否是最后一个row
if($product===$endProduct) :
	for($i = 1; $i <= $countFilling; $i++) :
		echo   "".'<div class="s-1-' . $products_per_row . '"></div>';
	endfor;
endif;
endforeach;









$countCategories = count($this->category->children);
$countFilling = $categories_per_row - $countCategories % $categories_per_row;
$endCategory = end($this->category->children);

foreach ($this->category->children as $category) :
//需要在foreach内部判断是否是最后一个row
if($category===$endCategory) :
	for($i = 1; $i <= $countFilling; $i++) :
		echo   "".'<div class="s-1-' . $categories_per_row . '"></div>';
	endfor;
endif;
endforeach;







$countProducts = count($this->products);
$countFilling = $BrowseProducts_per_row - $countProducts % $BrowseProducts_per_row;
$endProduct = end($this->products);
foreach ($this->products as $product) :
//需要在foreach内部判断是否是最后一个row
if($product===$endProduct) :
	for($i = 1; $i <= $countFilling; $i++) :
		echo   "".'<div class="s-1-' . $BrowseProducts_per_row . '"></div>';
	endfor;
endif;
endforeach;


?>
