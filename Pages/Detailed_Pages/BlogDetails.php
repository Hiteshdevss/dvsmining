<?php
// Include database connection
include('../../Inc/dbcon.php');

// Fetch blog details based on the selected blog post ID
if (isset($_GET['id'])) {
    $blog_id = intval($_GET['id']);
    $query = "SELECT * FROM blog_post WHERE id = $blog_id";
    $result = mysqli_query($conn, $query);
    $blog_post = mysqli_fetch_assoc($result);
} else {
    // Redirect to the blog list if no ID is provided
    header("Location: Blogs.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?php echo htmlspecialchars($blog_post['title']); ?> - DVSMining</title>
</head>
<body class="bg-orange-50">

  <!-- Navbar -->
  <?php include '../../Inc/NavbarDetailed.php'; ?>

  <!-- Fix Banner Image -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../../Assets/Images/Banner/Desktop/Blog.png" alt="Blog Details Banner" class="mt-2 hidden md:block">
    <!-- visible on mobile only -->
    <img src="../../Assets/Images/Banner/Mobile/Blog.png" alt="Blog Details Banner" class="mt-2 md:hidden">
  </div>

  <!-- Main Blog Details Section with Sidebar -->
  <section class="m-5 md:m-0 md:mr-28 md:ml-28 py-8">
    <div class="container mx-auto flex flex-col md:flex-row gap-8">
      
      <!-- Main Blog Content -->
      <div class="w-full md:w-2/3">
        <h1 class="text-3xl md:text-4xl font-bold text-center text-orange-600 mb-4"><?php echo htmlspecialchars($blog_post['title']); ?></h1>
        <p class="text-center text-gray-500 mb-8">
          <b>Date:</b> <?php echo date('F j, Y', strtotime($blog_post['created_at'])); ?>
        </p>
        <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
          <img src="<?php echo htmlspecialchars($blog_post['main_image']); ?>" alt="Blog Image" class="w-full rounded-lg mb-6">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Introduction</h2>
          <p class="text-gray-700 mb-6">
            <?php echo nl2br(htmlspecialchars($blog_post['description'])); ?>
          </p>
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Main Content</h2>
          <p class="text-gray-700 mb-6">
            <!-- Add more detailed content if needed -->
            <?php echo nl2br(htmlspecialchars($blog_post['main_content'])); ?>
          </p>
          <blockquote class="border-l-4 border-orange-600 pl-4 text-gray-700 italic mb-6">
            "A relevant quote to add value and context to the blog post."
          </blockquote>
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Conclusion</h2>
          <p class="text-gray-700">
            Summarize the blog post here and provide a closing statement. Encourage readers to engage with comments or contact the company for more information.
          </p>
        </div>
      </div>

      <!-- Sidebar: Trending News and Recent Blogs -->
      <aside class="w-full md:w-1/3 space-y-8">
        <!-- Trending News -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold text-orange-600 mb-4">Trending News</h2>
          <ul class="space-y-4">
            <?php
            // Fetch trending news
            $trending_query = "SELECT * FROM news_post ORDER BY created_at DESC LIMIT 3";
            $trending_result = mysqli_query($conn, $trending_query);
            while ($trending_news = mysqli_fetch_assoc($trending_result)) {
            ?>
              <li>
                <a href="BlogDetails.php?id=<?php echo $trending_news['id']; ?>" class="text-gray-900 font-bold hover:underline"><?php echo htmlspecialchars($trending_news['title']); ?></a>
                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars(substr($trending_news['description'], 0, 100)) . '...'; ?></p>
              </li>
            <?php } ?>
          </ul>
        </div>

        <!-- Recent Blogs -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold text-orange-600 mb-4">Recent Blogs</h2>
          <ul class="space-y-4">
            <?php
            // Fetch recent blogs
            $recent_query = "SELECT * FROM news_post ORDER BY created_at DESC LIMIT 3";
            $recent_result = mysqli_query($conn, $recent_query);
            while ($recent_blog = mysqli_fetch_assoc($recent_result)) {
            ?>
              <li>
                <a href="BlogDetails.php?id=<?php echo $recent_blog['id']; ?>" class="text-gray-900 font-bold hover:underline"><?php echo htmlspecialchars($recent_blog['title']); ?></a>
                <p class="text-gray-600 text-sm"><?php echo htmlspecialchars(substr($recent_blog['description'], 0, 100)) . '...'; ?></p>
              </li>
            <?php } ?>
          </ul>
        </div>
      </aside>

    </div>
  </section>

  <!-- CTA Section -->
  <?php include '../../Inc/CTA.php'; ?>

  <!-- Footer -->
  <?php include '../../Inc/FooteDetailed.php'; ?>

  <!-- WhatsApp -->
  <?php include '../../Inc/Whatsapp.php'; ?>

  <script src="../../Assets/Scripts/index.js"></script>

</body>
</html>
