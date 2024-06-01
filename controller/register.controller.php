<?php
// process_form.php
include '../model/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all expected POST variables are set
    if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirmation'])) {
        // Collect and sanitize input data
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        // Simple validation
        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($password_confirmation)) {
            die('Please fill all the fields.');
        }

        if ($password !== $password_confirmation) {
            die('Passwords do not match.');
        }

        // Check if the username or email already exists
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            die('Username or email already exists. Please choose another one.');
        }

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        $stmt = $pdo->prepare('INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)');
        if ($stmt->execute([$name, $username, $email, $passwordHash])) {
            echo 'Account created successfully!';
        } else {
            echo 'There was an error creating your account. Please try again.';
        }
    } else {
        die('Please fill all the fields.');
    }
} else {
    echo 'Invalid request method.';
}
?>
