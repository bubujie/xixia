jQuery(document).ready(function ($) {
	var menu = $('.dropmenu');
	menu.find('li>ul').parent().addClass('deeper');
	menu.find('ul>li:last-child').addClass('last');
	//menu.find('li>ul:hidden').parent('li').prepend(menuPlus);
	//menu.find('li>ul:visible').parent('li').prepend(menuMinus);
	/*
	menu.find('li.active').addClass('open').parents('li').addClass('open');
	menu.find('li.open').parents('li').addClass('open');
	menu.find('li.open>.menuToggle').text('-').removeClass('plus').addClass('minus');
	menu.find('li.open>ul').slideDown(100);
	*/
	menu.find('.deeper').mouseenter(function(){
		e = $(this);
		e.addClass('childshow').find('>ul').addClass('show');
	}).mouseleave(function(){
		e = $(this);
		e.romoveClass('childshow').find('>ul').removeClass('show');
	})
})
