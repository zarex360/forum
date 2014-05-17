'use strict';

/* Services */

angular.module('myApp.httpServices', [])

.service('HttpService', ['$http', function($http){

  return{
    get: function(path){
      //The server request
      return $http.get('server/' + path).success(function(data){

      })
    },

    post: function(path){
      //Gets all the post and a single topic
      return $http.post('server/' + path).success(function(data){

      });
    }
  }
}])
