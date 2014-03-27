<?php 
// base/path/youRequest => Controller@Method
// Example: wwww.url.com/home => Home@getPage
return array(
	//HOME
	'home' => 'HomeCtrl@example2',
	
	// A default route is always nice! if something goes wrong
	// example defaultRoute => ErrorCtrl@invalidRequest
	'defaultRoute' => 'HomeCtrl@example1'
);