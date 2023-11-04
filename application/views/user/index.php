<h1>User List</h1>
<a href="<?php echo site_url('user/create'); ?>">Create User</a>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo $user['nom']; ?></li>
    <?php endforeach; ?>
</ul>
