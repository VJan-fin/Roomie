var roomie = angular.module('roomie-app', [
    'ui.router',
    'ngResource',
    'ngAnimate',
    'angular-loading-bar',
    'satellizer',
    'xeditable',
    'angularMoment',
    'ui.bootstrap',
    'ngPasswordStrength',
    'rzModule'
]);

roomie.config(function($stateProvider, $urlRouterProvider) {

    // Defines a path that is used when an invalid route is requested
    $urlRouterProvider.otherwise('/home');

    $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: 'views/homeView.html'
        })
        .state('auth', {
            url: '/auth',
            templateUrl: 'views/authView.html',
            controller: 'AuthController as auth'
        })
        .state('register', {
            url: '/register',
            templateUrl: 'views/registrationView.html'
        })
        .state('completeProfile', {
            url: '/completeProfile',
            templateUrl: 'views/newProfileView.html'
        })
        .state('userProfile', {
            url: '/userProfile/{id}',
            templateUrl: 'views/profileView.html'
        })
        .state('propertyPage', {
            url: '/propertyPage/{id}',
            templateUrl: 'views/propertyView.html'
        })
        .state('propertyList', {
            url: '/propertyList',
            templateUrl: 'views/propertyListView.html'
        })
        .state('users', {
            url: '/users',
            templateUrl: 'views/userView.html'
        });

});

// Loading bar configuration - appears on every API call automatically
roomie.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.spinnerTemplate = '<h4 style="position:fixed; top:45%; left:45%; text-align: center; background-color: #2B3E50;  border: 2px solid #DF691A; padding: 20px;"><i class="fa fa-spinner fa-pulse"></i> <span>Loading . . .</h4>';
}]);

// Authentication configuration
roomie.config(function($urlRouterProvider, $authProvider) {

    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = 'roomie/public/api/authenticate';
    $authProvider.signupUrl = 'roomie/public/api/User';
    // Automatic login after signing up
    $authProvider.loginOnSignup = true;

    $authProvider.facebook({
        clientId: 'Facebook App ID'
    });

    $authProvider.google({
        clientId: 'Google Client ID'
    });

    /*
    $authProvider.github({
        clientId: 'GitHub Client ID'
    });

    $authProvider.linkedin({
        clientId: 'LinkedIn Client ID'
    });

    $authProvider.instagram({
        clientId: 'Instagram Client ID'
    });

    $authProvider.yahoo({
        clientId: 'Yahoo Client ID / Consumer Key'
    });

    $authProvider.live({
        clientId: 'Microsoft Client ID'
    });

    $authProvider.twitch({
        clientId: 'Twitch Client ID'
    });

    $authProvider.bitbucket({
        clientId: 'Bitbucket Client ID'
    });

    // No additional setup required for Twitter

    $authProvider.oauth2({
        name: 'foursquare',
        url: '/auth/foursquare',
        clientId: 'Foursquare Client ID',
        redirectUri: window.location.origin,
        authorizationEndpoint: 'https://foursquare.com/oauth2/authenticate',
    });
    */
});


/**
 * Handling the case where the JWT token is expired
 */
roomie.config(function($stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

    function redirectWhenLoggedOut($q, $injector, $rootScope) {

        return {

            responseError: function(rejection) {

                // Need to use $injector.get to bring in $state or else we get
                // a circular dependency error
                var $state = $injector.get('$state');

                // Instead of checking for a status code of 400 which might be used
                // for other reasons in Laravel, we check for the specific rejection
                // reasons to tell us if we need to redirect to the login state
                var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

                // Loop through each rejection reason and redirect to the login
                // state if one is encountered
                angular.forEach(rejectionReasons, function(value, key) {

                    if(rejection.data.error === value) {

                        // If we get a rejection corresponding to one of the reasons
                        // in our array, we know we need to authenticate the user so
                        // we can remove the current user from local storage
                        localStorage.removeItem('user');

                        // Flip authenticated to false so that we no longer
                        // show UI elements dependant on the user being logged in
                        $rootScope.authenticated = false;

                        // Remove the current user info from rootscope
                        $rootScope.currentUser = null;

                        // Send the user to the auth state so they can login
                        $state.go('auth');
                    }
                });

                return $q.reject(rejection);
            }
        }
    }

    // Setup for the $httpInterceptor
    $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

    // Push the new factory onto the $http interceptor array
    $httpProvider.interceptors.push('redirectWhenLoggedOut');

});


roomie.run(function($rootScope, $state, editableOptions) {

    editableOptions.theme = 'bs3'; // bootstrap3 theme
    editableOptions.blur = 'submit';

    // $stateChangeStart is fired whenever the state changes. We can use some parameters
    // such as toState to hook into details about the state as it is changing
    $rootScope.$on('$stateChangeStart', function(event, toState) {

        // Grab the user from local storage and parse it to an object
        var user = JSON.parse(localStorage.getItem('user'));

        if(user) {
            $rootScope.authenticated = true;
            $rootScope.currentUser = user;

            if(toState.name === "auth") {

                // Preventing the default behavior allows us to use $state.go
                // to change states
                event.preventDefault();

                // go to the "main" state which in our case is users
                $state.go('home');
            }
        }


    });

});

/**
 * AngularJS directive that binds the uploaded image
 * to a scope model
 */
roomie.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

/**
 * AngularJS directive that gives the image name and size
 */
roomie.directive('fileData', [function () {
    return {
        link: function (scope, element, attrs) {
            element.bind('change', function(evt) {
                var files = evt.target.files;
                scope.$apply(function(){
                    scope.photo_name = files[0].name;
                    scope.photo_size = files[0].size;
                });
            });
        }
    }
}]);