'use strict';

/* mainCtrl */

angular.module('Forum.mainCtrl', [])

  //The home controller
  .controller('HomeCtrl', ['$scope', 'HttpServices', '$rootScope', function($scope, HttpServices, $rootScope) {
    var path = 'auth/haveUser';
    HttpServices.get(path);

    $rootScope.$on("menuGet",function() {
      HttpServices.get('auth/haveUser').then(function(response){
        $scope.userName = function(){
          if(response['data']['authUserResponse'] != false){
            return response['data']['authUserResponse'];
          }
        }
      });
    })
    HttpServices.get('auth/haveUser').then(function(response){
      $scope.userName = function(){
          if(response['data']['authUserResponse'] != false){
            return response['data']['authUserResponse'];
          }
        }
    });

  }])



  //The menu Controller
  .controller('MenuCtrl', ['HttpServices', '$scope', '$rootScope', function(HttpServices, $scope, $rootScope){
    var path = ''
    // initial menu (logged in or not)
    path = 'menu/main'
    HttpServices.get(path).then(function(response){
      $scope.mainMenu = response['data']['menuResponse'];
    })

    // Look if the event is set, if it is. then load the new menu (it sets when you login)
    $rootScope.$on("menuGet",function() {
      //DO a server request to get the menu
      path = 'menu/main';
      HttpServices.get(path).then(function(response){
        $scope.mainMenu = response['data']['menuResponse'];
      })
    });
    
    
  }])


 

