<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "dvsmining_db";

// Form data handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   
    $sql = "INSERT INTO cta_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Message sent successfully
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- Section with Contact Us Button -->
<section class="bg-orange-600 py-12 text-center mr-5 md:mr-36 ml-5 md:ml-36 rounded-2xl mb-28 mt-20 z-99" id="contact_us" data-aos="fade-up">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-white mb-4">Ready to Take the Next Step?</h2>
    <p class="text-lg text-white mb-6">
      Whether you're looking for more information or ready to start a project with us, we're here to help. Get in touch with us today!
    </p>
    <button id="contactUsBtn" class="bg-white text-orange-600 font-bold py-3 px-6 rounded-full hover:bg-gray-200 transition duration-300">
      Contact Us
    </button>
  </div>
</section>

<!-- Popup Modal -->
<div id="contactModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <!-- Modal Content -->
  <div class="bg-white rounded-lg p-6 w-full max-w-md m-4 relative">
    <!-- Close Button -->
    <button id="closeModal" class="absolute top-3 right-2 bg-orange-600 text-white px-3 py-1 rounded-full hover:bg-gray-400">
      X
    </button>
    
    <!-- Contact Form (Stepper) -->
    <div id="contactFormContainer">
      <img src="../Assets/Images/General/popup-bg.jpeg" class="mb-8 rounded-lg pt-2" alt="">
      <h2 class="text-xl font-bold mb-4 text-center">Let's Talk About Your Project</h2>
      <form id="contactForm" method="post">
        <!-- Step 1: Name -->
        <div class="step" id="step1">
          <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded" placeholder="Your Name" required>
          <div class="flex justify-end mt-4">
            <button type="button" class="next-step bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-500 transition duration-300">Next</button>
          </div>
        </div>

        <!-- Step 2: Email -->
        <div class="step hidden" id="step2">
          <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded" placeholder="Your Email Address" required>
          <div class="flex justify-between mt-4">
            <button type="button" class="prev-step bg-gray-300 py-2 px-4 rounded hover:bg-gray-400 transition duration-300">Previous</button>
            <button type="button" class="next-step bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-500 transition duration-300">Next</button>
          </div>
        </div>

        <!-- Step 3: Message -->
        <div class="step hidden" id="step3">
          <textarea id="message" name="message" class="w-full border border-gray-300 p-2 rounded" placeholder="Let Us Know What You're Looking For" required></textarea>
          <div class="flex justify-between mt-4">
            <button type="button" class="prev-step bg-gray-300 py-2 px-4 rounded hover:bg-gray-400 transition duration-300">Previous</button>
            <button type="submit" class="bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-500 transition duration-300">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Thank You Section (Initially Hidden) -->
    <div id="thankYouContainer" class="hidden text-center">
      <img src="https://media.tenor.com/bm8Q6yAlsPsAAAAj/verified.gif" alt="Check" class="w-16 mx-auto mb-4">
      <h2 class="text-2xl font-bold mb-4">Thank You!</h2>
      <p class="text-lg text-gray-700 mb-6">We have received your message and will get back to you shortly.</p>
      <button type="button" id="closeThankYouModal" class="bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-500 transition duration-300">Close</button>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Open Modal
  $('#contactUsBtn').click(function() {
    $('#contactModal').removeClass('hidden');
    $('#contactFormContainer').show();
    $('#thankYouContainer').hide();
  });

  // Close Modal
  $('#closeModal, #closeThankYouModal').click(function() {
    $('#contactModal').addClass('hidden');
  });

  // Close Modal when clicking outside the modal
  $(window).click(function(event) {
    if (event.target === document.getElementById('contactModal')) {
      $('#contactModal').addClass('hidden');
    }
  });

  // Stepper Logic with Validation
  $('.next-step').click(function() {
    // Get the current step's input element
    var currentStep = $(this).closest('.step');
    var inputField = currentStep.find('input, textarea');

    // Check if the current input field is filled
    if (inputField.val() === '') {
      alert('Please fill out this field before proceeding.');
    } else {
      // Hide current step and show the next one
      currentStep.addClass('hidden').next('.step').removeClass('hidden');
    }
  });

  $('.prev-step').click(function() {
    // Go to the previous step
    $(this).closest('.step').addClass('hidden').prev('.step').removeClass('hidden');
  });

  // AJAX Form Submission with Validation
  $('#contactForm').submit(function(event) {
    event.preventDefault(); // Prevent default form submit

    // Ensure all required fields are filled before submission
    var formValid = true;
    $('#contactForm input, #contactForm textarea').each(function() {
      if ($(this).val() === '') {
        formValid = false;
        alert('Please fill all fields before submitting.');
        return false; // Stop the loop if any field is empty
      }
    });

    if (formValid) {
      var formData = $(this).serialize(); // Serialize form data

      $.ajax({
        type: 'POST',
        url: 'contact.php', // Path to your PHP script
        data: formData,
        success: function(response) {
          // Hide the form and show the thank you message
          $('#contactFormContainer').hide();
          $('#thankYouContainer').show();
          $('#contactForm')[0].reset(); // Reset form fields
        },
        error: function() {
          alert('There was an error submitting the form. Please try again.');
        }
      });
    }
  });
</script>
