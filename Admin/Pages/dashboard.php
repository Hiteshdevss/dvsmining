<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php"); // Redirect to login if not logged in
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Sidebar slide-in/out animation */
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Slim Sidebar -->
        <?php include '../inc/sidebar.php'; ?>

        <!-- Navbar -->
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
            <!-- Navbar -->
            <?php include '../Inc/navbar.php'; ?>

        <!-- Dashboard Content -->
        <main class="p-4 md:p-6 overflow-y-auto">
                <p class="text-2xl font-bold text-center md:text-justify">Namaste 🙏 <span class="text-orange-600">Ratandip</span> Ji</p>
                <p class="mt-2 text-center md:text-justify">Your hard work and dedication inspire us all. Keep up the amazing work!</p>
                <?php include '../inc/report.php'; ?>
                <?php include '../template/dashbordchart.php'; ?>
        </main>
        
       </div>
    </div>

    <script>
        $(document).ready(function () {
            // Toggle sidebar visibility for mobile and tablet with sliding effect
            $('#menu-toggle').click(function () {
                $('#sidebar').toggleClass('-translate-x-full');
            });

            // Close button to hide sidebar in mobile view
            $('#close-btn').click(function () {
                $('#sidebar').addClass('-translate-x-full');
            });

            // Handle sidebar visibility on window resize to keep it open on desktop
            $(window).resize(function () {
                if ($(window).width() >= 768) {
                    $('#sidebar').removeClass('-translate-x-full');
                } else {
                    $('#sidebar').addClass('-translate-x-full');
                }
            });
        });
    </script>
</body>
</html>
