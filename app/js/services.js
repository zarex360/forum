'use strict';

/* Services */

angular.module('myApp.services', [])

  .service('UserService', ['$http' ,function($http){
    var msg = null;
    return {
      //Register function
      register: function(userInput){
        var t = this
        //Do a http request to the server and send in userInput to server
        $http.post('../server/auth/register', userInput).success(function(data){
          //console.log(data);
          if(data['registerResponse'] == false){
            t.msg = 'Register error';
            console.log(t.msg);
          }else{
            console.log(data);
          }

        });       
      },
      //Login function
      login: function(loginInput){
        //Do a http request to the server and send in userInput to server
        $http.post('../server/auth/login', loginInput).success(function(data){
          console.log(data);
        });
      },

      getMsg: function(){
        console.log(msg);
      }
    };

  }]);


  

