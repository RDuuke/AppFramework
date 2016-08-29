<?php $this->layout('layout\base') ?>
<h3 class="thin">Create User</h3>
<?php route('users', 'To get back'); ?>
<form action="<?= BASE_PUBLIC.'/users'  ?>" method="post">
    <?php include '_partial/_campos.tpl.php'; ?>
    <button>Save</button>
</form>
