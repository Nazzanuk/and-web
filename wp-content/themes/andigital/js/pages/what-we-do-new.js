var Page={};Page.isTabletOrPhone=function(){return Site.hasMediaQueries&&$(window).width()<700},Page.init=function(){Site.hasMediaQueries&&(Page.mode="DESKTOP",Page.resize(),$(".service-row").each(function(a,b){$(b).attr("index",a),$(b).find("a").click(function(){var a=$(this).parent(),b=new Number(a.attr("index"));if(Page.isTabletOrPhone()){var c=!1;a.hasClass("expanded")?a.removeClass("expanded"):(a.addClass("expanded"),c=!0);var d=$(".service-text").get(b);if(c){var e=$(d).clone();$(e).css("height","auto"),$(e).css("width","100%"),$(e).css("display","block"),$(e).removeClass("service-text"),a.find(".service-collapse-text").empty(),a.find(".service-collapse-text").append($(e)),a.stop().animate({height:a.find(".service-collapse-text").height()+80},{duration:250})}else a.find(".service-collapse-text").empty(),a.stop().animate({height:80},{duration:250})}else if(!a.hasClass("selected")){$(".service-row").each(function(a,b){$(b).removeClass("selected")}),$(".service-image").each(function(a,b){$(b).fadeOut()}),a.addClass("selected"),$(".service-icon").css("top",a.position().top+38);var f=$(".service-image").get(b);$(f).delay(400).fadeIn(),$(".service-text").each(function(a,c){a==b?$(c).stop().animate({"margin-top":0},{duration:500}):$(c).stop().animate({"margin-top":-500},{duration:500})})}return!1})}),$(".collapse-row").each(function(a,b){$(b).find("a.column-anchor").click(function(){var a=$(this).parent();return a.hasClass("expanded")?(a.removeClass("expanded"),a.find(".collapse-text").each(function(a,b){Page.isTabletOrPhone()&&$(b).animate({height:"0px"})}),Page.isTabletOrPhone()&&Site.scrollToHeader({targetElement:a,offset:0})):(a.addClass("expanded"),a.find(".collapse-text").each(function(a,b){if(Page.isTabletOrPhone()){var c=$(b).attr("defaultHeight");$(b).animate({height:c+"px"})}}),Page.isTabletOrPhone()&&Site.scrollToHeader({targetElement:a,offset:0})),!1})}))},Page.resize=function(){if(Site.hasMediaQueries){if(Page.isTabletOrPhone())$("#academy-rows .academy-img").css("width","100%"),$("#academy-rows .academy-img").css("margin-left","0");else{var a=$("#academy-rows .academy-images").width(),b=Math.floor((a-4)/3);$("#academy-rows .academy-images .academy-img").css("width",b);var c=Math.round((a-3*b)/2);$("#academy-rows .academy-images .middle-image").css("margin-left",c+"px")}Page.mode=Page.isTabletOrPhone()?"MOBILE":"DESKTOP",Page.mode!=Page.previousMode&&(Page.previousMode=Page.mode,$(".service-row").each(function(a,b){$(b).removeClass("selected")}),Page.isTabletOrPhone()||$(".service-row:first-child").addClass("selected"),$(".collapse-row").each(function(a,b){$(b).removeClass("expanded")})),Page.isTabletOrPhone()?($(".service-collapse-text").css("display","block"),$(".service-icon").css("display","none"),$(".service-text").css("display","none"),$(".service-image").each(function(a,b){$(b).css("display","none")}),$(".service-row").each(function(a,b){$(b).css("height",80)})):($(".service-collapse-text").empty(),$(".service-collapse-text").css("display","none"),$(".service-icon").css("display","block"),$(".service-row").each(function(a,b){$(b).css("height",100)}),$(".service-image").each(function(a,b){$(b).css("display","none")}),$(".service-text").each(function(a,b){$(b).css("display","block")})),$(".service-row").each(function(a,b){var c=$(b);if(Page.isTabletOrPhone())if(c.hasClass("expanded")){var d=$(".service-text").get(a),e=$(d).clone();$(e).css("height","auto"),$(e).css("width","100%"),$(e).css("display","block"),$(e).css("margin-top",0),$(e).removeClass("service-text"),c.find(".service-collapse-text").empty(),c.find(".service-collapse-text").append($(e)),c.css("height",c.find(".service-collapse-text").height()+80)}else c.find(".service-collapse-text").empty(),c.css("height",80),$(".service-text").each(function(a,b){$(b).css("margin-top",0)});else{if(c.hasClass("selected")){$(".service-icon").css("top",c.position().top+38);var d=$(".service-text").get(a),f=$(".service-image").get(a);$(f).css("display","block")}$(".service-text").each(function(a,b){0==a?$(b).css("margin-top",0):$(b).css("margin-top",-500)})}}),$(".collapse-text").each(function(a,b){var c=$(b).clone();$(c).css("height","auto"),$(b).parent().append(c),$(b).remove();var d=$(c).height();$(c).attr("defaultHeight",d),Page.isTabletOrPhone()&&($(c).parent().hasClass("expanded")||$(c).css("height","0px"))})}var d={};d.background={},d.background.element=$(".dod .background-image"),d.background.left=Math.round((Site.width-d.background.element.width())/2),d.background.element.css("left",d.background.left),d.text={},d.text.element=$(".dod .text"),d.text.left=Math.round((Site.width-d.text.element.width())/2),Site.width<=700&&(d.text.left=0),d.text.element.css("left",d.text.left);var e={};if(e.title={},e.title.element=$("#academy #academy-title"),e.title.left=(Site.width-e.title.element.width())/2,Site.hasMediaQueries&&(Page.isTabletOrPhone()?($(".academy-video .vimeo").css("width",$(".academy-video").parent().width()+"px"),$(".academy-video .vimeo").css("height",Math.round($(".academy-video").parent().width()*(200/360))+"px")):($(".academy-video .vimeo").css("width","500px"),$(".academy-video .vimeo").css("height",Math.round(500*(200/360))+"px"))),Page.isTabletOrPhone())$(".column .button").each(function(a,b){$(b).css("margin-top",0)});else{var f=0;$(".column .button").each(function(a,b){$(b).css("margin-top",0)}),$(".column").each(function(a,b){$(b).height()>f&&(f=$(b).height())}),$(".column").each(function(a,b){$(b).find(".button").css("margin-top",f-$(b).height())})}},$(function(){Page.init(),$(window).resize(function(){Page.resize()})});