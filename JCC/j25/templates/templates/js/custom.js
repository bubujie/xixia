// JavaScript Document

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