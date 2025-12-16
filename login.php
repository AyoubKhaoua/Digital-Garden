<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/register.css?v=1">
</head>

<body>
    <div class="register-wrapper">

        <div class="card" role="region" aria-labelledby="login-heading">
            <header class="card-header">
                <h1 id="login-heading" class="card-title">Sign in</h1>
                <p class="card-subtitle">Welcome back — please enter your details to continue.</p>
            </header>
            <form class="signup-form" action="login.php" method="get">
                <div class="form-group form-row">
                    <label for="user">Email</label>
                    <input type="text" name="user" id="user" placeholder="...@domain.com " required>
                </div>
                <div class="form-group form-row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" required>
                </div>
                <!-- <div class="form-group form-row">
                    <label style="display:flex;align-items:center;gap:8px;font-size:0.9rem;">
                        <input type="checkbox" name="remember" id="remember" style="width:16px;height:16px;"> Remember me
                    </label>
                </div> -->
                <div class="form-group form-row">
                    <button type="submit" class="btn-primary">Sign in</button>
                </div>
                <p class="muted">Forgot your password? <a href="#">Reset</a> • New here? <a href="register.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include './includes/auth.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['user']) && !empty($_GET['password'])) {
        $email = $_GET['user'];
        $password = $_GET['password'];
        $Query = "select * from users where email='$email' and password='$password'";
        $check = mysqli_query($connect, $Query);
        $res = mysqli_num_rows($check);
        if ($res) {
            header('Location:dashboard.php');
        }
    }
}
?>