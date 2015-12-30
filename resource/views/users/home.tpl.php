<h1>Welcome to Usuarios!!!</h1>
<?php route('users/create', "Crear Usuario"); ?>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->name ?></td>
                <td><?php route('users/edit/','Editar', $user->id, ['class' => 'btn']) ?> -
                    <?php route('users/destroy/', 'Eliminar', $user->id, ['targe' => "_blank"]) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


