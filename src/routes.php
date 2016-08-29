<?php


$app = new Slim\App();


$app->group('/users', function() use ($app) {
    $controller = new RDuuke\Newbie\Controllers\UsersController($app);
    $app->get('', $controller('index'));
    $app->get('/create', $controller('create'));
    $app->post('', $controller('store'));
    $app->get('/{id:[0-9]+}', $controller('show'));
    $app->get('/{id:[0-9]+}/edit', $controller('edit'));
    $app->put('/{id:[0-9]+}', $controller('update'));
    $app->delete('/{id:[0-9]+}', $controller('destroy'));
});
$app->get('/', 'RDuuke\Newbie\Controllers\BaseController:index');
