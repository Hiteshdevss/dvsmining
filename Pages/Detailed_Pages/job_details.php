<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Job Details - DVSMining</title>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <?php include '../../Inc/NavbarDetailed.php';?>

    <?php
    // Include database connection
    include '../../Inc/dbcon.php';

    // Get job ID from the query string
    $job_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Check if a valid job ID is provided
    if ($job_id <= 0) {
        echo '<p class="text-gray-600">Invalid job ID.</p>';
        exit();
    }

    // Prepare SQL query to get the job details
    $sql = "SELECT * FROM job_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the job exists
    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        echo '<p class="text-gray-600">Job not found.</p>';
        exit();
    }

    // Close connection
    $stmt->close();
    $conn->close();
    ?>

    <!-- Fix Banner Image  -->
    <div class="-mt-44 mb-10">
        <!-- visible on desktop only -->
        <img src="../../Assets/Images/Banner/Desktop/Careers.png" alt="" class="mt-2 hidden md:block">
        <!-- visible on mobile only -->
        <img src="../../Assets/Images/Banner/Mobile/Careers.png" alt="" class="mt-2 md:hidden">
    </div>
    <!-- Job Details Section -->
    <div class="container mx-auto mt-10 px-4 md:px-36">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-semibold mb-4"><?php echo htmlspecialchars($job['job_title']); ?></h1>
            <p class="text-gray-600 text-lg mb-6 font-bold">
                Status: 
                <span class="ml-2 <?php echo ($job['status'] === 'Open') ? 'text-green-500' : 'text-red-500'; ?>">
                    <?php echo htmlspecialchars($job['status']); ?>
                </span>
            </p>


            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Job Description</h2>
                <p class="text-gray-700 mb-4"><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Requirements</h2>
                <ul class="list-disc pl-6 text-gray-700">
                    <?php
                    // Assuming requirements are stored as a comma-separated string in the database
                    $requirements = explode(',', $job['requirements']);
                    foreach ($requirements as $requirement) {
                        echo '<li>' . htmlspecialchars(trim($requirement)) . '</li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Job Details</h2>
                <div class="flex items-center mb-2">
                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3M16 7V3M3 11H21M5 19H19M7 7H17M7 15H17"></path>
                    </svg>
                    <span class="text-gray-600"><?php echo htmlspecialchars($job['location']); ?></span>
                </div>
                <div class="flex items-center mb-2">
                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4M12 8L9 5M12 8L15 5M12 8L12 12M12 16C14.7614 16 17 13.7614 17 11C17 8.23858 14.7614 6 12 6C9.23858 6 7 8.23858 7 11C7 13.7614 9.23858 16 12 16Z"></path>
                    </svg>
                    <span class="text-gray-600"><?php echo htmlspecialchars($job['job_type']); ?></span>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14L16 10M12 14L8 10M12 14V20"></path>
                    </svg>
                    <span class="text-gray-600">₹<?php echo htmlspecialchars($job['salary']); ?></span>
                </div>
            </div>

            <button onclick="window.location.href='apply.php?id=<?php echo $job_id; ?>'" class="bg-orange-500 hover:bg-orange-700 text-white rounded-full px-8 py-3 mt-6 transition-colors duration-300">
                Apply Now
            </button>
        </div>
    </div>

    <!-- Related Jobs Section -->
    <div class="container mx-auto mt-16 px-4 md:px-36">
        <div class="text-center mb-8">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Related Jobs</h2>
            <p class="mb-6 text-center text-xl">Explore our mining heritage by selecting a category</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Fetch related jobs (You may change the query based on your logic)
            include '../../Inc/dbcon.php';
            $related_jobs_sql = "SELECT * FROM job_list WHERE id != ? LIMIT 3";
            $related_stmt = $conn->prepare($related_jobs_sql);
            $related_stmt->bind_param('i', $job_id);
            $related_stmt->execute();
            $related_result = $related_stmt->get_result();

            while ($related_job = $related_result->fetch_assoc()) {
                echo '<div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">';
                echo '<a href="job_details.php?id=' . $related_job['id'] . '">';
                echo '<h3 class="text-xl font-semibold mb-2">' . htmlspecialchars($related_job['job_title']) . '</h3>';
                // echo '<p class="text-gray-600 mb-4">Status: <span class="ml-2 ' . (($related_job['status'] === 'Actively hiring') ? 'text-green-500' : 'text-red-500') . '">' . htmlspecialchars($related_job['status']) . '</span></p>';
                echo '<p class="text-gray-600 mb-4">Status: <span class="ml-2 ' . (($related_job['status'] === 'Open') ? 'text-green-500' : 'text-red-500') . '">' . htmlspecialchars($related_job['status']) . '</span></p>';

                echo '<div class="flex items-center text-gray-500 mb-2">';
                echo '<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7.732-9 13-9 13s-9-5.268-9-13a9 9 0 1118 0zM13 10a2 2 0 11-4 0 2 2 0 014 0z"></path>';
                echo '</svg>';
                echo htmlspecialchars($related_job['location']);
                echo '</div>';
                echo '<div class="flex items-center text-gray-500">';
                echo '<svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4M12 8L9 5M12 8L15 5M12 8L12 12M12 16C14.7614 16 17 13.7614 17 11C17 8.23858 14.7614 6 12 6C9.23858 6 7 8.23858 7 11C7 13.7614 9.23858 16 12 16Z"></path>';
                echo '</svg>';
                echo htmlspecialchars($related_job['job_type']);
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }

            // Close related jobs statement
            $related_stmt->close();
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../../Inc/FooteDetailed.php';?>

    <!-- Whatsapp -->
    <?php include '../../Inc/Whatsapp.php';?>

</body>
</html>