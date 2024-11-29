<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$database = "dvsmining_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count total blog posts
$sqlBlogs = "SELECT COUNT(*) AS total_blogs FROM blog_post";
$resultBlogs = $conn->query($sqlBlogs);
$totalBlogs = 0;

if ($resultBlogs->num_rows > 0) {
    $row = $resultBlogs->fetch_assoc();
    $totalBlogs = $row['total_blogs'];
}

// Query to count total jobs posted
$sqlJobs = "SELECT COUNT(*) AS total_jobs FROM job_list";
$resultJobs = $conn->query($sqlJobs);
$totalJobs = 0;

if ($resultJobs->num_rows > 0) {
    $row = $resultJobs->fetch_assoc();
    $totalJobs = $row['total_jobs'];
}

// Query to count total enquiries
$sqlEnquiries = "SELECT COUNT(*) AS total_enquiries FROM contact_messages WHERE type = 'enquiry'";
$resultEnquiries = $conn->query($sqlEnquiries);
$totalEnquiries = 0;

if ($resultEnquiries->num_rows > 0) {
    $row = $resultEnquiries->fetch_assoc();
    $totalEnquiries = $row['total_enquiries'];
}

// Query to count total suggestions
$sqlSuggestions = "SELECT COUNT(*) AS total_suggestions FROM contact_messages WHERE type = 'suggestion'";
$resultSuggestions = $conn->query($sqlSuggestions);
$totalSuggestions = 0;

if ($resultSuggestions->num_rows > 0) {
    $row = $resultSuggestions->fetch_assoc();
    $totalSuggestions = $row['total_suggestions'];
}

// Query to count total applications
$sqlApplications = "SELECT COUNT(*) AS total_applications FROM applications";
$resultApplications = $conn->query($sqlApplications);
$totalApplications = 0;

if ($resultApplications->num_rows > 0) {
    $row = $resultApplications->fetch_assoc();
    $totalApplications = $row['total_applications'];
}

// Query to count total website visitors
$sqlVisitorCount = "SELECT COUNT(DISTINCT ip_address) AS total_visitors FROM visitors";
$resultVisitorCount = $conn->query($sqlVisitorCount);
$totalVisitors = 0;

if ($resultVisitorCount->num_rows > 0) {
    $row = $resultVisitorCount->fetch_assoc();
    $totalVisitors = $row['total_visitors'];
}


$conn->close();
?>

<div class="mt-4 grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
    <div class="bg-orange-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-orange-600">Blogs/News Posted</h1>
        <h3 class="text-2xl font-extrabold text-orange-600"><?php echo $totalBlogs; ?></h3>
    </div>
    <div class="bg-red-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-red-600">Total Enquiries</h1>
        <h3 class="text-2xl font-extrabold text-red-600"><?php echo $totalEnquiries; ?></h3>
    </div>
    <div class="bg-blue-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-blue-900">Total Suggestions</h1>
        <h3 class="text-2xl font-extrabold text-blue-900"><?php echo $totalSuggestions; ?></h3>
    </div>
    <div class="bg-green-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-green-600">Total Jobs Posted</h1>
        <h3 class="text-2xl font-extrabold text-green-600"><?php echo $totalJobs; ?></h3>
    </div>
    <div class="bg-cyan-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-cyan-600">Total Applications</h1>
        <h3 class="text-2xl font-extrabold text-cyan-600"><?php echo $totalApplications; ?></h3>
    </div>
    <div class="bg-pink-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
    <h1 class="text-2xl font-medium text-pink-600">Website Visitors</h1>
    <h3 class="text-2xl font-extrabold text-pink-600"><?php echo $totalVisitors; ?></h3>
</div>

</div>
