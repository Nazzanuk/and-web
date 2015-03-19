//----------------------------------------------------------------------------------------------------
//page
//----------------------------------------------------------------------------------------------------
var Page = {};

Page.isTabletOrPhone = function() {
	return Site.hasMediaQueries && $(window).width() < 700;
}

Page.init = function() {
	// when media query is not available, the page is not responsive at all 
    
	if(Site.hasMediaQueries){
		Page.mode = "DESKTOP";

		Page.resize();
        
		// we initialize the proper event handlers
		$('.service-row').each(function(index, element) {
			$(element).attr('index', index);
			$(element).find('a').click(function(e) {
				var rowElement = $(this).parent();
				var selectedIndex = new Number(rowElement.attr('index'));
				if (!Page.isTabletOrPhone()) {
					if (!rowElement.hasClass('selected')) {
						$('.service-row').each(function(index, element) {
							$(element).removeClass('selected');
						});
						$('.service-image').each(function(index, element) {
							$(element).fadeOut();
						});
						rowElement.addClass('selected');
						$('.service-icon').css('top', rowElement.position().top + 38);
						var imageElement = $('.service-image').get(selectedIndex);
						$(imageElement).delay(400).fadeIn();
						$('.service-text').each(function(index, element) {
							if (index == selectedIndex) { //if selected
								$(element).stop().animate({'margin-top': 0}, {duration: 500});
							} else {
								$(element).stop().animate({'margin-top': -500}, {duration: 500});
							}
						});
					}
				} else {
					var expand = false;
					if (rowElement.hasClass('expanded')) {
						rowElement.removeClass('expanded');
					} else {
						rowElement.addClass('expanded');
						expand = true;
					}
					var textElement = $('.service-text').get(selectedIndex);
					if (expand) {
						var clone = $(textElement).clone();
						$(clone).css('height', 'auto');
						$(clone).css('width', '100%');
						$(clone).css('display', 'block');
						
						$(clone).removeClass('service-text');
						rowElement.find('.service-collapse-text').empty();
						rowElement.find('.service-collapse-text').append($(clone));
						rowElement.stop().animate({'height': rowElement.find('.service-collapse-text').height() + 80}, {duration: 250});
					} else {
						rowElement.find('.service-collapse-text').empty();
						rowElement.stop().animate({'height': 80}, {duration: 250});
					}
				}
				return false;
			});
            //console.log(index);
		});

		// we initialize the proper event handlers
		$('.collapse-row').each(function(index, element) {
			$(element).find('a.column-anchor').click(function(e) {
				var rowElement = $(this).parent();
				if (!rowElement.hasClass('expanded')) {
					rowElement.addClass('expanded');
					rowElement.find('.collapse-text').each(function(index, element) {
						if (Page.isTabletOrPhone()) {
							var height = $(element).attr('defaultHeight');
							$(element).animate({'height': height + 'px'});
						}
					});
					if (Page.isTabletOrPhone()) {
						Site.scrollToHeader({targetElement:rowElement,offset:0});
					}
				} else {
					rowElement.removeClass('expanded');
					rowElement.find('.collapse-text').each(function(index, element) {
						if (Page.isTabletOrPhone()) {
							$(element).animate({'height': '0px'});
						}
					});
					if (Page.isTabletOrPhone()) {
						Site.scrollToHeader({targetElement:rowElement,offset:0});
					}
				}
				return false;
			});
		});
	}
}

Page.resize = function() {
	// when media query is not available, the page is not responsive at all 
	if(Site.hasMediaQueries){
		if (!Page.isTabletOrPhone()) {
			var parWidth = $('#academy-rows .academy-images').width();
			var width = Math.floor((parWidth - 4) / 3);	
			$('#academy-rows .academy-images .academy-img').css('width', width);
			var left = Math.round((parWidth - 3 * width) / 2);
			$('#academy-rows .academy-images .middle-image').css('margin-left', left + "px");
		} else {
			$('#academy-rows .academy-img').css('width', '100%');
			$('#academy-rows .academy-img').css('margin-left', '0');
		}
		
		if (!Page.isTabletOrPhone()) {
			Page.mode = "DESKTOP";
		} else {
			Page.mode = "MOBILE";
		}
		
		if (Page.mode != Page.previousMode) {
			Page.previousMode = Page.mode;
			$('.service-row').each(function(index, element) {
				$(element).removeClass('selected');
			});
			if (!Page.isTabletOrPhone()) {
				$('.service-row:first-child').addClass('selected');
			}
			// we have to reset the state of every collapsable element
			$('.collapse-row').each(function(index, element) {
				$(element).removeClass('expanded');
			});
		}
		
		if (!Page.isTabletOrPhone()) {
			$('.service-collapse-text').empty();
			$('.service-collapse-text').css('display', 'none');
			$('.service-icon').css('display', 'block');
			$('.service-row').each(function(index, element) {
				$(element).css('height', 100);
			});
			$('.service-image').each(function(index, element) {
				$(element).css('display', 'none');
			});
			$('.service-text').each(function(index, element) {
				$(element).css('display', 'block');
				//$(element).css('margin-left', -Site.width);
			});
		} else {
			$('.service-collapse-text').css('display', 'block');
			$('.service-icon').css('display', 'none');
			$('.service-text').css('display', 'none');
			$('.service-image').each(function(index, element) {
				$(element).css('display', 'none');
			});
			$('.service-row').each(function(index, element) {
				$(element).css('height', 80);
			});
		}
		
		$('.service-row').each(function(index, element) {
			var rowElement = $(element);
			if (!Page.isTabletOrPhone()) {
				if (rowElement.hasClass('selected')) {
					$('.service-icon').css('top', rowElement.position().top + 38);
					var textElement = $('.service-text').get(index);
					
					var imageElement = $('.service-image').get(index);
					$(imageElement).css('display', 'block');
				}
                $('.service-text').each(function(index, element) {
                    if (index == 0) { //if selected
                        $(element).css('margin-top', 0);
                    } else {
                        $(element).css('margin-top', -500);
                    }
                });
			} else {
				if (rowElement.hasClass('expanded')) {
					var textElement = $('.service-text').get(index);
					var clone = $(textElement).clone();
					$(clone).css('height', 'auto');
					$(clone).css('width', '100%');
					$(clone).css('display', 'block');
					
					$(clone).css('margin-top', 0);
					$(clone).removeClass('service-text');
					rowElement.find('.service-collapse-text').empty();
					rowElement.find('.service-collapse-text').append($(clone));
					rowElement.css('height', rowElement.find('.service-collapse-text').height() + 80);
				} else {
					rowElement.find('.service-collapse-text').empty();
					rowElement.css('height', 80);
                    $('.service-text').each(function(index, element) {
                        $(element).css('margin-top', 0);
                    });
				}
			}
		});

		// we have to recalculate the correct height of the text after that user resized the window
		$('.collapse-text').each(function(index, element) {
			var clone = $(element).clone();
			$(clone).css('height', 'auto');
			$(element).parent().append(clone);
			$(element).remove();
			var height = $(clone).height();
			$(clone).attr('defaultHeight', height);
			if (Page.isTabletOrPhone()) {
				if (!$(clone).parent().hasClass('expanded')) {
					$(clone).css('height', '0px');
				}
			} else {
//				var height = $(clone).attr('defaultHeight');
//				$(clone).css('height', height + 'px');
			}
		});
	}

	//definition of digital
	var dod = {};
	dod.background = {};
	dod.background.element = $('.dod .background-image');
	dod.background.left = Math.round((Site.width - dod.background.element.width()) / 2);
	dod.background.element.css('left',dod.background.left)

	dod.text = {};
	dod.text.element = $('.dod .text');
	dod.text.left = Math.round((Site.width - dod.text.element.width()) / 2);
	if(Site.width <= 700){
		dod.text.left = 0;
	}

	dod.text.element.css('left',dod.text.left)

	//academy
	var academy = {};
	academy.title = {};
	academy.title.element = $('#academy #academy-title');
	academy.title.left = (Site.width - academy.title.element.width()) / 2;
//	academy.title.top = Math.round((($('#academy #academy-feature #academy-image').height() - academy.title.element.height()) / 2) - 30);

//	academy.title.element.css('left',academy.title.left);
//	academy.title.element.css('top',academy.title.top);
//	academy.title.element.css('opacity',1);
	
	if(Site.hasMediaQueries){
		if (Page.isTabletOrPhone()) {
			$('.academy-video .vimeo').css('width', $('.academy-video').parent().width() + 'px');
			$('.academy-video .vimeo').css('height', Math.round($('.academy-video').parent().width() * (200.0 / 360.0)) + 'px');
		} else {
			$('.academy-video .vimeo').css('width', 500 + 'px');
			$('.academy-video .vimeo').css('height', Math.round(500 * (200.0 / 360.0)) + 'px');
		}
	}

	if (!Page.isTabletOrPhone()) {
		var maxHeight = 0;
		$(".column .button").each(function(index, element) {
			$(element).css('margin-top', 0); 
		});
		$(".column").each(function(index, element) {
			if ($(element).height() > maxHeight) {
				maxHeight = $(element).height();
			}
		});
		$(".column").each(function(index, element) {
			$(element).find('.button').css('margin-top', maxHeight - $(element).height()); 
		});
	} else {
		$(".column .button").each(function(index, element) {
			$(element).css('margin-top', 0); 
		});
	}
}

//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$(function(){
	Page.init();

	$(window).resize(function(){
		Page.resize();
	});
});
