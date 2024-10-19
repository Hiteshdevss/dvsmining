<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job - Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #sidebar {
            transition: transform 0.3s ease-in-out;
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
                <form class="p-6 max-w-4xl mx-auto h-full grid grid-cols-1 md:grid-cols-2 gap-6" method="POST" enctype="multipart/form-data">
                    <!-- Job Title -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <label for="job_title" class="block text-orange-600 font-medium mb-2">Job Title</label>
                        <input type="text" id="job_title" name="job_title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter the job title" required>
                    </div>
            
                    <!-- Company Name -->
                    <div class="mb-4">
                        <label for="company_name" class="block text-orange-600 font-medium mb-2">Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter company name" required>
                    </div>
            
                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location" class="block text-orange-600 font-medium mb-2">Location</label>
                        <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter job location" required>
                    </div>
            
                    <!-- Job Type -->
                    <div class="mb-4">
                        <label for="job_type" class="block text-orange-600 font-medium mb-2">Job Type</label>
                        <select id="job_type" name="job_type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            <option value="" disabled selected>Select job type</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
            
                    <!-- Salary -->
                    <div class="mb-4">
                        <label for="salary" class="block text-orange-600 font-medium mb-2">Salary</label>
                        <input type="number" step="0.01" id="salary" name="salary" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Enter salary (e.g., 50000.00)" required>
                    </div>
            
                    <!-- Description -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label for="description" class="block text-orange-600 font-medium mb-2">Job Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Job description" required></textarea>
                    </div>
            
                    <!-- Requirements -->
                    <div class="mb-4 col-span-1 md:col-span-2">
                        <label for="requirements" class="block text-orange-600 font-medium mb-2">Job Requirements</label>
                        <textarea id="requirements" name="requirements" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Job requirements" required></textarea>
                    </div>
            
                    <!-- Posted Date -->
                    <div class="mb-4">
                        <label for="posted_date" class="block text-orange-600 font-medium mb-2">Posted Date</label>
                        <input type="datetime-local" id="posted_date" name="posted_date" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
            
                    <!-- Application Deadline -->
                    <div class="mb-4">
                        <label for="application_deadline" class="block text-orange-600 font-medium mb-2">Application Deadline</label>
                        <input type="datetime-local" id="application_deadline" name="application_deadline" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
            
                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-orange-600 font-medium mb-2">Job Status</label>
                        <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg" required>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
            
                    <!-- Submit Button -->
                    <div class="col-span-1 md:col-span-2 mb-4">
                        <button type="submit" class="w-full p-2 bg-orange-600 text-white font-semibold rounded-lg hover:bg-orange-700">Create Job Post</button>
                    </div>
                </form>
            </main>
            
        </div>
    </div>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        $(document).ready(function () {
            // Toggle sidebar visibility for mobile and tablet
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

        // File upload functionality
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

        // Initialize Quill editor
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

        // Handle form submission
        var form = document.querySelector('form');
        form.onsubmit = function () {
            var mainContent = document.querySelector('input[name=main_content]');
            mainContent.value = quill.root.innerHTML;
        };
    </script>
</body>
</html>
