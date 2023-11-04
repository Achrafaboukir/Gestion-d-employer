<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <?php echo form_open('user/store'); ?>
        <input type="text" name="nom" placeholder="Name">
        <input type="text" name="prenom" placeholder="Surname">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="mot_de_passe" placeholder="Password">
        <input type="text" name="role" placeholder="Role">
        <button type="submit">Save</button>
    <?php echo form_close(); ?>
</body>
</html>
