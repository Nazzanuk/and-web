(function () {
    var app = angular.module('andigital');

    app.controller('MenuController', ['$scope', function ($scope) {
        var showMenu = function () {
            $('nav#menu').velocity('stop');
            $('nav#menu').velocity('transition.slideRightIn', 250);
            $('nav#menu li').hide().velocity('transition.slideLeftIn', {duration:250, stagger: 150});
        };

        $('.menu-button').click(function () {
            showMenu();
        });

        var hideMenu = function () {
            $('nav#menu').velocity('stop');
            $('nav#menu').velocity('transition.slideRightOut', 250);
        };

        $scope.hideMenu = hideMenu;

    }]);
})();