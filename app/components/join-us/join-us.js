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