'use strict';

/* Application */

angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
])

.config(['$locationProvider', function ($locationProvider) {
 $locationProvider.html5Mode(true);
}])

.config(['$routeProvider', function($routeProvider) {

  $routeProvider.when('/home', {templateUrl: 'partials/home.html', controller: 'HomeCtrl'});

  $routeProvider.when('/login', {templateUrl: 'partials/login.html', controller: 'LoginCtrl'});

  $routeProvider.when('/register', {templateUrl: 'partials/register.html', controller: 'RegisterCtrl'});

  $routeProvider.when('/products', {templateUrl: 'partials/products.html', controller: 'ProductsCtrl'});

  $routeProvider.when('/products/:brand', {templateUrl: 'partials/products.html', controller: 'ProductsCtrl'});

  $routeProvider.when('/product/add', {templateUrl: 'partials/add_product.html', controller: 'ProductsCtrl'});

  $routeProvider.when('/logout', {templateUrl: 'partials/login.html', controller: 'LogoutCtrl'});

  $routeProvider.otherwise({redirectTo: '/home'});

}]);


// on angular startup:

angular.module('myApp').run(['$http', 'UserDataService', '$rootScope' , function($http, UserDataService, $rootScope){

    console.log('... Hello hello, I am starting... Look at me run!');
    $http.get('../server/login').success(function(data){
      UserDataService.setUser(data.user);
      $rootScope.$broadcast('userLoggedIn');
    })

}]);









