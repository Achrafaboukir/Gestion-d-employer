<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add other necessary meta tags and link tags for stylesheets -->
</head>
<body>
    <div class="container mt-5">
        <!-- Validation Errors -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- User Creation Form -->
        <h1 class="mb-4">Create User</h1>
        <?php echo form_open('user/store', ['class' => 'needs-validation', 'novalidate' => true]); ?>
            <div class="form-group">
                <input type="text" class="form-control" name="nom" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="prenom" placeholder="Surname" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="login" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="mot_de_passe" placeholder="Password" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role_id" id="role" class="form-control" required>
                    <option value="">Select a role</option>
                    <?php foreach ($roles as $role): ?>
                        <option value="<?php echo htmlspecialchars($role['role_id']); ?>">
                            <?php echo htmlspecialchars($role['role_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        <?php echo form_close(); ?>
    </div>

    <!-- Include Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
