<?php


/**
 * Start session
 */
session_start();


/**
 * Configuration for the site to compute.
 */
include ('siteConfig.php');


/**
 * Class autoloader.
 * Initiate the class and register when the class should try to load other files
 */
include ('autoloader.php');

$autoloader = new autoloader();

spl_autoload_register(array($autoloader, 'load'));


/**
 * The application that start the server and works like a controller.
 */
include ('app.php');