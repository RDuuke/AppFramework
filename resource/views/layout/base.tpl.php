<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php $title = isset($title) ? $title : "Framewok Newbie"; ?>
    <title><?php echo $title; ?></title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php style('css/template.css'); ?>
    <?php style('css/materialize.min.css'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <div class="container">
        <?php include $content; ?>
    </div>
    <?php script('js/jquery.min.js')?>
    <?php script('js/materialize.min.js')?>
    <?php script('js/template.js'); ?>
</body>
</html>