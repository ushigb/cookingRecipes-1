<?php
include 'head.php';
include 'functions.php';
?>

<form method="post" action="register.php" class="access">

    <div class="input-group-access">
        <h4><label>Username:</label></h4>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group-access">
        <h4><label>Email:</label></h4>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group-access">
        <h4><label>Password:</label></h4>
        <input type="password" name="password_1">
    </div>
    <div class="input-group-access">
        <h4><label>Country:</label></h4>
        <input type="text" name="country" value="<?php echo $country; ?>">
    </div>        
    <div class="reg-btn">
        <button class="btn btn-outline-info" type="submit" name="register_btn">Register</button>
        <div>
            <?php echo display_error(); ?>
        </div></div>
    <div class="some">
        <p>
            Already a member? <a href="login.php">Log In</a>
        </p>
        <a href="index.php">Back</a>
    </div>
</form>