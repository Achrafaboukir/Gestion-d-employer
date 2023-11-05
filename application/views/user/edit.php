<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 5rem;
        }
        .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
<?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">User Management</a>
    </nav>

    <main role="main" class="container">
        <h1 class="mt-5">Edit User</h1>
        <?php echo form_open('user/update/' . $user['id']); ?>

            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="nom" value="<?php echo $user['nom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname" name="prenom" value="<?php echo $user['prenom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="login" value="<?php echo $user['login']; ?>" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role_id">
                    <!-- Dynamically populate the select menu with roles -->
                    <?php foreach ($roles as $role): ?>
                        <option value="<?php echo $role['role_id']; ?>" <?php echo ($user['role_id'] == $role['role_id']) ? 'selected' : ''; ?>>
                            <?php echo $role['role_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        <?php echo form_close(); ?>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
