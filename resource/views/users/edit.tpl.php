<h1>Edit User: <?php echo $user->name; ?></h1>

<form action="<?php echo BASE_URL . '/users/update/' . $user->id ?>" method="post">
    <?php include '_partial/_campos.tpl.php'; ?>
    <button>Guardar</button>
</form>