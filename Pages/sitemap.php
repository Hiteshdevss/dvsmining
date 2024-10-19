<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


  <title>Sitemap - DVSMining</title>

  </head>
  <body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Sitemap.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Sitemap.png" alt="" class="mt-2 md:hidden">
  </div>


<!-- Sitemap Section (Table Format) -->
<div class="mr-0 md:mr-24 ml-0 md:ml-24 p-5">
    <h2 class="text-5xl md:text-7xl font-bold mb-1 text-center text-orange-600 mb-4">Sitemap</h2>
<p class="mb-6 text-center text-xl">Explore our website structure and easily navigate to any section</p>

    
    <table class="table-auto w-full border-collapse border border-gray-300 bg-white rounded-2xl">
      <thead>
        <tr class="bg-orange-100">
          <th class="p-3 border border-gray-300">Pages Name</th>
          <th class="p-3 border border-gray-300">Links</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Home</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Homepage</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">About</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Company Overview</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Services</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Service 1</a><br>
            <a href="#" class="text-orange-600 hover:underline">Service 2</a><br>
            <a href="#" class="text-orange-600 hover:underline">Service 3</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Media</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">News</a><br>
            <a href="#" class="text-orange-600 hover:underline">Blogs</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Sustainability</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Sustainability Practices</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Contact</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Contact Us</a>
          </td>
        </tr>
        <tr>
          <td class="p-3 border border-gray-300 text-gray-600">Sign Up</td>
          <td class="p-3 border border-gray-300">
            <a href="#" class="text-orange-600 hover:underline">Create an Account</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- End of Sitemap Section -->


    <!-- Footer -->
    <?php include '../Inc/Footer.php';?>

    <!-- Whatsapp -->
    <?php include '../Inc/Whatsapp.php';?>  


<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>