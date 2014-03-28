'use strict';

/* Services */

angular.module('myApp.services', [])

  .service('UserService', ['$http', '$location' ,function($http, $location){
    var msg = null;
    var userName = null;
    return {
      //Register function
      register: function(userInput){
        //Do a http request to the server and send in userInput to server
        $http.post('../server/auth/register', userInput).success(function(data){
          //console.log(data);
          console.log(data);
          if(data['registerResponse'] == false){
            msg = 'Register error';
            //console.log(t.msg);
          }else{
            msg = 'Registration complete, please sign in below'
          }

        });       
      },
      //Login function
      login: function(loginInput){
        //Do a http request to the server and send in userInput to server
         $http.post('../server/auth/login', loginInput).success(function(data){
          if(data['loginResponse'] == false){
            msg = 'A error with your login information';
            console.log(msg);
          }else{
            userName = data['loginResponse'];
            console.log(userName)
            $location.path('/home');
          }
          //console.log(data['loginResponse']);
        });
      },

      getMsg: function(){
        return msg;
      },
      getUser: function(){
        return userName;
      }
    };

  }])

  .service('MenuService', ['$http', function($http){
    return{
      //var menuItem = null;
      getMenu: function(){
        $http.get('../server/menu/get').success(function(data){
          //menuItem = data;
          return data;
        });
      }

    }

  }]);


  

