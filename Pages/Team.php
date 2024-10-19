<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
  <title>Our Team - Dvsmining</title>
</head>
<body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Team.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Team.png" alt="" class="mt-2 md:hidden">
  </div>

  <!-- Founders Section -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8 mt-10">
    <div class="p-6 rounded-2xl" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
            Meet Founders
        </h2>
        <p class="mb-6 text-center text-xl">
            The minds behind DVSMining's success.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Founder 1 -->
            <div class="text-center" data-aos="fade-up">
                <img src="https://dummyimage.com/402x402/000/fff" alt="Founder 1" class="w-48 h-48 rounded-full mx-auto mb-4">
                <h2 class="title-font font-medium text-2xl text-gray-900">Vijay Somkuwar</h2>
              <h3 class="text-orange-600 mb-3 font-bold text-md">Finance Director</h3>
                <p class="mt-2 text-sm text-gray-600">
                    John is a visionary leader with over 20 years of experience in the mining industry.
                </p>
            </div>
            <!-- Founder 2 -->
            <div class="text-center" data-aos="fade-up">
                <img src="https://dummyimage.com/402x402/000/fff" alt="Founder 2" class="w-48 h-48 rounded-full mx-auto mb-4">
                <h2 class="title-font font-medium text-2xl text-gray-900">Vijay Somkuwar</h2>
              <h3 class="text-orange-600 mb-3 font-bold text-md">Finance Director</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Jane oversees daily operations, ensuring everything runs smoothly while focusing on sustainability.
                </p>
            </div>
            <!-- Founder 3 -->
            <div class="text-center" data-aos="fade-up">
                <img src="https://dummyimage.com/402x402/000/fff" alt="Founder 3" class="w-48 h-48 rounded-full mx-auto mb-4">
                <h2 class="title-font font-medium text-2xl text-gray-900">Vijay Somkuwar</h2>
              <h3 class="text-orange-600 mb-3 font-bold text-md">Finance Director</h3>
                <p class="mt-2 text-sm text-gray-600">
                    Michael is responsible for leading our technical innovation and advancements in mining technology.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Team Section -->
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-5">
      <h2 class="text-3xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">Our Team</h2>
      <p class="mb-6 text-center text-xl text-gray-700">Meet the experts driving innovation and success at DVS Mining</p>
    </div>

    <!-- Center the team members on mobile -->
    <div class="flex flex-wrap justify-center -m-4">
      <!-- Team member 1 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Vijay Somkuwar</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Finance Director</h3>
          </div>
        </div>
      </div>

      <!-- Team member 2 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Ratnadip Somkuwar</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Operational Director</h3>
          </div>
        </div>
      </div>

      <!-- Team member 3 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Shrinivas</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Lead Developer</h3>
          </div>
        </div>
      </div>

      <!-- Team member 4 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Pankaj Wanjari</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Operational Director</h3>
          </div>
        </div>
      </div>

      <!-- Team member 5 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">SK Jafer</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Mining Advisor</h3>
          </div>
        </div>
      </div>

      <!-- Team member 6 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Marin Sir Wevin</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Mining Plan & Design</h3>
          </div>
        </div>
      </div>

      <!-- Team member 7 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Shashank Sinha</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Consultant Geologist</h3>
          </div>
        </div>
      </div>

      <!-- Team member 8 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Sushil Kumar Das</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Mining, Planning & Designing Consultant</h3>
          </div>
        </div>
      </div>

      <!-- Team member 9 -->
      <div class="p-4 w-full md:w-1/2 lg:w-1/4">
        <div class="h-full flex flex-col items-center text-center">
          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="https://dummyimage.com/200x200">
          <div class="w-full">
            <h2 class="title-font font-medium text-2xl text-gray-900">Warun H. Bhoyar</h2>
            <h3 class="text-orange-600 mb-3 font-bold text-md">Mechanical Engineer</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- footer -->
<?php include '../Inc/Footer.php';?>

<!-- Whatsapp -->
<?php include '../Inc/Whatsapp.php';?>

<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>