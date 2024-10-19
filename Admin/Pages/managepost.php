<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Post - Dvsmining</title>
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
                <p class="text-2xl font-bold text-center md:text-justify">Namaste 🙏 <span class="text-orange-600">Ratandip</span> Ji</p>
                <p class="mt-2">Your hard work and dedication inspire us all. Keep up the amazing work!</p>
                <div class="mt-4 grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-orange-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
                        <h1 class="text-2xl font-medium text-orange-600">Total Blogs Posted</h1>
                        <h3 class="text-2xl font-extrabold text-orange-600">18</h3>
                    </div>
                    <div class="bg-red-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
                        <h1 class="text-2xl font-medium text-red-600">Total News Posted</h1>
                        <h3 class="text-2xl font-extrabold text-red-600">1000</h3>
                    </div>
                   
                    <div class="bg-green-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
                        <h1 class="text-2xl font-medium text-green-600">No. of Authors</h1>
                        <h3 class="text-2xl font-extrabold text-green-600">4</h3>
                    </div>
                    
                </div>

                <div class="mt-8 grid gap-4 grid-cols-1 md:grid-cols-2">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Blog Posted Over Time</h3>
                        <canvas id="blogPostsChart"></canvas>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">News Posted Over Time</h3>
                        <canvas id="newsPostsChart"></canvas>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // Blog Posts Chart
                    const blogCtx = document.getElementById('blogPostsChart').getContext('2d');
                    new Chart(blogCtx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' ,'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Blog Posted',
                                data: [5, 8, 12, 15, 20, 18, 22, 25, 30, 35, 40, 45],
                                borderColor: 'rgb(255, 99, 132)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // News Posts Chart
                    const newsCtx = document.getElementById('newsPostsChart').getContext('2d');
                    new Chart(newsCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'News Posted',
                                data: [50, 75, 100, 125, 150, 200, 250, 300, 350, 400, 40, 50],
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgb(54, 162, 235)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            
                <div class="mt-8">
                                      

                    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <h2 class="text-2xl text-black font-bold mb-4">Latest Blogs</h2>
                        <div class="flex w-full md:w-auto">
                            <input type="text" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" placeholder="Search...">
                            <button class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
                            <a href="createblog.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-800 ml-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Blog
                            </a>
                        </div>
                    </div>



                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-orange-600 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">Title</th>
                                    <th class="py-3 px-4 text-left">Author</th>
                                    <th class="py-3 px-4 text-left">Date</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">The Future of Mining Technology</td>
                                    <td class="py-3 px-4">John Doe</td>
                                    <td class="py-3 px-4">2023-04-15</td>
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
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">Sustainable Practices in Modern Mining</td>
                                    <td class="py-3 px-4">Jane Smith</td>
                                    <td class="py-3 px-4">2023-04-10</td>
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
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">Safety Innovations in Underground Mining</td>
                                    <td class="py-3 px-4">Mike Johnson</td>
                                    <td class="py-3 px-4">2023-04-05</td>
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
                            </tbody>
                        </table>
                    </div>
                    
                </div>

                <div class="mt-10"></div>

                    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <h2 class="text-2xl text-black font-bold mb-4">Latest News</h2>
                        <div class="flex w-full md:w-auto">
                            <input type="text" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" placeholder="Search...">
                            <button class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
                            <a href="createnews.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-800 ml-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                News
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-orange-600 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">Title</th>
                                    <th class="py-3 px-4 text-left">Author</th>
                                    <th class="py-3 px-4 text-left">Date</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">The Future of Mining Technology</td>
                                    <td class="py-3 px-4">John Doe</td>
                                    <td class="py-3 px-4">2023-04-15</td>
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
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">Sustainable Practices in Modern Mining</td>
                                    <td class="py-3 px-4">Jane Smith</td>
                                    <td class="py-3 px-4">2023-04-10</td>
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
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">Safety Innovations in Underground Mining</td>
                                    <td class="py-3 px-4">Mike Johnson</td>
                                    <td class="py-3 px-4">2023-04-05</td>
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
                            </tbody>
                        </table>
                    </div>
                    
                </div>

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
