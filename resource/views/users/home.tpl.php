<?php $this->layout('layout\base') ?>
<h3 class="thin">Welcome to Users!!!</h3>
<?php route('users/create', 'New User'); ?>
<?php if (getFlashMessage('test')): ?>
    <?php printFlashMessage('test'); ?>
<?php endif ?>
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
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->e($user->id) ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->name ?></td>
            <td><?= route('users/edit/', 'Edit', $user->id, ['class' => 'btn']) ?> -
                <?= route('users/destroy/', 'Delete', $user->id, ['class' => 'btn red']) ?>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>


?>


