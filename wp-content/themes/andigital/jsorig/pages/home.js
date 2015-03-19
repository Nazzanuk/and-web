Quote.videoWidth = 360.0;
Quote.videoHeight = 203.0;
//----------------------------------------------------------------------------------------------------
//page
//----------------------------------------------------------------------------------------------------
var Page = {};

function isTabletOrPhone() {
	return Site.hasMediaQueries && $(window).width() < 750;
}

Page.resize = function() {
	if (!isTabletOrPhone()) {
		var parWidth = $('#home-pages').width();
		var width = Math.floor((parWidth - 4) / 3);	
		$('#home-pages .page-column').css('width', width);
		var left = Math.round((parWidth - 3 * width) / 2);
		$('#home-pages .middle-column').css('margin-left', left + "px");
	} else {
		$('#home-pages .page-column').css('width', '100%');
		$('#home-pages .page-column').css('margin-left', '0');
	}

	if (!isTabletOrPhone()) {
		var maxHeight = 0;
		$(".page-column .button").each(function(index, element) {
			$(element).css('margin-top', 0); 
		});
		$(".page-column").each(function(index, element) {
			if ($(element).height() > maxHeight) {
				maxHeight = $(element).height();
			}
		});
		$(".page-column").each(function(index, element) {
			$(element).find('.button').css('margin-top', maxHeight - $(element).height()); 
		});
	} else {
		$(".page-column .button").each(function(index, element) {
			$(element).css('margin-top', 0); 
		});
	}
};
	
//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$(function(){
	Page.resize();
	//resize
	$(window).resize(function(){
		Page.resize();
	});
});