<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News Post - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }

        /* Modal Styling */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 400px; 
            text-align: center;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Slim Sidebar -->
       <?php include '../Inc/sidebar.php'; ?>
       
       <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
       <!-- Navbar -->
       <?php include '../Inc/navbar.php'; ?>

            <!-- Form Content -->
            <main class="flex-1 p-6">
                <?php
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "dvsmining_db";

                 $conn = new mysqli($servername, $username, $password, $dbname);
                 if ($conn->connect_error) {
                     die("Connection failed: " . $conn->connect_error);
                 }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Collect form data
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $introduction = $_POST['introduction'];
                    $main_content = $_POST['main_content'];
                    $conclusion = $_POST['conclusion'];
                    $author = $_POST['author'] === "Custom" ? $_POST['custom_author'] : $_POST['author'];

                    // Handle file upload for main image
                    $main_image = '';
                    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["main_image"]["name"]);
                        if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {
                            $main_image = $target_file;
                        } else {
                            echo "<p class='text-red-600'>Error uploading the image.</p>";
                        }
                    }

                    // Prepare SQL statement to insert data into news_post table
                    $stmt = $conn->prepare("INSERT INTO news_post (title, description, main_image, introduction, main_content, conclusion, author, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
                    $stmt->bind_param("sssssss", $title, $description, $main_image, $introduction, $main_content, $conclusion, $author);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "<script>$(document).ready(function() { $('#successModal').show(); });</script>";
                    } else {
                        echo "<p class='text-red-600'>Error: " . $stmt->error . "</p>";
                    }

                    // Close the statement and connection
                    $stmt->close();
                    $conn->close();
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data" class="p-6 max-w-4xl mx-auto h-full grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- News Title -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <label for="title" class="block text-orange-600 font-medium mb-2">News Title</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter the News title" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-orange-600 font-medium mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Short description of the News" required></textarea>
                    </div>

                    <!-- Main Image Upload -->
                    <div class="mb-4">
                        <label for="main_image" class="block text-orange-600 font-medium mb-2">Upload Main Image</label>
                        <div id="file-upload-wrapper" class="flex items-center justify-center border-2 border-dashed border-gray-300 p-8 rounded-lg cursor-pointer hover:border-orange-600 transition-colors">
                            <span id="file-upload-text" class="text-gray-500 hover:text-orange-600">Drag and drop or click to select</span>
                            <input type="file" id="main_image" name="main_image" class="hidden" required>
                        </div>
                    </div>

                    <!-- Introduction -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label for="introduction" class="block text-orange-600 font-medium mb-2">Introduction With Hashtags</label>
                        <textarea id="introduction" name="introduction" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Intro and Hashtags to the News post" required></textarea>
                    </div>

                    <!-- Main Content -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label for="main_content" class="block text-orange-600 font-medium mb-2">Main Content</label>
                        <div id="main_content_editor" class="h-56 bg-white rounded-lg border border-gray-300"></div>
                        <input type="hidden" id="main_content" name="main_content">
                    </div>

                    <!-- Conclusion -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label for="conclusion" class="block text-orange-600 font-medium mb-2">Conclusion</label>
                        <textarea id="conclusion" name="conclusion" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Conclusion" required></textarea>
                    </div>

                    <!-- Author Field -->
                    <div class="mb-4 col-span-1">
                        <label for="author" class="block text-orange-600 font-medium mb-2">Author</label>
                        <select id="author" name="author" class="w-full p-2 border border-gray-300 rounded-lg" onchange="toggleCustomAuthor(this)">
                            <option value="" disabled selected>Select an author</option>
                            <option value="Author 1">Author 1</option>
                            <option value="Author 2">Author 2</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>

                    <!-- Custom Author Name -->
                    <div class="mb-4 col-span-1" id="custom-author-field" style="display:none;">
                        <label for="custom_author" class="block text-orange-600 font-medium mb-2">Custom Author Name</label>
                        <input type="text" id="custom_author" name="custom_author" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter custom author name">
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <button type="submit" class="w-full p-2 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700">Create Post</button>
                    </div>
                </form>

                <!-- Success Modal -->
                <div id="successModal" class="modal">
                    <div class="modal-content">
                        <p class="text-orange-600 font-semibold">Thanks for submitting a new news post!</p>
                        <button onclick="closeModal()" class="p-2 mt-4 bg-orange-600 text-white rounded-lg hover:bg-orange-700">OK</button>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        $(document).ready(function () {
            $('#menu-toggle').click(function () {
                $('#sidebar').toggleClass('-translate-x-full');
            });

            $('#close-btn').click(function () {
                $('#sidebar').addClass('-translate-x-full');
            });

            $(window).resize(function () {
                if ($(window).width() >= 768) {
                    $('#sidebar').removeClass('-translate-x-full');
                } else {
                    $('#sidebar').addClass('-translate-x-full');
                }
            });
        });

        const fileUploadWrapper = document.getElementById('file-upload-wrapper');
        const fileInput = document.getElementById('main_image');
        const fileUploadText = document.getElementById('file-upload-text');

        fileUploadWrapper.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length > 0) {
                fileUploadText.textContent = `Selected file: ${fileInput.files[0].name}`;
            }
        });

        var quill = new Quill('#main_content_editor', {
            theme: 'snow',
            placeholder: 'Write the main content...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        var form = document.querySelector('form');
        form.onsubmit = function () {
            var mainContent = document.querySelector('input[name=main_content]');
            mainContent.value = quill.root.innerHTML;
        };

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }
    </script>
</body>
</html>
