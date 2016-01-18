/**
 * Created by Viktor on 18.01.2016.
 */

roomie.controller('AuthController',
    ['$scope', '$auth', '$state',
        function($scope, $auth, $state)
        {
            var user = this;

            user.login = function() {

                var credentials = {
                    email: user.email,
                    password: user.password
                };

                // Use Satellizer's $auth service to login
                $auth.login(credentials).then(function(data) {

                    // If login is successful, redirect to the users state
                    $state.go('users', {});
                });

            }

        }

    ]);