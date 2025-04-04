<?php

$servername = "localhost";
$name = "root";
$password = "";
$database = "webprojekti";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $name, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Lidhja u realizua me sukses";
} catch(PDOException $e) {
    echo "Lidhja nuk u realizua: " . $e->getMessage();
}

?>
