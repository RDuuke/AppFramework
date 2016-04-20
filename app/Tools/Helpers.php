<?php
/**
 *function view, renders a view and the layout select
 * @param string $template
 * @param string layout
 * @param array $parameters
 */
function view($template, $parameters = array(), $layout = 'base')
{
    extract($parameters);
    $content = '../resource' . DS . 'views' . DS . $template . '.tpl.php';
    include ROOT .'../'.  'resource' . DS . 'views' . DS . 'layout' . DS . $layout . '.tpl.php';
}

/**
 * The redirect function, redirect to a specific path
 * @param $route
 */
function redirect($route)
{
    $route = BASE_PUBLIC . '/' . $route;
    header('Location: ' . $route);
}

/**
 * @param $route
 */
function style($route)
{
    echo "<link rel='stylesheet' href='" . BASE_URL . "/public/" . $route . "'>";
}

/**
 * @param $route
 */
function script($route)
{
    echo "<script src='" . BASE_URL . "/public/" . $route . "'></script>";
}

/**
 * @param $route
 * @param $title
 * @param null $id
 * @param null $attributes
 */
function route($route, $title, $id = null, $attributes = null)
{
    if (!$id == null) {
        $tpl = "<a href='" . BASE_PUBLIC . "/" . $route . $id . "'";
    } else {
        $tpl = "<a href='" . BASE_PUBLIC . "/" . $route . "'";
    }
    if (is_array($attributes)) {
        foreach ($attributes as $clave => $valor) {
            $tpl .= $clave . "= '" . $valor . "'";
        }
    }
    $tpl .= ">" . $title . "</a>";
    echo $tpl;
}

/**
 * @param $name
 * @param $message
 */
function newFlashMessage($name, $message, $type = 'news')
{
    $_SESSION[$name] = $message;
    $_SESSION["type"]= $type;
}
/**
 * @param $name
 * @return bool
 */
function getFlashMessage($name)
{
    if (!isset($_SESSION[$name])) {
        return false;
    }
    return true;
}

/**
 * @param $name
 * @param string $type
 */
function printFlashMessage($name)
{
    $chip = "<div class='chip " .$_SESSION['type']. "'>" . $_SESSION[$name] . "<i class='material-icons'>close</i></div>";
    echo $chip;
    unset($_SESSION[$name]);
    unset($_SESSION['type']);
}

