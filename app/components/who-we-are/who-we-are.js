(function () {
    var app = angular.module('andigital');

    app.controller('WhoWeAreController', ['$scope', 'GlobalService', function ($scope, GlobalService) {

        var people = [];
        var fields = [
            "firstName",
            "lastName",
            "jobTitle",
            "andTitle",
            "careerBackground",
            "role",
            "superheroPower",
            "image"
        ];

        var getPeople = function () {
            $(".person").each(function (index) {
                var person = {};

                for (var i in fields) {
                    var field = fields[i];
                    person[field] = $(this).find('.' + field).html();
                }

                people.push(person);
            });
        };

        var currentProfile = 0;

        var buildProfile = function (index) {
            var person = people[index];
            var profile = $(".profile-template").clone();
            profile.addClass('profile');

            profile.find('.profile-name').html(person.firstName + " " + person.lastName);
            profile.find('.profile-job small').html(person.jobTitle + " AND " + person.andTitle);
            profile.find('.profile-career-background').html(person.careerBackground);
            profile.find('.profile-role').html(person.role);
            profile.find('.profile-superhero-power').html(person.superheroPower);
            profile.find('.profile-image').css('background-image', 'url("' + person.image + '")');

            profile.find('.profile-close').click(function () {
                closeProfile(index);
            });

            var persons = $('.person');
            $(persons[(Math.ceil((index + 1) / getColumns()) * getColumns()) - 1]).after(profile.show());
            profile.velocity("scroll", { duration: 600, offset: -74 })
        };

        var getColumns = function () {
            var columns = 5;
            var width = window.innerWidth;

            if (width < 768) {
                columns = 4;
            }

            if (width < 500) {
                columns = 2;
            }

            return columns;
        };

        var selectPerson = function (index) {
            $('.profile').remove();
            currentProfile = index;
            buildProfile(index);
        };

        var closeProfile = function (index) {
            $('.profile').remove();
            $('[data-person="'+index+'"]').velocity("scroll", { duration: 600, offset: -74 });
        };

        var init = function () {
            getPeople();
            console.log(people);
        };

        init();

        $scope.selectPerson = selectPerson;

    }]);
})();