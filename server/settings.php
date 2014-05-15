<?php

/**
 * ALL SETTINGS BELOW IS REQUIRED.
 */

/**
 * Change to your own baseroot/basepath.
 */
define('BASE_PATH', '/forum_project/server/');


/**
 * Define your database information so the system can work
 */
define('DB_HOST','127.0.0.1');
define('DB_DB','forum_project');
define('DB_USER','root');
define('DB_PASS','');


/**
 * Format is set to json since the front-ends expects json response
 */
define('FORMAT', 'json');


/**
 * Register which folder structure the autoloader should load from
 * Do NOT register core folder structure.
 */
$autoloaderDirectoryPaths = array(
	'controllers',
	'controllers/auth',
	'models'
);


/**
 * auth/login => loginCtrl@login
 * www.example.com/server/auth/login
 * => controller = loginCtrl and method = login.
 */
$routeMap = array(
	/**
	 * Authenticate
	 */
	'auth/login' => 'loginCtrl@login',
	'auth/haveUser' => 'loginCtrl@haveUser',
	'auth/register' => 'registerCtrl@register',
	'auth/logout' => 'logoutCtrl@logout',
	
	/**
	 * Menues
	 */
	'menu/getMain' => 'menuCtrl@getMainMenu',
	'menu/getCategories' => 'menuCtrl@getCatergoryMenu',
	
	/**
	 * Profile
	 */
	'profile/edit' => 'profileCtrl@editProfile',

	/**
	 * Topics
	 */
	'topic/getList' => 'topicCtrl@getTopicsXCategory',

	/**
	 * Posts
	 */
	'post/getAll' => 'postCtrl@getAllPosts',

	/**
	 * Comments
	 */
	'comment/post' => 'commentCtrl@postComment',
	
	/** 
	 * Default Route if there was a problem with the other controllers.
	 * example defaultRoute => ErrorCtrl@invalidRequest
	 */
	'defaultRoute' => 'logoutCtrl@logout'
);