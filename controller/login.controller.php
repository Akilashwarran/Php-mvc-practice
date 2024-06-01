<?php
// login.php
require '../model/connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all expected POST variables are set
    if (isset($_POST['email'], $_POST['password'])) {
        // Collect and sanitize input data
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error = 'Please fill all the fields.';
        } else {
            // Prepare and execute the SQL statement to retrieve user data
            $stmt = $pdo->prepare('SELECT id, name, username, email, password FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $user['id']; // Store user ID in session
                $_SESSION['username'] = $user['username']; // Optionally, store username in session
                $_SESSION['email'] = $user['email']; // Store email in session
                
                // Redirect to home page
                header('Location: ../dashboard.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        }
    } else {
        $error = 'Please fill all the fields.';
    }
}
?>

<!-- Display error message if exists -->
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>
