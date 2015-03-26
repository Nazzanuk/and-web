(function () {
    var app = angular.module('andigital');

    app.controller('HeaderController', ['$scope', function ($scope) {
        var header = 'transparent';

        $(window).scroll(function () {
            var offset = $(window).scrollTop();
            if (offset > 100) {
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