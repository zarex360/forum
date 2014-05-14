<?php 

/**
 * Settings for Class Router. 
 */


// base/path/youRequest => Controller@Method
// Example: wwww.url.com/home => Home@getPage
return array(
	// AUTHENTICATE
	'auth/login' => 'loginCtrl@login',
	'auth/haveUser' => 'loginCtrl@haveUser',
	'auth/register' => 'registerCtrl@register',
	'auth/logout' => 'logoutCtrl@logout',
	
	// MENU
	'menu/getMain' => 'menuCtrl@getMainMenu',
	'menu/getCategories' => 'menuCtrl@getCatergoryMenu',
	
	// PROFILE
	'profile/edit' => 'profileCtrl@editProfile',

	// TOPIC
	'topic/getList' => 'topicCtrl@getTopicsXCategory',
	'topic/create' => 'topicCtrl@createNewTopic',

	// POST
	'post/getAll' => 'postCtrl@getAllPosts',

	// COMMENT
	'comment/post' => 'commentCtrl@postComment',
	
	// Default Route if there was a problem with the other controllers
	// example defaultRoute => ErrorCtrl@invalidRequest
	'defaultRoute' => 'logoutCtrl@logout'
);