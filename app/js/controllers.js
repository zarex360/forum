'use strict';

/* Controllers */

angular.module('myApp.controllers', [])


  .controller('HomeCtrl', ['$scope', 'UserDataService', 'TimeService', '$http',  function($scope, UserDataService, TimeService, $http) {
    $scope.$on("userLoggedIn",function() {
      $scope.name = UserDataService.getFullname();
    }) 
    $scope.name = UserDataService.getFullname();
    $scope.time = TimeService.getTime();

    $http.get('../server/product/getLatest').success(function(data){
      console.log(data.latest);
      $scope.LatestPro = data.latest;
    })
  }])


  .controller('LoginCtrl', ['$scope', '$http', '$location', 'UserDataService', '$rootScope', function($scope, $http, $location, UserDataService, $rootScope) {
    
    $scope.user = {};

    $scope.login = function(){
      $http.post('../server/login', $scope.user).success(function(data){
        if(data.authenticated === true && data.user && $scope.user.username === data.user.username){
          UserDataService.setUser(data.user);
          $rootScope.$broadcast('userLoggedIn');
          $location.path('/home');
        }else{
          UserDataService.setUser(null);
        }
      });
    }
    $scope.setSubmitted = function(){
      $scope.submitted = true;
      return true;
    }

  }])


  .controller('RegisterCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
    
    $scope.user = {};

    $scope.register = function(){
      $http.post('../server/register', $scope.user).success(function(data){
          if(data.register && data.register === true){
            $location.path('/login');
          }else{
            $scope.saveerror = true;
          }
      });
    }

    $scope.setSubmitted = function(){
      $scope.submitted = true;
      return true;
    }

  }])

  .controller('LogoutCtrl', ['$scope', '$http', '$location', '$rootScope', function($scope, $http, $location, $rootScope){
    
      $http.get('../server/login/logout').success(function(){
        $rootScope.$broadcast('userLoggedIn');
        $location.path('/login');
      });
    
  }])


  .controller('ProductsCtrl', ['$scope', '$http', 'BasketService', '$routeParams', function($scope, $http, BasketService, $routeParams) {
    $http.get('../server/product/getBrands').success(function(data){
      if(data.brands){
        $scope.brands = data.brands;
      }
    })
    //$scope.brands = ['Digidesign', 'M-audio'];
   
    $scope.brand = $routeParams.brand;
    
    $scope.addItem = function(item){
      BasketService.addItem(item);
    }

    $scope.product = {};

    $scope.addProduct = function(){
      $http.post('../server/product/add', $scope.product).success(function(data){
          if(data.addproduct && data.addproduct === true){
            $scope.savesuccess = true;
          }else{
            $scope.saveerror = true;
          }
      });
    }

    $scope.setSubmitted = function(){
      $scope.submitted = true;
      return true;
    }

    $http.get('../server/product/getlist').success(function(data){
      if(data.products){
        $scope.products = data.products;
      }
    });

  }])


  .controller('MenuCtrl', ['$scope', '$http', function($scope, $http){

    // initial menu (logged in or not)
    $http.get('../server/menu').success(function(data){
      $scope.menu = data.menu;
    });

    // menu after login
    $scope.$on("userLoggedIn",function() {
      $http.get('../server/menu').success(function(data){
        $scope.menu = data.menu;
      });
    });

  }])


  .controller('BasketCtrl', ['$scope', 'UserDataService', 'BasketService', function($scope, UserDataService, BasketService){

    $scope.title = 'Shopping basket';
    $scope.items = BasketService.getItems();
    $scope.removeItem = BasketService.removeItem;
    $scope.calcTotal = BasketService.calcTotal;

  }]);


