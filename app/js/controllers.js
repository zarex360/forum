'use strict';

/* Controllers */

angular.module('myApp.controllers', [])


  .controller('HomeCtrl', [function() {

  }])

  //User controller
  .controller('UserCtrl', ['UserService', '$scope', function(UserService, $scope){

    $scope.user = {};
    $scope.loginInput = {};
    $scope.msg = null;
    //register function
    $scope.register = function(){
      //start register service
      UserService.register($scope.user);
      $scope.msg = UserService.getMsg();
      console.log($scope.msg);

    }

    //Login function
    $scope.login = function(){
      //Start login service
      console.log()
      UserService.login($scope.loginInput);
    }

  }]);


 

