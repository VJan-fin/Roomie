/**
 * Created by Viktor on 26.01.2016.
 */

roomie.controller('CommentController',
    ['$scope', '$http', '$rootScope', '$filter', '$stateParams', '$location', 'CommentService',

        function($scope, $http, $rootScope, $filter, $stateParams, $location, CommentService)
        {
            $scope.comments = [];

            $scope.pagination = {
                currentPage: 1,
                totalItems: 0
            };


            $scope.getAllComments = function() {
                $scope.loading = true;

                CommentService.getAllComments($stateParams.id, $scope.pagination.currentPage).success(function (data) {
                    $scope.loading = false;
                    $scope.pagination.currentPage = data.current_page;
                    $scope.pagination.totalItems = data.total;
                    $scope.pagination.perPage = data.per_page;
                    $scope.comments = data.data;
                    console.log(data);
                    //console.log($scope.rentalUnits);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };


            $scope.createAndSaveComment = function() {

                if(!$rootScope.currentUser)
                    return;
                if($scope.newComment == undefined || $scope.newComment === '')
                    return;

                $scope.loading = true;
                var newCommentObj = {
                    from_user: $rootScope.currentUser.id,
                    on_rental: $stateParams.id,
                    body: $scope.newComment
                };

                CommentService.saveComment($stateParams.id, newCommentObj).success(function (data) {
                    $scope.loading = false;
                    $scope.newComment = '';
                    $scope.getAllComments();
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.newComment = '';
                    $scope.loading = false;
                });
            };

            $scope.deleteComment = function($id) {
                $scope.loading = true;

                CommentService.deleteComment($stateParams.id, $id).success(function (data) {
                    $scope.loading = false;
                    $scope.getAllComments();
                }).error(function (data) {
                    $scope.loading = false;
                });
            };

            //$scope.saveRentalUnit = function() {
            //
            //    if(!$rootScope.currentUser)
            //        return;
            //
            //    $scope.loading = true;
            //    //alert($scope.property);
            //    $scope.property.move_in_from = $scope.property.move_in_from.toISOString().slice(0, 10);
            //
            //    RentalUnitService.saveProperty($scope.property).success(function (data) {
            //        $scope.loading = false;
            //        $scope.getSingleRentalUnit();
            //        //$scope.property = data;
            //        //console.log(data);
            //    }).error(function (data) {
            //        console.log(data);
            //        $scope.loading = false;
            //    })
            //};


            /**
             * Initialization of the Rental Unit controller
             */
            $scope.init = function() {
                if($stateParams.id !== undefined) {
                    $scope.getAllComments();
                }
            };

            $scope.init();
        }

    ]);