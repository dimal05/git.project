<?php

session_start(); 
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');  
    exit();
}

require '../config/Databasee.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    
    header("Location: users.php");
    exit();
}


$sql = 'SELECT * FROM users WHERE id = :id';
$query = $conn->prepare($sql);
$query->execute(['id' => $id]);

$user = $query->fetch();


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role']; 

    
    $sql_update = 'UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id';
    $query_update = $conn->prepare($sql_update);

    
    $query_update->bindParam(':name', $name);
    $query_update->bindParam(':email', $email);
    $query_update->bindParam(':role', $role);
    $query_update->bindParam(':id', $id);

    try {
       
        $query_update->execute();
        
        
        if ($query_update->rowCount() > 0) {
            
            header("Location: users.php");
            exit();
        } else {
            
            echo "Nuk ka pasur ndryshime në të dhënat e përdoruesit.";
        }
    } catch (PDOException $e) {
        echo "Gabim gjatë përditësimit: " . $e->getMessage();
    }
}
?>

<div class="container">
    <form method="post">
        <fieldset>
            <legend>Ndrysho te dhenat e perdoruesit</legend>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" placeholder="Shenoni emrin tuaj"><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Shenoni email tuaj"><br>
            <label for="role">Roli</label><br>
            <select name="role">
                <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select><br> 
            <br>
            <input type="submit" name="submit" value="Ruaj shenimet">
        </fieldset>
    </form>
</div>
