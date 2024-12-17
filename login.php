<?php
// Predefined list of authorized emails and passwords (you can modify this or fetch from a database)
$authorizedEmails = [
    'arnoldmascot0@gmail.com' => 'password123', // Example: email => password
    'user2@example.com' => 'password456',
    'user3@example.com' => 'password789'
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are valid
    if (array_key_exists($email, $authorizedEmails) && $authorizedEmails[$email] === $password) {
        // Login successful: redirect to jobs.html
        header('Location: jobs.html');
        exit();
    } else {
        // Invalid credentials: display an error message
        $error_message = 'Invalid email or password. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="/logo.png">
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>

        <!-- Display error message if login failed -->
        <?php if (isset($error_message)): ?>
            <div style="color: red;"><?= $error_message ?></div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="login.php" method="POST" target="_top" id="loginForm">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="gstrang@mit.edu" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="•••••••••" required>
            </div>

            <button type="submit" id="loginButton">Log In</button>
        </form>
    </div>
</body>

</html>
