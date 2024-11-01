<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dvsmining_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the search term variable
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Modify the SQL query to include search functionality
$sql = "SELECT title, author, created_at FROM news_post";
if ($search) {
    $sql .= " WHERE title LIKE '%" . $conn->real_escape_string($search) . "%' OR author LIKE '%" . $conn->real_escape_string($search) . "%'";
}
$sql .= " ORDER BY created_at DESC LIMIT 4";

$result = $conn->query($sql);
?>

<div class="mt-10"></div>
<div class="flex flex-col md:flex-row justify-between items-center mb-6">
    <h2 class="text-2xl text-black font-bold mb-4">Latest News</h2>
    <form method="GET" class="flex w-full md:w-auto">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="border border-gray-300 rounded-l-lg p-2 w-full md:w-64" placeholder="Search by title or author...">
        <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded-r-lg">Search</button>
        <a href="createnews.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-800 ml-2 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            News
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
                        <td class="py-3 px-4"><?= htmlspecialchars($row['title']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['author']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['created_at']) ?></td>
                        <td class="py-4 px-6 flex md:flex-row flex-col md:space-y-0 space-y-2 items-center justify-start md:space-x-2">
                            <button class="bg-orange-500 text-white px-3 py-1 rounded-lg hover:bg-orange-600 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill mt-1 mr-1" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg> 
                                View
                            </button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill mt-1 mr-1" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                </svg>    
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="py-3 px-4 text-center">No news posts found.</td>
                </tr>
            <?php endif; ?>
            <?php $conn->close(); ?>
        </tbody>
    </table>
</div>
