'use strict';

/* mainCtrl */

angular.module('myApp.mainCtrl', [])

  //The home controller
  .controller('HomeCtrl', ['$scope', 'UserService', function($scope, UserService) {
    UserService.haveUser();
    $scope.$on("menuGet",function() {
      $scope.userName = UserService.getUser();
    })
    $scope.userName = UserService.getUser();

  }])



  //The menu Controller
  .controller('MenuCtrl', ['$http', '$scope', function($http, $scope){

    // initial menu (logged in or not)
    $http.get('server/menu/getMain').success(function(data){
      //Set the menu data to scope menu, access the data with {{menu}} in index.html
      $scope.mainMenu = data['mainMenuResponse'];
    });

    // Look if the event is set, if it is. then load the new menu (it sets when you login)
    $scope.$on("menuGet",function() {
      //DO a server request to get the menu
      $http.get('server/menu/getMain').success(function(data){
        //Set the menu data to $scope.menu
        $scope.mainMenu = data['mainMenuResponse'];
      });
    });
    
    
  }])


 

