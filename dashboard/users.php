<?php
// Lista e përdoruesve index
require '../config/Databasee.php';

$query = $conn->query('SELECT * FROM users');
$users = $query->fetchAll();
?>

<div class="container">
    <h1>
        <a href="add_users.php">Shto një përdorues të ri</a>
    </h1>
    <table border="1">
        <thead>
            <tr>
                <th>Emri</th>
                <th>E-mail</th>
                <th>Roli</th>
                <th>Funksionet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td>
                    <a href="edit_users.php?id=<?php echo $user['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="delete_users.php?id=<?php echo $user['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

