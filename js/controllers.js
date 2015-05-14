/**
 * 这里是login模块
 */
var loginApp = angular.module('loginApp', []);
function loginController($scope, $http) {
    $scope.formData = {};
    $scope.postForm = function() {
        $scope.formData.action='login';
        $http({
            method  : 'POST',
            url     : './get.php',
            data    : $.param($scope.formData),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
        })
        .success(function(data) {
            console.log(data);
            if (!data.success) {
                if(!data.errors){
                    $scope.message = data.message;
                }else{
                    $scope.errorUsername = data.errors.username;
                    $scope.errorPassword = data.errors.password;
                }
            } else {
                window.location.href='#/0';
            }
        });
    };
}

/**
 * 这里是类别列表模块
 */
var pageList= angular.module("pageList",[]);//开始

pageList.controller("ListTypeCtrl",["$scope","$http",function($scope,$http){

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

/**
 * 这里是内容列表模块
 */
pageList.controller("arcListCtrl",["$scope","$http",function($scope,$http){

    $http({
        method: 'GET',
        url: 'get.php?action=get_list&offset=0&rows=10&orderField=id&orderBy=DESC'
    }).success(function(data, status, headers, config) {
        console.log("success...");
        console.log(data);
        $scope.lists=data;
    }).error(function(data, status, headers, config) {
        console.log("error...");
    });

}]);


/**
 * 这里是内容详情模块
 */
var showCont = angular.module("showCont", []);
showCont.controller('ShowContCtrl', function($scope, $http, $stateParams) {
     
    console.log($stateParams.bookId);

    $http({
        method: 'GET',
        url: 'get.php?action=get_article&id='+$stateParams.bookId
    }).success(function(data, status, headers, config) {
        console.log("success...");
        console.log(data);
        $scope.lists=data;
    }).error(function(data, status, headers, config) {
        console.log("error...");
    });
    
});

/**
 * 这里是添加内容模块
 */
var addCont = angular.module("addCont", []);
addCont.controller('AddContCtrl', function($scope, $http) {
     

    $scope.formData = {};
    $scope.formData.action = 'add_article'; 
    $scope.postForm = function() {
        $http({
            method  : 'POST',
            url     : 'get.php',
            data    : $.param($scope.formData),
            headers : { 'Content-Type': 'application/x-www-form-urlencoded' } 
        })
        .success(function(data) {
            console.log(data);
            if (!data.code) {
                //添加成功
                window.location.href='status.html?val=1';
            } else {
                //添加失败
                window.location.href='status.html?val=0';
            }
        });
    };

    
});








