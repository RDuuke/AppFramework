<?php
/**
 *function view, renders a view and the layout select.
 *
 * @param array $parameters
 */
function view($template, $parameters = [])
{
    $tmpl = new \League\Plates\Engine('..\resource\views', 'tpl.php');
    echo $tmpl->render($template, $parameters);
}

/**
 * The redirect function, redirect to a specific path.
 *
 * @param $route
 */
function redirect($route)
{
    $route = BASE_PUBLIC.'/'.$route;
    header('Location: '.$route);
}

/**
 * @param $route
 */
function style($route)
{
    echo "<link rel='stylesheet' href='".BASE_URL.'/public/'.$route."'>";
}

/**
 * @param $route
 */
function script($route)
{
    echo "<script src='".BASE_URL.'/public/'.$route."'></script>";
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
        $tpl = "<a href='".BASE_PUBLIC.'/'.$route.$id."'";
    } else {
        $tpl = "<a href='".BASE_PUBLIC.'/'.$route."'";
    }
    if (is_array($attributes)) {
        foreach ($attributes as $clave => $valor) {
            $tpl .= $clave."= '".$valor."'";
        }
    }
    $tpl .= '>'.$title.'</a>';
    echo $tpl;
}

/**
 * @param $name
 * @param $message
 */
function newFlashMessage($name, $message, $type = 'news')
{
    $_SESSION[$name] = $message;
    $_SESSION['type'] = $type;
}
/**
 * @param $name
 *
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
    $chip = "<div class='chip ".$_SESSION['type']."'>".$_SESSION[$name]."<i class='material-icons'>close</i></div>";
    echo $chip;
    unset($_SESSION[$name]);
    unset($_SESSION['type']);
}

/**
 * @param array $data
 * @param $key
 * @param $value
 *
 * @throws Exception
 *
 * @return array
 */
function array_add($data, $key, $value)
{
    if (is_array($data)) {
        $data[$key] = $value;

        return $data;
    }
    throw new \Exception('It was expected an array');
}

/**
 * @param array $data
 *
 * @throws Exception
 *
 * @return mixed
 */
function array_first($data = [])
{
    if (is_array($data)) {
        $value = array_shift($data);

        return $value;
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param array $data
 *
 * @throws Exception
 *
 * @return mixed
 */
function array_last($data = [])
{
    if (is_array($data)) {
        $value = array_pop($data);

        return $value;
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param array $array
 *
 * @throws Exception
 *
 * @return string
 */
function array_json($array = [])
{
    if (is_array($array)) {
        return json_encode($array);
    }
    throw new \Exception('The value transform is not an array');
}

/**
 * @param $json
 *
 * @return mixed
 */
function json_array($json)
{
    return json_decode($json);
}

/**
 * @param $json
 *
 * @return mixed
 */
function json_object($json)
{
    return json_decode($json, JSON_FORCE_OBJECT);
}

/**
 * @param $value
 * @param $limit
 *
 * @throws Exception
 *
 * @return string
 */
function str_limit($value, $limit)
{
    if (is_numeric($limit)) {
        $string = substr($value, 0, $limit).'...';

        return $string;
    }
    throw new \Exception('The limit must be a numeric value');
}

/**
 * @param int $limit
 *
 * @throws Exception
 *
 * @return string
 */
function str_random($limit = 10)
{
    if (is_numeric($limit)) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $limit; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
    throw new \Exception('The limit must be a numeric value');
}


/**
 * @param $value
 *
 * @return bool|string
 */
function encrypt($value)
{
    $string = password_hash($value, PASSWORD_BCRYPT, ['cost' => 12]);

    return $string;
}

/**
 * @param $hash
 * @param $value
 *
 * @return bool
 */
function check_encryp($hash, $value)
{
    if (password_verify($hash, $value)) {
        return true;
    }

    return false;
}
