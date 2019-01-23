<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function (){
   return str_random(32);
});

/***********************************************Career***********************************************/
$router->post('/careers', ['uses' => 'CareersController@createCareer']); //la ruta en plural
$router->get('/careers', ['uses' => 'CareersController@getAllCareers']);

/***********************************************entity_type***********************************************/
$router->post('/entity_types', ['uses' => 'EntityTypesController@createEntityType']);

/***********************************************entity***********************************************/
$router->post('/entities', ['uses' => 'EntitiesController@createEntity']);

/***********************************************person***********************************************/
$router->post('/persons', ['uses' => 'PersonsController@createPerson']);
$router->get('/persons', ['uses' => 'PersonsController@getAllPersons']);

/***********************************************Project***********************************************/
$router->post('/projects', ['uses' => 'ProjectsController@createProject']);

/***********************************************student***********************************************/
//$router->post('/careers', ['uses' => 'CareersController@createCareer']);

/***********************************************coordinator***********************************************/
//$router->post('/careers', ['uses' => 'CareersController@createCareer']);

/***********************************************tutor***********************************************/
//$router->post('/careers', ['uses' => 'CareersController@createCareer']);


