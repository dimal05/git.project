<?php
session_start();


if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {

    header('Location: index.php');  
    exit();
}

require '../config/Databasee.php';


if (isset($_POST['submit'])) {
   
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

    if (empty($password)) {
        echo "Fusha e passwordit nuk mund të jetë e zbrazët. Ju lutem shkruani një password.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
           
            $conn->beginTransaction();

            
            $sql = 'INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)';
            $query = $conn->prepare($sql);

            
            $query->bindParam(':name', $name);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $hashed_password);
            $query->bindParam(':role', $role);

            
            $query->execute();

            
            $conn->commit();

            
            header("Location: users.php?message=success");
            exit();
        } catch (Exception $e) {
            
            $conn->rollBack();
            echo "Gabim gjatë shtimit të përdoruesit: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shto Përdorues të Ri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h2>Shto Përdorues të Ri</h2>

        <form action="add_users.php" method="post">
            <fieldset>
                <legend>Informacioni i Përdoruesit</legend>

                
                <div class="mb-3">
                    <label for="name" class="form-label">Emri</label>
                    <input type="text" name="name" class="form-control" placeholder="Shkruani emrin tuaj" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                </div>

                
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Shkruani emailin tuaj" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                </div>

                
                <div class="mb-3">
                    <label for="password" class="form-label">Fjalëkalimi</label>
                    <input type="password" name="password" class="form-control" placeholder="Shkruani fjalëkalimin tuaj" required>
                </div>

                
                <div class="mb-3">
                    <label for="role" class="form-label">Roli</label>
                    <select name="role" class="form-select" required>
                        <option value="user" <?php echo isset($role) && $role == 'user' ? 'selected' : ''; ?>>User</option>
                        <option value="admin" <?php echo isset($role) && $role == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>

                
                <div class="mb-3">
                    <input type="submit" name="submit" value="Ruaj shenimet" class="btn btn-primary">
                </div>
            </fieldset>
        </form>
    </div>

    
    <?php if (isset($_GET['message']) && $_GET['message'] == 'success'): ?>
        <div class="alert alert-success mt-3">Përdoruesi u shtua me sukses!</div>
    <?php endif; ?>

</body>

</html>
