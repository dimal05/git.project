<?php

session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');  
    exit();
}

require '../config/Databasee.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = 'DELETE FROM users WHERE id = :id';
    $query = $conn->prepare($sql);
    
    try {
        $query->execute(['id' => $id]);
        
        
        if ($query->rowCount() > 0) {
            header("Location: users.php?message=success");
            exit();
        } else {
            header("Location: users.php?message=notfound");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: users.php?message=error");
        exit();
    }
} else {
    header("Location: users.php?message=invalid");
    exit();
}
