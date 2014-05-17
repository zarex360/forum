'use strict';

/* Controllers */

angular.module('myApp.forumCtrl', [])

//The controller that gets all the categories
  .controller('CategoryCtrl', ['$scope', 'HttpServices', '$routeParams', function($scope, HttpServices, $routeParams){
    $scope.categories = {};
    $scope.topic = {};
    var path = 'menu/getCategories'
    //The server request
    HttpServices.get(path).then(function(response){
      $scope.categories = response['categoryMenuResponse'];
    });

  }])

  //The controller that gets all the topics in a category
  .controller('TopicCtrl', ['$scope', '$http', '$routeParams', 'HttpServices', function($scope, $http, $routeParams, HttpServices){
    //Check if a category is set
    if($routeParams['category']){
      var category = {'category': $routeParams['category']};
      //If it is set then start a service to get all topics
      TopicService.getTopics(category).then(function(response){
        $scope.topics = response['data']['getTopicListResponse'];
        $scope.topicHref = $routeParams['category'];
      });
    };


      $http.get('server/menu/getCategories').success(function(data){
      //Put all the categories in the variable categories
        $scope.categoryList = data['categoryMenuResponse'];
      });
      
    $scope.createTopic = function(){
      var response;
      var topic = {};
      topic.catId = $scope.topicCreate['category'];
      topic.title = $scope.topicCreate['title'];
      topic.text = $scope.topicCreate['text'];
      UserService.haveUser().then(function(data){
        topic.user = data['data']['authUserResponse'];
        if(!topic.user){
          console.log('not logged in');
        }else{
          TopicService.create(topic).then(function(response){
            console.log(response);
          });
        }
      })
    };
    
  }])

  //The controlelr that gets all the post that belongs to a topic
  .controller('PostCtrl', ['$route', '$scope', '$http', '$routeParams', 'HttpServices', function($route, $scope, $http, $routeParams, HttpServices){
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
      var comment = {};
      comment.topicId = $routeParams['topic'];
      comment.post = $scope.post['comment'];
      UserService.haveUser().then(function(user){
        comment.user = user['data']['authUserResponse'];
        if(!comment.user){
          console.log('You are not logged in');
        }else{
          TopicService.comment(comment).then(function(response){
            if(response){
              $route.reload();
            }
          });
        }
      })
      

    }

  }])