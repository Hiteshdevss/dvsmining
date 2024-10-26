<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dvsmining_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $type = $conn->real_escape_string($_POST['type']);
    $message = $conn->real_escape_string($_POST['message']);

    // Check for existing entry
    $checkSql = "SELECT * FROM contact_messages WHERE email='$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        echo "<script>alert('This email has already been used to submit a message.');</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO contact_messages (name, email, type, message) VALUES ('$name', '$email', '$type', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "
            <div id='successPopup' class='fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50'>
                <div class='bg-white p-8 rounded-lg shadow-lg text-center'>
                    <img src='../Assets/Images/check.png' alt='Success' class='w-16 h-16 mx-auto mb-4'>
                    <h2 class='text-2xl font-bold text-green-600 mb-4'>Thanks for submission</h2>
                    <button onclick='closePopup()' class='bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600'>Close</button>
                </div>
            </div>
            <script>
                function closePopup() {
                    document.getElementById('successPopup').style.display = 'none';
                }
            </script>
            ";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }

    // Get visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Insert visitor data into the table
$stmt = $conn->prepare("INSERT INTO visitors (ip_address) VALUES (?)");
$stmt->bind_param("s", $ip_address);
$stmt->execute();

$stmt->close();
$conn->close();
}
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


  <title>Contact - DVSMining</title>

  </head>
  <body class="bg-orange-50">

<!-- Navbar -->
<?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image  -->
  <div class="-mt-44 mb-20">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Contact.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Contact.png" alt="" class="mt-2 md:hidden">
  </div>


<!-- info -->
<section class="text-gray-600 body-font md:m-0 md:mr-28 md:ml-28">
    <div class="container px-5 mx-auto">
      <div class="text-center mt-2">
      <h2 class="text-4xl md:text-5xl font-bold text-orange-600 mb-4">Let's Connect</h2>
      <p class="mb-6 text-xl">We respect your queries, suggestion and messages to us.</p>
      </div>
      <div class="flex flex-wrap -m-4">
        <!-- Phone -->
        <div class="p-4 w-full md:w-1/3" data-aos="fade-up">
          <div class="flex rounded-lg h-full bg-white hover:bg-orange-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-orange-500 text-white flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill w-5 h-5" viewBox="0 0 18 18">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                  </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Phone</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed font-bold text-xl">0712 - 2589851</p>
              <p class="leading-relaxed font-bold text-xl">+91 950-386-5798</p>
              <p class="leading-relaxed font-bold text-xl">+91 956-145-3202</p>
            </div>
          </div>
        </div>
        <!-- Email -->
        <div class="p-4 w-full md:w-1/3" data-aos="fade-up">
          <div class="flex rounded-lg h-full bg-white hover:bg-orange-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-orange-500 text-white flex-shrink-0">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill w-5 h-5" viewBox="0 0 18 18">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                  </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Email</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed font-bold text-xl">info@dvsmining.com</p>
              <p class="leading-relaxed font-bold text-xl">support@dvsmining.org</p>
              
            </div>
          </div>
        </div>
        <!-- Address -->
        <div class="p-4 w-full md:w-1/3" data-aos="fade-up">
          <div class="flex rounded-lg h-full bg-white hover:bg-orange-100 p-8 flex-col">
            <div class="flex items-center mb-3">
              <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-orange-500 text-white flex-shrink-0">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill w-5 h-5" viewBox="0 0 17 17">
                    <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
                  </svg>
              </div>
              <h2 class="text-gray-900 text-lg title-font font-medium">Head Office</h2>
            </div>
            <div class="flex-grow">
              <p class="leading-relaxed font-bold text-xl">G-4 Rachana Madhuban, Behind IOCL Petrol Pump, Koradi Road, Faras, NAGPUR -440030 (MH).</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- form -->
  <section class="text-gray-600 body-font md:m-0 md:mr-28 md:ml-28">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-col md:flex-row gap-10">
            <!-- Form Section -->
            <div class="lg:w-2/3 md:w-2/3">
            <form action="" method="POST" class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-gray-900 text-lg mb-5 font-bold text-2xl">Enquiry / Suggestion Form</h2>
    <div class="mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-orange-500 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
    <div class="mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-orange-500 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
    </div>
    <div class="mb-4">
        <label for="type" class="leading-7 text-sm text-gray-600">Select Type</label>
        <select id="type" name="type" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-orange-500 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <option value="enquiry">Enquiry</option>
            <option value="suggestion">Suggestion</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
        <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:bg-white focus:border-orange-500 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out" rows="7"></textarea>
    </div>
    <button type="submit" class="text-white bg-orange-500 border-0 py-2 px-6 focus:outline-none hover:bg-orange-600 rounded text-lg">Submit</button>
</form>

            </div>
            <!-- Map Section -->
            <div class="lg:w-2/3 md:w-2/3">
                <h2 class="text-gray-900 text-xl mb-5 font-bold">Locate Us on Google Map</h2>
                <div class="w-full h-64 bg-gray-300 rounded-lg overflow-hidden">
                    <iframe class="w-full h-full border-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345096836!2d144.95373631531658!3d-37.81627937975133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5776b4e9b8d0f4!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1638609841285!5m2!1sen!2sau" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="flex md:flex-row flex-col justify-between">
                    <div class="mt-10 bg-white p-8 rounded-lg shadow-md mr-0 md:mr-5">
                        <h1 class="text-gray-900 text-xl mb-2 font-bold">Office Details</h1>
                        <p class="text-gray-600 text-lg mt-2">123 Main St, Anytown, USA</p>
                        <p class="text-gray-600 text-lg">123-456-7890</p>
                        
                    </div>
                    <div class="mt-10 bg-white p-8 rounded-lg shadow-md">
                        <h1 class="text-gray-900 text-xl mb-2 font-bold">Office Details</h1>
                        <p class="text-gray-600 text-lg mt-2">123 Main St, Anytown, USA</p>
                        <p class="text-gray-600 text-lg">123-456-7890</p>
                    </div>
                    
                </div>
                <div class="flex md:flex-row flex-col justify-between">
                    <div class="mt-10 bg-white p-8 rounded-lg shadow-md mr-0 md:mr-5">
                        <h1 class="text-gray-900 text-xl mb-2 font-bold">Office Details</h1>
                        <p class="text-gray-600 text-lg mt-2">123 Main St, Anytown, USA</p>
                        <p class="text-gray-600 text-lg">123-456-7890</p>
                        
                    </div>
                    <div class="mt-10 bg-white p-8 rounded-lg shadow-md">
                        <h1 class="text-gray-900 text-xl mb-2 font-bold">Office Details</h1>
                        <p class="text-gray-600 text-lg mt-2">123 Main St, Anytown, USA</p>
                        <p class="text-gray-600 text-lg">123-456-7890</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>


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
              class="text-xl font-bold mb-2 text-orange-500"
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
              class="text-xl font-bold mb-2 text-orange-500"
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
              class="text-xl font-bold mb-2 text-orange-500"
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