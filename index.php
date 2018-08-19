<?php 
require_once dirname(__FILE__) . "/core/Route.php";
$routes = new Route(true);
$route = $routes->getRoutes();
print_r($route);
include( "core/Dispatcher.php" ); 
$router = new Dispatcher($route); 
 