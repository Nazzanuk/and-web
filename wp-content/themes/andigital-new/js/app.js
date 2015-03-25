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