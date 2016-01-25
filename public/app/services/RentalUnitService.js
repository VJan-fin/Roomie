/**
 * Created by Viktor on 17.01.2016.
 */

roomie.factory('RentalUnitService', function($http) {

    return {

        rentalUnitToShow: -1,

        // get all the rental units
        // page_number is useful for pagination
        getAll: function(page_number) {
            return $http({
                url: 'api/RentalUnit?page=' + page_number,
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