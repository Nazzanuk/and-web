var app = angular.module('andigital', []);
(function () {
    var app = angular.module('andigital');

    app.controller('HeaderController', ['$scope', function ($scope) {
        var header = 'transparent';

        $(window).scroll(function () {
            var offset = $(window).scrollTop();
            if (offset > 700) {
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

    app.controller('JoinUsController', ['$scope', function ($scope) {
        var currentCareer = 0;

        var setCareer = function (index) {
            if (index == currentCareer) return;
            $('[data-career]').hide();
            $('[data-career="' + index + '"]').show();

            currentCareer = index;
        };

        var isCareer = function (index) {
            return (index == currentCareer);
        };

        $scope.setCareer = setCareer;
        $scope.isCareer = isCareer;
    }]);
})();
(function () {
    var app = angular.module('andigital');

    app.controller('WhatWeDoController', ['$scope', function ($scope) {
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