/**
 * Created by Viktor on 20.01.2016.
 */

roomie.controller('RoommateProfileController',
    ['$scope', '$http', '$rootScope', '$filter', 'ProfileService',

        function($scope, $http, $rootScope, $filter, ProfileService)
        {
            $scope.profile = {};

            $scope.sexes = [
                {value: 'Male', text: 'Male'},
                {value: 'Female', text: 'Female'}
            ];


            $scope.init = function() {
                $scope.getMyProfile();
            };

            $scope.getMyProfile = function() {

                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;

                ProfileService.getMyPersonalProfile().success(function (data) {
                    $scope.loading = false;
                    $scope.profile = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.init();

        }

    ]);