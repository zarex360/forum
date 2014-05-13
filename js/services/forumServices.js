'use strict';

/* Services */

angular.module('myApp.forumServices', [])
  
  

.service('TopicService', ['$http', function($http){

  return{
    comment: function(comment){
      console.log(comment);
      //The server request
      /*$http.post('server/?/?', comment).success(function(data){

      }) */
    },

    getAll: function(params){
      //Gets all the post and a single topic
      return $http.post('server/post/getAll', params).success(function(data){

      });
    },

    getTopics: function(category){
      //Get all the topics that belongs to a category
      return $http.post('server/topic/getList', category).success(function(data){

      });
    }
  }
}])



  
