(function($) {

var $descriptions = $('#carousel-descriptions').children('li'),
    $controls = $('#carousel-controls').find('span'),
    $carousel = $('#carousel')
        .roundabout({childSelector:"img", minOpacity:1, autoplay:true, autoplayDuration:2000, autoplayPauseOnHover:true })
        .on('focus', 'img', function() {
            var slideNum = $carousel.roundabout("getChildInFocus");
            
            $descriptions.add($controls).removeClass('current');
            $($descriptions.get(slideNum)).addClass('current');
            $($controls.get(slideNum)).addClass('current');
        });

$controls.on('click dblclick', function() {
    var slideNum = -1,
        i = 0, len = $controls.length;

    for (; i<len; i++) {
        if (this === $controls.get(i)) {
            slideNum = i;
            break;
        }
    }
    
    if (slideNum >= 0) {
        $controls.removeClass('current');
        $(this).addClass('current');
        $carousel.roundabout('animateToChild', slideNum);
    }
});

}(jQuery));