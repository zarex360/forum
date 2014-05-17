'use strict';

/* Application */

angular.module('Forum', [
  'ngRoute',
  'Forum.filters',
  'Forum.directives',
  'Forum.httpServices',
  'Forum.mainCtrl',
  'Forum.userCtrl',
  'Forum.forumCtrl'
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
  })
  .when('/create_topic', {
    templateUrl: 'partials/create_topic.html',
    controller: 'TopicCtrl'
  })
  .when('/404', {
    templateUrl: 'partials/404.html'
  });

  $routeProvider.otherwise({redirectTo: '/home'});

}]);


angular.module('Forum').run(['$http', '$rootScope', 'HttpServices',  function($http, $rootScope, HttpServices){


    
    

}]);












