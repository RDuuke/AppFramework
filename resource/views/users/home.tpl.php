<h3 class="thin">Welcome to Users!!!</h3>
<?php route('users/create', "New User"); ?>
<?php if(getFlashMessage('test')): ?>
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
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->name ?></td>
                <td><?php route('users/edit/','Edit', $user->id, ['class' => 'btn']) ?> -
                    <?php route('users/destroy/', 'Delete', $user->id, ['target' => "_blank", "class" => "btn red"]) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>


