var anModule= angular.module("listType",[]);//开始

//controller函数的另一种写法，仅供参考
anModule.controller("listTypeCtrl",["$scope","$http",function($scope,$http){

	$http({
		method: 'GET',
		url: 'get.php?action=get_arctype&where=reid=0'
	}).success(function(data, status, headers, config) {
		console.log("success...");
		console.log(data);
		$scope.lists=data;
	}).error(function(data, status, headers, config) {
		console.log("error...");
	});

}]);

//获取json数据赋值给指令
// function getCtrl($scope, $http) {

// 	$http({
// 		method: 'GET',
// 		url: 'api/get.php'
// 	}).success(function(data, status, headers, config) {
// 		console.log("success...");
// 		console.log(data);
// 		$scope.lists=data;
// 	}).error(function(data, status, headers, config) {
// 		console.log("error...");
// 	});

// }



