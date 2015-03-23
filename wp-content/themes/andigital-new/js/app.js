var app = angular.module('andigital', []);
(function () {
    var app = angular.module('andigital');

    app.controller('FlexController', ['$scope', 'GlobalService', function ($scope, GlobalService) {
        var activeService = 0;

        var isActiveService = function (index) {
            return activeService == index;
        };

        var setActiveService = function (index) {
            if (activeService == index) return;

            $('[data-service="' + activeService + '"]').velocity('transition.slideUpOut', 300);
            $('[data-service="' + index + '"]').velocity('transition.slideDownIn', 300);

            activeService = index;
        };

        var init = function () {
            $('[data-service="' + activeService + '"]').velocity('transition.slideDownIn', 300);
            $(".and-carousel").owlCarousel({
                loop:true,
                center:true,
                items:1,
                margin: 30,
                //autoWidth: true,
                dots:true,
                autoplay:true,

                responsive : {
                    480 : {
                        items: 2
                    },
                    700 : {
                        items: 3
                    },
                    1000 : {
                        items: 4
                    }
                }
            });

        };

        init();

        $scope.isActiveService = isActiveService;
        $scope.setActiveService = setActiveService;

    }]);
})();
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
(function () {
    var app = angular.module('andigital');

    app.controller('HeaderController', ['$scope', function ($scope) {
        var header = 'transparent';

        $(window).scroll(function () {
            var offset = $(window).scrollTop();
            if (offset > 400) {
                setHeader('normal');
            } else {
                setHeader('transparent');
            }
        });

        var setHeader = function (flag) {
            if (flag == header) return;
            else header = flag;

            if (header == 'transparent') {
                $('#header-transparent').velocity('transition.slideDownIn', 300);
                $('#header').velocity('transition.slideUpOut', 300);
            }

            if (header == 'normal') {
                $('#header').velocity('transition.slideDownIn', 300);
                $('#header-transparent').velocity('transition.slideUpOut', 300);
            }
        }
    }]);
})();
(function () {
    var app = angular.module('andigital');

    app.controller('HomeController', ['$scope', 'GlobalService', function ($scope, GlobalService) {

    }]);
})();
(function () {
    var app = angular.module('andigital');

    app.controller('JoinUsController', ['$scope', 'GlobalService', function ($scope, GlobalService) {
        var currentCareer = 1;

        var setCareer = function (index) {
            if (index == currentCareer) return;
            $('[data-career]').hide();
            $('[data-career="' + index + '"]').show();

            currentCareer = index;
        };

        var isCareer = function (index) {
            return (index == currentCareer);
        };

        setCareer(0);

        $scope.setCareer = setCareer;
        $scope.isCareer = isCareer;
    }]);
})();
(function () {
    var app = angular.module('andigital');

    app.controller('WhatWeDoController', ['$scope', 'GlobalService', function ($scope, GlobalService) {
        var activeService = 0;

        var isActiveService = function (index) {
            return activeService == index;
        };

        var setActiveService = function (index) {
            if (activeService == index) return;

            $('[data-service="' + activeService + '"]').velocity('transition.slideUpOut', 300);
            $('[data-service="' + index + '"]').velocity('transition.slideDownIn', 300);

            activeService = index;
        };

        var init = function () {
            $('[data-service="' + activeService + '"]').velocity('transition.slideDownIn', 300);
            $("#clients-carousel").owlCarousel({
                loop:true,
                center:true,
                items:1,
                margin: 100,
                //autoWidth: true,
                dots:true,
                autoplay:true,

                responsive : {
                    480 : {
                        items: 2
                    },
                    700 : {
                        items: 4
                    }
                }
            });

            $("#andacademy-video").owlCarousel({
            //    video:true
            //});
            //
            //$('.owl-carousel').owlCarousel({
                items:1,
                video:true,
                lazyLoad:true,
                dots:false
            })

        };

        init();

        $scope.isActiveService = isActiveService;
        $scope.setActiveService = setActiveService;

    }]);
})();
(function () {
    var app = angular.module('andigital');

    app.controller('WhoWeAreController', ['$scope', 'GlobalService', function ($scope, GlobalService) {
        var activeService = 0;

        var isActiveService = function (index) {
            return activeService == index;
        };

        var setActiveService = function (index) {
            if (activeService == index) return;

            $('[data-service="' + activeService + '"]').velocity('transition.slideUpOut', 300);
            $('[data-service="' + index + '"]').velocity('transition.slideDownIn', 300);

            activeService = index;
        };

        var init = function () {
            $('[data-service="' + activeService + '"]').velocity('transition.slideDownIn', 300);
            $("#clients-carousel").owlCarousel({
                loop:true,
                center:true,
                items:1,
                margin: 100,
                //autoWidth: true,
                dots:true,
                autoplay:true,

                responsive : {
                    480 : {
                        items: 2
                    },
                    700 : {
                        items: 4
                    }
                }
            });

            $("#andacademy-video").owlCarousel({
            //    video:true
            //});
            //
            //$('.owl-carousel').owlCarousel({
                items:1,
                video:true,
                lazyLoad:true,
                dots:false
            })

        };

        init();

        $scope.isActiveService = isActiveService;
        $scope.setActiveService = setActiveService;

    }]);
})();