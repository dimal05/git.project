<?php
    
    session_destroy();
    session_unset();
    

    // Lista e përdoruesve index
    require '../config/Database.php';


    if(isset($_POST['submit'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $message = '';

        $query = $pdo->prepare('SELECT user_id, name, email, password FROM users WHERE username = :username');
        $query->bindValue(':username', $username);
        $query->execute();

        $user = $query->fetch();

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: index.php");
            exit();
        } else {
            $message = "Na vjen keq, kredencialet nuk përputhen!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-danger">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="card" style="width: 500px; margin: 0 auto">
            <div class="card-header">
                Login
            </div>

            <form action="login.php" method="post" class="p-1">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <input type="submit" name="submit" value="Login" class="btn btn-primary mt-2">
                <p>Not a member yet? <a href="signup.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include 'footer.php'
?>