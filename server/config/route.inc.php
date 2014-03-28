<?php 
// base/path/youRequest => Controller@Method
// Example: wwww.url.com/home => Home@getPage
return array(
	'auth/login' => 'LoginCtrl@login',
	'auth/checkUser' => 'LoginCtrl@checkUser',
	'auth/register' => 'RegisterCtrl@register',
	'auth/logout' => 'LogoutCtrl@logout',
	'menu/get' => 'MenuCtrl@getMenu',
	
	// A default route is always nice! if something goes wrong
	// example defaultRoute => ErrorCtrl@invalidRequest
	'defaultRoute' => 'LogoutCtrl@logout'
);