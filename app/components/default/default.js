(function () {
    var app = angular.module('andigital');

    app.controller('DefaultController', ['$scope', 'GlobalService', function ($scope, GlobalService) {
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