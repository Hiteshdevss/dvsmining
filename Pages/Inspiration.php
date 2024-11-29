<?php

include '../Inc/dbcon.php';

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
  
  <title>Privacy Policy - Dvsmining</title>
</head>
<body class="bg-orange-50">

<!-- Navbar (same as other pages) -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Privacy.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Privacy.png" alt="" class="mt-2 md:hidden">
  </div>

<!-- Inspiration Section -->
<div class="md:mr-24 ml-0 md:ml-24 p-5 md:p-10">
  <h2 class="text-4xl font-bold text-center text-orange-600 mb-6">Our Inspiration</h2>
  <p class="mb-6 text-center text-xl">Success is not the key to happiness.</p>

  <div class="flex flex-col md:flex-row items-center gap-8">
    <!-- Image Column -->
    <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right">
      <img src="../Assets/Images/General/inspiration.png" alt="D.V. Somkuwar" class="w-auto h-auto">
    </div>

    <!-- Text Column -->
    <div class="w-full md:w-1/2" data-aos="fade-left">
      <h2 class="text-3xl font-bold text-orange-600 mb-2">Late Mr.D.V. Somkuwar</h2>
      <p class="text-gray-600 mb-6">Founder & Managing Director</p>
      <blockquote class="text-2xl font-medium text-gray-700 italic mb-8">
        "Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful."
      </blockquote>
      <p class="text-gray-700 mb-6 text-lg">
        For 25 years, D.V. Somkuwar has led our mining company with a vision rooted in innovation, sustainability, and unwavering commitment to excellence. We believe in creating value for our stakeholders while upholding the highest standards of environmental and social responsibility.
      </p>

      <p class="text-gray-700 mb-6 text-lg">
        Our guiding principles:
      </p>

      <ul class="list-disc pl-5 text-gray-700 space-y-3">
        <li>Delivering unparalleled value through ethical and innovative mining practices</li>
        <li>Upholding a vision of sustainable growth that benefits both communities and ecosystems</li>
        <li>Keeping our promise to prioritize safety, efficiency, and environmental care</li>
        <li>Building lasting trust with clients and partners through exceptional service</li>
        <li>Fostering a culture of excellence and dedication among our team members</li>
      </ul>
    </div>
  </div>
</div>



<!-- footer -->
<?php include '../Inc/Footer.php';?>

<!-- Whatsapp -->
<?php include '../Inc/Whatsapp.php';?>


<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>