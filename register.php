<?php
session_start();

require_once 'Database.php';
require_once 'User.php';

include 'header.php';

$database = new Database("localhost", "root", "", "webprojekti");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kontrolloni nëse fusha është e zbrazët
    if (empty($name) || empty($email) || empty($password)) {
        echo "<div class='text-red-500'>All fields are required.</div>";
    } else {
        // Kontrolloni nëse email-i është në formatin e duhur
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='text-red-500'>Invalid email format.</div>";
        } else {
            $user = new User($database);

            // Kontrolloni nëse përdoruesi ekziston tashmë
            if ($user->checkIfUserExists($email)) {
                echo "<div class='text-red-500'>This email is already registered.</div>";
            } else {
                // Kripto fjalëkalimin
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Regjistroni përdoruesin
                $registrationResult = $user->register($name, $email, $hashedPassword);

                if ($registrationResult) {
                    // Kryeni login-in e menjëhershëm pas regjistrimit
                    $loginResult = $user->login($email, $password);

                    while ($loginResult == true) {
                        header("Location: index.php");
                        exit();
                    } 
                } else {
                    echo "<div class='text-red-500'>Registration failed. Please try again.</div>";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
<div class="flex justify-center items-center mx-auto bg-gray-150 font-onest min-h-full">
  <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      <div>
      <h2 class="mt-8 text-5xl font-bold text-center leading-9 tracking-tight text-gray-900">Create Account<span class="text-yellow-500 mt-2 text-4xl"><br></h2>

        <div class="mt-8">
          <form method="POST" action="" class="space-y-6">

            <div>
              <label type="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
              <div class="mt-2">
                <input id="name" type="text" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6" name="name" required autocomplete="name" autofocus>
              </div>
            </div>

            <div>
              <label type="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
              <div class="mt-2">
                <input id="email" type="email" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6" name="email" required autocomplete="email">
              </div>
            </div>

            <div>
              <label type="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" type="password" class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6" name="password" required autocomplete="new-password">
              </div>
            </div>

            <div class="flex items-center">
              <input id="subscribe" name="subscribe" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-yellow-600 focus:ring-yellow-600">
              <label type="subscribe" class="ml-3 block text-sm leading-6 text-gray-700">Subscribe to Newsletter</label>
            </div>

            <div class="flex items-center">
              <input id="agree-terms" name="agree-terms" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-yellow-600 focus:ring-yellow-600">
              <label for="agree-terms" require class="ml-3 block text-sm leading-6 text-gray-700">Agree to Terms and Conditions</label>
            </div>

            <div>
            <button type="submit" name="register" value="Register now"
                                    class="flex w-full justify-center rounded-md bg-yellow-400 px-3 py-1.5 text-xl font-semibold leading-6 text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-400">Create
                                Account
                            </button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
include 'footer.php'
?>

