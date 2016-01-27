/**
 * Created by Viktor on 27.01.2016.
 */

roomie.service('FileUploadService',
    ['$http', function ($http) {

        this.uploadFileToUrl = function(file, caption, description, uploadUrl) {
            var reqBodyData = new FormData();
            reqBodyData.append('photo', file);
            reqBodyData.append('caption', caption);
            reqBodyData.append('description', description);

            return $http.post(uploadUrl, reqBodyData, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            });
        }
}]);