<?php


$app = new Slim\App();


$app->get('/', 'RDuuke\Newbie\Controllers\BaseController:index');
$app->get('/users', 'RDuuke\Newbie\Controllers\UsersController:index');
$app->post('/users', 'RDuuke\Newbie\Controllers\UsersController:store');
$app->get('/users/{id}', 'RDuuke\Newbie\Controllers\UsersController:show');
$app->put('/users/{id}', 'RDuuke\Newbie\Controllers\UsersController:update');
$app->delete('/users/{id}', 'RDuuke\Newbie\Controllers\UsersController:destroy');
