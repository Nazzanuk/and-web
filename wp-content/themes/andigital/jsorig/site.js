//----------------------------------------------------------------------------------------------------
//utils
//----------------------------------------------------------------------------------------------------
var log = function(message){
	console.log(message);
	//$('#log').append(message + '<br>');
}

function initLog(){
	$('#log').dblclick(function(){
		clearLog();
	});
}

function clearLog(){
	$('#log').html('');
}

var Utils = {};

Utils.rotate = function(data){
	var $element = $(data.target);
	var duration = 500;
	if(data.duration){
		duration = data.duration;
	}

	$({deg:data.currentAngle}).animate({deg:data.angle}, {
	    duration:duration,
	    step: function(now) {
	        $element.css({
	            transform: 'rotate(' + now + 'deg)'
	        });
	    }
	});
}

//----------------------------------------------------------------------------------------------------
//site
//----------------------------------------------------------------------------------------------------
var Site = {};
Site.width = 0;
Site.height = 0;
Site.minWidth = 300;
Site.hasMediaQueries = true;
Site.screenTop;
Site.pageID = '';

Site.init = function(){
	Header.init();

	//check media queries
	if(!Modernizr.mq('only all')){
		Site.hasMediaQueries = false;
		Site.minWidth = 1100;
		$('html').css('min-width',Site.minWidth);
	}

	//menu
	$('#menu-link').click(Menu.show);
	
    //share
    $('#share-link').click(Share.show);		

	//headings
	//Site.underlineHeadings();

	//section hr
	var sectionsLength = $('section').length;
	var count = 0;
	$('section').each(function(index,element){
		if(count != sectionsLength - 1){
			if(!$(element).hasClass('no-underline')){
				//$(element).after('<hr/>');
			}
		}
		count++;
	});

	Menu.init();
	Feature.init();
	Share.init();
	Quote.init();
	Vimeo.init();
}

Site.isTabletOrPhone = function() {
	return Site.hasMediaQueries && $(window).width() < 700;
}

Site.enableScroll = function(){
	var scrollTop = parseInt($('html').css('top'));
	$('html').removeClass('no-scroll');
	Header.modeAnimate = false;
	$('html,body').scrollTop(-scrollTop);
}

Site.disableScroll = function(){
	var scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop();
	$('html').addClass('no-scroll').css('top',-scrollTop);
}

Site.scrollToHeader = function(data){
	// we need to change the mode at this point
	Header.changeMode(MODE_FIXED);
	// we need to resize the header to ensure to have the right height
	Header.resize();
	data.offset = -Header.height + (data.offset ? data.offset : 0);
	Site.scrollTo(data);
}

Site.resize = function(){
	Site.width = Math.round($(window).width());
	Site.height = Math.round($(window).height());
	if(Site.width < Site.minWidth){
		Site.width = Site.minWidth;
	}

	Menu.resize();
    Feature.resize();
    SectionsMenu.resize();
    Header.resize();
    Quote.resize();
    Vimeo.resize();
}

Site.underlineHeadings = function(){
	for(var i=1; i<4; i++){
		var underline = '<div class="underline-' + i + '"></div>';
		$('h' + i + ':not(.no-underline)').append(underline);
	}
}

Site.scrollTo = function(data){
	var current = $(window).scrollTop();
	if(data){
		if(data.selector == undefined){
			data.selector = 'html:not(:animated),body:not(:animated)';
		}
		var offset = 0;
		if(data.offset){
			offset = data.offset;
		}
		if(data.speed == undefined){
			data.speed = 500;
		}
		if(data.position == undefined){
			data.position = 0;
		}
		if(data.target){
			var top = $('#' + data.target).offset().top;
			data.position = top + offset;
		}
		if(data.targetElement){
			var top = $(data.targetElement).offset().top;
			data.position = top + offset;
		}
		if (data.complete) {
			$(data.selector).stop().animate({scrollTop:data.position},data.speed,data.complete);
		} else {
			$(data.selector).stop().animate({scrollTop:data.position},data.speed);
		}
	}
	
	return current;
}

Site.onScroll = function(){
	Site.screenTop = $(document).scrollTop();
	var changePoint = Feature.height + 30;

	if(Header.hasTabs){
		changePoint += 60;
	}
	if(Site.screenTop >= changePoint){
		Header.changeMode(MODE_FIXED);
		SectionsMenu.show();
	}else{
		Header.changeMode(MODE_DEFAULT);
		SectionsMenu.hide();
	}

	SectionsMenu.getCurrent();
}

//----------------------------------------------------------------------------------------------------
//header
//----------------------------------------------------------------------------------------------------
var MODE_DEFAULT = 'default';
var MODE_FIXED = 'fixed';
var TYPE_DEFAULT = 'type-default';
var TYPE_RED = 'type-red';

var Header = {};
Header.type = TYPE_DEFAULT;
Header.mode = MODE_DEFAULT;
Header.modeAnimate = true;
Header.defaultHeight = 80;
Header.defaultTop = -15;
Header.height = 60;
Header.hasTabs = false;

Header.init = function(){
}

Header.setType = function(type){
	Header.type = type;
}

Header.changeMode = function(mode){
	if(Header.mode != mode){
		Header.mode = mode;
		if(Header.mode == MODE_DEFAULT){
			$('header').stop().animate({'margin-top':-(Header.defaultHeight+1)},{duration:400,complete:function(){
				var top = 0;
				if(Header.type == TYPE_RED){
					top = -15;
				}
				$('header').css('margin-top',top);
				$('header').removeClass('fixed');
			}});
		}else{
			$('header').addClass('fixed');
			if(Header.modeAnimate){
				$('header').css('margin-top',-(Header.defaultHeight+1));
				$('header').stop().animate({'margin-top':Header.defaultTop},{duration:400});
			}else{
				Header.modeAnimate = true;
				$('header').css('margin-top',Header.defaultTop);
			}
		}
	}
}

Header.loadTabs = function(tabs){
	var html = '';
	html += '<div id="menu-tabs-outer">';
	html += '<div id="menu-tabs">';
	var divider = '<div class="divider"></div>';

	for(var i=0; i<tabs.length; i++){
		var tab = tabs[i];

		if(i != 0){
			html += divider;
		}

		html += '<a href="../' + tab.url + '" class="' + tab.selected + ' tab-' + (i + 1) + '">' + tab.label + '</a>';
	}

	html += '</div>';
	html += '</div>';

	$('header').append(html);

	Header.hasTabs = true;
}

Header.resize = function(){
	if(Header.mode == MODE_DEFAULT){
		if (Header.type == 'default') {
			if ($(window).width() <= 700) {
				if (Header.hasTabs) {
					Header.height = 105;
				} else {
					Header.height = 70;
				}
			} else {
				Header.height = 97;
			}
		} else {
			if ($(window).width() <= 700) {
				if (Header.hasTabs) {
					Header.height = 105;
				} else {
					Header.height = 70;
				}
			} else {
				Header.height = 80;
			}
		}
	}else if(Header.mode == MODE_FIXED){
		if ($(window).width() <= 700) {
			if (Header.hasTabs) {
				Header.height = 105;
			} else {
				Header.height = 55;
			}
		} else {
			Header.height = 65;
		}
	}
	//log("Menu type " + Header.type);
	//log("Menu mode " + Header.mode);
	//log("Menu height " + Header.height);
}

//----------------------------------------------------------------------------------------------------
//menu
//----------------------------------------------------------------------------------------------------
var Menu = {};
Menu.visible = false;
Menu.items = ['what-we-do','who-we-are','join-us','contact-us'];
Menu.defaultImageWidth = 1600;
Menu.defaultImageHeight = 1100;

Menu.init = function(){
	$(window).keyup(function(e){
		if(e.keyCode == 27){
			Menu.hide();
		}
	});
	
	$('#menu-close').click(Menu.hide);

	//menu item
	//$('#menu .bg').fadeTo(0,0);
	
	$('#menu .menu-item').mouseover(function(){
		//$(this).addClass('over');
		//$(this).find('.bg').stop().fadeTo(300,1);
	});
	
	$('#menu .menu-item').mouseout(function(){
		//$(this).removeClass('over');
		//$(this).find('.bg').stop().fadeTo(300,0);
	});

	//Menu.show();
}

Menu.show = function(){
	$('#menu-link').fadeTo( 0, 0 );
	Menu.visible = true;
	Site.disableScroll();
	$('#menu .what-we-do').css('opacity', 0);
	$('#menu .who-we-are').css('opacity', 0);
	$('#menu .contact-us').css('opacity', 0);
	$('#menu .join-us').css('opacity', 0);
	$('#menu-wrapper').addClass('visible');
	Menu.resize();
	$('#menu .what-we-do').stop().fadeTo(200, 1);
	$('#menu .who-we-are').stop().delay(100).fadeTo(200, 1);
	$('#menu .join-us').stop().delay(200).fadeTo(200, 1);
	$('#menu .contact-us').stop().delay(300).fadeTo(200, 1);
	$('#menu-close').fadeTo( 0, 0 );
	$('#menu-close').stop().delay( 400 ).fadeTo( 200, 1 );
}

Menu.hide = function(){
	if(Menu.visible){
		$('#menu-close').fadeTo( 0, 0 );
		Menu.visible = false;
		$('#menu .what-we-do').stop().fadeTo(200, 0);
		$('#menu .who-we-are').stop().delay(100).fadeTo(200, 0);
		$('#menu .join-us').stop().delay(200).fadeTo(200, 0);
		$('#menu .contact-us').stop().delay(300).fadeTo(200, 0, function() {
			$('#menu-wrapper').removeClass('visible');
			Site.enableScroll();
		});
		$('#menu-link').delay( 400 ).fadeTo( 200, 1 );
	}
}

Menu.resize = function(){
	if(Menu.visible){
		for(var i=0; i<Menu.items.length; i++){
			var item = {id:Menu.items[i]};
			item.element = $('#menu .' + item.id);
			item.width = item.element.width();
			item.height = item.element.height();

			//image
			item.image = {};
			item.image.element = $('#menu .' + item.id + ' img');
			item.image.width = Site.width * 0.8;
			item.image.ratio = item.image.width / Menu.defaultImageWidth;
			item.image.height = Math.floor(Menu.defaultImageHeight * item.image.ratio);

			if(item.image.height < (Site.height * 0.8)){
				item.image.height = Site.height * 0.8;
				item.image.ratio = item.image.height / Menu.defaultImageHeight;
				item.image.width = Math.floor(Menu.defaultImageWidth * item.image.ratio);
			}

			item.image.top = 0;
			item.image.left = Math.round(((Site.width / 2) - item.image.width) / 2);

			if(Site.width <= 600){
				item.image.width = Site.width;
				item.image.ratio = item.image.width / Menu.defaultImageWidth;
				item.image.height = Math.floor(Menu.defaultImageHeight * item.image.ratio);
				item.image.left = 0;

				if(item.image.height < (Site.height / 4)){
					item.image.height = Site.height / 4;
					item.image.ratio = item.image.height / Menu.defaultImageHeight;
					item.image.width = Math.floor(Menu.defaultImageWidth * item.image.ratio);
					item.image.left = Math.round(((Site.width / 2) - item.image.width) / 2);
				}
			}
			
			//label
			item.label = {};
			item.label.element = $('#menu .' + item.id + ' .label');
			item.label.left = (item.width - item.label.element.width()) / 2;
			item.label.top = ((item.height - item.label.element.height()) / 2) + 20;
			item.label.element.css('left',item.label.left);
			item.label.element.css('top',item.label.top);

			item.image.element.width(item.image.width);
			item.image.element.height(item.image.height);
			item.image.element.css('top',item.image.top);
			item.image.element.css('left',item.image.left);
		}
	}
}

//----------------------------------------------------------------------------------------------------
//Share
//----------------------------------------------------------------------------------------------------

var Share = {};
Share.visible = false;

Share.init = function(){
	$(window).keyup(function(e){
		if(e.keyCode == 27){
			Share.hide();
		}
	});
	
	$('#share-close').click(Share.hide);
}

Share.show = function(){
	$("#menu-link").fadeTo( 0, 0 );
	Share.visible = true;
	Site.disableScroll();
	$('#share-wrapper').addClass('visible');
    $( '.share' ).addClass('overlay-open');
}

Share.hide = function(){
	if(Share.visible){
		Share.visible = false;
		$('#share-wrapper').removeClass('visible');
        $( '.share' ).removeClass('overlay-open');
		Site.enableScroll();
		$("#menu-link").fadeTo( 200, 1 );
	}
}

$(function(){
	$('#url').click(function(){
		$(this).select();
	})
})

//----------------------------------------------------------------------------------------------------
//feature
//----------------------------------------------------------------------------------------------------
var Feature = {};
Feature.defaultImageWidth = 2400;
Feature.defaultImageHeight = 1600;
Feature.heightPercentage = 0.75;
Feature.titleOffset = 0;
Feature.height = 0;
Feature.visibleScrollArrow = true;

Feature.init = function(){
	//feature image
	$('#feature-img').fadeTo(0,1);
	Feature.hideElement('#feature h1');

	//scroll arrow
	$('#feature #scroll-arrow').mouseover(function(){
		$(this).stop().animate({bottom:40,duration:100});
	});

	$('#feature #scroll-arrow').mouseout(function(){
		$(this).stop().animate({bottom:50,duration:100});
	});

	$('#feature #scroll-arrow').click(function(){
		Site.scrollTo({position:Site.height});
	});

	if(Feature.heightPercentage < 1){
		$('#feature #scroll-arrow').css('display','none');
	}

	Feature.bounceScrollArrow({delay:1000});
}

Feature.resize = function(){
	var item = {};
	var siteHeight = Site.height;
	item.element = $('#feature');
	item.width = Math.round($('#feature').width());
	item.height = Site.height * Feature.heightPercentage;

	//temp
	if(Header.hasTabs){
		//item.height = Site.height - 60;
	}else{
		//item.height = Site.height;
	}

	//image
	item.image = {};
	item.image.element = $('#feature #feature-img');
  
 	item.image.width = Site.width;
    item.image.ratio = item.image.width / Feature.defaultImageWidth;
    item.image.height = Feature.defaultImageHeight * item.image.ratio;

    if(item.image.height < item.height){
    	item.image.height = item.height;
	    item.image.ratio = item.image.height / Feature.defaultImageHeight;
	    item.image.width = Feature.defaultImageWidth * item.image.ratio;
    }
  
    item.image.left = (item.width - item.image.width) / 2;
    item.image.top = 0;//(item.height - item.image.height) / 2;

    if(Site.pageID == 'home'){
    	item.image.left = 0;
    }
	
	item.image.element.width(item.image.width);
	item.image.element.height(item.image.height);
	//item.image.element.css('top',item.image.top);
	item.image.element.css('left',item.image.left);
	
    item.element.height(item.height);


	//page title
	var title = {};
	title.element = $('#feature h1');
	title.left = ($('#feature').width() - title.element.width()) / 2;
	title.top = (($('#feature').height() - title.element.height()) / 2) - 30;
	title.element.css('left',title.left);
	title.element.css('top',title.top - (title.top * Feature.titleOffset));

	//scroll arrow
	item.scrollArrow = {};
	item.scrollArrow.element = $('#feature #scroll-arrow');
	item.scrollArrow.left = (Site.width - item.scrollArrow.element.width()) / 2;
	item.scrollArrow.element.css('left',item.scrollArrow.left);

	Feature.height = item.height;
	Feature.showElement('#feature h1');
}

Feature.hideScroll = function(){
	if(Feature.visibleScrollArrow){
		Feature.visibleScrollArrow = false;
		$('#feature #scroll-arrow').fadeTo(200,0);
	}
}

Feature.imageLoaded = function(){
	$('#feature-img').stop().fadeTo(500,1);
}

Feature.hideElement = function(selector){
	$(selector).css('display','none');
	$(selector).fadeTo(0,0);
}

Feature.showElement = function(selector){
	if(!$(selector).data('visible')){
		$(selector).data('visible',true);
		$(selector).css('display','none');
		$(selector).fadeTo(500,1);
	}
}

Feature.bounceScrollArrow = function(data){
	$('#feature #scroll-arrow').delay(data.delay).animate({bottom:40,duration:100},function(){
		$('#feature #scroll-arrow').animate({bottom:50,duration:100},function(){
			$('#feature #scroll-arrow').animate({bottom:40,duration:100},function(){
				$('#feature #scroll-arrow').animate({bottom:50,duration:100},function(){
				});
			});
		});
	});	
}
//----------------------------------------------------------------------------------------------------
//sections menu
//----------------------------------------------------------------------------------------------------
var SectionsMenu = {};
SectionsMenu.created = false;
SectionsMenu.width;
SectionsMenu.height = 60;
SectionsMenu.top = 0;
SectionsMenu.right = 0;
SectionsMenu.paddingLeft = 0;
SectionsMenu.element;
SectionsMenu.sections = [];
SectionsMenu.visible = false;
SectionsMenu.currentIndexIndex = -1;

SectionsMenu.init = function(){
	var sectionsLength = $('section').length;
	if(sectionsLength > 1){
		var html = '';
		html += '<div id="sections-menu">';

		var i = 0;
		$('section').each(function(index,element){
			var section = {};
			section.element = element;
			section.label = $(section.element).find('h2').first().text();
            if (section.label.length > SectionsMenu.right)
            {
                SectionsMenu.right = section.label.length * 9;
            }
            
            if (section.label.length > 0)
            {
				html += '<div id="section-link-' + index + '" class="section-link">';
				html += '<span class="label">' + section.label + '</span>';
				html += '<img class="default" src="' + Site.dir + 'img/menu/section.png' + '"/>';
				html += '<img class="current" src="' + Site.dir + 'img/menu/section-current.png' + '"/>';
				html += '</div>';
            }

			SectionsMenu.sections.push(section);

			i++;
		});

		html += '</div>';

		$('body').append(html)
		
		// 20px for img red/white section image 
		SectionsMenu.paddingLeft = SectionsMenu.right - 20;
		SectionsMenu.right = "-" + (SectionsMenu.right + 20);
		
		SectionsMenu.element = $('#sections-menu');
		$('.section-link .current').fadeTo(0,0);

		//mouse controls
		$('.section-link').click(function(){
			var index = this.id.split('section-link-')[1];
			SectionsMenu.gotosection(index);
		});

		$('.section-link').mouseover(function(){
			var index = this.id.split('section-link-')[1];
			SectionsMenu.mouseover(index);
		});

		$('.section-link').mouseout(function(){
			var index = this.id.split('section-link-')[1];
			SectionsMenu.mouseout(index);
		});
		
		SectionsMenu.element.css('padding-left',SectionsMenu.paddingLeft + "px");
		SectionsMenu.element.css('right',SectionsMenu.right + "px");
		SectionsMenu.created = true;
		SectionsMenu.resize();
		SectionsMenu.select(0);

		
	}
}

SectionsMenu.resize = function(){
	if(SectionsMenu.created){
		SectionsMenu.width = SectionsMenu.element.width();
		SectionsMenu.height = SectionsMenu.element.height();
		SectionsMenu.top = (Site.height - SectionsMenu.height) / 2;
		SectionsMenu.element.css('top',SectionsMenu.top);
		SectionsMenu.setPositions();
	}
}

SectionsMenu.setPositions = function(){
	for(var i=0; i<SectionsMenu.sections.length; i++){
		var section = SectionsMenu.sections[i];
		section.top = $(section.element).offset().top;
	}
}

SectionsMenu.getCurrent = function(){
	SectionsMenu.setPositions();
	var midPoint = Site.screenTop + (Site.height / 2);
	var current = 0;
	for(var i=SectionsMenu.sections.length - 1; i>-1; i--){
		var section = SectionsMenu.sections[i];
		if(midPoint <= section.top){
			current = i - 1;
		}
		if(midPoint > SectionsMenu.sections[SectionsMenu.sections.length - 1].top){
			current = SectionsMenu.sections.length - 1;
		}
		if(current < 0){
			current = 0;
		}
	}
	SectionsMenu.select(current);
}

SectionsMenu.mouseover = function(index){
	if(index != SectionsMenu.currentIndex){
		var section = SectionsMenu.sections[index];
		$('#section-link-' + index + ' .current').stop().fadeTo(200,1);
	}
}

SectionsMenu.mouseout = function(index){
	if(index != SectionsMenu.currentIndex){
		var section = SectionsMenu.sections[index];
		$('#section-link-' + index + ' .current').stop().fadeTo(200,0);
	}
}

SectionsMenu.gotosection = function(index){
	var section = SectionsMenu.sections[index];
	Site.scrollTo({targetElement:section.element,offset:-100});
}

SectionsMenu.show = function(){
	if(!SectionsMenu.visible){
		SectionsMenu.visible = true;
		$('#sections-menu').stop().animate({right:20},{duration:400});
	}
}

SectionsMenu.hide = function(){
	if(SectionsMenu.visible){
		SectionsMenu.visible = false;
		$('#sections-menu').stop().animate({right:SectionsMenu.right},{duration:400});
	}
}

SectionsMenu.select = function(index){
	if(index != SectionsMenu.currentIndex){
		if(SectionsMenu.currentIndex != -1){
			var previousSection = SectionsMenu.sections[SectionsMenu.currentIndex];
			$('#section-link-' + SectionsMenu.currentIndex + ' .current').stop().fadeTo(200,0);
			$('#section-link-' + SectionsMenu.currentIndex).removeClass('selected');
		}

		SectionsMenu.currentIndex = index

		var section = SectionsMenu.sections[SectionsMenu.currentIndex];
		$('#section-link-' + SectionsMenu.currentIndex + ' .current').stop().fadeTo(200,1);
		$('#section-link-' + SectionsMenu.currentIndex).addClass('selected');
	}
}

//----------------------------------------------------------------------------------------------------
//quote
//----------------------------------------------------------------------------------------------------
var Quote = {};
Quote.videoWidth = 360.0;
Quote.videoHeight = 200.0;

Quote.init = function(){
}

Quote.resize = function(){
	$('.quote').each(function(index,element){
		var quote = {};
		quote.element = $(element);
		
		quote.video = {};
		quote.video.element = $(quote.element).find('.main-video');

		if(Site.width <= 1000){
			quote.video.width = Site.width + 'px';
			quote.video.height = Math.round(Site.width * (Quote.videoHeight / Quote.videoWidth)) + 'px';
		} else {
			quote.video.width = Quote.videoWidth + 'px';
			quote.video.height = Quote.videoHeight + 'px';
		}
		
		quote.video.element.css('width',quote.video.width);
		quote.video.element.css('height',quote.video.height);
		quote.video.element.find('.vimeo').css('width',quote.video.width);
		quote.video.element.find('.vimeo').css('height',quote.video.height);
		
		quote.video.top = Math.round((quote.element.height() - quote.video.element.height()) / 2);		
		quote.video.left = 50 + 'px';

		if(Site.width <= 1000){
			quote.video.left = 'auto';
			quote.video.top = 0;
		}	

		quote.video.element.css('left',quote.video.left);
		quote.video.element.css('top',quote.video.top);	

		quote.text = {};
		quote.text.element = $(quote.element).find('.text');
		quote.text.right = 50 + 'px';
		quote.text.top = Math.round((quote.element.height() - quote.text.element.height()) / 2 - 20);
		
		if(Site.width <= 1000){
			quote.text.right = 'auto';
			quote.text.top = 0;
		}

		quote.text.element.css('right',quote.text.right);
		quote.text.element.css('top',quote.text.top);
	});
}

//----------------------------------------------------------------------------------------------------
//vimeo
//----------------------------------------------------------------------------------------------------
var Vimeo = {};
Vimeo.width = 360.0;
Vimeo.height = 200.0;
Vimeo.scaledWidth = 500.0;

Vimeo.init = function(){
}

Vimeo.resize = function(){
	if(Site.hasMediaQueries){
		if (Site.isTabletOrPhone()) {
			$('.vimeo-video .vimeo').css('width', $('.vimeo-video').parent().width() + 'px');
			$('.vimeo-video .vimeo').css('height', Math.round($('.vimeo-video').parent().width() * (Vimeo.height / Vimeo.width)) + 'px');
		} else {
			$('.vimeo-video .vimeo').css('width', Vimeo.scaledWidth + 'px');
			$('.vimeo-video .vimeo').css('height', Math.round(Vimeo.scaledWidth * (Vimeo.height / Vimeo.width)) + 'px');
		}
	}
}

//----------------------------------------------------------------------------------------------------
//start
//----------------------------------------------------------------------------------------------------
$ = jQuery;
$(function(){
	initLog();

	Site.init();
	//resize
	$(window).resize(function(){
		Site.resize();
	});
	Site.resize();

	//scroll
	$(document).scroll(Site.onScroll);
});
