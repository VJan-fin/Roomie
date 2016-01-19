/**
 * Created by Viktor on 19.01.2016.
 */

roomie.controller('PersonalProfileController',
    ['$scope', '$http', '$rootScope', 'ProfileService',

        function($scope, $http, $rootScope, ProfileService)
        {
            $scope.init = function() {
                $scope.getMyProfile();
            };

            $scope.getMyProfile = function() {

                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;

                ProfileService.getMyPersonalProfile().success(function (data) {
                    $scope.loading = false;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.init();

        }

    ]);