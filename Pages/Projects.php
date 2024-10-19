<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <title>Projects - DVSMining</title>

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


<!-- Services Section -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <h2 class="text-5xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4"
        >
        Our Services
        </h2>
        <p class="mb-6 text-center text-xl">
        we eagerly strive to deliver superior mining services
        </p>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
    <div class="bg-white rounded-2xl shadow" data-aos="fade-up">
      <img
        src="https://dummyimage.com/600x400/000/fff"
        class="rounded-2xl"
        alt=""
      />
      <h2 class="text-xl font-bold mb-4 p-6 pb-0">
        Mining Vertical Shaft Sinking
      </h2>
      <p class="text-gray-600 pr-6 pl-6 pb-6">
        Underground mining and sub-shaft mining excavation.
      </p>
    </div>
    <div class="bg-white rounded-2xl shadow" data-aos="fade-up">
      <img
        src="https://dummyimage.com/600x400/000/fff"
        class="rounded-2xl"
        alt=""
      />
      <h2 class="text-xl font-bold mb-4 p-6 pb-0">
        Incline and Decline Mining
      </h2>
      <p class="text-gray-600 pr-6 pl-6 pb-6">
        Decline or incline means a sloping underground opening for machine.
      </p>
    </div>
    <div class="bg-white rounded-2xl shadow" data-aos="fade-up">
      <img
        src="https://dummyimage.com/600x400/000/fff"
        class="rounded-2xl"
        alt=""
      />
      <h2 class="text-xl font-bold mb-4 p-6 pb-0">
        Tunneling & Refurbishment
      </h2>
      <p class="text-gray-600 pr-6 pl-6 pb-6">
        Selection of tunneling methods and equipment in mine projects.
      </p>
    </div>
    <div class="bg-white rounded-2xl shadow" data-aos="fade-up">
      <img
        src="https://dummyimage.com/600x400/000/fff"
        class="rounded-2xl"
        alt=""
      />
      <h2 class="text-xl font-bold mb-4 p-6 pb-0">
        Exploration & Mineral Extraction
      </h2>
      <p class="text-gray-600 pr-6 pl-6 pb-6">
        Exploration diamond work. Coral drilling. Long hole drilling with
        boomer machine.
      </p>
    </div>
  </div>
</section>

<!-- Clients Section -->
<?php include '../Inc/Client.php';?>

<!-- footer -->
<?php include '../Inc/Footer.php';?>

<!-- Whatsapp -->
<?php include '../Inc/Whatsapp.php';?>
  
 
<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>