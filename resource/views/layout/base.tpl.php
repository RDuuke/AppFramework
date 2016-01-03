<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <?php style('css/template.css'); ?>
    <?php style('css/materialize.min.css'); ?>
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