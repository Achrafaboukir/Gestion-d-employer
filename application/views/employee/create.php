<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        
        .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Display validation errors -->
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>

    <!-- Your form code here -->
</div>

    

    <main role="main" class="container">
        <h1 class="mt-5">Create Employee</h1>
        <?php echo form_open('employee/store'); ?>

            <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter name" required>
            </div>

            <div class="form-group">
                <label for="prenom">Surname</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter surname" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="mail" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="adresse">Address</label>
                <textarea class="form-control" id="adresse" name="adresse" placeholder="Enter address" required></textarea>
            </div>

            <div class="form-group">
    <label for="telephone">Phone</label>
    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone" pattern="[0-9]{10}" required title="Phone number must be in the format: 123-456-7890" >
    <small>Format: 123-456-7890</small>
</div>


            <div class="form-group">
                <label for="poste">Position</label>
                <select name="post_id" class="form-control" required>
    <option value="">Select a post</option>
    <?php foreach ($posts as $post): ?>
        <option value="<?php echo $post['post_id']; ?>">
            <?php echo htmlspecialchars($post['post_name']); ?>
        </option>
    <?php endforeach; ?>
</select>

            </div>

            <button type="submit" class="btn btn-primary">Save Employee</button>
        <?php echo form_close(); ?>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
