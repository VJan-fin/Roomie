/**
 * Created by Viktor on 27.01.2016.
 */

roomie.controller('FileUploadController', ['$scope', '$rootScope', 'FileUploadService', function($scope, $rootScope, FileUploadService){

    $scope.uploadFile = function(){

        if(!$rootScope.currentUser)
            return;

        var image = $scope.photo;
        var uploadUrl = "api/User/" + $rootScope.currentUser.id + "/ProfileImage";

        FileUploadService.uploadFileToUrl(image, uploadUrl).success(function(data) {
            console.log(data);
            $scope.$parent.getMyProfile();
        }).error(function(data) {
            console.log(data);
        });
    };

}]);