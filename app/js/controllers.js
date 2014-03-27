'use strict';

/* Controllers */

angular.module('myApp.controllers', [])


  .controller('HomeCtrl', [function() {

  }])

  //User controller
  .controller('UserCtrl', ['UserService', '$scope', function(UserService, $scope){

    $scope.user = {};

    //register function
    $scope.register = function(){
      console.log($scope.user);
      
      UserService.register($scope.user);
    }
  }]);


 

