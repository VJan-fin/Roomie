var roomie = angular.module('roomie-app', [
    'ui.router',
    'ngResource',
    'ngAnimate',
    'angular-loading-bar',
    'satellizer'



  /*'ui.router',
  'pascalprecht.translate',
  'smart-table',
  'mgcrea.ngStrap',
  'toastr',
  'ui.select',
  'ngQuickDate'*/
]);

// Loading bar configuration - appears on every API call automatically
roomie.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
  cfpLoadingBarProvider.spinnerTemplate = '<h4><span>Loading . . .</h4>';
}]);

roomie.config(function($stateProvider) {

    $stateProvider
        .state('auth', {
            url: '/auth',
            templateUrl: 'views/authView.html',
            controller: 'AuthController as auth'
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