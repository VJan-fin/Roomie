/**
 * Created by Viktor on 05.02.2016.
 */

roomie.controller('RatingController',
    ['$scope', '$http', '$rootScope', '$filter', '$stateParams', '$location', 'RatingService',

        function($scope, $http, $rootScope, $filter, $stateParams, $location, RatingService)
        {
            $scope.myRating = {};

            $scope.starClick = function() {
                $scope.saveMyRating();
            };

            $scope.hoveringOver = function(value) {
                $scope.overStar = value;
            };

            $scope.getRating = function() {

                $scope.loading = true;

                RatingService.getRating($stateParams.id).success(function (data) {
                    $scope.loading = false;
                    $scope.rating = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.getRatingById = function($id) {
                $scope.loading = true;

                RatingService.getRating($id).success(function (data) {
                    $scope.loading = false;
                    $scope.rating = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.getMyRating = function() {
                $scope.loading = true;

                if(!$rootScope.currentUser)
                    return;

                RatingService.getMyRating($stateParams.id, $rootScope.currentUser.id).success(function (data) {
                    $scope.loading = false;
                    $scope.myRating = data;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.saveMyRating = function() {
                $scope.loading = true;

                if(!$rootScope.currentUser)
                    return;

                $scope.myRating.from_user = $rootScope.currentUser.id;
                $scope.myRating.on_rental = $stateParams.id;

                RatingService.saveRating($stateParams.id, $rootScope.currentUser.id, $scope.myRating).success(function (data) {
                    $scope.loading = false;
                    $scope.myRating = data;
                    $scope.getRating();
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.init = function() {
                $scope.getRating();
                $scope.getMyRating();
            };


            //$scope.createAndSaveComment = function() {
            //
            //    if(!$rootScope.currentUser)
            //        return;
            //    if($scope.newComment == undefined || $scope.newComment === '')
            //        return;
            //
            //    $scope.loading = true;
            //    var newCommentObj = {
            //        from_user: $rootScope.currentUser.id,
            //        on_rental: $stateParams.id,
            //        body: $scope.newComment
            //    };
            //
            //    RatingService.saveComment($stateParams.id, newCommentObj).success(function (data) {
            //        $scope.loading = false;
            //        $scope.newComment = '';
            //        $scope.getAllComments();
            //        console.log(data);
            //    }).error(function (data) {
            //        console.log(data);
            //        $scope.newComment = '';
            //        $scope.loading = false;
            //    });
            //};


            ///**
            // * Initialization of the Rental Unit controller
            // */
            //$scope.init = function() {
            //    if($stateParams.id !== undefined) {
            //        $scope.getAllComments();
            //    }
            //};
            //
            //$scope.init();
        }

    ]);