'use strict';

/* Services */

angular.module('Forum.httpServices', [])

.service('HttpServices', ['$http', function($http){

  return{
    get: function(path){
      //The server request
      return $http.get('server/' + path);
    },

    post: function(path, data){
      //Gets all the post and a single topic
      return $http.post('server/' + path, data).success(function(data){

      });
    }
  }
}])

  .service('ProfileService', ['$http', '$location', '$rootScope', function($http, $location, $rootScope){
  return {
    edit: function(editInfo){
      console.log(editInfo);
      $http.post('server/profile/edit', editInfo).success(function(data){
        console.log(data);
      })
    }

  }
}])
