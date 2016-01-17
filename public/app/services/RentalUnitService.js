/**
 * Created by Viktor on 17.01.2016.
 */

roomie.factory('RentalUnitService', function($http) {

    return {

        // get all the rental units
        getAll: function() {
            return $http({
                url: 'api/RentalUnit',
                method: "GET"
            });
        },

        // get particular rental units
        getSingle: function(rental_unit) {
            return $http({
                url: 'api/RentalUnit/' + rental_unit,
                method: "GET"
            });
        }

    }

});