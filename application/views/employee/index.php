<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>
    <a href="<?php echo site_url('employee/create'); ?>">Create Employee</a>
    <ul>
        <?php foreach ($employees as $employee): ?>
            <li><?php echo $employee['nom']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
