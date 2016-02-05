/**
 * Created by Viktor on 05.02.2016.
 */

roomie.factory('RatingService', function($http) {

    return {

        getRating: function(property_id) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/User',
                method: "GET"
            });
        },

        getMyRating: function(property_id, user_id) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/User/' + user_id,
                method: "GET"
            });
        },


        saveRating: function(property_id, user_id, rating_obj) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/User/' + user_id,
                method: "PUT",
                //Necessary to indicate that the sent data is JSON
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(rating_obj)
            });
        }


    }

});