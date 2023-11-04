<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>
    <?php echo form_open('employee/store'); ?>
        <input type="text" name="nom" placeholder="Name">
        <input type="text" name="prenom" placeholder="Surname">
        <input type="email" name="mail" placeholder="Email">
        <textarea name="adresse" placeholder="Address"></textarea>
        <input type="text" name="telephone" placeholder="Telephone">
        <input type="text" name="poste" placeholder="Post">
        <button type="submit">Save</button>
    <?php echo form_close(); ?>
</body>
</html>
