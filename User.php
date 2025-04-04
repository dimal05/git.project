<?php
class User {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Kontrollo nëse përdoruesi ekziston gjatë regjistrimit
    public function checkIfUserExists($email) {
        $query = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0; // Kthejmë true nëse përdoruesi ekziston
    }

    // Regjistro përdoruesin nëse email-i nuk ekziston
    public function register($name, $email, $password, $role = 'users') {
        // Kontrollo nëse përdoruesi ekziston
        if ($this->checkIfUserExists($email)) {
            echo "<div class='text-red-500'>This email is already registered.</div>";
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
    
        // Bind parameters with correct types
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);
    
        return $stmt->execute(); // Return true if registration is successful
    }

    // Përdorimi i login-it dhe verifikimi i fjalëkalimit
    public function login($email, $password) {
        $query = "SELECT id, name, email, password, role FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $hashedPassword, $role);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION["id"] = $id;
                $_SESSION["user_name"] = $name;
                $_SESSION["user_role"] = $role; // Save the role in the session
                return true;
            } else {
                // Password is incorrect
                return false;
            }
        }

        // Email doesn't exist
        return false;
    }

    // Funksioni për të marrë informacionin e përdoruesit nga email-i
    public function getUserByEmail($email) {
        $query = "SELECT id, name FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name);
            $stmt->fetch();

            return [
                'id' => $id,
                'name' => $name,
            ];
        }

        return null;
    }

    // Funksioni për logout-in dhe redirektimin pas daljes
    public function logout($redirect = "index.php") {
        // Start the session (if not already started)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Redirect to the login page or any other desired page after logout
        header("Location: $redirect");
        exit();
    }
}
// http://localhost/projektifinal
?>
