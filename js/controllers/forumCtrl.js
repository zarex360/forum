'use strict';

/* Controllers */

angular.module('myApp.forumCtrl', [])

//The controller that gets all the categories
  .controller('CategoryCtrl', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams){
    $scope.categories = {};
    $scope.topic = {};
    //The server request
    $http.get('server/menu/getCategories').success(function(data){
      //Put all the categories in the variable categories
      $scope.categories = data['categoryMenuResponse'];
    });

  }])

  //The controller that gets all the topics in a category
  .controller('TopicCtrl', ['$scope', '$http', '$routeParams', 'TopicService', function($scope, $http, $routeParams, TopicService){
    //Check if a category is set
    if($routeParams['category']){
      var category = {'category': $routeParams['category']};
      //If it is set then start a service to get all topics
      TopicService.getTopics(category).then(function(response){
        $scope.topics = response['data']['getTopicListResponse'];
        $scope.topicHref = $routeParams['category'];
      });
    };
  }])

  //The controlelr that gets all the post that belongs to a topic
  .controller('PostCtrl', ['$scope', '$http', '$routeParams', 'TopicService', function($scope, $http, $routeParams, TopicService){
    //Check if a topic is set
    if($routeParams['topic']){
      //Prepare a variable for the server request
      var params = {};
      //Put in topic name params
      params.categoryName = $routeParams['category'];
      //Put in post id to params
      params.topicId = $routeParams['topic'];
      //If it is set then do a server request to get all posts that belongs to that topic

      //Start the serveice function to get all post in a topic
      TopicService.getAll(params).then(function(response){
        $scope.topic = response['data']['getAllPostsResponse']['topic'];
        $scope.posts = response['data']['getAllPostsResponse']['posts'];
      });
    }

    $scope.comment = function(){
      TopicService.comment($scope.post);
    }
  }])