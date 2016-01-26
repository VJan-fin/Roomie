/**
 * Created by Viktor on 26.01.2016.
 */

roomie.factory('CommentService', function($http) {

    return {

        // get all the rental units
        // page_number is useful for pagination
        getAllComments: function(property_id, page_number) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/Comment' + '?page=' + page_number,
                method: "GET"
            });
        },


        saveComment: function(property_id, comment_obj) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/Comment',
                method: "POST",
                //Necessary to indicate that the sent data is JSON
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(comment_obj)
            });
        },

        deleteComment: function(property_id, comment_id) {
            return $http({
                url: 'api/RentalUnit/' + property_id + '/Comment/' + comment_id,
                method: "DELETE"
            });
        }


        //saveProperty: function(rental_unit) {
        //    return $http({
        //        url: 'api/RentalUnit/' + rental_unit.id,
        //        method: "PUT",
        //        // Necessary to indicate that the sent data is JSON
        //        headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        //        data: $.param(rental_unit)
        //    });
        //}

    }

});