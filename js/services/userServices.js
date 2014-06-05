'use strict';

/* UserServices */

angular.module('Forum.userServices', [])

 //User Service, do anything that handle user information
  .service('UserService', ['$http', '$location', '$rootScope', function($http, $location, $rootScope){
    //Create a msg variable for any messages
    var msg = null;
    //Create a username variable that hold the username later on
    var userName = null;
    return {
      //Register function
      register: function(userInput){
        //Do a http request to the server and send in userInput to server
        $http.post('server/auth/register', userInput).success(function(data){
          //If the registration fails, then show the user a error message
          if(data['registerResponse'] == false){
            //Set the error message here
            msg = 'Register error';
          }else{
            //If everything is okey with the registration, then show a complete messeage to the user
            msg = 'Registration complete, please sign in below'
          }

        });       
      },
      //Login function
      login: function(loginInput){
        //Do a http request to the server and send in userInput to server
         $http.post('server/auth/login', loginInput).success(function(data){
          //If the login fails, then show a error message
          if(data['loginResponse'] == false){
            //set the message here
            msg = 'A error with your login information';
          }else{
            //if the login success, then set the username to the variable userName
            userName = data['loginResponse'];
            //Start the menu event that change the menu
            $rootScope.$broadcast('menuGet');
            //Send the user to what page you want the user to land on after success login
            $location.path('/home');
          }
        });
      },

      haveUser: function(){
       return $http.get('server/auth/haveUser').success(function(data){

        })
      },

      //a function that returns the message that are set before
      getMsg: function(){
        return msg;
      },
      //a function that returns the username if a login is success
      getUser: function(){
        return userName;
      }
    };

  }])

.service('ProfileService', ['$http', '$location', '$rootScope', function($http, $location, $rootScope){
  return {
    edit: function(editInfo){
      //console.log(editInfo);
      return $http.post('server/profile/edit', editInfo).success(function(data){
        console.log(data);
      })
    }

  }
}])
