<?php
// Include database connection
include('../Inc/dbcon.php');

// Fetch news posts from the database
$query = "SELECT * FROM news_post ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

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
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <title>Trending Blogs - DVSMining</title>

  <style>
    .slider-container {
      position: relative;
      overflow: hidden;
      width: 80%;
      margin: auto;
    }
    .slider {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }
    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }
  </style>
</head>
<body class="bg-orange-50">

  <!-- Navbar -->
  <?php include('../Inc/Navbar.php'); ?>

  <!-- Fix Banner Image -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Blog.png" alt="" class="mt-2 hidden md:block">
    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Blog.png" alt="" class="mt-2 md:hidden">
  </div>

  <!-- Blog Section -->
  <section class="m-5 md:m-0 md:mr-28 md:ml-28 py-8" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Trending News</h2>
    <p class="mb-6 text-center text-xl">Latest news and insights</p>
    <div class="container mx-auto overflow-x-auto py-8">
      <div class="flex space-x-4 md:space-x-6">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="bg-gray-50 rounded-lg shadow-lg p-6 min-w-[250px] md:min-w-[300px]">
            <img src="<?php echo htmlspecialchars($row['main_image']); ?>" alt="Blog Image" class="rounded-t-lg mb-4">
            <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($row['title']); ?></h3>
            <p class="text-gray-600 mb-4">
              <?php echo htmlspecialchars($row['description']); ?>
            </p>
            <a href="../Pages/Detailed_Pages/NewsDetails.php?id=<?php echo $row['id']; ?>" class="text-orange-600 font-bold hover:underline">Read More</a>
          </div>
        <?php
          }
        } else {
          echo "<p class='text-center'>No News found.</p>";
        }
        ?>
      </div>
    </div>
  </section>


  <!-- CTA -->
  <?php include '../Inc/CTA.php'; ?>
  

  <!-- footer -->
  <?php include '../Inc/Footer.php'; ?>

  <!-- Whatsapp -->
  <?php include '../Inc/Whatsapp.php'; ?>

  <script src=".././Assets/Scripts/index.js"></script>
</body>
</html>
