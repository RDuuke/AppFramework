<?php
    /**
     *function view, renders a view and the layout select
     * @param string $template
     * @param string layout
     * @param array $parameters
     */
    function view($template, $layout = 'base', $parameters = array())
    {
        extract($parameters);
        $content = 'resource' . DS . 'views' . DS . $template .'.tpl.php';
        include ROOT . 'resource' . DS . 'views' . DS . 'layout' . DS . $layout .'.tpl.php';
    }

    /**
     * The redirect function, redirect to a specific path
     * @param $route
    */
    function redirect($route){
        $route = BASE_URL .'/'. $route;
        header('Location: '. $route);
    }

    function style($route){
        echo "<link type='text/css' href='" . BASE_URL . "/" . $route ."'>";
    }

    function script($route){
        echo "<script src='" . BASE_URL . "/" . $route ."'></script>";
    }

    function route($route, $title, $id = null, $attributes = null)
    {
        if(!$id == null){
            $tpl = "<a href='" . BASE_URL . "/" . $route . $id ."'";
        }else{
            $tpl = "<a href='" . BASE_URL . "/" . $route . "'";
        }
        if(is_array($attributes)){
                foreach($attributes as $clave => $valor){
                    $tpl .= $clave . "= '" . $valor . "'";
                }
            }
        $tpl .= ">" . $title . "</a>";
        echo $tpl;
    }

