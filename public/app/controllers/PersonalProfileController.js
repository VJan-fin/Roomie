/**
 * Created by Viktor on 19.01.2016.
 */

roomie.controller('PersonalProfileController',
    ['$scope', '$http', '$rootScope', '$filter', 'ProfileService',

        function($scope, $http, $rootScope, $filter, ProfileService)
        {
            $scope.profile = {};

            $scope.sexes = [
                {value: 'Male', text: 'Male'},
                {value: 'Female', text: 'Female'}
            ];

            $scope.statuses = [
                {value: 'Single', text: 'Single'},
                {value: 'Dating', text: 'Dating'},
                {value: 'In a Relationship', text: 'In a Relationship'},
                {value: 'Married', text: 'Married'}
            ];

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showGender = function(profile) {
                var selected = [];
                if(profile.gender) {
                    selected = $filter('filter')($scope.sexes, {value: profile.gender});
                }
                return selected.length ? selected[0].text : 'Not set';
            };

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showStatus = function(profile) {
                var selected = [];
                if(profile.relationship_status) {
                    selected = $filter('filter')($scope.statuses, {value: profile.relationship_status});
                }
                return selected.length ? selected[0].text : 'Not set';
            };


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

            $scope.checkName = function($data) {
                console.log($data);
            };

            $scope.saveMyProfile = function() {

                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;

                ProfileService.saveMyPersonalProfile($scope.profile).success(function (data) {
                    $scope.loading = false;
                    $scope.profile = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };


            /**
             * Getting the profiles of the logged in user
             * as soon as the page is loaded
             */
            $scope.init();

        }

    ]);