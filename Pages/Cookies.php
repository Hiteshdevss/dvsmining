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
<div class="bg-gray-900">
      <footer
        class="bg-transparent text-white p-5 md:p-10 py-8 mt-20 mr-5 md:mr-36 ml-5 md:ml-36 py-8 mt-20"
      >
        <div class="flex flex-wrap justify-between">
          <div class="w-full md:w-auto mb-6 text-center md:text-left">
            <img src=".././Assets/Images/DVS_Logo.png" class="h-28 mx-auto md:mx-0" alt="" data-aos="zoom-in"/>
            <div class="flex justify-center md:justify-start mt-5 space-x-7">
              <a href="#" class="text-sm text-white hover:text-orange-600">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="26"
                  height="26"
                  fill="currentColor"
                  class="bi bi-facebook"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"
                  />
                </svg>
              </a>
              <a href="#" class="text-sm text-white hover:text-orange-600">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="25"
                  height="25"
                  fill="currentColor"
                  class="bi bi-instagram"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"
                  />
                </svg>
              </a>
              <a href="#" class="text-sm text-white hover:text-orange-600">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="25"
                  height="25"
                  fill="currentColor"
                  class="bi bi-twitter-x"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"
                  />
                </svg>
              </a>
              <a href="#" class="text-sm text-white hover:text-orange-600">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="25"
                  height="25"
                  fill="currentColor"
                  class="bi bi-linkedin"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"
                  />
                </svg>
              </a>
            </div>
            
          </div>
          <div class="w-full md:w-auto text-center md:text-left mb-6">
            <h6
              class="text-2xl font-bold mb-2 text-orange-500"
              data-aos="zoom-in"
            >
            Quick links
            </h6>
            <ul class="list-none">
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >About Us</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Our Team</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Our Gallery</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Our Projects</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Our Blog's</a
                >
              </li>
            </ul>
          </div>
          <div class="w-full md:w-auto text-center md:text-left mb-6">
            <h6
              class="text-2xl font-bold mb-2 text-orange-500"
              data-aos="zoom-in"
            >
              Terms of Policies
            </h6>
            <ul class="list-none">
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600">Cookie Policies</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Terms & Conditions</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  >Privacy Policy</a
                >
              </li>
            </ul>
          </div>
          <div class="w-full md:w-auto text-center md:text-left">
            <h6
              class="text-2xl font-bold mb-2 text-orange-500"
              data-aos="zoom-in"
            >
              Get in Touch
            </h6>
            <ul class="list-none">
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  ><b>Email :</b> info@dvsmining.com</a
                >
              </li>
              <li class="mb-2">
                <a class="text-white hover:text-orange-600"
                  ><b>Telphone :</b> (0712)-2589851</a
                ><br>
                <b>Phone No.:</b> 9503865798</a
                ><br>
                <b>Phone No.:</b> 9561453202</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-white hover:text-orange-600"
                  ><b>Address :</b> G-4 Rachana Madhuban, <br />Behind IOCL
                  Petrol Pump, Koradi Road, <br /> Faras, NAGPUR - 440030 (MH)
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-between items-center md:items-start mt-10">
          <p class="mb-2 text-center md:mb-0">Dvsmining Pvt. Ltd. All Rights Reserved. ©2020-2024.</p>
          <p>Design & Development by <a href="https://iconicpages.com/" target="_blank"><b>Iconicpages</b></a></p>
        </div>
        
      </footer>
</div>
  
 

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