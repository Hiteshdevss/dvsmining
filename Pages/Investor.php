<?php
include '../Inc/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $linkedin = $_POST['linkedin'];
    $investment = $_POST['investment'];
    $message = $_POST['message'];
    $documents = json_encode($_FILES['documents']); // Save uploaded files as JSON (adjust for your method)

    // Get visitor's IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Insert visitor data into the table
    $stmt = $conn->prepare("INSERT INTO visitors (ip_address) VALUES (?)");
    $stmt->bind_param("s", $ip_address);
    $stmt->execute();
    $stmt->close();

    // Insert investor form data into the database
    $stmt = $conn->prepare("INSERT INTO investor_applications (name, email, phone, company, gender, dob, occupation, address, city, zipcode, country, linkedin, investment, message, documents) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssss", $name, $email, $phone, $company, $gender, $dob, $occupation, $address, $city, $zipcode, $country, $linkedin, $investment, $message, $documents);

    $stmt->bind_param("ssssssssssssssss", $name, $email, $phone, $company, $gender, $dob, $occupation, $address, $city, $zipcode, $country, $linkedin, $investment, $message, $documents);
    $stmt->execute();

    // Check if the form data was successfully inserted
    if ($stmt->affected_rows > 0) {
        $success_message = "Your application has been successfully submitted! Thank you for your interest in becoming an investor with DVSMining.";
    } else {
        $error_message = "There was an error submitting your application. Please try again.";
    }

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

  <title>Investor - DVSMining</title>
</head>
<body class="bg-orange-50">

  <!-- Navbar -->
  <?php include '../Inc/Navbar.php';?>

  <!-- Fix Banner Image -->
  <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Investor.png" alt="" class="mt-2 hidden md:block">
    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Investor.png" alt="" class="mt-2 md:hidden">
  </div>

  <!-- Investor Application Form -->
<section class="px-4 md:px-16 py-10 bg-gray-50">
  <div data-aos="fade-up" class="container mx-auto w-full">
    <div class="bg-gradient-to-br from-white to-gray-100 p-10 rounded-xl shadow-xl w-full">
      <h2 class="text-4xl md:text-5xl font-bold text-center text-orange-600 mb-4">Become an Investor</h2>
      <p class="mb-6 text-center text-xl">Join us in shaping the future of mining technology and sustainable practices.</p>

      <!-- Success or Error Message -->
      <?php if (isset($success_message)) { ?>
        <div class="bg-green-500 text-white text-center p-4 rounded-lg mb-6">
            <p><?php echo $success_message; ?></p>
        </div>
      <?php } elseif (isset($error_message)) { ?>
        <div class="bg-red-500 text-white text-center p-4 rounded-lg mb-6">
            <p><?php echo $error_message; ?></p>
        </div>
      <?php } ?>

      <form id="investorForm" class="space-y-8" method="POST" enctype="multipart/form-data">
        <!-- Flex Container for Personal and Investment Information -->
        <div class="flex flex-col md:flex-row md:justify-between gap-8">
          
          <!-- Personal Information Section -->
          <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-1/2">
            <h3 class="text-2xl font-semibold text-orange-600 mb-4">Personal Information</h3>
            <div class="grid gap-6 md:grid-cols-2">
              <div>
                <label for="name" class="block text-gray-600 font-medium mb-1">Full Name:</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="email" class="block text-gray-600 font-medium mb-1">Email:</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="phone" class="block text-gray-600 font-medium mb-1">Phone Number:</label>
                <input type="tel" name="phone" id="phone" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="company" class="block text-gray-600 font-medium mb-1">Company/Organization:</label>
                <input type="text" name="company" id="company" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="gender" class="block text-gray-600 font-medium mb-1">Gender:</label>
                <select name="gender" id="gender" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div>
                <label for="dob" class="block text-gray-600 font-medium mb-1">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="occupation" class="block text-gray-600 font-medium mb-1">Occupation:</label>
                <input type="text" name="occupation" id="occupation" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="address" class="block text-gray-600 font-medium mb-1">Address:</label>
                <input type="text" name="address" id="address" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500" placeholder="Enter your full address">
              </div>
              <div>
                <label for="city" class="block text-gray-600 font-medium mb-1">City:</label>
                <input type="text" name="city" id="city" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="zipcode" class="block text-gray-600 font-medium mb-1">Pincode/Zipcode:</label>
                <input type="text" name="zipcode" id="zipcode" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="country" class="block text-gray-600 font-medium mb-1">Country:</label>
                <input type="text" name="country" id="country" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
              </div>
              <div>
                <label for="linkedin" class="block text-gray-600 font-medium mb-1">LinkedIn Profile:</label>
                <input type="url" name="linkedin" id="linkedin" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500" placeholder="https://linkedin.com/in/username">
              </div>
            </div>
          </div>

          <!-- Investment Information Section -->
          <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-1/2">
            <h3 class="text-2xl font-semibold text-orange-600 mb-4">Investment Information</h3>
            <div class="grid gap-6">
              <div>
                <label for="investment" class="block text-gray-600 font-medium mb-1">Investment Amount:</label>
                <input type="number" name="investment" id="investment" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500" placeholder="Enter your investment amount">
              </div>
              <div>
                <label for="message" class="block text-gray-600 font-medium mb-1">Message/Notes:</label>
                <textarea name="message" id="message" rows="4" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500" placeholder="Any additional information"></textarea>
              </div>
              <div>
                <label for="documents" class="block text-gray-600 font-medium mb-1">Upload Documents:</label>
                <input type="file" name="documents[]" id="documents" multiple class="w-full px-4 py-3 border rounded-lg">
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-6">
          <button type="submit" class="bg-orange-500 text-white px-8 py-3 rounded-lg text-lg focus:ring-4 focus:ring-orange-500">Submit Application</button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include '../Inc/Footer.php';?>

<script>
  AOS.init();
</script>
</body>
</html>
