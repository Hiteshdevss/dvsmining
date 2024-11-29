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


  <title>About Us - DVSMining</title>
  </head>
  <body class="bg-orange-50">

  
  <!-- Navbar -->
  <?php include '../Inc/Navbar.php';?>



    <!-- Fix Banner Image  -->
    <div class="-mt-44">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/About Us.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/About Us.png" alt="" class="mt-2 md:hidden">
  </div>




  <!-- About Section -->
  <section class="mr-5 md:mr-24 ml-5 md:ml-24 mb-24 mt-10">
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
            class="text-gray-600 text-lg text-justify md:w-1/2"
            data-aos="fade-up"
          >
          At DVS Mining, we specialize in delivering comprehensive and innovative mining solutions that combine operational efficiency with environmental sustainability. With expertise in both opencast and underground mining, we cater to the diverse needs of clients worldwide. Our opencast mining services include drilling, blasting, and advanced material handling, while our underground mining operations focus on techniques such as shaft sinking, drilling, blasting, level development, raising, winding, and gradient slope management. We also excel in incline, decline, portal, and tunnel mining, ensuring precise and effective extraction methods tailored to every project.
          <br><br>
          In addition to mining operations, our focus on design engineering sets us apart. Using state-of-the-art tools like Numerical Modeling (FLAC), we deliver solutions for slope stability, shaft sinking, and headgear engineering. Our expertise extends to designing portals and decline mining systems, ensuring efficiency, safety, and adaptability to unique geological conditions.
          <br><br>
          At DVS Mining, innovation and sustainability drive everything we do. By integrating cutting-edge technologies and best practices, we strive to minimize environmental impact while maximizing operational safety and productivity. Our experienced team works diligently to provide end-to-end solutions, from initial design and development to on-site implementation, ensuring timely and quality results.
          </p>
        </div>
        <p class="text-gray-600 text-lg text-justify md:w-full mt-6"
        data-aos="fade-up">We are proud to be a trusted partner in the mining industry, dedicated to setting new standards of excellence and reliability. At DVS Mining, we are not just extracting resources; we are building a sustainable future for our clients and communities worldwide.
       <br><br>
       Our strength lies not just in operations but also in design engineering, where we combine cutting-edge tools like Numerical Modeling (FLAC) with a deep understanding of mining dynamics. From ensuring slope stability in opencast mines to creating robust designs for shaft sinking and headgear systems, our engineering solutions are built for efficiency and long-term reliability. We take pride in developing detailed designs for decline mining and portals, enabling seamless transitions between design and implementation.
       <br><br>
       Our team of seasoned professionals brings together years of experience, technical expertise, and a relentless drive for excellence. From the early stages of planning and design to the final stages of execution, we provide comprehensive support, ensuring our clients achieve their objectives on time and within budget. We work collaboratively, offering tailored solutions that address the unique challenges of each project.
      </p>
      </div>
</section>

<!-- Journey -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
      Our Journey
    </h2>
    <p class="mb-6 text-center text-xl">
      From Humble Beginnings to Industry Leaders
    </p>
    <div class="flex flex-col md:flex-row items-center justify-between">
      <!-- Text Section -->
      <div class="md:w-1/2 pr-6 mb-6 md:mb-0">
        <p class="text-gray-600 text-lg text-justify" data-aos="fade-up">
          <b>1992 – A Vision is Born</b>
          In 1992, a visionary named Mr. D.V. Somkuwar took the first step in a journey that would transform the landscape of Indian mining. Launching a proprietary firm under the name D.V. Somkuwar, he embarked on a mission to bring innovation, precision, and dedication to the surface mining, civil, and mechanical domains.
          <br><br>
          <b>A Legacy of Excellence – 1992 to 2015</b>
          For <b>25 years</b>, the firm grew under the steady leadership of Mr. Somkuwar. Through years of hard work and countless successful projects, D.V. Somkuwar carved a name for itself in the mining sector.
          <br><br>
          <b>2018 – A New Generation Takes the Lead</b>
          In 2018, the company saw the arrival of fresh leadership with the introduction of Mr. Ratandip Somkuwar and Mr. Prakash Wanjari. With their innovative ideas and forward-thinking approach, they ushered in a new era for the company.
          <br><br>
          <b>2022 – Rebranding and Expansion</b>
          The culmination of years of growth and expertise led to a significant milestone in 2022—the rebranding of the company to DVS Mining. Our expanded portfolio reflects our ability to take on more complex and varied mining projects.
          <br><br>
          <b>Today – A Nationwide Presence</b>
          From 2022 onwards, DVS Mining has been working tirelessly across numerous mines all over India, delivering large-scale projects that continue to redefine industry standards.
          <br><br>
          <b>2024 – The Road Ahead</b>
          As we stand on the threshold of 2024, DVS Mining continues to grow and evolve. We are poised to make a monumental leap forward with plans for our Initial Public Offering (IPO), opening new opportunities for growth and global expansion.
          <br><br>
          <b>From humble beginnings in 1992 to a dynamic future ahead</b>, the journey of <b>DVS Mining</b> is a testament to the power of vision, dedication, and excellence.
        </p>
      </div>

      <!-- Image Section -->
      <img
        src="../Assets/Images/General/Journey.png"
        alt="About Us"
        class="w-full md:w-1/2 h-auto rounded-2xl mb-6 md:mb-0 md:ml-6"
        data-aos="zoom-in"
      />
    </div>
  </div>
</section>


 <!-- Our Vision -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
      Our Vision
    </h2>
    <p class="mb-6 text-center text-xl text-gray-600">
      Building a Sustainable and Innovative Future
    </p>
    <div class="flex flex-col md:flex-row items-center justify-between">
      <!-- Image Section -->
      <img
        src="../Assets/Images/General/Vision.png"
        alt="Our Vision"
        class="w-full md:w-1/2 h-auto rounded-2xl mb-6 md:mb-0 md:mr-6"
        data-aos="zoom-in"
      />

      <!-- Text Section -->
      <div class="md:w-1/2 pl-6">
        <p class="text-gray-600 text-lg text-justify" data-aos="fade-up">
          At DVS Mining, our vision is to become a leading force in the mining industry, not just in terms of scale, but in the innovation and sustainability that drive us forward. We aim to create value for our clients and communities while ensuring that our operations leave a positive environmental impact. 
          <br><br>
          <b>Commitment to Sustainability:</b> We are dedicated to adopting best practices in environmental conservation and reducing our carbon footprint. Our vision includes integrating cutting-edge technology that promotes efficiency while preserving the natural environment.
          <br><br>
          <b>Innovating the Future of Mining:</b> By leveraging modern tools, data analytics, and AI-driven solutions, we plan to revolutionize the mining process. We are committed to ensuring that our innovations lead to safer, more productive, and sustainable operations.
          <br><br>
          <b>Empowering Local Communities:</b> Our vision extends beyond the business—we aim to contribute to the well-being of the communities we operate in. By creating jobs, promoting skill development, and supporting local initiatives, we ensure that the growth of DVS Mining benefits everyone.
          <br><br>
          <b>Global Expansion:</b> As we continue to grow, we aspire to take our values and practices to the global stage, ensuring our presence is felt across multiple continents while maintaining the standards that make us leaders in the industry.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Mission -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
      Our Mission
    </h2>
    <p class="mb-6 text-center text-xl">
      Committed to Excellence and Innovation
    </p>
    <div class="flex flex-col md:flex-row items-center justify-between">
      <!-- Image Section (First on mobile, after text on desktop) -->
      <img
        src="../Assets/Images/General/Mission.png"
        alt="Our Mission"
        class="w-full md:w-1/2 h-auto rounded-2xl mb-6 md:mb-0 md:mr-6"
        data-aos="zoom-in"
      />
      
      <!-- Text Section -->
      <div class="md:w-1/2 pl-6 mb-6 md:mb-0">
        <p class="text-gray-600 text-lg text-justify" data-aos="fade-up">
          At <b>DVS Mining</b>, our mission is to drive industry innovation and provide sustainable, high-quality mining solutions. We are committed to creating value through a combination of cutting-edge technology, operational excellence, and a deep understanding of the challenges faced by the mining industry.
          <br><br>
          We aim to be a trusted partner for our clients, delivering solutions that not only meet but exceed expectations. Our approach combines technical expertise with a passion for creating safer, more efficient mining practices that contribute to the growth of the communities we serve.
          <br><br>
          We are dedicated to:
          <ul class="list-disc pl-6">
            <li><b>Innovation:</b> Continuously exploring new technologies and methodologies to improve our operations and industry practices.</li>
            <li><b>Sustainability:</b> Striving to minimize our environmental footprint while maximizing the long-term benefits of our projects.</li>
            <li><b>Safety:</b> Prioritizing the safety and well-being of our employees, clients, and stakeholders in all our activities.</li>
            <li><b>Integrity:</b> Upholding the highest standards of ethics, transparency, and accountability in everything we do.</li>
            <li><b>Excellence:</b> Delivering top-tier quality and performance in every project we undertake.</li>
          </ul>
          <br><br>
          Our mission is not just about mining—it’s about creating a lasting impact on the industry and the world around us, one project at a time.
        </p>
      </div>
    </div>
  </div>
</section>


<!-- Our Value -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
      Our Values
    </h2>
    <p class="mb-6 text-center text-xl text-gray-700">
      The principles that guide us toward excellence
    </p>
    <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0">
      <!-- Value 1 -->
      <div class="text-center md:w-1/3">
        <div class="bg-orange-600 text-white p-6 rounded-full mb-4 inline-block">
          <img src="../Assets/Images/General/integration.png" class="w-10 h-10" alt=""> <!-- Example icon (heart) -->
        </div>
        <h3 class="text-xl font-semibold mb-2">Integrity</h3>
        <p class="text-gray-600 text-lg">
          We operate with the highest standards of honesty and transparency, building trust with our clients, partners, and employees.
        </p>
      </div>

      <!-- Value 2 -->
      <div class="text-center md:w-1/3">
        <div class="bg-orange-600 text-white p-6 rounded-full mb-4 inline-block">
        <img src="../Assets/Images/General/innovation.png" class="w-10 h-10" alt=""> <!-- Example icon (gears) -->
        </div>
        <h3 class="text-xl font-semibold mb-2">Innovation</h3>
        <p class="text-gray-600 text-lg">
          We embrace cutting-edge technologies and new ideas to drive progress, constantly seeking to improve and innovate.
        </p>
      </div>

      <!-- Value 3 -->
      <div class="text-center md:w-1/3">
        <div class="bg-orange-600 text-white p-6 rounded-full mb-4 inline-block">
        <img src="../Assets/Images/General/collaboration.png" class="w-10 h-10" alt=""> <!-- Example icon (users) -->
        </div>
        <h3 class="text-xl font-semibold mb-2">Collaboration</h3>
        <p class="text-gray-600 text-lg">
          We believe in the power of teamwork, working together across departments and with clients to achieve shared success.
        </p>
      </div>
    </div>
  </div>
</section>


<!-- Our Promise -->
<section class="mr-5 md:mr-36 ml-5 md:ml-36 py-8">
  <div class="p-6 rounded-2xl" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl font-bold mb-1 text-center text-orange-600 mb-4">
      Our Promise
    </h2>
    <p class="mb-6 text-center text-xl text-gray-700">
      A Commitment to Excellence and Integrity
    </p>
    <div class="flex flex-col md:flex-row items-center justify-between">
      <!-- Text Section -->
      <div class="md:w-1/2 pr-6 mb-6 md:mb-0">
        <p class="text-gray-600 text-lg text-justify" data-aos="fade-up">
          At DVS Mining, we are committed to delivering the highest standards of service across every project. Our promise is not just about achieving goals but about doing so with integrity, safety, and sustainability at the forefront of every decision we make.
          <br><br>
          <b>Excellence</b> – We strive for perfection in everything we do, ensuring that each project is executed to the highest quality standards.
          <br><br>
          <b>Innovation</b> – We continuously explore new technologies and techniques to improve our processes and offer cutting-edge solutions.
          <br><br>
          <b>Sustainability</b> – We prioritize sustainable practices in all our operations to reduce environmental impact and promote long-term growth.
          <br><br>
          <b>Integrity</b> – Honesty, transparency, and ethical practices are at the core of our business, fostering trust with our clients and partners.
        </p>
      </div>

      <!-- Image Section -->
      <img
        src="../Assets/Images/General/Promise.png"
        alt="Our Promise"
        class="w-full md:w-1/2 h-auto rounded-2xl mb-6 md:mb-0 md:ml-6"
        data-aos="zoom-in"
      />
    </div>
  </div>
</section>



    <!-- Why Choose Us -->
<div class="max-w-screen-xl mx-auto py-8 px-4 lg:py-16 lg:px-6 mt-10">
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


  <!-- CTA -->
  <?php include '../Inc/CTA.php'; ?>

  <!-- footer -->
  <?php include '../Inc/Footer.php';?>
  
  <!-- Whatsapp -->
  <?php include '../Inc/Whatsapp.php';?>
  
  <script src=".././Assets/Scripts/index.js"></script>
  
  </body>
  </html>