//----------------------------------------------------------------------------------------------------
//application
//----------------------------------------------------------------------------------------------------
var Application = {};
Application.visible = false;
Application.height = 1500;
Application.speed = 500;
Application.firstLoad = true;


Application.init = function(){
	$('#application-link').click(Application.toggle);

	/* Temporary fix for new heading layout for job description page */
    $('h3').each(function () {
         $(this).replaceWith( "<h2>"  + $(this).html() + "</h2>" );
     });
    $( 'h2' ).append( "<hr>" );
}

Application.toggle = function(){
	if(Application.visible){
		Application.hide();
	}else{
		Application.show();
	}
}

Application.show = function(){
	if(!Application.visible){
		Header.resize();
		Application.visible = true;
		$('#application').addClass('visible');
		$('#application').stop().animate({height:Application.height},Application.speed);
		$('#application-spacing').stop().animate({height:0});
		Site.scrollTo({target:'application-link',offset:-Header.height});
		Utils.rotate({target:'#application-link .arrow img',currentAngle:0,angle:-180});
	}
}

Application.hide = function(){
	if(Application.visible){
		Application.visible = false;
		$('#application').stop().animate({height:0},Application.speed,function(){
			$('#application').removeClass('visible');
		});
		$('#application-spacing').stop().animate({height:100});
		Utils.rotate({target:'#application-link .arrow img',currentAngle:-180,angle:0});
	}
}

Application.onLoaded = function(){
	if(!Application.firstLoad){
		Site.scrollTo({target:'application-link'});
	}
	Application.firstLoad = false;
}

$(function(){
	Application.init();
});