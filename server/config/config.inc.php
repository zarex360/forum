<?php
/**
 * Displays all errors and warnings
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

/**
 * Change to your own baseroot/basepath.
 */
define('BASE_PATH', '/oop/mvc/randomProject5/server/');

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
 * These are the configuration for the class autoloader
 * Iths the folder structure
 */
define('CLASS_DIRS','
	handlers,
	controllers,
	models,
	config,
	view,
	view/templates,
	tools,
	http
');