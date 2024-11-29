<?php
$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // MD5 encryption

    // Check credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start session
        session_start();
        $_SESSION['email'] = $email; // Store user email in session

        // Redirect to dashboard page after successful login
        header("Location: ./pages/dashboard.php");
        exit(); // Ensure script stops executing after redirect
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DVSMining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .bg-custom {
            background-image: url('https://477837.fs1.hubspotusercontent-na1.net/hubfs/477837/BMcD_Web_Assets/What%20We%20Do/Industry%20Images%20(2023)/Hero%20Images/Mining-Industry-Hero.webp');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-custom">
    <div class="bg-white p-8 m-4 md:m-0 shadow-lg rounded-lg w-full max-w-sm">
        <div class="mb-8 text-center">
            <img src="./Asset/Image/D-logo.png" class="w-44 mx-auto" alt="DVSMining Logo">
        </div>

        <form method="post" action="" id="loginForm" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    required 
                    autocomplete="email"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                    required
                    autocomplete="current-password"
                >
            </div>

            <button 
                type="submit" 
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
            >
                Sign in
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="#" class="font-medium text-orange-500 hover:text-orange-400">Contact Admin</a>
        </p>
    </div>
</body>
</html>
