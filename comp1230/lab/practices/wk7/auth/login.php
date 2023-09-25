<?php
session_start();
$s_username = '101069146@georgebrown.ca';
$s_password = '123456789';
$message = '';
$username = (isset($_COOKIE['username'])) ? $_COOKIE['username'] : '';
if(isset($_POST['username']) && isset($_POST['password'])) {
    // 1. sanitize data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // 2. check if is a valid user
    if($s_username === $username && $s_password === $password){ 
    // 3. and if userid and password match, add username to session
        $_SESSION["username"] = $username;
        setcookie('username', $username, time() + (60 * 60 * 24 * 365), "/");
    } else {
        $username = '';
        $message = "Invalid Username or Password!";
    }
}
if(isset($_SESSION["username"])) {
    header("Location:index.php"); // now user is allowed to see the index page
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>

    <style>
    .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }

    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    input{
        margin: 3px;
    }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" align="center">
            <h2>Log in</h2>       
            <div><?= $message ?></div>
            <div>
                <input type="text" name="username" value='<?= $username?>' placeholder="Username" required autocomplete="off" autofocus>
            </div>
            <div>
                <input type="password" autocomplete="off" placeholder="Password" name="password" required>
            </div>
            <div>
                <button type="submit" value="Submit">Log in</button>
            </div>      
        </form>
    </div>
</body>
</html>
<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>