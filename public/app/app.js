var roomie = angular.module('roomie-app', [
    'ui.router',
    'ngResource',
    'ngAnimate',
    'angular-loading-bar',
    'satellizer',
    'xeditable',
    'angularMoment',
    'ui.bootstrap'



  /* 'ui-rangeSlider',
  'pascalprecht.translate',
  'smart-table',
  'mgcrea.ngStrap',
  'toastr',
  'ui.select',
  'ngQuickDate'*/
]);

// Loading bar configuration - appears on every API call automatically
roomie.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
  cfpLoadingBarProvider.spinnerTemplate = '<h4 style="position:fixed; top:45%; left:45%; text-align:center; background-color: #2B3E50;  border: 2px solid #DF691A; padding: 20px;"><i class="fa fa-spinner fa-pulse"></i> <span>Loading . . .</h4>';
}]);

roomie.config(function($stateProvider) {

    $stateProvider
        .state('home', {
            url: '/home',
            templateUrl: 'views/homeView.html'
            //controller: 'AuthController as auth'
        })
        .state('auth', {
            url: '/auth',
            templateUrl: 'views/authView.html',
            controller: 'AuthController as auth'
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
            //controller: 'UserController as user'
        });

});

// Authentication configuration
roomie.config(function($urlRouterProvider, $authProvider) {

    // Satellizer configuration that specifies which API
    // route the JWT should be retrieved from
    $authProvider.loginUrl = 'roomie/public/api/authenticate';

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
                $state.go('users');
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