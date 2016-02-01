/**
 * Created by Viktor on 01.02.2016.
 */

roomie.controller('RegistrationController',
    ['$scope', '$http', '$rootScope', '$auth', '$state', '$location', '$filter', '$stateParams', 'ProfileService',

        function($scope, $http, $rootScope, $auth, $state, $location, $filter, $stateParams, ProfileService)
        {
            $scope.init = function() {
                $('#registrationForm').modal('show');
            };

            $scope.registrationError = false;
            $scope.registrationErrorText = "";

            $scope.register = function() {

                var userData = {
                    name: $scope.name,
                    email: $scope.email,
                    password: $scope.password
                };

                // Use Satellizer's $auth service to sign up
                $auth.signup(userData).then(function(data) {

                    // Use Satellizer's $auth service to login
                    $auth.login(userData).then(function(data) {

                        return $http({
                            url: 'api/authenticate/user',
                            method: "GET"
                        });

                    }, function(error) {
                        // Handle potential errors during login
                        $scope.loginError = true;
                        $scope.loginErrorText = error.data.error;
                    }).then(function(response) {
                        // The response from api/authenticate/user

                        // Stringify the returned data to prepare it
                        // to go into local storage
                        var user = JSON.stringify(response.data.user);

                        // Set the stringified user data into local storage
                        localStorage.setItem('user', user);

                        // The user's authenticated state gets flipped to
                        // true so we can now show parts of the UI that rely
                        // on the user being logged in
                        $rootScope.authenticated = true;

                        // Putting the user's data on $rootScope allows
                        // us to access it anywhere across the app
                        $rootScope.currentUser = response.data.user;

                        $('#registrationForm').removeClass('fade').removeClass('show');
                        $('.modal-backdrop').remove();

                        // If login is successful, redirect to the users state
                        $state.go('completeProfile', {});
                    });

                }, function(error) {
                    // Handle potential errors during registration
                    $scope.registrationError = true;
                    $scope.registrationErrorText = error.data.error;
                });

            };


            /**
             * Showing the modal dialog on page load
             */
            $scope.init();

        }

    ]);