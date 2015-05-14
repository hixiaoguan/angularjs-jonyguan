var formApp = angular.module('formApp', []);

function formController($scope, $http) {
	$scope.formData = {};
	$scope.postForm = function() {
		$http({
	        method  : 'POST',
	        url     : 'get.php',
	        data    : $.param($scope.formData),
	        headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
	    })
        .success(function(data) {
            console.log(data);
            if (!data.success) {
                $scope.errorTitle = data.errors.title;
                $scope.errorContent = data.errors.content;
            } else {
                $scope.message = data.message;
                $scope.errorTitle = '';
                $scope.errorContent = '';
            }
        });
	};
}


