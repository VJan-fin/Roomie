/**
 * Created by Viktor on 18.01.2016.
 */

roomie.controller('AuthController',
    ['$scope', '$auth', '$state', '$http', '$rootScope',
        function($scope, $auth, $state, $http, $rootScope)
        {
            var controller = this;

            controller.loginError = false;
            controller.loginErrorText = "";

            controller.login = function() {

                var credentials = {
                    email: controller.email,
                    password: controller.password
                };

                // Use Satellizer's $auth service to login
                $auth.login(credentials).then(function(data) {

                    return $http({
                        url: 'api/authenticate/user',
                        method: "GET"
                    });

                }, function(error) {
                    // Handle potential errors during login
                    controller.loginError = true;
                    controller.loginErrorText = error.data.error;
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

                    // If login is successful, redirect to the users state
                    $state.go('users', {});
                });

            };


            // A logout handling method
            $scope.logout = function() {

                console.log("User is deleted");

                $auth.logout().then(function() {

                    // Remove the authenticated user from local storage
                    localStorage.removeItem('user');

                    // Flip authenticated to false so that we no longer
                    // show UI elements dependant on the user being logged in
                    $rootScope.authenticated = false;

                    // Remove the current user info from rootscope
                    $rootScope.currentUser = null;

                });

            };

        }

    ]);