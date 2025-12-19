<?php
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Create the Slim app
$app = AppFactory::create();

// Set up Twig
$twig = Twig::create(__DIR__ . '/../src/templates', [
    'cache' => false, // Set to a directory like '../cache/twig' for production
    'debug' => true   // Useful during development
]);

// Add Twig middleware
$app->add(TwigMiddleware::create($app, $twig));

// Add Slim middleware
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true); // Display, log, debug errors

// Load routes
require __DIR__ . '/../src/routes.php';

// Run the app
$app->run();