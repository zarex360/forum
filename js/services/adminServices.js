'use strict';

/* Services */

angular.module('Forum.AdminServices', [])

.service('AdminServices', ['$http', function($http){

  return{
    getCategories: function(value){
      return $http.get('server/category/' + value).success(function(response) {
        console.log(value);
        console.log(response);
        return response;
      });
    },

    getTopic: function(value){
      return $http.get('server/topic/' + value).success(function(response) {
        console.log(value);
        console.log(response);
        return response;
      });
    },

    getUsers: function(value){
      return $http.get('server/users/' + value).success(function(response) {
        console.log(value);
        console.log(response);
        return response;
      });
    }
  }
}])
