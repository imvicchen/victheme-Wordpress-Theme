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