/**
 * Created by Viktor on 27.01.2016.
 */

roomie.controller('FileUploadController', ['$scope', '$rootScope', '$stateParams', 'FileUploadService',
    function($scope, $rootScope, $stateParams, FileUploadService) {

    $scope.photo_name = "--unknown--";
    //$scope.photo_size = 0;

    $scope.errors = '';

    $scope.uploadFile = function(){

        if(!$rootScope.currentUser)
            return;
        $scope.loading = true;

        var uploadUrl = "api/User/" + $rootScope.currentUser.id + "/ProfileImage";

        FileUploadService.uploadFileToUrl($scope.photo, $scope.caption, $scope.description, uploadUrl).success(function(data) {
            $scope.loading = false;
            console.log(data);
            $scope.errors = '';
            $scope.caption = '';
            $scope.description = '';
            $scope.photo = '';
            $scope.$parent.getMyProfile();
        }).error(function(data) {
            $scope.loading = false;
            $scope.errors = data.photo;
            //console.log($scope.errors.photo);
        });
    };

    $scope.uploadRentalPhoto = function(){

        if(!$rootScope.currentUser)
            return;
        $scope.loading = true;

        var uploadUrl = "api/RentalUnit/" + $stateParams.id + "/PropertyPicture";

        FileUploadService.uploadFileToUrl($scope.photo, $scope.caption, '', uploadUrl).success(function(data) {
            $scope.loading = false;
            console.log(data);
            $scope.errors = '';
            $scope.caption = '';
            $scope.photo = '';
            $scope.$parent.getSingleRentalUnit();
        }).error(function(data) {
            $scope.loading = false;
            $scope.errors = data.photo;
            //console.log($scope.errors.photo);
        });
    };

}]);