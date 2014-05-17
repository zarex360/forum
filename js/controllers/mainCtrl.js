'use strict';

/* mainCtrl */

angular.module('myApp.mainCtrl', [])

  //The home controller
  .controller('HomeCtrl', ['$scope', 'HttpServices', function($scope, HttpServices) {
    var path = 'auth/haveUser';
    HttpServices.get(path);

    $scope.$on("menuGet",function() {
      HttpServices.get('auth/haveUser').then(function(response){
        console.log(data);
        $scope.userName = data;
      });
    })
    HttpServices.get('auth/haveUser').then(function(response){
      $scope.userName = data;
    });

  }])



  //The menu Controller
  .controller('MenuCtrl', ['HttpServices', '$scope', function(HttpServices, $scope){
    var path = ''
    // initial menu (logged in or not)
    path = 'menu/get/main'
    HttpServices.get(path).then(function(response){
      $scope.mainMenu = response['mainMenuResponse'];
    });

    // Look if the event is set, if it is. then load the new menu (it sets when you login)
    $scope.$on("menuGet",function() {
      //DO a server request to get the menu
      path = 'menu/get/main';
      HttpServices.get(path).then(function(response){
        $scope.mainMenu = response['mainMenuResponse'];
      })
    });
    
    
  }])


 

