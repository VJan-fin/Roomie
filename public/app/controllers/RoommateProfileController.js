/**
 * Created by Viktor on 20.01.2016.
 */

roomie.controller('RoommateProfileController',
    ['$scope', '$http', '$rootScope', '$filter', '$stateParams', 'ProfileService',

        function($scope, $http, $rootScope, $filter, $stateParams, ProfileService)
        {
            $scope.profile = {};
            $scope.maxValue = 5;

            $scope.datePicker = {
                isOpen: false,
                minDate: new Date()
            };

            $scope.openPopUp = function() {
                $scope.datePicker.isOpen = true;
            };

            $scope.goals = [
                {value: 'Just a roommate', text: 'Just a roommate'},
                {value: 'Roommate with an apartment', text: 'Roommate with an apartment'},
                {value: 'Just a room', text: 'Just a room'},
                {value: 'Anything', text: 'Anything'}
            ];

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showGoal = function(profile) {
                var selected = [];
                if(profile.looking_for) {
                    selected = $filter('filter')($scope.goals, {value: profile.looking_for});
                }
                return selected.length ? selected[0].text : 'Not set';
            };


            $scope.init = function() {
                $scope.getMyProfile();
            };

            $scope.getMyProfile = function() {

                if(!$stateParams.id)
                    return;

                $scope.loading = true;

                ProfileService.getMyRoommateProfile($stateParams.id).success(function (data) {
                    $scope.loading = false;
                    $scope.profile = data;
                    $scope.profile.move_in_from = new Date($scope.profile.move_in_from);
                    //console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.saveMyProfile = function() {

                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;
                //alert($scope.profile);
                //console.log($scope.profile.move_in_from.toISOString().slice(0, 10));
                $scope.profile.move_in_from = $scope.profile.move_in_from.toISOString().slice(0, 10);

                ProfileService.saveMyRoommateProfile($scope.profile).success(function (data) {
                    $scope.loading = false;
                    $scope.profile = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.createProfile = function() {
                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;
                $scope.profile.for_user = $rootScope.currentUser.id;

                ProfileService.createMyRoommateProfile($scope.profile).success(function (data) {
                    $scope.loading = false;

                    var tmpUser = $rootScope.currentUser;
                    tmpUser.registration_status = 'complete';
                    ProfileService.saveUser(tmpUser).success(function (data) {
                        console.log(data);
                        localStorage.setItem('user', JSON.stringify(data));
                        $rootScope.currentUser = data;
                    });

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