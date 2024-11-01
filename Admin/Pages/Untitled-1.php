<?php
// (existing PHP connection code and handling logic)
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
    <style>
        #sidebar {
            transition: transform 0.3s ease-in-out;
        }
        /* Popup Styles */
        .popup {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
            justify-content: center; /* Center the content */
            align-items: center; /* Center the content */
        }
        .popup-content {
            background-color: white; /* White background */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <?php include '../Inc/sidebar.php'; ?>
        
        <div class="flex-1 w-full h-full overflow-hidden overflow-y-auto">
            <?php include '../Inc/navbar.php'; ?>

            <main class="flex-1 p-4 md:p-6">
                <form method="POST" enctype="multipart/form-data" class="p-4 md:p-6 max-w-4xl mx-auto h-full overflow-y-auto grid grid-cols-1 gap-6">
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
                        <div id="file-upload-wrapper" class="flex items-center justify-center border-2 border-dashed border-gray-300 p-8 rounded-lg cursor-pointer hover:border-orange-600 transition-colors">
                            <span id="file-upload-text" class="text-gray-500 hover:text-orange-600">Drag and drop or click to select a file</span>
                            <input type="file" id="main_image" name="main_image" class="hidden" required>
                        </div>
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

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition-colors">Submit Blog Post</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <!-- Success Popup -->
    <div id="success-popup" class="popup">
        <div class="popup-content">
            <h2 class="text-lg font-semibold text-orange-600">Success!</h2>
            <p>Your blog post has been successfully created.</p>
            <button id="close-popup" class="mt-4 bg-orange-600 text-white py-2 px-4 rounded-lg hover:bg-orange-700 transition-colors">Close</button>
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

            // Show success popup
            $('#success-popup').fadeIn();
            return false; // Prevent actual form submission for demo; remove this in production
        };

        // Close popup
        $('#close-popup').click(function() {
            $('#success-popup').fadeOut();
        });
    </script>
</body>
</html>
