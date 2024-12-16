<?php

use Faker\Provider\Lorem;


// $routes->setDefaultesNamespace('\App\Controllers');
// $routes->setDefaultesControllers('Home');
// $routes->setDefaultesMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(false);



$routes->get('/', 'Home::index');
$routes->get('news', 'News::index');   
$routes->get('news/(:segment)', 'News::view/$1');  
$routes->get('(:any)','Pages::view/$1');
