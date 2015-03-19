//----------------------------------------------------------------------------------------------------
//page
//----------------------------------------------------------------------------------------------------
Vimeo.width = 360.0;
Vimeo.height = 203.0;
Vimeo.scaledWidth = 499.0;

var Page = {};

Page.isTabletOrPhone = function() {
	return Site.hasMediaQueries && $(window).width() < 750;
}

Page.init = function() {
    $('.graduatetab').click(Page.show);
    $('.experiencedtab').click(Page.hide);
	// when media query is not available, the page is not responsive at all 
	if(Site.hasMediaQueries){
		Page.mode = "DESKTOP";

		// we initialize the collapsable elements
		Page.resize();
		
		// we initialize the proper event handlers
		$('.collapse-row').each(function(index, element) {
			$(element).find('a').click(function(e) {
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
						Site.scrollToHeader({targetElement:rowElement,offset:-25});
					}
				} else {
					rowElement.removeClass('expanded');
					rowElement.find('.collapse-text').each(function(index, element) {
						if (Page.isTabletOrPhone()) {
							$(element).animate({'height': '0px'});
						}
					});
					if (Page.isTabletOrPhone()) {
						Site.scrollToHeader({targetElement:rowElement,offset:-25});
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
			Page.mode = "DESKTOP";
		} else {
			Page.mode = "MOBILE";
		}
		
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
				var height = $(clone).attr('defaultHeight');
				$(clone).css('height', height + 'px');
			}
		});
		
		if (Page.mode != Page.previousMode) {
			Page.previousMode = Page.mode;
			
			// we have to reset the state of every collapsable element
			$('.collapse-row').each(function(index, element) {
				$(element).removeClass('expanded');
			});
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	//Our Process
	//----------------------------------------------------------------------------------------------------
	    
	    process = {};
		process.background = {};
		process.background.element = $('#charter-rows .charter-images .charter-background-image-1');
	    process.text = {};
		process.text.element = $('#charter-rows h2');
	    
	    process.rows = {}
	    process.rows.element = $('#charter-rows .charter-row');
	    
	    //process.background.element.css('height',process.text.element.height() + (process.rows.element.height() * 2));
		//process.background.element.css('width', Site.width/2);

	//----------------------------------------------------------------------------------------------------
	//Benefits
	//----------------------------------------------------------------------------------------------------
	    benefits = {};
		benefits.background = {};
		benefits.background.element = $('#benefit-columns .benefit-images .benefit-background-image-1');  

	    
	    

	    
	//----------------------------------------------------------------------------------------------------
	//Academy Introduction
	//----------------------------------------------------------------------------------------------------
		var academy = {};
		academy.background = {};
		academy.background.element = $('.text-1 .background-image');
		academy.background.left = (Site.width - academy.background.element.width()) / 2;
		academy.background.element.css('left',academy.background.left)

		academy.text = {};
		academy.text.element = $('.text-1 .paragraph');
		academy.text.left = (Site.width - academy.text.element.width()) / 2;
		if(Site.width <= 700){
			academy.text.left = 0;
		}

		academy.text.element.css('left',academy.text.left);  
	
}

Page.show = function(){
	$('.join-us-column1').addClass('visible');
	$('.join-us-column2').removeClass('visible');
    
    $('.join-background-image-1').addClass('show');
	$('.join-background-image-2').removeClass('show');
    $('.join-background-image-2').addClass('hide');
	$('.join-background-image-1').removeClass('hide');      
    
	$('.graduatetab').addClass('selected');
    $('.experiencedtab').removeClass('selected');
}

Page.hide = function(){
    $('.join-us-column2').addClass('visible');
    $('.join-us-column1').removeClass('visible');
    
    $('.join-background-image-2').addClass('show');
	$('.join-background-image-1').removeClass('show');   
    $('.join-background-image-1').addClass('hide');
	$('.join-background-image-2').removeClass('hide');    
    
	$('.experiencedtab').addClass('selected');
    $('.graduatetab').removeClass('selected');    
}

//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$(function(){
	Page.init();
	//resize
	$(window).resize(function(){
		Page.resize();
	});
});
