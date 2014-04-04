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

  $routeProvider.when('/home',{
      templateUrl: 'partials/home.html', 
      controller: 'HomeCtrl'
  })
  .when('/login', {
    templateUrl: 'partials/login-register.html', 
    controller: 'UserCtrl'
  })
  .when('/categories', {
    templateUrl: 'partials/categories.html', 
    controller: 'CategoryCtrl'
  })
  .when('/logout', {
    templateUrl: 'partials/login-register.html',
    controller: 'LogoutCtrl'
  })
  .when('/profile', {
    templateUrl: 'partials/profile.html', 
    controller: 'ProfileCtrl'
  })
  .when('/categories/:category', {
    templateUrl: 'partials/category_topic.html', 
    controller: 'TopicCtrl'
  })
  .when('/categories/:category/:topic', {
    templateUrl: 'partials/category_post.html', 
    controller: 'PostCtrl'
  });

  $routeProvider.otherwise({redirectTo: '/home'});

}]);


angular.module('myApp').run(['$http', '$rootScope', 'UserService',  function($http, $rootScope, UserService){


    
    

}]);












