<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Apply for Job - DVSMining</title>
</head>
<body class="bg-gray-50">
    <?php include '../../Inc/NavbarDetailed.php'; ?>

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

    $stmt->close();
    ?>

    <!-- Apply Form -->
    <div class="container mx-auto mt-10 px-4 md:px-36">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-semibold mb-4">Apply for: <?php echo htmlspecialchars($job['job_title']); ?></h1>

            <form action="submit_application.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

                <div class="mb-4">
                    <label for="name" class="block text-lg font-semibold">Name:</label>
                    <input type="text" name="name" id="name" required class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-lg font-semibold">Email:</label>
                    <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-lg font-semibold">Phone:</label>
                    <input type="tel" name="phone" id="phone" required class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="resume" class="block text-lg font-semibold">Upload Resume:</label>
                    <input type="file" name="resume" id="resume" required class="w-full px-4 py-2 border rounded-lg">
                </div>

                <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white rounded-full px-8 py-3 mt-6 transition-colors duration-300">
                    Submit Application
                </button>
            </form>
        </div>
    </div>

    <?php include '../../Inc/FooteDetailed.php'; ?>
</body>
</html>
