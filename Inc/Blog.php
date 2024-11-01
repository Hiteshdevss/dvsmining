<?php
// Include database connection
include('../Inc/dbcon.php');

// Fetch blog posts from the database
$query = "SELECT * FROM blog_post ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!-- Blog Section -->
<section class="m-5 md:m-0 md:mr-28 md:ml-28 py-20" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Trending Blogs</h2>
    <p class="mb-6 text-center text-xl">Latest news and insights</p>
    <div class="container mx-auto overflow-x-auto py-8">
        <div class="flex space-x-4 md:space-x-6">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Limit description to 40 words
                    $description = htmlspecialchars($row['description']);
                    $words = explode(' ', $description);
                    if (count($words) > 40) {
                        $description = implode(' ', array_slice($words, 0, 40)) . '...';
                    }
            ?>
                    <div class="bg-gray-50 rounded-lg shadow-lg p-6 min-w-[250px] md:min-w-[300px]">
                        <img src="../Admin/pages/<?php echo htmlspecialchars($row['main_image']); ?>" alt="Blog Image" class="rounded-t-lg mb-4 h-[200px]">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?php echo $description; ?>
                        </p>
                        <a href="../Pages/Detailed_Pages/BlogDetails.php?id=<?php echo $row['id']; ?>" class="text-orange-600 font-bold hover:underline">Read More</a>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No blogs found.</p>";
            }
            ?>
        </div>
    </div>
</section>
