<?php 
// base/path/youRequest => Controller@Method
// Example: wwww.url.com/home => Home@getPage
return array(
	// AUTHENTICATE
	'auth/login' => 'LoginCtrl@login',
	'auth/checkUser' => 'LoginCtrl@checkUser',
	'auth/register' => 'RegisterCtrl@register',
	'auth/logout' => 'LogoutCtrl@logout',
	
	// MENU
	'menu/getMain' => 'MenuCtrl@getMainMenu',
	'menu/getCategories' => 'MenuCtrl@getCatergoryMenu',
	
	// PROFILE
	'profile/edit' => 'ProfileCtrl@editProfile',

	// TOPIC
	'topic/getList' => 'TopicCtrl@getTopicsXCategory',

	// POST
	'post/getAll' => 'PostCtrl@getAllPosts',
	
	// Default Route if there was a problem with the other controllers
	// example defaultRoute => ErrorCtrl@invalidRequest
	'defaultRoute' => 'LogoutCtrl@logout'
);