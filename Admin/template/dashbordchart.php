<?php
$servername = "localhost";
$username = "root";
$password = "";
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
$totalBlogs = 0;

if ($resultBlogs->num_rows > 0) {
    $row = $resultBlogs->fetch_assoc();
    $totalBlogs = $row['total_blogs'];
}

// Query to count total news posts
$sqlNews = "SELECT COUNT(*) AS total_news FROM news_post";
$resultNews = $conn->query($sqlNews);
$totalNews = 0;

if ($resultNews->num_rows > 0) {
    $row = $resultNews->fetch_assoc();
    $totalNews = $row['total_news'];
}

// Query to count enquiries and suggestions
$sqlContactMessages = "SELECT type, COUNT(*) AS total FROM contact_messages GROUP BY type";
$resultContactMessages = $conn->query($sqlContactMessages);
$totalEnquiries = 0;
$totalSuggestions = 0;

if ($resultContactMessages->num_rows > 0) {
    while ($row = $resultContactMessages->fetch_assoc()) {
        if ($row['type'] == 'enquiry') {
            $totalEnquiries = $row['total'];
        } elseif ($row['type'] == 'suggestion') {
            $totalSuggestions = $row['total'];
        }
    }
}

// Query to count entries in cta_form
$sqlCTAForm = "SELECT COUNT(*) AS total_cta FROM cta_form";
$resultCTAForm = $conn->query($sqlCTAForm);
$totalCTA = 0;

if ($resultCTAForm->num_rows > 0) {
    $row = $resultCTAForm->fetch_assoc();
    $totalCTA = $row['total_cta'];
}

// Optionally add $totalCTA to the total enquiries count if necessary
$totalEnquiries += $totalCTA;

$conn->close();
?>

<div class="container mx-auto p-4">
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
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // PHP data to JavaScript
    const totalBlogs = <?php echo json_encode($totalBlogs); ?>;
    const totalNews = <?php echo json_encode($totalNews); ?>;
    const totalEnquiries = <?php echo json_encode($totalEnquiries); ?>;
    const totalSuggestions = <?php echo json_encode($totalSuggestions); ?>;
    const totalCTA = <?php echo json_encode($totalCTA); ?>;

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
            data: [totalBlogs, totalNews],
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
        labels: ['Enquiries', 'Suggestions', 'CTA Forms'],
        datasets: [{
            data: [totalEnquiries, totalSuggestions, totalCTA],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
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
</script>
