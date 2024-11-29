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

  <title>Services - DVSMining</title>

  </head>
  <body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Services.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Services.png" alt="" class="mt-2 md:hidden">
  </div>


<!-- Add Services of dvsmining -->

<!-- Services Section -->
<section class="py-12 mr-0 md:mr-24 ml-0 md:ml-24">
    <div class="container mx-auto px-4">
        <h2 class="text-5xl md:text-5xl font-bold text-center text-orange-600 mb-4">Our Services</h2>
        <p class="mb-6 text-center text-xl">Latest news and insights</p>

      <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
        <!-- Service 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Exploration Services.jpg" alt="Service 1" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Exploration Services</h3>
          <p class="text-gray-600">Comprehensive mineral exploration services to identify high-quality mining locations.</p>
        </div>
  
        <!-- Service 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Drilling Services.jpg" alt="Service 2" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Drilling Services</h3>
          <p class="text-gray-600">Advanced drilling technologies for deep and surface mining projects.</p>
        </div>
  
        <!-- Service 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Mine Development.jpg" alt="Service 3" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Mine Development</h3>
          <p class="text-gray-600">Professional mine development, including planning, infrastructure, and safety measures.</p>
        </div>
  
        <!-- Service 4 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Mineral Processing.jpg" alt="Service 4" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Shaft sinking/ incline decline mining services for underground mine</h3>
          <p class="text-gray-600">Efficient mineral processing techniques to maximize resource recovery.</p>
        </div>
  
        <!-- Service 5 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Equipment Rental.jpeg" alt="Service 5" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Open caste mining services</h3>
          <p class="text-gray-600">Specialized open cast mining services for efficient surface mineral extraction.</p>
        </div>
  
        <!-- Service 6 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Environmental Consulting.jpeg" alt="Service 6" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Environmental Consulting</h3>
          <p class="text-gray-600">Sustainable mining solutions with environmental impact assessments and management.</p>
        </div>

        <!-- Service 7 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Logistics Management.jpeg" alt="Service 7" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Expert in Brench Processing Mining</h3>
          <p class="text-gray-600">Effective logistics management for efficient supply chain management.</p>
        </div>

        <!-- Service 8 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Safety Training Programs.jpg" alt="Service 8" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Safety Training Programs</h3>
          <p class="text-gray-600">Comprehensive safety programs to ensure a safe mining environment.</p>
        </div>

        <!-- Service 9 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Geological Mapping.jpeg" alt="Service 9" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Geological Survey Mining Services</h3>
          <p class="text-gray-600">Advanced mapping techniques for precise geological data analysis.</p>
        </div>

        <!-- Service 10 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Resource Optimization.jpeg" alt="Service 10" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Resource Optimization</h3>
          <p class="text-gray-600">Optimizing resource usage to maximize project efficiency and sustainability.</p>
        </div>

        <!-- Service 10 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Resource Optimization.jpeg" alt="Service 10" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Design & Drawing Mining Services</h3>
          <p class="text-gray-600">Optimizing resource usage to maximize project efficiency and sustainability.</p>
        </div>

        <!-- Service 10 -->
        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up">
          <img src="../Assets/Images/Services/Resource Optimization.jpeg" alt="Service 10" class="h-48 w-full object-cover rounded-lg mb-4">
          <h3 class="text-xl font-semibold mb-2 text-orange-500">Resource Optimization</h3>
          <p class="text-gray-600">Optimizing resource usage to maximize project efficiency and sustainability.</p>
        </div>

      </div>
    </div>
  </section>


  <!-- Parallel Section -->
<section class="py-12 mr-0 md:mr-24 ml-0 md:ml-24">
  <div class="container mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
    <!-- Image Section -->
    <div data-aos="fade-right">
      <img src="../Assets/Images/Services/Image_2.jpg" alt="Parallel Section Image" class="w-full h-auto rounded-lg shadow-lg">
    </div>

    <!-- Text Section -->
    <div data-aos="fade-left">
      <h2 class="text-4xl font-bold text-orange-600 mb-4">Our Expertise in Mining Technology</h2>
      <p class="text-gray-600 text-lg mb-6">We leverage the latest technologies to deliver efficient, safe, and cost-effective mining solutions. Our expertise spans across mineral exploration, environmental management, and safety compliance.</p>
      <ul class="list-disc list-inside text-gray-600 space-y-2">
        <li>Cutting-edge technology integration</li>
        <li>Innovative mining solutions</li>
        <li>Expert guidance in every phase of mining</li>
      </ul>
    </div>
  </div>
</section>


<!-- Informative Section -->
<section class="py-12 bg-cover bg-center rounded-lg" style="background-image: url('https://www.miningreview.com/wp-content/uploads/2015/06/SRK-Staff.jpg');">
  <div class="container mx-auto px-4 md:px-24">
    <div class="text-center mb-10 bg-white bg-opacity-80 p-8 rounded-lg" data-aos="fade-up">
      <h2 class="text-4xl font-bold text-orange-600 mb-4">Our Commitment to Excellence</h2>
      <p class="text-gray-700 text-lg">DVSMining is committed to delivering quality mining solutions while maintaining sustainability and safety. Our mission is to innovate and continuously improve our mining techniques to set industry standards.</p>
    </div>

    <div class="grid gap-8 md:grid-cols-3 grid-cols-1">
      <!-- Commitment 1 -->
      <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg" data-aos="fade-up">
        <h3 class="text-2xl font-semibold mb-2 text-orange-500">Sustainable Practices</h3>
        <p class="text-gray-700">We prioritize environmental stewardship in all our operations, ensuring minimal ecological impact.</p>
      </div>

      <!-- Commitment 2 -->
      <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg" data-aos="fade-up">
        <h3 class="text-2xl font-semibold mb-2 text-orange-500">Safety First</h3>
        <p class="text-gray-700">Safety is our top priority, and we have established rigorous safety protocols to protect our workers and the environment.</p>
      </div>

      <!-- Commitment 3 -->
      <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg" data-aos="fade-up">
        <h3 class="text-2xl font-semibold mb-2 text-orange-500">Community Engagement</h3>
        <p class="text-gray-700">We work closely with local communities, creating job opportunities and fostering economic growth through our projects.</p>
      </div>
    </div>
  </div>
</section>


  <!-- CTA -->
  <?php include '../Inc/CTA.php';?>  


  <!-- footer -->
  <?php include '../Inc/Footer.php';?>

  <!-- Whatsapp -->
   <?php include '../Inc/Whatsapp.php';?>
  
<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>