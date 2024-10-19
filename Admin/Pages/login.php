<?php
// Start the session to store login state
session_start();
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
    include '../../Inc/dbcon.php'; // Adjust the path as needed

    // Check if connection was successful
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Retrieve and sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email exists
    if ($stmt->num_rows > 0) {
        // Bind the result (password hash) and verify the password
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store user data in session and redirect
            $_SESSION['user_id'] = $user_id;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DVSMining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-custom {
            background-image: url('https://477837.fs1.hubspotusercontent-na1.net/hubfs/477837/BMcD_Web_Assets/What%20We%20Do/Industry%20Images%20(2023)/Hero%20Images/Mining-Industry-Hero.webp');
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-custom bg-cover bg-center">
    <div class="bg-white p-8 m-4 md:m-0 shadow-lg rounded-lg shadow-md w-full max-w-sm">
        <img src="../Asset/Image/D-logo.png" class="w-44 mx-auto mb-6" alt="">

        <!-- Display error message if exists -->
        <?php if ($error): ?>
            <p class="text-red-500 text-center mb-4"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            </div>
            <button type="submit" class="w-full p-3 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition-colors">Login</button>
        </form>
        <p class="text-center text-gray-600 mt-4">
            Don't have an account? <a href="register.php" class="text-orange-600 hover:underline">Sign up</a>
        </p>
    </div>
</body>
</html>
