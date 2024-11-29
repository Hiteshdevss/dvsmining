<?php
// Database connection details
$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the number of applications per month
$sql_applications = "
    SELECT 
        DATE_FORMAT(applied_at, '%Y-%m') AS month, 
        COUNT(id) AS applications_count 
    FROM applications 
    GROUP BY month
    ORDER BY month ASC
";
$result_applications = $conn->query($sql_applications);
if (!$result_applications) {
    die("Error in applications query: " . $conn->error);
}

// Query to get the number of job positions per month
$sql_positions = "
    SELECT 
        DATE_FORMAT(posted_date, '%Y-%m') AS month, 
        COUNT(id) AS positions_count 
    FROM job_list 
    GROUP BY month
    ORDER BY month ASC
";
$result_positions = $conn->query($sql_positions);
if (!$result_positions) {
    die("Error in positions query: " . $conn->error);
}

// Prepare data for JSON output
$applications_data = [];
$positions_data = [];

// Fetch applications data
if ($result_applications->num_rows > 0) {
    while ($row = $result_applications->fetch_assoc()) {
        $applications_data[$row['month']] = $row['applications_count'];
    }
}

// Fetch positions data
if ($result_positions->num_rows > 0) {
    while ($row = $result_positions->fetch_assoc()) {
        $positions_data[$row['month']] = $row['positions_count'];
    }
}

// Define an array for all months
$months_list = [];
for ($i = 1; $i <= 12; $i++) {
    $months_list[] = date('Y-m', strtotime("2024-$i-01")); // Adjust year as necessary
}

// Prepare chart data, ensuring all months are covered
$chart_data = [];
foreach ($months_list as $month) {
    $chart_data[] = [
        'month' => $month,
        'applications_count' => $applications_data[$month] ?? 0,
        'positions_count' => $positions_data[$month] ?? 0,
    ];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applications and Positions per Month</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="">
                <h2 class="text-lg font-semibold text-center mb-4">Applications per Month</h2>
                <canvas id="applicationsChart"></canvas>
            </div>

            <div class="">
                <h2 class="text-lg font-semibold text-center mb-4">Positions Posted per Month</h2>
                <canvas id="positionsChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // PHP to JavaScript data transfer
        const chartData = <?php echo json_encode($chart_data); ?>;

        // Process data for Chart.js
        const months = chartData.map(item => item.month);
        const applicationsCounts = chartData.map(item => item.applications_count);
        const positionsCounts = chartData.map(item => item.positions_count);

        // Render Applications Chart
        const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
        new Chart(applicationsCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Number of Applications',
                    data: applicationsCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Applications'
                        }
                    }
                }
            }
        });

        // Render Positions Chart
        const positionsCtx = document.getElementById('positionsChart').getContext('2d');
        new Chart(positionsCtx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Number of Positions',
                    data: positionsCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Positions'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
