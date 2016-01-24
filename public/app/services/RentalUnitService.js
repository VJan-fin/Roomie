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
        },

        saveProperty: function(rental_unit) {
            return $http({
                url: 'api/RentalUnit/' + rental_unit.id,
                method: "PUT",
                // Necessary to indicate that the sent data is JSON
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(rental_unit)
            });
        }

    }

});