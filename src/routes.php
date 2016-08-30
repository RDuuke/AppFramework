<?php
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->group('/users', function () use ($app) {
    $controller = new RDuuke\Newbie\Controllers\UsersController($app);
    $this->get('', $controller('index'));
    $this->get('/create', $controller('create'));
    $this->post('', $controller('store'));
    $this->get('/{id:[0-9]+}', $controller('show'));
    $this->get('/{id:[0-9]+}/edit', $controller('edit'));
    $this->put('/{id:[0-9]+}', $controller('update'));
    $this->delete('/{id:[0-9]+}', $controller('destroy'));
});
$app->get('/', 'RDuuke\Newbie\Controllers\BaseController:Index');
