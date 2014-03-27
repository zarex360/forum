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

  $routeProvider.otherwise({redirectTo: '/home'});

}]);


// on angular startup:

angular.module('myApp').run(['$http', 'UserDataService', '$rootScope' , function($http, UserDataService, $rootScope){

    console.log('... Hello hello, I am starting... Look at me run!');
   

}]);









