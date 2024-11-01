<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvsmining_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an array with all 12 months
$allMonths = [
    "January" => 0,
    "February" => 0,
    "March" => 0,
    "April" => 0,
    "May" => 0,
    "June" => 0,
    "July" => 0,
    "August" => 0,
    "September" => 0,
    "October" => 0,
    "November" => 0,
    "December" => 0
];

// Query to fetch blog post count grouped by month for the current year
$sql_blog = "SELECT 
                MONTHNAME(created_at) as month,
                COUNT(id) as total_posts 
            FROM blog_post 
            WHERE YEAR(created_at) = YEAR(CURDATE()) 
            GROUP BY MONTH(created_at)
            ORDER BY MONTH(created_at)";
$result_blog = $conn->query($sql_blog);

// Prepare array for blog post counts
$blogPostCounts = array_fill_keys(array_keys($allMonths), 0);
while ($row = $result_blog->fetch_assoc()) {
    $blogPostCounts[$row['month']] = (int)$row['total_posts'];
}

// Query to fetch news post count grouped by month for the current year
$sql_news = "SELECT 
                MONTHNAME(created_at) as month,
                COUNT(id) as total_posts 
            FROM news_post 
            WHERE YEAR(created_at) = YEAR(CURDATE()) 
            GROUP BY MONTH(created_at)
            ORDER BY MONTH(created_at)";
$result_news = $conn->query($sql_news);

// Prepare array for news post counts
$newsPostCounts = array_fill_keys(array_keys($allMonths), 0);
while ($row = $result_news->fetch_assoc()) {
    $newsPostCounts[$row['month']] = (int)$row['total_posts'];
}

$conn->close();

// Prepare data for chart
$months = array_keys($allMonths);
$totalBlogPosts = array_values($blogPostCounts);
$totalNewsPosts = array_values($newsPostCounts);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="bg-white p-6 rounded-lg shadow-md mt-10">
    <h3 class="text-xl font-semibold mb-4">Blog and News Post published</h3>
    <div style="position: relative; height: 400px;">
        <canvas id="postsChart"></canvas>
    </div>
</div>

<script>
    // Data from PHP
    const months = <?php echo json_encode($months); ?>;
    const totalBlogPosts = <?php echo json_encode($totalBlogPosts); ?>;
    const totalNewsPosts = <?php echo json_encode($totalNewsPosts); ?>;

    // Create bar chart for monthly blog and news posts
    const ctx = document.getElementById('postsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Blog Posts',
                data: totalBlogPosts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }, {
                label: 'News Posts',
                data: totalNewsPosts,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
