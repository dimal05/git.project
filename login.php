<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "webprojekti");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $user = new User($database);
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    if ($user->login($email, $password)) {
        
        $user_role = $_SESSION['user_role']; 

        
        if ($user_role == 'admin') {
            header("Location: dashboard/users.php");
        } else {
            
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid login credentials. Please try again.";
    }
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Styling for the login box */
        .login-box {
            display: flex-1;
            float: right;
            margin-right: 450px;
            margin-top: 65px;
            background-color: #3498db;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            width: 600px;
            color: #fff;
        }

        .login-header {
            background-color: #2980b9;
            padding: 20px;
            text-align: center;
        }

        .login-container {
            padding: 20px;
            box-sizing: border-box;
        }

        .login-container label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #ecf0f1;
            color: #333;
        }

        .login-container .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .login-container .remember-me input {
            margin-right: 8px;
        }

        .login-box a,
        .login-box button {
            display: inline-block;
            padding: 10px;
            background-color: #2980b9;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .login-container .Register,
        .login-container .cancel {
            text-align: center;
            margin-top: 10px;
        }

        .login-container .cancel a,
        .login-container .Register a {
            color: #ecf0f1;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-box">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <div class="login-container">
            <form action="" method="POST">
                <label for="email">Email/Username:</label>
                <input type="text" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit" name="login" value="Login now">Login</button>
                <div class="Register">
                    <a href="register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include 'footer.php';
?>
