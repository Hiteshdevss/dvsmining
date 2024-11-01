<?php
// Database connection
include "../Inc/dbcon.php";

// Get search parameters
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number
$jobs_per_page = 5; // Number of jobs to display per page

// Prepare SQL query with conditions for keyword and location
$sql = "SELECT * FROM job_list WHERE 1=1"; // Always true to simplify query concatenation
$params = [];
$types = '';

if (!empty($keyword)) {
    $sql .= " AND (job_title LIKE ? OR company_name LIKE ?)";
    $searchParam = '%' . $keyword . '%';
    $params[] = $searchParam;
    $params[] = $searchParam;
    $types .= 'ss';
}

if (!empty($location)) {
    $sql .= " AND location LIKE ?";
    $locationParam = '%' . $location . '%';
    $params[] = $locationParam;
    $types .= 's';
}

// Get total number of jobs matching the criteria
$total_jobs_sql = $sql;
$total_stmt = $conn->prepare($total_jobs_sql);
if (!empty($types)) {
    $total_stmt->bind_param($types, ...$params);
}
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_jobs = $total_result->num_rows;

// Calculate pagination details
$total_pages = ceil($total_jobs / $jobs_per_page);
$offset = ($page - 1) * $jobs_per_page;

// Add limit for pagination
$sql .= " LIMIT ?, ?";
$params[] = $offset;
$params[] = $jobs_per_page;
$types .= 'ii';

// Prepare and execute the statement for pagination
$stmt = $conn->prepare($sql);
if (!empty($types)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// Get visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Insert visitor data into the table
$stmt = $conn->prepare("INSERT INTO visitors (ip_address) VALUES (?)");
$stmt->bind_param("s", $ip_address);
$stmt->execute();

$stmt->close();
$conn->close();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Careers - DVSMining</title>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <?php include '../Inc/Navbar.php';?>

    <!-- Fix Banner Image  -->
    <div class="-mt-44 mb-10">
        <!-- visible on desktop only -->
        <img src="../Assets/Images/Banner/Desktop/Careers.png" alt="" class="mt-2 hidden md:block">
        <!-- visible on mobile only -->
        <img src="../Assets/Images/Banner/Mobile/Careers.png" alt="" class="mt-2 md:hidden">
    </div>

    <!-- Job Search Section -->
    <div class="flex flex-col items-center justify-center mt-10 px-4">
        <form id="job-search-form" action="" method="GET" class="bg-white shadow-md rounded-lg sm:rounded-full flex flex-col sm:flex-row items-center p-4 sm:p-2 w-full max-w-4xl border">
            <div class="flex items-center px-4 w-full mb-4 sm:mb-0">
                <svg class="w-6 h-6 text-gray-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zM21 21l-4.35-4.35"></path>
                </svg>
                <input id="keyword" name="keyword" class="outline-none text-gray-700 w-full" type="text" placeholder="Job title, keywords, or company" value="<?php echo htmlspecialchars($keyword); ?>" />
            </div>
            <div class="hidden sm:block h-8 border-l border-gray-300 mx-2"></div>
            <div class="flex items-center px-4 w-full mb-4 sm:mb-0">
                <svg class="w-6 h-6 text-gray-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7.732-9 13-9 13s-9-5.268-9-13a9 9 0 1118 0zM13 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <input id="location" name="location" class="outline-none text-gray-700 w-full" type="text" placeholder="nagpur, maharashtra" value="<?php echo htmlspecialchars($location); ?>" />
            </div>
            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white transition-colors duration-300 text-center rounded-full px-6 py-2 w-full sm:w-auto">
                <span class="sm:hidden">Search</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden sm:block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
            
        </form>
    </div>

    <!-- Job Listings -->
    <div class="container mt-10 mx-auto px-4 md:px-36 flex flex-col md:flex-row">
        <!-- Job Cards with internal scroll -->
        <div class="w-full md:w-3/5 md:h-[calc(85vh-180px)] md:overflow-y-auto p-2">
            <div id="job-listings">
                <?php
                if ($result->num_rows > 0) {
                    // Output data for each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<a href="./Detailed_Pages/job_details.php?id=' . $row['id'] . '">
                            <div class="bg-orange-50 p-4 w-full rounded-lg shadow-md mb-6">
                                <h3 class="text-lg font-semibold">' . htmlspecialchars($row['job_title']) . '</h3>
                                <p class="text-gray-600">Company: <span class="text-black">' . htmlspecialchars($row['company_name']) . '</span></p>
                                <p class="text-gray-600">Location: <span class="text-black">' . htmlspecialchars($row['location']) . '</span></p>
                                <p class="text-gray-600">Type: <span class="text-black">' . htmlspecialchars($row['job_type']) . '</span></p>
                                <p class="text-gray-600">Salary: <span class="text-black">' . htmlspecialchars($row['salary']) . '</span></p>
                                <p class="text-gray-600">Status: <span class="text-green-500 ml-2">' . htmlspecialchars($row['status']) . '</span></p>
                            </div>
                        </a>';
                    }
                } else {
                    echo '<p class="text-gray-600 text-center">No job listings found for the current search criteria.</p>';
                }

                ?>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center space-x-2">
                <?php if ($page > 1): ?>
                    <a href="?keyword=<?php echo urlencode($keyword); ?>&location=<?php echo urlencode($location); ?>&page=<?php echo $page - 1; ?>" class="bg-gray-200 px-4 py-2 rounded-full text-gray-900">Previous</a>
                <?php endif; ?>
                <?php if ($page < $total_pages): ?>
                    <a href="?keyword=<?php echo urlencode($keyword); ?>&location=<?php echo urlencode($location); ?>&page=<?php echo $page + 1; ?>" class="bg-orange-600 px-4 py-2 rounded-full text-white">Load More</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Static image section -->
        <div class="mt-6 md:mt-0 ml-0 md:ml-5 w-full md:w-2/5">
            <img src="../Assets/Images/General/Experts-bro.svg" class="rounded-lg" alt="">
        </div>
    </div>

    <!-- Footer -->
    <?php include '../Inc/Footer.php';?>

    <!-- Whatsapp -->
    <?php include '../Inc/Whatsapp.php';
    
    ?>

</body>
</html>
