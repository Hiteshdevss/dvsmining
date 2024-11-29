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

  <title>Home - DVSMining</title>
  </head>
  <body class="bg-orange-50">

  <!-- Navbar -->
  <?php include '../Inc/Navbar.php';?>  


<!-- Hero Section with Background Video -->
<section class="relative text-gray-600 body-font h-full" data-aos="zoom-out">
  <!-- Background Video -->
  <div class="absolute inset-0 w-full h-full overflow-hidden">
    <video class="w-full h-full object-cover filter grayscale md:grayscale-2" autoplay muted loop playsinline>
      <source src="../Assets/Videos/bg.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
</div>


<!-- Hero Banner -->
<div class="container mx-auto relative flex flex-col items-center h-full px-4 py-72 md:py-36 z-10 -mt-44 mb-10">
    <!-- Text Section -->
    <div class="flex-grow text-center p-4 md:p-20 mt-0 md:mt-20">
      <h1 id="dynamic-heading" class="title-font text-4xl sm:text-5xl md:text-5xl mb-4 font-medium text-white">
        <span class="text-orange-100 font-extrabold">Mining Partner</span>
      </h1>
      <h2 id="dynamic-subheading" class="title-font text-xl sm:text-2xl md:text-3xl mb-4 font-medium text-white">
        Your Blueprint to Successfully Mining Project Starts
      </h2>
      <p class="mb-6 md:mb-8 leading-relaxed text-gray-100 text-sm sm:text-base px-0 md:px-44">
      DVS Mining is committed to providing end-to-end mining solutions and also creates abiding sustainable value for stakeholders and companies at a global pitch.</p>

      <div class="flex justify-center">
        <a href="../Pages/Contact.php">
        <button class="inline-flex text-white bg-orange-500 border-0 py-2 px-4 md:px-6 focus:outline-none hover:bg-orange-600 rounded-full text-base md:text-lg">
          Book a Consultation Call
        </button>
        </a>
      </div>
    </div>
  </div>
  </section>   
  
  

  <!-- About Us -->
  <section class="mr-5 md:mr-28 ml-5 md:ml-28 mb-20">
      <div class="p-6 rounded-2xl" data-aos="fade-up">
        <h2
          class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4"
        >
          Introduction
        </h2>
        <p class="mb-6 text-center text-xl">
          Mining Services For Growth and Betterment!
        </p>
        <div class="flex flex-col md:flex-row items-center">
          <img
            src="../Assets/Images/General/bg3.jpg"
            alt="About Us"
            class="w-full md:w-1/2 h-auto mb-6 md:mb-0 md:mr-6 rounded-2xl"
            data-aos="zoom-in"
          />
          <p
            class="text-gray-900 text-lg text-justify md:w-1/2"
            data-aos="fade-up"
          >
          At DVS Mining, we specialize in delivering comprehensive and innovative mining solutions that combine operational efficiency with environmental sustainability. With expertise in both opencast and underground mining, we cater to the diverse needs of clients worldwide. Our opencast mining services include drilling, blasting, and advanced material handling, while our underground mining operations focus on techniques such as shaft sinking, drilling, blasting, level development, raising, winding, and gradient slope management. We also excel in incline, decline, portal, and tunnel mining, ensuring precise and effective extraction methods tailored to every project.
          <br><br>
          In addition to mining operations, our focus on design engineering sets us apart. Using state-of-the-art tools like Numerical Modeling (FLAC), we deliver solutions for slope stability, shaft sinking, and headgear engineering. Our expertise extends to designing portals and decline mining systems, ensuring efficiency, safety, and adaptability to unique geological conditions.
          <br><br>
          At DVS Mining, innovation and sustainability drive everything we do. By integrating cutting-edge technologies and best practices, we strive to minimize environmental impact while maximizing operational safety and productivity. Our experienced team works diligently to provide end-to-end solutions, from initial design and development to on-site implementation, ensuring timely and quality results.
          </p>
        </div>
      </div>
</section>

<div class="p-1 md:p-0 bg-orange-100">
    <div class="flex flex-wrap justify-between gap-4 p-4 mx-0 md:mx-36">
        <!-- Vision Card -->
        <div class="bg-white shadow-md rounded-lg p-6 flex-1 max-w-xs">
            <img src="../Assets/Icons/vision.png" class="mb-2 h-16" alt="Our Vision Icon">
            <h2 class="text-xl font-bold mb-2">Our Vision</h2>
            <p class="text-gray-700">Dedicated to innovation and excellence in all we do.</p>
        </div>
        
        <!-- Mission Card -->
        <div class="bg-white shadow-md rounded-lg p-6 flex-1 max-w-xs">
            <img src="../Assets/Icons/mission.png" class="mb-2 h-16" alt="Our Mission Icon">
            <h2 class="text-xl font-bold mb-2">Our Mission</h2>
            <p class="text-gray-700">Delivering superior solutions that exceed expectations.</p>
        </div>
        
        <!-- Values Card -->
        <div class="bg-white shadow-md rounded-lg p-6 flex-1 max-w-xs">
            <img src="../Assets/Icons/value.png" class="mb-2 h-16" alt="Our Values Icon">
            <h2 class="text-xl font-bold mb-2">Our Value</h2>
            <p class="text-gray-700">Upholding integrity, respect, and teamwork always.</p>
        </div>
        
        <!-- Promise Card -->
        <div class="bg-white shadow-md rounded-lg p-6 flex-1 max-w-xs">
            <img src="../Assets/Icons/cross-fingers.png" class="mb-2 h-16" alt="Our Promise Icon">
            <h2 class="text-xl font-bold mb-2">Our Promise</h2>
            <p class="text-gray-700">Committed to quality and continuous improvement.</p>
        </div>
    </div>
</div>




<!-- Activly Working -->
<section class="mr-5 md:mr-28 ml-5 md:ml-28 mt-20 mb-20">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
       Activly Working
    </h2>
    <p class="mb-6 text-center text-xl">
      Mining Services For Growth and Betterment!
    </p>
    <div class="flex flex-col md:flex-row items-center">
      <img
        src=".././Assets/Images/General/bg1.jpg"
        alt="Activly Working"
        class="w-full md:w-1/2 h-auto mb-6 md:mb-0 md:mr-6 rounded-2xl"
        data-aos="zoom-in"
      />
      <!-- 3x2 grid boxes with full height and width -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:w-1/2 h-full w-full">
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Odisha</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Jharkhand</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Karnataka</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Madhya Pradesh</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Rajasthan</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Chhattisgarh</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Andhra Pradesh</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Maharashtra</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Telangana</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold" data-aos="zoom-in">Gujarat</div>
        <div class="p-6 rounded-2xl bg-orange-200 text-center font-bold font-bold" data-aos="zoom-in">More Location</div>
      </div>
    </div>
    <!-- Paragraph after grid boxes -->
    <p class="mt-6 text-center text-lg">
      Our mining services are designed to ensure sustainable growth and development, delivering value to communities and industries alike.
    </p>
  </div>
</section>


<!-- Why Choose Us -->
<div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6">
      <div class="text-center mb-10">
        <h2
          class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4"
        >
          Why Choose Us
        </h2>
        <p class="mb-6 text-center text-xl">
          Mining Services For Growth and Betterment!
        </p>
      </div>

      <div class="flex flex-col md:flex-row">
        <!-- Text content -->
        <div class="flex-1 flex flex-col sm:flex-row flex-wrap -mb-4 -mx-2">
          <div class="w-full sm:w-1/2 mb-4 px-2" data-aos="fade-up-right">
            <div
              class="h-full py-4 px-6 border border-orange-500 border-t-0 border-l-0 rounded-br-xl" 
            >
              <h3 class="text-2xl font-bold text-md mb-6">
                Expertise & Experience
              </h3>
              <p class="text-sm">
                Over 20 years of industry experience with a proven track record in delivering top-quality mining services.
              </p>
            </div>
          </div>
          <div class="w-full sm:w-1/2 mb-4 px-2" data-aos="fade-up-right">
            <div
              class="h-full py-4 px-6 border border-orange-500 border-t-0 border-l-0 rounded-br-xl"
            >
              <h3 class="text-2xl font-bold text-md mb-6">
                Advanced Technology
              </h3>
              <p class="text-sm">
                Utilization of cutting-edge technology and equipment for efficient and sustainable mining operations.
              </p>
            </div>
          </div>

          <div class="w-full sm:w-1/2 mb-4 px-2" data-aos="fade-up-right">
            <div
              class="h-full py-4 px-6 border border-orange-500 border-t-0 border-l-0 rounded-br-xl"
            >
              <h3 class="text-2xl font-bold text-md mb-6">
                Safety Commitment
              </h3>
              <p class="text-sm">
                Unwavering commitment to safety standards, ensuring a secure working environment for all stakeholders.
              </p>
            </div>
          </div>

          <div class="w-full sm:w-1/2 mb-4 px-2" data-aos="fade-up-right">
            <div
              class="h-full py-4 px-6 border border-orange-500 border-t-0 border-l-0 rounded-br-xl"
            >
              <h3 class="text-2xl font-bold text-md mb-6">
                Customized Solutions
              </h3>
              <p class="text-sm">
                Tailored mining solutions to meet the specific needs of each client, maximizing productivity and profitability.
              </p>
            </div>
          </div>
        </div>
        <!-- end Text content -->

        <!-- Image -->
        <div class="mt-6 md:mt-0 mr-0 md:ml-8 mb-6 md:mb-0">
          <img
            class="w-full md:w-full mt-2 md:mt-0 mx-auto rounded-lg"
            src="../Assets/Images/General/wcu.png" data-aos="zoom-in"
            alt="can_help_banner"
          />
        </div>
        <!-- end Image -->
      </div>
    </div>




    <!-- Clients Section -->
 <?php include '../Inc/Client.php';?>

<!-- Blog Section -->
<?php include '../Inc/Blog.php';?>

<!-- CTA -->
<?php include '../Inc/CTA.php';?>

<!-- footer -->
<?php include '../Inc/Footer.php';?>
  
<!-- Whatsapp -->
<?php include '../Inc/Whatsapp.php';?>

<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>