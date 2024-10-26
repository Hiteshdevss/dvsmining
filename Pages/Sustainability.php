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

  <title>Sustainability - DVSMining</title>
</head>
<body class="bg-orange-50">

  <!-- Navbar -->
  <?php include '../Inc/Navbar.php';?>


   <!-- Fix Banner Image  -->
   <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Sustainability.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Sustainability.png" alt="" class="mt-2 md:hidden">
  </div>

  <!-- Sustainability Section -->
  <section class="py-10">
    <div class="container mx-auto px-5 md:px-20">
      <div class="text-center mb-10" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Sustainability</h2>
        <p class="mb-6 text-center text-xl">Our commitment to sustainable mining practices and environmental protection.</p>
      </div>
  
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" data-aos="zoom-up">
        <!-- Sustainability Card 1 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
          <img src="../Assets/Images/Sustainability/Renewable Energy.jpg" alt="Sustainability Initiative 1" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Renewable Energy</h3>
          <p class="text-gray-600 mt-2">We actively invest in renewable energy sources to reduce the carbon footprint of our mining operations.</p>
        </div>
  
        <!-- Sustainability Card 2 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
          <img src="../Assets/Images/Sustainability/Waste Management.jpg" alt="Sustainability Initiative 2" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Waste Management</h3>
          <p class="text-gray-600 mt-2">We follow strict waste management protocols to minimize waste and ensure responsible disposal.</p>
        </div>
  
        <!-- Sustainability Card 3 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up">
          <img src="../Assets/Images/Sustainability/Biodiversity Conservation.jpg" alt="Sustainability Initiative 3" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Biodiversity Conservation</h3>
          <p class="text-gray-600 mt-2">Our programs aim to restore ecosystems and preserve biodiversity around our operational areas.</p>
        </div>

        <!-- Sustainability Card 4 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up">
          <img src="../Assets/Images/Sustainability/Water Conservation.jpg" alt="Sustainability Initiative 4" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Water Conservation</h3>
          <p class="text-gray-600 mt-2">We employ water recycling methods to minimize water usage and ensure water is used responsibly in our mining operations.</p>
        </div>

        <!-- Sustainability Card 5 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up">
          <img src="../Assets/Images/Sustainability/Community Engagement.jpeg" alt="Sustainability Initiative 5" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Community Engagement</h3>
          <p class="text-gray-600 mt-2">We work closely with local communities to create long-term value through education, health initiatives, and employment opportunities.</p>
        </div>

        <!-- Sustainability Card 6 -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300" data-aos="fade-up">
          <img src="../Assets/Images/Sustainability/Emission Reduction.jpg" alt="Sustainability Initiative 6" class="rounded-t-lg w-full h-48 object-cover">
          <h3 class="text-2xl font-semibold text-orange-600 mt-4">Emission Reduction</h3>
          <p class="text-gray-600 mt-2">Our mining operations focus on reducing emissions by adopting eco-friendly technologies and minimizing greenhouse gas output.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Environmental Impact Section -->
  <section class="py-10 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 md:px-20">
      <div class="text-center mb-10">
        <h2 class="text-4xl md:text-5xl font-bold text-orange-600 mb-4">Environmental Impact</h2>
        <p class="mb-6 text-xl">We strive to minimize our impact on the environment and operate with the highest level of environmental responsibility.</p>
      </div>
      <p class="text-justify text-gray-700">At DVSMining, we understand the importance of mitigating the environmental effects of mining. We implement practices such as land reclamation, dust suppression, and pollution control to reduce our footprint and promote ecological balance.</p>
    </div>
  </section>

  <!-- Community Empowerment Section -->
  <section class="py-10 bg-orange-50" data-aos="zoom-up">
    <div class="container mx-auto px-5 md:px-20">
      <div class="text-center mb-10">
        <h2 class="text-4xl md:text-6xl font-bold text-orange-600 mb-4">Community Empowerment</h2>
        <p class="mb-6 text-xl">Empowering local communities is at the core of our sustainability approach.</p>
      </div>
      <p class="text-justify text-gray-700">We engage with local communities to foster economic development, provide education, and create job opportunities. Our community empowerment programs are designed to uplift the people living near our operational areas, ensuring they benefit from our mining activities.</p>
    </div>
  </section>

  <!-- Innovation and Technology Section -->
  <section class="py-10 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-5 md:px-20">
      <div class="text-center mb-10">
        <h2 class="text-4xl md:text-6xl font-bold text-orange-600 mb-4">Innovation and Technology</h2>
        <p class="mb-6 text-xl">Leveraging technology to achieve sustainability in mining.</p>
      </div>
      <p class="text-justify text-gray-700">We embrace cutting-edge technologies to make our operations more efficient and reduce environmental impacts. Through automation, AI, and IoT, we are reshaping the mining industry to become more sustainable and responsible.</p>
    </div>
  </section>

  <!-- Future Commitment Section -->
  <section class="py-10 bg-orange-50" data-aos="zoom-up">
    <div class="container mx-auto px-5 md:px-20">
      <div class="text-center mb-10">
        <h2 class="text-4xl md:text-6xl font-bold text-orange-600 mb-4">Our Future Commitment</h2>
        <p class="mb-6 text-xl">Our vision for a sustainable future.</p>
      </div>
      <p class="text-justify text-gray-700">At DVSMining, we are committed to continuously improving our sustainability practices. We are focused on enhancing renewable energy adoption, minimizing waste, and developing innovative solutions to make our mining processes more sustainable for the future. Our goal is to set new standards for sustainable mining and to ensure we leave a positive legacy for generations to come.</p>
    </div>
  </section>

  <!-- Footer -->
  <?php include '../Inc/Footer.php';?>

  <!-- Whatsapp -->
  <?php include '../Inc/Whatsapp.php';?>  
  
  <script src="../Assets/Scripts/index.js"></script>
  <script>
    // Initialize AOS animations
    AOS.init();
  </script>
  
</body>
</html>
