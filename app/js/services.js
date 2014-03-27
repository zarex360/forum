'use strict';

/* Services */

angular.module('myApp.services', [])

  .service('UserDataService', function(){
   
  })

  .service('UserService', ['$http' ,function($http){
    return {
      register: function(userInput){

        $http.post('../server/auth/register', userInput).success(function(data){
          console.log(data);
        });       
      }
    };

  }]);


  

