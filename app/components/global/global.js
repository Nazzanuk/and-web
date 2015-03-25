(function () {
    var app = angular.module('andigital');

    app.service('GlobalService', [function () {

        var parallax = function (){
            var scrolled = $(window).scrollTop();

            $('.parallax').each(function () {
                var parentPosition = $(this).parent().position().top;
                $(this).velocity({translateY: (((scrolled  - parentPosition) * 0.5)) + 'px'},{duration:0});
            });
        };

        $(window).scroll(function(e){
            parallax();
        });
    }]);
})();

