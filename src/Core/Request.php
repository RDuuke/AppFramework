<?php

namespace RDuuke\Newbie\Core;

/**
 * Class Request.
 */
class Request
{
    /**
     * @var string
     */
    private $controller;
    /**
     * @var string
     */
    private $method;
    /**
     * @var array
     */
    private $parameters;

    /**
     * Request constructor.
     */
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
            if (!$this->method) {
                $this->method = 'Index';
            }
            $this->parameters = $route;
        } else {
            $this->controller = 'Base';
            $this->method = 'Index';
        }
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
