<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Suppliers - DVSMining</title>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <?php include '../Inc/Navbar.php';?>

       <!-- Fix Banner Image  -->
   <div class="-mt-44 mb-10">
    <!-- visible on desktop only -->
    <img src="../Assets/Images/Banner/Desktop/Supplier.png" alt="" class="mt-2 hidden md:block">

    <!-- visible on mobile only -->
    <img src="../Assets/Images/Banner/Mobile/Supplier.png" alt="" class="mt-2 md:hidden">
  </div>

    <!-- Suppliers Section -->
    <section class="py-10">
        <div class="container mx-auto px-5 md:px-20">
            <div class="text-center mb-10">
                <h2 class="text-5xl md:text-5xl font-bold text-orange-600 mb-4">Our Suppliers</h2>
                <p class="mb-6 text-xl">We partner with trusted suppliers to ensure quality and sustainability.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Supplier Card 1 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier1.jpg" alt="Supplier 1" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 1</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 1 and their services.</p>
                </div>

                <!-- Supplier Card 2 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier2.jpg" alt="Supplier 2" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 2</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 2 and their services.</p>
                </div>

                <!-- Supplier Card 3 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier3.jpg" alt="Supplier 3" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 3</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 3 and their services.</p>
                </div>

                <!-- Supplier Card 4 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier4.jpg" alt="Supplier 4" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 4</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 4 and their services.</p>
                </div>

                <!-- Supplier Card 5 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier5.jpg" alt="Supplier 5" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 5</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 5 and their services.</p>
                </div>

                <!-- Supplier Card 6 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
                    <img src="../Assets/Images/supplier6.jpg" alt="Supplier 6" class="rounded-t-lg w-full h-48 object-cover">
                    <h3 class="text-2xl font-semibold text-orange-600 mt-4">Supplier Name 6</h3>
                    <p class="text-gray-600 mt-2">Description of Supplier 6 and their services.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../Inc/Footer.php';?>

    <!-- Whatsapp -->
    <?php include '../Inc/Whatsapp.php';?>  

    <script src="../Assets/Scripts/index.js"></script>
</body>
</html>
