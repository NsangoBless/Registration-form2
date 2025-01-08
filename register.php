<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration formm</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form metthod="post" action="register.php">
        <?php include=('errors.php');?>
        <div class="input-grop">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username;?>">
        </div>
        <div class="input-grop">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email;?>">
        </div>
        <div class="input-grop">
            <label>Password</label>
            <input type="password" name="password1">
        </div>
        <div class="input-grop">
            <label>Password</label>
            <input type="password" name="password2">
        </div>
        <div class="input-grop">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>

</body>
</html>