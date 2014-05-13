<?php 

/**
 * Load includes
 */
include ('core/bootstrap.php');


/**
 * Initialize the application
 */
$app = new core\App();


/**
 * The app initalize the controller
 */
$app->start();


/**
 *	The app ends and print out the response 
 */
$app->end();