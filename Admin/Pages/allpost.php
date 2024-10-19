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
        <?php include '../Inc/sidebar.php'; ?>

        <!-- Navbar -->
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
            <!-- Navbar -->
            <?php include '../Inc/navbar.php'; ?>

            <!-- Dashboard Content -->
            <main class="p-4 md:p-6 overflow-y-auto">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="text-center md:text-left">
                        <p class="text-2xl font-bold">Namaste 🙏 <span class="text-orange-600">Ratandip</span> Ji</p>
                        <p class="mt-2">Your hard work and dedication inspire us all. Keep up the amazing work!</p>
                    </div>

                    <!-- Search Bar -->
                    <div class="mt-6 md:mt-0 flex items-center">
                        <input type="text" placeholder="Search blog posts..." class="flex-grow p-2 px-8 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <button class="bg-orange-500 text-white px-4 py-2 rounded-r-lg hover:bg-orange-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

<!-- Blog and News Statistics -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Bar Chart for Blog Posts -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4">Blog Posts by Month</h3>
        <div class="relative" style="height: 300px;"> <!-- Adjust height for responsiveness -->
            <canvas id="blogChart" class="absolute inset-0 w-full h-full"></canvas>
        </div>
    </div>
    
    <!-- Line Chart for News Posts -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4">News Posts by Month</h3>
        <div class="relative" style="height: 300px;"> <!-- Adjust height for responsiveness -->
            <canvas id="newsChart" class="absolute inset-0 w-full h-full"></canvas>
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

    // Blog Posts Bar Chart
    const blogCtx = document.getElementById('blogChart').getContext('2d');
    createResponsiveChart(blogCtx, 'bar', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Number of Blog Posts',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    }, {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    });

    // News Posts Line Chart
    const newsCtx = document.getElementById('newsChart').getContext('2d');
    createResponsiveChart(newsCtx, 'line', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Number of News Posts',
            data: [8, 15, 7, 12, 9, 11],
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    }, {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    });
</script>


                <!-- Blog Post List -->
                <div class="mt-8">
                    <h2 class="text-2xl font-semibold mb-4">All Blog & News Posts</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-orange-600 text-white text-left">
                                    <th class="py-2 px-4 border-b">Title</th>
                                    <th class="py-2 px-4 border-b">Author</th>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b">Introduction to Mining Technology</td>
                                    <td class="py-2 px-4 border-b">John Doe</td>
                                    <td class="py-2 px-4 border-b">2023-04-15</td>
                                    <td class="py-4 px-6 flex md:flex-row flex-col md:space-y-0 space-y-2 items-center justify-start md:space-x-2">
                                    <button class="bg-orange-500 text-white px-3 py-1 rounded-lg hover:bg-orange-600 view-details flex" data-name="Jane Smith" data-email="janesmith@example.com" data-phone="+0987654321" data-status="Accepted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill mt-1 mr-1" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                        </svg> 
                                        View
                                    </button>
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill mt-1 mr-1" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg>    
                                        Delete
                                    </button>
                                </td>
                                </tr>
                                <!-- More rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menu-toggle');
        const closeBtn = document.getElementById('close-btn');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
</body>
</html>