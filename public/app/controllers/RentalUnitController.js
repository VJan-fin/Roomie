/**
 * Created by Viktor on 17.01.2016.
 */

roomie.controller('RentalUnitController',
    ['$scope', '$http', '$rootScope', '$filter', '$stateParams', '$location', 'RentalUnitService',

        function($scope, $http, $rootScope, $filter, $stateParams, $location, RentalUnitService)
        {
            $scope.rentalUnits = [];
            $scope.property = {};
            //$scope.rentalUnitId = 1;

            $scope.pagination = {
                currentPage: 1,
                totalItems: 0
            };

            $scope.types = [
                {value: 'Shared room', text: 'Shared room'},
                {value: 'Private room', text: 'Private room'},
                {value: 'Apartment', text: 'Apartment'},
                {value: 'House', text: 'House'}
            ];

            $scope.classes = [
                {value: 'Small', text: 'Small'},
                {value: 'Standard', text: 'Standard'},
                {value: 'Large', text: 'Large'},
                {value: 'Luxury', text: 'Luxury'}
            ];

            $scope.furnished = [
                {value: 'Unfurnished', text: 'Unfurnished'},
                {value: 'Only shared rooms', text: 'Only shared rooms'},
                {value: 'Fully furnished', text: 'Fully furnished'}
            ];

            $scope.datePicker = {
                isOpen: false,
                minDate: new Date()
            };

            $scope.openPopUp = function() {
                $scope.datePicker.isOpen = true;
            };


            /**
             * Redirecting to show only the chosen property from the list
             * @param id
             */
            $scope.showProperty = function(id) {
                $location.url('/propertyPage/' + id);
                //console.log(id);
            };

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showType = function(property) {
                var selected = [];
                if(property.type) {
                    selected = $filter('filter')($scope.types, {value: property.type});
                }
                return selected.length ? selected[0].text : 'Not set';
            };

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showClass = function(property) {
                var selected = [];
                if(property.class) {
                    selected = $filter('filter')($scope.classes, {value: property.class});
                }
                return selected.length ? selected[0].text : 'Not set';
            };

            /**
             * Necessary to properly show the editable select drop-down
             */
            $scope.showFurniture = function(property) {
                var selected = [];
                if(property.furniture) {
                    selected = $filter('filter')($scope.furnished, {value: property.furniture});
                }
                return selected.length ? selected[0].text : 'Not set';
            };


            $scope.getAllRentalUnits = function() {
                $scope.loading = true;

                RentalUnitService.getAll($scope.pagination.currentPage).success(function (data) {
                    $scope.loading = false;
                    $scope.pagination.currentPage = data.current_page;
                    $scope.pagination.totalItems = data.total;
                    $scope.pagination.perPage = data.per_page;
                    $scope.rentalUnits = data.data;
                    //console.log(data);
                    //console.log($scope.rentalUnits);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };

            $scope.getSingleRentalUnit = function() {
                $scope.loading = true;

                RentalUnitService.getSingle($scope.rentalUnitId).success(function(data) {
                    $scope.loading = false;
                    // data is an object and should be converted to an array
                    //$scope.rentalUnits = [data];
                    $scope.property = data;
                    $scope.property.move_in_from = new Date($scope.property.move_in_from);
                    //console.log($scope.property);
                }).error(function(data) {
                    console.log(data);
                    $scope.loading = false;
                });
            };

            $scope.saveRentalUnit = function() {

                if(!$rootScope.currentUser)
                    return;

                $scope.loading = true;
                //alert($scope.property);
                $scope.property.move_in_from = $scope.property.move_in_from.toISOString().slice(0, 10);

                RentalUnitService.saveProperty($scope.property).success(function (data) {
                    $scope.loading = false;
                    $scope.getSingleRentalUnit();
                    //$scope.property = data;
                    //console.log(data);
                }).error(function (data) {
                    console.log(data);
                    $scope.loading = false;
                })
            };


            /**
             * Initialization of the Rental Unit controller
             */
            $scope.init = function() {
                if($stateParams.id) {
                    $scope.rentalUnitId = $stateParams.id;
                    $scope.getSingleRentalUnit();
                } else {
                    $scope.getAllRentalUnits();
                }
            };

            $scope.init();
        }

    ]);