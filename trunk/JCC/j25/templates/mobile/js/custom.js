// JavaScript Document
jQuery(document).ready(function($) {//or jQuery(function($) {
	var $n1=280;
	var $n2=280;
	var $space=20;
	$('<div id="frame_switch1" class="bgc8"><span class="opened d_b">Side1 Toggle</span></div>').prependTo('#bbody-mid .wing');
	$side1_switcher = $('#frame_switch1 span');
	$side1_switcher.click(function(){
	$switch_item1 = $('.rowo>.nm,.rowo>.nmn');
		if($side1_switcher.hasClass('opened')){
			$switch_item1.animate({'marginLeft':'+='+($n1+$space)+'px','marginRight':'-='+($n1+$space)+'px'}, 'normal',function(){
				$side1_switcher.addClass('closed');
			}).parent().animate({'backgroundPosition':'+='+($n1+$space)+'px'}, 'normal'),
			$side1_switcher.removeClass('opened').parent();
		}else if($side1_switcher.hasClass('closed')){
			$switch_item1.animate({'marginLeft':'-='+($n1+$space)+'px','marginRight':'+='+($n1+$space)+'px'}, 'normal',function(){
				$side1_switcher.addClass('opened');
			}).parent().animate({'backgroundPosition':'-='+($n1+$space)+'px'}, 'normal');
			$side1_switcher.removeClass('closed');
		}
	});
	/*
	$('<div id="frame_switch2" class="bgc8"><span class="opened d_b">Side2 Toggle</span></div>').prependTo('#bbody-mid .wing');
	$side2_switcher = $('#frame_switch2 span');
	$side2_switcher.click(function(){
		if($side2_switcher.hasClass('opened')){
			$('.rowo .mn,.rowo .nmn').animate({'marginLeft':'-='+($n2+$space)+'px','marginRight':'+='+($n2+$space)+'px'}, 'normal',function(){
				$side2_switcher.addClass('closed');
			}),
			$side2_switcher.removeClass('opened');
		}else if($side2_switcher.hasClass('closed')){
			$('.rowo .mn,.rowo .nmn').animate({'marginLeft':'+='+($n2+$space)+'px','marginRight':'-='+($n2+$space)+'px'}, 'normal',function(){
				$side2_switcher.addClass('opened');
			});
			$side2_switcher.removeClass('closed');
		}
	});
	*/
});
/*
var category = $('category_box');

category.getElements('.category-item').addEvents({
    'mouseover':function(e){
        var self = this;
        clearTimeout(this.showTimer);
        clearTimeout(this.hideTimer);
        var active = function(){
            if(self.getElement('.sub-box')){
                self.addClass('active');
            }
        }
        this.showTimer = active.delay(100);
    },
    'mouseout':function(e){
        var self = this;
        clearTimeout(this.showTimer);
        clearTimeout(this.hideTimer);
        var active = function(){
            if(self.getElement('.sub-box')){
                self.removeClass('active');
            }
        }
        this.hideTimer = active.delay(100);
    }
});

var $qqwp = $('qqwp');
function qqOnline() {
	var myScript = Asset.javascript('http://webpresence.qq.com/getonline?Type=1&' + qqIds + ':', {
		onLoad: function(){
			//alert('myScript.js is loaded!' + online[2]);
			var qqImg  = '';
			var qqHtml = '';
			for (var i=0 ; i < qqArray.length ; i++) {
				var qqId = qqArray[i];
				if (online[i] == 1) {
					qqImg = qqOnImg;
				} else {
					qqImg = qqOffImg;
				};
				qqHtml += '<a href="http://wpa.qq.com/msgrd?v=3&uin=' + qqId + '&site=qq&menu=yes" target="_blank"><img style="border:0;" src="' + qqImg + '" alt="点击这里给我发消息" title="点击这里给我发消息" />' + qqId + '</a><br />';
			}
			document.write(qqHtml);
			//$qqwp.set('html',qqHtml);
			qqHtml.getFirst().replaces($qqwp);
		}
	});
	//setTimeout("qqOnline()", 10000);
}
//setInterval("qqOnline()", 500);
qqOnline();
*/