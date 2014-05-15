<?php


/**
 * Start session
 */
session_start();


/**
 * Configurations for the site to compute.
 */
include ('settings.php');


/**
 * Include autoloader.
 */
include ('autoloader.php');

$autoloader = new autoloader();


/**
 * Register which folder the autoloader should load from
 * Do NOT register core folder structure.
 */
$autoloader->registerDirectoryPaths($autoloaderDirectoryPaths);


/**
 * Register what function that should load inside $autoloader when initalizing new classes
 */
spl_autoload_register(array($autoloader, 'load'));


/**
 * Reuquest handles the http request from url.
 */
$request = new core\http\Request();


/**
 * Decide how the application sshould be running depending on routeMap.
 */
$router = new core\router($request);


/**
 * @param array
 * auth/login => loginCtrl@login
 * www.example.com/server/auth/login
 * => controller = loginCtrl and method = login.
 */
$router->registerRouteMap($routeMap);