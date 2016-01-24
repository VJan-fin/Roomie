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

        saveMyPersonalProfile: function(profileData) {
            //alert(profileData.first_name);
            return $http({
                url: 'api/PersonalProfile/' + $rootScope.currentUser.id,
                method: "PUT",
                // Necessary to indicate that the sent data is JSON
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(profileData)
            });
        },


        getMyRoommateProfile: function() {
            return $http({
                url: 'api/RoommateProfile/' + $rootScope.currentUser.id,
                method: "GET"
            });
        },

        saveMyRoommateProfile: function(profileData) {
            //alert(profileData.first_name);
            return $http({
                url: 'api/RoommateProfile/' + $rootScope.currentUser.id,
                method: "PUT",
                // Necessary to indicate that the sent data is JSON
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(profileData)
            });
        }

    }

});