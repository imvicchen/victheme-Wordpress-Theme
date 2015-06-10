$(document).ready(function() {
	//初始窗体尺寸，监控窗体变化事件
	$(window).resize();
});
$(window).resize(function() {
	var bodyHeight = $(document.body).height();
	var winHeight = $(window).height();
	if (bodyHeight <= winHeight) {
		$('.vc-footer').addClass('vc-fixed');
	} else {
		$('.vc-footer').removeClass('vc-fixed');
	}
});
//GO TOP
$(function(){
		showScroll();
		function showScroll(){
			$(window).scroll( function() { 
				var scrollValue=$(window).scrollTop();
				scrollValue > 100 ? $('div[class=backtop]').fadeIn():$('div[class=backtop]').fadeOut();
			} );	
			$('div[class=backtop]').click(function(){
				$("html,body").animate({scrollTop:0},200);	
			});	
		}
	})