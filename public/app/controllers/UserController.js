/**
 * Created by Viktor on 31.01.2016.
 */

/**
 * Created by Viktor on 19.01.2016.
 */

roomie.controller('UserController',
    ['$scope', '$http', '$rootScope', '$location', '$filter', '$stateParams', 'ProfileService',

        function($scope, $http, $rootScope, $location, $filter, $stateParams, ProfileService)
        {
            $scope.fullProfiles = [];

            $scope.pagination = {
                currentPage: 1,
                totalItems: 0
            };

            $scope.init = function() {
                $scope.getAllUserProfiles();
            };

            $scope.getAllUserProfiles = function() {

                $scope.loading = true;

                ProfileService.getAllFullUserProfiles($scope.pagination.currentPage).success(function (data) {
                    $scope.loading = false;
                    $scope.pagination.currentPage = data.current_page;
                    $scope.pagination.totalItems = data.total;
                    $scope.pagination.perPage = data.per_page;
                    $scope.fullProfiles = data.data;
                    console.log(data.data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            /**
             * Redirecting to show only the chosen user from the list
             * @param id
             */
            $scope.showUserProfile = function(id) {
                $location.url('/userProfile/' + id);
            };


            /**
             * Getting the full profiles of all the users
             * as soon as the page is loaded
             */
            $scope.init();

        }

    ]);