'use strict';

/* User Controllers */

angular.module('myApp.userCtrl', [])

 //User controller
  .controller('UserCtrl', ['UserService', '$scope', '$rootScope', function(UserService, $scope, $rootScope){

    //User information
    $scope.user = {};
    //User input 
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

  //Logout controller
  .controller('LogoutCtrl', ['$scope', '$http', '$location', '$rootScope', function($scope, $http, $location, $rootScope){
      //Do a request to the server for clear the session
      $http.get('server/auth/logout').success(function(){
        //Reset the event
        $rootScope.$broadcast('menuGet');
        //Send the user to the login/registartion page
        $location.path('/login');
      });
    
  }])

  .controller('ProfileCtrl', ['$scope', 'ProfileService', '$http', '$location', function($scope, ProfileService, $http, $location){
    $scope.profile = null;
    $http.get('server/auth/haveUser').success(function(data){
      if(data['authUserResponse'] == false){
        $location.path('/login');
      }else{
        $scope.editProfile = function(){
      ProfileService.edit($scope.profile);
    }
      }
    })
  }])