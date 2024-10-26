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

  <title>Investor - DVSMining</title>
</head>
<body class="bg-orange-50">

  <!-- Navbar -->
  <?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Investor.png" alt="" class="mt-2 hidden md:block">
    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Investor.png" alt="" class="mt-2 md:hidden">
  </div>

  <!-- Investor Section -->
  <section class="px-4 md:px-16 py-10">
    <div data-aos="fade-up" class="text-center">
      <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Our Investors</h2>
      <p class="mb-6 text-center text-xl">Meet the investors who believe in our vision and support us in our journey to revolutionize the mining industry.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div data-aos="zoom-in" class="bg-white rounded-lg shadow-md p-6 text-center">
        <img src="https://dummyimage.com/150x150/000/fff" alt="Investor 1" class="mx-auto mb-4 rounded-full w-24 h-24">
        <h3 class="text-xl font-semibold text-gray-800">Investor Name 1</h3>
        <p class="text-gray-600 mt-2">CEO, Investment Firm A</p>
      </div>
      <div data-aos="zoom-in" class="bg-white rounded-lg shadow-md p-6 text-center">
        <img src="https://dummyimage.com/150x150/000/fff" alt="Investor 2" class="mx-auto mb-4 rounded-full w-24 h-24">
        <h3 class="text-xl font-semibold text-gray-800">Investor Name 2</h3>
        <p class="text-gray-600 mt-2">Managing Director, Venture Group B</p>
      </div>
      <div data-aos="zoom-in" class="bg-white rounded-lg shadow-md p-6 text-center">
        <img src="https://dummyimage.com/150x150/000/fff" alt="Investor 3" class="mx-auto mb-4 rounded-full w-24 h-24">
        <h3 class="text-xl font-semibold text-gray-800">Investor Name 3</h3>
        <p class="text-gray-600 mt-2">Partner, Fund C</p>
      </div>
    </div>
  </section>

  <!-- Profile with Details Section -->
  <section class="px-4 md:px-16 py-10 bg-white">
    <div data-aos="fade-up" class="text-center mb-10">
      <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Profile & Details</h2>
      <p class="mb-6 text-center text-xl">Get to know our team and understand what drives our commitment to excellence in the mining industry.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
      <div data-aos="fade-up" class="flex items-center">
        <img src="https://dummyimage.com/900x400/000/fff" alt="Profile" class="rounded-lg shadow-lg w-full">
      </div>
      <div data-aos="fade-up" class="flex flex-col justify-center">
        <h3 class="text-2xl font-semibold text-orange-600 mb-4">Company Overview</h3>
        <p class="text-lg text-gray-600 mb-6">DVSMining is a forward-thinking mining company committed to leveraging technology and sustainable practices to deliver high-quality mineral resources. Our goal is to innovate within the industry and make mining operations more efficient, safe, and environmentally responsible.</p>
        <ul class="list-disc list-inside text-gray-700">
          <li>Experienced and dedicated team</li>
          <li>Commitment to sustainability</li>
          <li>Partnerships with leading investors</li>
          <li>Focus on innovative technologies</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include '../Inc/Footer.php';?>

  <!-- Whatsapp -->
  <?php include '../Inc/Whatsapp.php';?>  
  
  <script src="../Assets/Scripts/index.js"></script>
  
</body>
</html>
