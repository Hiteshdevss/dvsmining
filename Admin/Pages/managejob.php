<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application list - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
            justify-content: center;
            align-items: center;
            z-index: 50; /* Ensure it's above other content */
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
        }

        .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Slim Sidebar -->
        <?php include '../Inc/sidebar.php'; ?>
       
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
        <!-- Navbar -->
        <?php include '../Inc/navbar.php'; ?>

            <!-- Form Content -->
            <main class="flex-1 p-6">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <h2 class="text-xl font-semibold mb-4 md:mb-0">List of Job Applications</h2>
                <div class="flex w-full md:w-auto">
                    <input type="text" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" placeholder="Search...">
                    <button class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
                </div>
            </div>



                <!-- Job and Applicant Statistics -->
                <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jobs Graph -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold mb-4">Job Postings</h3>
                        <canvas id="jobsChart"></canvas>
                    </div>
                    
                    <!-- Applicants Graph -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold mb-4">Applicants</h3>
                        <canvas id="applicantsChart"></canvas>
                    </div>
                </div>

                <!-- Chart.js Script -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // Sample data - replace with actual data from your backend
                    const jobsData = {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Job Postings',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        }]
                    };

                    const applicantsData = {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Applicants',
                            data: [50, 60, 70, 180, 190, 220],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    };

                    // Jobs Chart
                    new Chart(document.getElementById('jobsChart'), {
                        type: 'bar',
                        data: jobsData,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Applicants Chart
                    new Chart(document.getElementById('applicantsChart'), {
                        type: 'line',
                        data: applicantsData,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>


                <!-- Table to display applications -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-orange-600 text-white">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Applied</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Phone</th>
                                <th class="py-3 px-6 text-left">Resume</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row (data should be dynamically populated) -->
                            <tr class="border-b">
                                <td class="py-4 px-6">John Doe</td>
                                <td class="py-4 px-6">Mechanical Engineer</td>
                                <td class="py-4 px-6">johndoe@example.com</td>
                                <td class="py-4 px-6">+1234567890</td>
                                <td class="py-4 px-6">
                                    <a href="#" class="text-blue-500 hover:underline">Download Resume</a>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Accepted</span>
                                    <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-xs">Rejected</span>
                                </td>
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
                            <tr class="border-b">
                                <td class="py-4 px-6">Jane Smith</td>
                                <td class="py-4 px-6">Geological Engineer</td>
                                <td class="py-4 px-6">janesmith@example.com</td>
                                <td class="py-4 px-6">+0987654321</td>
                                <td class="py-4 px-6">
                                    <a href="#" class="text-blue-500 hover:underline">Download Resume</a>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Accepted</span>
                                    <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-xs">Rejected</span>
                                </td>
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
            </main>

            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <h2 class="text-xl font-semibold mb-4">Application Details</h2>
                    <p><strong>Name:</strong> <span id="modal-name"></span></p>
                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                    <p><strong>Phone:</strong> <span id="modal-phone"></span></p>
                    <p><strong>Status:</strong> <span id="modal-status"></span></p>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Toggle sidebar visibility
            $('#menu-toggle').click(function() {
                $('#sidebar').toggleClass('-translate-x-full');
            });

            $('#close-btn').click(function() {
                $('#sidebar').addClass('-translate-x-full');
            });

            // Open modal with application details
            $('.view-details').click(function() {
                $('#modal-name').text($(this).data('name'));
                $('#modal-email').text($(this).data('email'));
                $('#modal-phone').text($(this).data('phone'));
                $('#modal-status').text($(this).data('status'));
                $('#myModal').fadeIn();
            });

            // Close modal
            $('#closeModal').click(function() {
                $('#myModal').fadeOut();
            });

            // Close modal when clicking outside of modal
            $(window).click(function(event) {
                if ($(event.target).is('#myModal')) {
                    $('#myModal').fadeOut();
                }
            });
        });
    </script>
</body>
</html>
