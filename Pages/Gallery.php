<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <title>Gallery - DVSMining</title>

  </head>
  <body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Gallery.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Gallery.png" alt="" class="mt-2 md:hidden">
  </div>


<!-- Filter Gallery Section -->
<section class="py-10 bg-orange-50 mr-0 md:mr-24 ml-0 md:ml-24">
    <div class="container mx-auto px-6">
      <div class="text-center mb-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Glimpse of Past</h2>
        <p class="mb-6 text-center text-xl">Explore our mining heritage by selecting a category</p>
      </div>
  
      <!-- Filter Buttons -->
      <div class="flex justify-center overflow-x-auto whitespace-nowrap mb-6 space-x-4 py-2 scrollbar-hide">
        <button class="filter-btn bg-orange-600 text-white px-4 py-2 rounded-lg flex-shrink-0 active ml-44 md:ml-0" data-category="all">All</button>
        <button class="filter-btn bg-orange-100 text-orange-600 px-4 py-2 rounded-lg flex-shrink-0" data-category="mining">Mining Operations</button>
        <button class="filter-btn bg-orange-100 text-orange-600 px-4 py-2 rounded-lg flex-shrink-0" data-category="architecture">Infrastructure</button>
        <button class="filter-btn bg-orange-100 text-orange-600 px-4 py-2 rounded-lg flex-shrink-0" data-category="people">Our People</button>
        <!-- Add more buttons if needed -->
      </div>
  
      <!-- Gallery Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Mining Operations Item -->
        <div class="gallery-item mining cursor-pointer" data-image="https://dummyimage.com/600x400/333/fff">
          <img src="https://dummyimage.com/600x400/333/fff" alt="Mining Operations" class="w-full h-64 object-cover rounded-lg">
          <p class="mt-2 text-center text-orange-600">Mining in Action</p>
        </div>
        <!-- Infrastructure Item -->
        <div class="gallery-item architecture cursor-pointer" data-image="https://dummyimage.com/600x400/222/fff">
          <img src="https://dummyimage.com/600x400/222/fff" alt="Infrastructure" class="w-full h-64 object-cover rounded-lg">
          <p class="mt-2 text-center text-orange-600">Mining Infrastructure</p>
        </div>
        <!-- People Item -->
        <div class="gallery-item people cursor-pointer" data-image="https://dummyimage.com/600x400/111/fff">
          <img src="https://dummyimage.com/600x400/111/fff" alt="Our People" class="w-full h-64 object-cover rounded-lg">
          <p class="mt-2 text-center text-orange-600">The People Behind the Success</p>
        </div>
        <!-- Add more gallery items as needed -->
      </div>
    </div>
  </section>

  <!-- Popup Modal -->
  <div id="image-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <div class="relative">
      <img id="modal-image" src="" class="max-w-full h-auto rounded-lg">
      <button id="close-modal" class="absolute top-4 right-4 bg-white text-black p-2 rounded-full">&times;</button>
    </div>
  </div>
  



  <!-- footer -->
  <?php include '../Inc/Footer.php';?>
  
  <!-- Whatsapp -->
  <?php include '../Inc/Whatsapp.php';?>
  
 
<script src=".././Assets/Scripts/gallery.js"></script>
<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>