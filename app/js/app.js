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
  $routeProvider.when('/login', {templateUrl: 'partials/login-register.html', controller: 'UserCtrl'});
  $routeProvider.when('/category', {templateUrl: 'partials/category.html', controller: 'CategoryCtrl'});

  $routeProvider.otherwise({redirectTo: '/home'});

}]);












