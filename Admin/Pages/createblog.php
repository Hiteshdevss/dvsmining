<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'dvsmining_db';

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ensure 'uploads/' directory exists
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Retrieve form data
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $introduction = $_POST['introduction'] ?? '';
    $main_content = $_POST['main_content'] ?? '';
    $conclusion = $_POST['conclusion'] ?? '';
    $author = $_POST['author'] ?? '';

    // Handle image upload
    $main_image = '';
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === 0) {
        $image_tmp = $_FILES['main_image']['tmp_name'];
        $image_name = basename($_FILES['main_image']['name']);
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($image_tmp, $target_file)) {
            $main_image = $target_file;
        } else {
            echo "<script>alert('Image upload failed');</script>";
        }
    }

    // Check if the blogs table exists
    $conn->query("CREATE TABLE IF NOT EXISTS blogs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        description TEXT,
        main_image VARCHAR(255),
        introduction TEXT,
        main_content TEXT,
        conclusion TEXT,
        author VARCHAR(255)
    )");

    // Insert data into the database
    $sql = "INSERT INTO blog_post    (title, description, main_image, introduction, main_content, conclusion, author) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss', $title, $description, $main_image, $introduction, $main_content, $conclusion, $author);

    if ($stmt->execute()) {
        echo "<script>alert('Blog post added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
    <?php include '../Inc/sidebar.php'; ?>
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
            <?php include '../Inc/navbar.php'; ?>
            <main class="flex-1 p-4 md:p-6">
                <form method="POST" enctype="multipart/form-data" class="p-4 md:p-6 max-w-4xl mx-auto h-full overflow-y-auto grid grid-cols-1 gap-6" action=" ">
                    <!-- Blog Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-orange-600 font-medium mb-2">Blog Title</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter the blog title" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-orange-600 font-medium mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Short description of the blog" required></textarea>
                    </div>
                    <!-- Main Image Upload -->
                    <div class="mb-4">
                        <label for="main_image" class="block text-orange-600 font-medium mb-2">Upload Main Image</label>
                        <input type="file" id="main_image" name="main_image" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <!-- Introduction -->
                    <div class="mb-4">
                        <label for="introduction" class="block text-orange-600 font-medium mb-2">Introduction with Hashtags</label>
                        <textarea id="introduction" name="introduction" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Introduction with hashtags" required></textarea>
                    </div>
                    <!-- Main Content -->
                    <div class="mb-4">
                        <label for="main_content" class="block text-orange-600 font-medium mb-2">Main Content</label>
                        <div id="main_content_editor" class="h-56 bg-white rounded-lg border border-gray-300"></div>
                        <input type="hidden" id="main_content" name="main_content">
                    </div>
                    <!-- Conclusion -->
                    <div class="mb-4">
                        <label for="conclusion" class="block text-orange-600 font-medium mb-2">Conclusion</label>
                        <textarea id="conclusion" name="conclusion" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Conclusion" required></textarea>
                    </div>
                    <!-- Author -->
                    <div class="mb-4">
                        <label for="author" class="block text-orange-600 font-medium mb-2">Author</label>
                        <input type="text" id="author" name="author" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Author name" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition-colors">Submit Blog Post</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#main_content_editor', {
            theme: 'snow',
            placeholder: 'Write the main content...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['link', 'image'],
                ]
            }
        });

        document.querySelector('form').onsubmit = function() {
            document.getElementById('main_content').value = quill.root.innerHTML;
        };
    </script>
</body>
</html>
