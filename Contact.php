<?php
session_start();
include 'send_email.php';  // Përfshini këtë përpara ekzekutimit të logjikës së POST

// Lidhja me bazën e të dhënave
$servername = "localhost";
$username = "root"; // Emri i përdoruesit të MySQL
$password = ""; // Fjalëkalimi për MySQL
$dbname = "webprojekti"; // Emri i bazës së të dhënave (ndrysho sipas nevojës)

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrolloni nëse ka ndodhur një gabim lidhjeje
if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave ka dështuar: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Validimi i fushave
    if (empty($name) || empty($surname) || empty($email) || empty($phone) || empty($message)) {
        $error = "Ju lutemi plotësoni të gjitha fushat!";
    } else {
        // Insertimi në bazën e të dhënave
        $stmt = $conn->prepare("INSERT INTO contacts (name, surname, email, phone, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $surname, $email, $phone, $message);

        if ($stmt->execute()) {
            $success = "Mesazhi u dërgua dhe ruajt në bazën e të dhënave me sukses!";
        } else {
            $error = ".";
        }

        // Mbyll lidhjen e përgatitur
        $stmt->close();
    }
}

// Mbyll lidhjen e databazës
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
</head>
<body>

<div class="form-container">
    <h2>Kontaktoni me Ne</h2>
    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Emri:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your name">

        <label for="surname">Mbiemri:</label>
        <input type="text" id="surname" name="surname" required placeholder="Enter your surname">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">

        <label for="phone">Numri i telefonit:</label>
        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">

        <label for="message">Mesazhi:</label>
        <textarea id="message" name="message" rows="4" required placeholder="type your message here"></textarea>

        <input type="submit" value="Dërgo Mesazhin">
    </form>
</div>

</body>
</html>
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form Container */
.form-container {
    background: white;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
}

/* Headings */
h2 {
    margin-bottom: 20px;
}

/* Input Fields */
form {
    display: flex;
    flex-direction: column;
}

label {
    text-align: left;
    font-weight: bold;
    margin-top: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    resize: none;
}

/* Submit Button */
input[type="submit"] {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    margin-top: 15px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

input[type="submit"]:hover {
    background: #0056b3;
}

/* Error and Success Messages */
.error {
    color: red;
    margin-bottom: 10px;
}

.success {
    color: green;
    margin-bottom: 10px;
}

/* Responsive Design */
@media (max-width: 500px) {
    .form-container {
        width: 90%;
    }
}</style>
<?php
include 'footer.php';
?>