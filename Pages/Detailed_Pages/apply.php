<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Apply for Job - DVSMining</title>
</head>
<body class="bg-gray-50 font-sans">
    <?php include '../../Inc/NavbarDetailed.php'; ?>
    
    <?php
    include '../../Inc/dbcon.php';

    // Load PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './phpmailer/Exception.php';
    require './phpmailer/PHPMailer.php';
    require './phpmailer/SMTP.php';

    $job_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($job_id <= 0) {
        echo '<p class="text-center text-gray-600 mt-10">Invalid job ID.</p>';
        exit();
    }

    $sql = "SELECT * FROM job_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        echo '<p class="text-center text-gray-600 mt-10">Job not found.</p>';
        exit();
    }

    $stmt->close();

    // Handle form submission
    $modalShown = false; // Variable to control modal display
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $applied_post = $_POST['applied_post'];

        if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
            $fileTmpPath = $_FILES['resume']['tmp_name'];
            $fileName = $_FILES['resume']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . '.' . $fileExtension;

            $uploadDir = '../../Admin/uploads/resumes/';
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $sql = "INSERT INTO applications (job_id, name, email, phone, resume_path, applied_post, applied_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('isssss', $job_id, $name, $email, $phone, $destPath, $applied_post);

                if ($stmt->execute()) {
                    $modalShown = true;

                    // Send Email
                    $mail = new PHPMailer(true);
                    try {
                        // SMTP server settings
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->Username   = 'hr@dvsmining.org';
                        $mail->Password   = 'Dvsmining1992@'; // Use app password
                        $mail->Port       = 465;

                        // Email settings for Candidate
                        $mail->setFrom('hr@dvsmining.org', 'DVS Mining HR');
                        $mail->addAddress($email, $name); // Candidate email
                        $mail->isHTML(true);
                        $mail->Subject = 'Application Received Successfully';
                        $mail->Body    = "
                            Dear $name,<br><br>
                            Thank you for applying for the <strong>{$job['job_title']}</strong> position at DVS Mining.<br>
                            We have successfully received your application and will review it shortly.<br><br>
                            Best regards,<br>
                            DVS Mining HR Team
                        ";
                        $mail->send();

                        // Email settings for Admin
                        $mail->clearAddresses();
                        $mail->addAddress('hr@dvsmining.org', 'Admin'); // Admin email
                        $mail->Subject = 'New Job Application Received';
                        $mail->Body    = "
                            A new application has been received for the <strong>{$job['job_title']}</strong> position.<br>
                            <strong>Details:</strong><br>
                            Name: $name<br>
                            Email: $email<br>
                            Phone: $phone<br>
                            Applied Post: $applied_post<br>
                            Resume: <a href='$destPath'>Download Resume</a><br><br>
                            Best regards,<br>
                            System
                        ";
                        $mail->send();
                    } catch (Exception $e) {
                        //echo '<p class="text-red-600 text-center">Email could not be sent. Error: ', $mail->ErrorInfo, '</p>';
                    }
                } else {
                    echo '<p class="text-red-600 text-center">Error: Unable to save application to the database.</p>';
                }
                $stmt->close();
            } else {
                echo '<p class="text-red-600 text-center">Error: File upload failed. Please try again.</p>';
            }
        } else {
            echo '<p class="text-red-600 text-center">Error: No file uploaded or there was an error uploading the file.</p>';
        }
    }
    ?>

    <!-- Apply Form -->
    <div class="container mx-auto mt-10 px-6 md:px-20 lg:px-40">
        <div class="bg-gradient-to-br from-white to-gray-100 p-10 rounded-xl shadow-xl">
            <h1 class="text-3xl font-bold mb-6 text-center text-orange-600">
                Apply for <span class="text-gray-700"><?php echo htmlspecialchars($job['job_title']); ?></span> Position
            </h1>

            <form id="jobApplicationForm" action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block text-gray-600 font-medium">Name:</label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-600 font-medium">Email:</label>
                        <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-gray-600 font-medium">Phone:</label>
                    <input type="tel" name="phone" id="phone" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label for="applied_post" class="block text-gray-600 font-medium">Applied Post:</label>
                    <input type="text" name="applied_post" id="applied_post" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>

                <div>
                    <label for="resume" class="block text-gray-600 font-medium mb-2">Upload Resume:</label>
                    <div id="drop-area" class="flex items-center justify-center w-full h-36 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer transition-colors">
                        <p id="drop-text" class="text-gray-500">Drag & drop your file here, or <span class="text-orange-600 underline">browse</span></p>
                    </div>
                    <input type="file" name="resume" id="resume" required class="hidden">
                </div>

                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300 ease-in-out">
                    Submit Application
                </button>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 <?php echo $modalShown ? '' : 'hidden'; ?>">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-xs text-center">
            <h2 class="text-xl font-semibold mb-4 text-orange-600">Application Submitted!</h2>
            <p class="text-gray-700 mb-6">Thank you for applying. We will review your application and get back to you soon.</p>
            <button id="closeModal" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-6 rounded-lg">
                Close
            </button>
        </div>
    </div>

    <?php include '../../Inc/FooteDetailed.php'; ?>

    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("resume");
        const dropText = document.getElementById("drop-text");
        const successModal = document.getElementById("successModal");
        const closeModal = document.getElementById("closeModal");

        dropArea.addEventListener("click", () => fileInput.click());
        fileInput.addEventListener("change", () => {
            dropText.textContent = fileInput.files[0].name;
        });
        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("bg-gray-100");
        });
        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("bg-gray-100");
        });
        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            if (files.length) {
                fileInput.files = files;
                dropText.textContent = files[0].name;
            }
        });
        closeModal.addEventListener("click", () => {
            successModal.classList.add("hidden");
        });
    </script>
</body>
</html>
