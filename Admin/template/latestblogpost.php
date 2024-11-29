<?php
$servername = "localhost";
$username = "u345348146_DVSMining";
$password = "Hitesh1100@";
$dbname = "u345348146_DVSMining";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete operation if ID is set
if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Get the blog post ID

    // Prepare and execute DELETE statement
    $sql = "DELETE FROM blog_post WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Blog post has been successfully deleted.');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}

// Get search query if it exists
$search = "";
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

// SQL query with optional search filter
$sql = "SELECT id, title, author, DATE_FORMAT(created_at, '%Y-%m-%d') AS formatted_date 
        FROM blog_post";

if (!empty($search)) {
    $sql .= " WHERE title LIKE ? OR author LIKE ?";
    $search_param = "%" . $search . "%";
}

$sql .= " ORDER BY created_at DESC LIMIT 4";
$stmt = $conn->prepare($sql);

if (!empty($search)) {
    $stmt->bind_param("ss", $search_param, $search_param);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<div class="mt-8">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-2xl text-black font-bold mb-4">Latest Blogs</h2>
        <form method="GET" action="" class="flex w-full md:w-auto">
            <input type="text" name="search" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
            <a href="createblog.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-800 ml-2 flex items-center">
                <!-- Plus icon SVG here -->
                Blog
            </a>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-orange-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Author</th>
                    <th class="py-3 px-4 text-left">Date</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4"><?php echo htmlspecialchars($row['title']); ?></td>
                            <td class="py-3 px-4"><?php echo htmlspecialchars($row['author']); ?></td>
                            <td class="py-3 px-4"><?php echo htmlspecialchars($row['formatted_date']); ?></td>
                            <td class="py-4 px-6 flex md:flex-row flex-col md:space-y-0 space-y-2 items-center justify-start md:space-x-2">
                                <a href="../../Pages/Detailed_Pages/BlogDetails.php?id=<?php echo $row['id']; ?>" target="_blank">
                                <button class="bg-orange-500 text-white px-3 py-1 rounded-lg hover:bg-orange-600 view-details flex">
                                    <!-- Eye icon SVG here -->
                                    View
                                </button>
                                </a>
                                <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 flex">
                                        <!-- Trash icon SVG here -->
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="py-3 px-4 text-center text-gray-500">No blogs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$stmt->close();
$conn->close();
?>
