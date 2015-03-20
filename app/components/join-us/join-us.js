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