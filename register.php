<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/register.css?v=1">
</head>

<body>
    <div class="register-wrapper">
        <div class="card" role="region" aria-labelledby="signup-heading">
            <header class="card-header">
                <h1 id="signup-heading" class="card-title">Create Account</h1>
                <p class="card-subtitle">Sign up to manage your notes and grow your ideas.</p>
            </header>
            <form class="signup-form" action="register.php" method="post">
                <div class="form-group form-row">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="username">
                </div>
                <div class="form-group form-row">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="..@domain.com">
                </div>
                <div class="form-group form-row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter  password" required>
                </div>
                <div class="form-group form-row">
                    <button type="submit" class="btn-primary">Create Account</button>
                </div>
                <p class="muted">Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include './config/database.php';
if (/* isset($_POST['submit']) */$_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = stripslashes($_POST['username']);
    $email = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);
    var_dump($username, $email, $password);
    $query = "select * from  users where email='$email'";
    $res = mysqli_query($connect, $query);
    if (mysqli_num_rows($res) == 0) {
        $insert = "insert into users (username,email,password,created_at)values('$username','$email','$password', CURRENT_TIMESTAMP)";
        mysqli_query($connect, $insert);
        header('location:index.php');
    } else {
        echo '<p>the user already exists </p>';
    }
};




?>