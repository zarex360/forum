'use strict';

/* Controllers */

angular.module('myApp.controllers', [])


  .controller('HomeCtrl', ['$scope', 'UserService', function($scope, UserService) {
    $scope.userName = UserService.getUser;

  }])

  .controller('MenuCtrl', ['$scope', 'MenuService', function($scope, MenuService){
    $scope.menu = {};
    $scope.menu = MenuService.getMenu;
  }])

  //User controller
  .controller('UserCtrl', ['UserService', '$scope', function(UserService, $scope){

    $scope.user = {};
    $scope.loginInput = {};
    $scope.msg = UserService.getMsg;
    //$scope.userName = UserService.getUser;
    //register function
    $scope.register = function(){
      //start register service
      UserService.register($scope.user);


    }

    //Login function
    $scope.login = function(){
      //Start login service
      UserService.login($scope.loginInput);
    }

  }])

  .controller('CategoryCtrl', ['$scope', function($scope){
    $scope.categorys = [{'href':'hejsan', 'name':'hej'}];
  }]);


 

