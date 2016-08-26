<?php

namespace RDuuke\Newbie\Core;

/**
 * Class Router.
 * @package RDuuke\Newbie\Core
 */
class Router
{
    /**
     * @param Request $request
     */
    public static function Run(Request $request)
    {
        $controller = $request->getController().'Controller';
        $route = ROOT.'../'.'src'.DS.'Controllers'.DS.$controller.'.php';
        $method = $request->getMethod();
        if ($method == 'index.php') {
            $method = 'Index';
        }
        $parameters = $request->getParameters();
        if (is_readable($route)) {
            require_once $route;
            $function = 'RDuuke\\Newbie\\Controllers\\'.$controller;
            $controller = new $function();
            if (!isset($parameters)) {
                $data = call_user_func([$controller, $method]);
            } else {
                $data = call_user_func_array([$controller, $method], $parameters);
            }
        }
    }
}
