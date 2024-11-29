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

  <title>Data Cookies - DVSMining</title>

  </head>
  <body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Cookies.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Cookies.png" alt="" class="mt-2 md:hidden">
  </div>

<!-- Cookie Policy Section -->
<div class="md:mr-24 ml-0 md:ml-24 p-5 md:p-10">
    <h2 class="text-3xl font-bold text-orange-600 mb-5">Cookie Policy</h2>
    <p class="text-gray-700 mb-4">This Cookie Policy explains how Dvsmining Pvt. Ltd. ("we", "us", "our") uses cookies and similar tracking technologies on our website.</p>
  
    <h3 class="text-xl font-semibold text-orange-500 mb-2">What Are Cookies?</h3>
    <p class="text-gray-700 mb-4">Cookies are small files stored on your device that help us improve your browsing experience. They allow us to recognize your preferences and provide relevant content.</p>
  
    <h3 class="text-xl font-semibold text-orange-500 mb-2">Types of Cookies We Use</h3>
    <ul class="list-disc pl-5 text-gray-700 mb-4">
      <li><b>Essential Cookies:</b> These are necessary for the website to function correctly.</li>
      <li><b>Analytics Cookies:</b> These cookies help us understand how visitors interact with our website, allowing us to improve it.</li>
      <li><b>Marketing Cookies:</b> These cookies track your activity to provide relevant advertisements.</li>
    </ul>
  
    <h3 class="text-xl font-semibold text-orange-500 mb-2">How to Control Cookies</h3>
    <p class="text-gray-700 mb-4">You can control or delete cookies by adjusting your browser settings. However, please note that disabling cookies may impact your experience on our website.</p>
  
    <h3 class="text-xl font-semibold text-orange-500 mb-2">Contact Us</h3>
    <p class="text-gray-700">If you have any questions about our Cookie Policy, please contact us at <a href="mailto:support@dvsmining.org" class="text-orange-600 underline">support@dvsmining.org</a>.</p>
  </div>

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


<script src=".././Assets/Scripts/index.js"></script>


      <script>
        let toggleBtn = document.querySelector("#navbar-toggle");
        let collapse = document.querySelector("#navbar-collapse");

        toggleBtn.onclick = () => {
        collapse.classList.toggle("hidden");
        collapse.classList.toggle("flex");
        };  
      </script>

<script src=".././Assets/Scripts/index.js"></script>

</body>
</html>