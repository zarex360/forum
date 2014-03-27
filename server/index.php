<?php 

session_start();

include 'config/config.inc.php';
include 'tools/classAutoloader.php';
include 'app.class.php';

/**
 * Initialize the application
 */
$app = new App();

/**
 * The app initalize the controller
 */
$app->start();

/**
 *	The app ends and print out the response 
 */
$app->end();