<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "dvsmining_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count total blog posts
$sqlBlogs = "SELECT COUNT(*) AS total_blogs FROM blog_post";
$resultBlogs = $conn->query($sqlBlogs);
$totalBlogs = $resultBlogs->fetch_assoc()['total_blogs'] ?? 0;

// Query to count total news posts
$sqlNews = "SELECT COUNT(*) AS total_news FROM news_post";
$resultNews = $conn->query($sqlNews);
$totalNews = $resultNews->fetch_assoc()['total_news'] ?? 0;

// Query to count unique authors by name in blog_post
$sqlAuthors = "SELECT COUNT(DISTINCT author) AS total_authors FROM blog_post";
$resultAuthors = $conn->query($sqlAuthors);
$totalAuthors = $resultAuthors->fetch_assoc()['total_authors'] ?? 0;

$conn->close();
?>

<div class="mt-4 grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
    <div class="bg-orange-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-orange-600">Total Blogs Posted</h1>
        <h3 class="text-2xl font-extrabold text-orange-600"><?php echo $totalBlogs; ?></h3>
    </div>
    <div class="bg-red-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-red-600">Total News Posted</h1>
        <h3 class="text-2xl font-extrabold text-red-600"><?php echo $totalNews; ?></h3>
    </div>
    <div class="bg-green-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow flex justify-between">
        <h1 class="text-2xl font-medium text-green-600">No. of Authors</h1>
        <h3 class="text-2xl font-extrabold text-green-600"><?php echo $totalAuthors; ?></h3>
    </div>
</div>
