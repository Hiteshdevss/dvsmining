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
        <!-- Charts Section -->
        <div class="mt-8 grid gap-6 grid-cols-1 lg:grid-cols-2 z-0">
            <!-- Blog & News Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Blog & News Posts</h3>
                <div class="relative" style="height: 300px;">
                    <canvas id="blogNewsChart"></canvas>
                </div>
            </div>
            
            <!-- Enquiries & Suggestions Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Enquiries & Suggestions</h3>
                <div class="relative" style="height: 300px;">
                    <canvas id="enquirySuggestionChart"></canvas>
                </div>
            </div>
            
            <!-- Job Posts & Applications Chart -->
            <div class="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
                <h3 class="text-xl font-semibold mb-4">Job Posts & Applications</h3>
                <div class="relative" style="height: 300px;">
                    <canvas id="jobApplicationChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart.js Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Function to create responsive charts
            function createResponsiveChart(ctx, type, data, options) {
                return new Chart(ctx, {
                    type: type,
                    data: data,
                    options: {
                        ...options,
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }

            // Blog & News Chart
            const blogNewsCtx = document.getElementById('blogNewsChart').getContext('2d');
            createResponsiveChart(blogNewsCtx, 'bar', {
                labels: ['Blogs', 'News'],
                datasets: [{
                    label: 'Number of Posts',
                    data: [10, 8],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }, {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            });

            // Enquiries & Suggestions Chart
            const enquirySuggestionCtx = document.getElementById('enquirySuggestionChart').getContext('2d');
            createResponsiveChart(enquirySuggestionCtx, 'pie', {
                labels: ['Enquiries', 'Suggestions'],
                datasets: [{
                    data: [600, 1000],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            }, {
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            });

            // Job Posts & Applications Chart
            const jobApplicationCtx = document.getElementById('jobApplicationChart').getContext('2d');
            createResponsiveChart(jobApplicationCtx, 'bar', {
                labels: ['Job Posts', 'Applications Received'],
                datasets: [{
                    label: 'Count',
                    data: [328, 1650],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 205, 86, 0.6)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }, {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            });
        </script>
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
