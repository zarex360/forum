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
  $routeProvider.when('/categories', {templateUrl: 'partials/categories.html', controller: 'CategoryCtrl'});
  $routeProvider.when('/logout', {templateUrl: 'partials/login-register.html', controller: 'LogoutCtrl'});
  $routeProvider.when('/profile', {templateUrl: 'partials/profile.html', controller: 'ProfileCtrl'});
  $routeProvider.when('/categories/:topic', {templateUrl: 'partials/category_topic.html', controller: 'TopicCtrl'});
  $routeProvider.when('/categories/:topic/:post', {templateUrl: 'partials/category_post.html', controller: 'PostCtrl'});

  $routeProvider.otherwise({redirectTo: '/home'});

}]);


angular.module('myApp').run(['$http', '$rootScope', function($http, $rootScope){

    
    

}]);












