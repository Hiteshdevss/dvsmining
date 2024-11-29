<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #sidebar { transition: transform 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-100">

<?php

$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $location = $_POST['location'];
    $job_type = $_POST['job_type'];
    $salary = $_POST['salary'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $posted_date = $_POST['posted_date'];
    $application_deadline = $_POST['application_deadline'];
    $status = $_POST['status'];

    // Insert data into the database
    $sql = "INSERT INTO job_list (job_title, company_name, location, job_type, salary, description, requirements, posted_date, application_deadline, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdsdsss", $job_title, $company_name, $location, $job_type, $salary, $description, $requirements, $posted_date, $application_deadline, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Job posted successfully');</script>";
    } else {
        echo "<script>alert('Failed to post job');</script>";
    }
    $stmt->close();
}
?>

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <?php include '../Inc/sidebar.php'; ?>

    <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
        <!-- Navbar -->
        <?php include '../Inc/navbar.php'; ?>

        <!-- Form Content -->
        <main class="flex-1 p-6">
            <form class="p-6 max-w-4xl mx-auto h-full grid grid-cols-1 md:grid-cols-2 gap-6" method="POST">
                <div class="col-span-1 md:col-span-2 mb-4">
                    <label for="job_title" class="block text-orange-600 font-medium mb-2">Job Title</label>
                    <input type="text" id="job_title" name="job_title" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="company_name" class="block text-orange-600 font-medium mb-2">Company Name</label>
                    <input type="text" id="company_name" name="company_name" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-orange-600 font-medium mb-2">Location</label>
                    <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="job_type" class="block text-orange-600 font-medium mb-2">Job Type</label>
                    <select id="job_type" name="job_type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Internship">Internship</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="salary" class="block text-orange-600 font-medium mb-2">Salary</label>
                    <input type="number" step="0.01" id="salary" name="salary" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4 col-span-1 md:col-span-2">
                    <label for="description" class="block text-orange-600 font-medium mb-2">Job Description</label>
                    <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                </div>

                <div class="mb-4 col-span-1 md:col-span-2">
                    <label for="requirements" class="block text-orange-600 font-medium mb-2">Job Requirements</label>
                    <textarea id="requirements" name="requirements" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="posted_date" class="block text-orange-600 font-medium mb-2">Posted Date</label>
                    <input type="datetime-local" id="posted_date" name="posted_date" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="application_deadline" class="block text-orange-600 font-medium mb-2">Application Deadline</label>
                    <input type="datetime-local" id="application_deadline" name="application_deadline" class="w-full p-2 border border-gray-300 rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-orange-600 font-medium mb-2">Job Status</label>
                    <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>

                <div class="col-span-1 md:col-span-2 mb-4">
                    <button type="submit" class="w-full p-2 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700">Create Job Post</button>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    $(document).ready(function () {
        $('#menu-toggle').click(function () {
            $('#sidebar').toggleClass('-translate-x-full');
        });

        $('#close-btn').click(function () {
            $('#sidebar').addClass('-translate-x-full');
        });

        $(window).resize(function () {
            if ($(window).width() >= 768) {
                $('#sidebar').removeClass('-translate-x-full');
            } else {
                $('#sidebar').addClass('-translate-x-full');
            }
        });
    });

    var quill = new Quill('#main_content_editor', {
        theme: 'snow',
        placeholder: 'Write the main content...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    var form = document.querySelector('form');
    form.onsubmit = function () {
        var mainContent = document.querySelector('input[name=main_content]');
        mainContent.value = quill.root.innerHTML;
    };
</script>
</body>
</html>
