<?php

namespace Config;


class Router
{
  public static function Run(Request $request){
      $controller = $request->getController() . 'Controller';
      $route = ROOT . '../' . 'src' . DS . 'App' . DS . 'Controllers' . DS . $controller . '.php';
      $method = $request->getMethod();

      if($method == 'index.php'){
          $method = 'Index';
      }
      $parameters = $request->getParameters();

      if(is_readable($route)){
          require_once $route;

          $function  = "RDuuke\\Newbie\\App\\Controllers\\" . $controller;
          $controller = new $function;

          if(! isset($parameters)){
                $data = call_user_func(array($controller, $method));
          }else{
                $data = call_user_func_array(array($controller, $method), $parameters);
          }
      }

  }
}