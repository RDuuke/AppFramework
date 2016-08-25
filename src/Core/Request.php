<?php

namespace RDuuke\Newbie\Core;


class Request
{
    private $controller;
    private $method;
    private $parameters;

    public function __construct()
    {
        if (isset($_GET['route'])) {
            $route = filter_input(INPUT_GET, 'route', FILTER_SANITIZE_URL);
            $route = explode('/', $route);
            $route = array_filter($route);
            if ($route[0] == 'index.php') {
                $this->controller = 'Base';
            } else {
                $this->controller = ucfirst(strtolower(array_shift($route)));
            }
            $this->method = ucfirst(strtolower(array_shift($route)));
            if(! $this->method){
                $this->method = 'Index';
            }
            $this->parameters = $route;
        }else{
            $this->controller = 'Base';
            $this->method = 'Index';
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

}