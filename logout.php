<?php
 // Ensure the session is started

require_once 'User.php';
require_once 'Database.php';

$database = new Database("localhost", "root", "", "webprojekti");

$user = new User($database);

$user->logout();
?>
