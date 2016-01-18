/**
 * Created by Viktor on 17.01.2016.
 */

roomie.controller('RentalUnitController',
    ['$scope', '$http', 'RentalUnitService',

        function($scope, $http, RentalUnitService)
        {
            $scope.rentalUnits = {};
            $scope.rentalUnitId = 2;

            //$http({
            //    url: 'api/authenticate',
            //    method: "POST",
            //    data: {email: 'vikjan94@gmail.com', password: 'secret'}
            //});

            $scope.getAllRentalUnits = function() {
                $scope.loading = true;

                RentalUnitService.getAll().success(function (data) {
                    $scope.rentalUnits = data;
                    $scope.loading = false;
                    console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.getSingleRentalUnit = function() {
                $scope.loading = true;

                RentalUnitService.getSingle($scope.rentalUnitId).success(function(data) {
                    // data is an object and should be converted to an array
                    $scope.rentalUnits = [data];
                    $scope.loading = false;

                }).error(function(data) {
                    console.log(data);
                    $scope.loading = false;
                });
            };
        }

    ]);