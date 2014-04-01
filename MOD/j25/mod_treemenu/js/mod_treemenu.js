jQuery(function($){
	// Tree Navigation
	var treemenu = $('.treemenu');
	var treemenuPlus = '\<button type=\"button\" class=\"treemenuToggle plus\"\>+\<\/button\>';
	var treemenuMinus = '\<button type=\"button\" class=\"treemenuToggle minus\"\>-\<\/button\>';
	treemenu.find('li>ul').css('display','none');
	treemenu.find('ul>li:last-child').addClass('last');
	treemenu.find('li>ul:hidden').parent('li').prepend(treemenuPlus);
	treemenu.find('li>ul:visible').parent('li').prepend(treemenuMinus);
	treemenu.find('li.active').addClass('open').parents('li').addClass('open');
	treemenu.find('li.open').parents('li').addClass('open');
	treemenu.find('li.open>.treemenuToggle').text('-').removeClass('plus').addClass('minus');
	treemenu.find('li.open>ul').slideDown(100);
	$('.treemenu .treemenuToggle').click(function(){
		t = $(this);
		t.parent('li').toggleClass('open');
		if(t.parent('li').hasClass('open')){
			t.text('-').removeClass('plus').addClass('minus');
			t.parent('li').find('>ul').slideDown(100);
		} else {
			t.text('+').removeClass('minus').addClass('plus');
			t.parent('li').find('>ul').slideUp(100);
		}
		return false;
	});
	$('.treemenu a[href=#]').click(function(){
		t = $(this);
		t.parent('li').toggleClass('open');
		if(t.parent('li').hasClass('open')){
			t.prev('button.treemenuToggle').text('-').removeClass('plus').addClass('minus');
			t.parent('li').find('>ul').slideDown(100);
		} else {
			t.prev('button.treemenuToggle').text('+').removeClass('minus').addClass('plus');
			t.parent('li').find('>ul').slideUp(100);
		}
		return false;
	});
});