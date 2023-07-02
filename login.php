<?php
include 'head.php';
include 'functions.php';
?>

<form method="post" action="login.php" class="access">

    <div class="input-group-access">
        <div class="input-group-access">
                <input type="hidden" name="user_id" >
            </div>
        <h4><label>Username:</label></h4>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    
    <div class="input-group-access">
        <h4><label>Password:</label></h4>
        <input type="password" name="psw">
    </div>
         
    <div class="reg-btn">
        <button class="btn btn-outline-info" type="submit" name="login_btn">Log In</button>
      </div>
    <?php echo display_error(); ?>
    <div class="some">
        <p>
            Not yet a member? <a href="register.php">Sign In</a>
        </p>
        <a href="index.php">Back</a>
    </div>
</form>