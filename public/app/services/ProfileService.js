/**
 * Created by Viktor on 19.01.2016.
 */

roomie.factory('ProfileService', function($http, $rootScope) {

    return {


        getMyPersonalProfile: function() {
            return $http({
                url: 'api/PersonalProfile/' + $rootScope.currentUser.id,
                method: "GET"
            });
        },


        getMyRoommateProfile: function() {
            return $http({
                url: 'api/RoommateProfile/' + $rootScope.currentUser.id,
                method: "GET"
            });
        }

    }

});