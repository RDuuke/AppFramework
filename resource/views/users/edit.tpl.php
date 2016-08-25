<?php $this->layout('layout\base') ?>
<h3 class="thin">Edit User: <?php echo $user->name; ?></h3>
<?php route('users', 'To get back'); ?>

<form action="<?php echo BASE_PUBLIC.'/users/update/'.$user->id ?>" method="post">
    <?php include '_partial/_campos.tpl.php'; ?>
    <button>Update</button>
</form>