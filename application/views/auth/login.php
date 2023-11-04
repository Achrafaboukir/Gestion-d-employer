<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Include your CSS files here -->
</head>
<body>

<div class="container">
    <h2>Login</h2>

    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php echo form_open('auth/login'); ?>

        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

    <?php echo form_close(); ?>

</div>

</body>
</html>
