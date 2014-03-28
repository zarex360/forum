'use strict';

/* Controllers */

angular.module('myApp.controllers', [])

  //The home controller
  .controller('HomeCtrl', ['$scope', 'UserService', function($scope, UserService) {


  }])



  //The menu Controller
  .controller('MenuCtrl', ['$http', '$scope', function($http, $scope){

    // initial menu (logged in or not)
    $http.get('../server/menu/get').success(function(data){
      //Set the menu data to scope menu, access the data with {{menu}} in index.html
      $scope.menu = data['menuResponse'];
    });

    // Look if the event is set, if it is. then load the new menu (it sets when you login)
    $scope.$on("menuGet",function() {
      //DO a server request to get the menu
      $http.get('../server/menu/get').success(function(data){
        //Set the menu data to $scope.menu
        $scope.menu = data['menuResponse'];
      });
    });
    
    
  }])

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
      $http.get('../server/auth/logout').success(function(){
        //Reset the event
        $rootScope.$broadcast('menuGet');
        //Send the user to the login/registartion page
        $location.path('/login');
      });
    
  }])

  .controller('ProfileCtrl', ['$scope', 'ProfileService', function($scope, ProfileService){
    $scope.profile = null;
    $scope.editProfile = function(){
      ProfileService.edit($scope.profile);
    }
  }])

  .controller('CategoryCtrl', ['$scope', function($scope){
    $scope.categorys = [{'href':'hejsan', 'name':'hej'}];
  }]);


 

