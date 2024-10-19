<?php
session_start(); // Start session at the beginning

// Include database connection
include '../../Inc/dbcon.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the job ID from the form
    $job_id = intval($_POST['job_id']);
    
    // Get user inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    
    // Handle file upload (resume)
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['resume']['tmp_name'];
        $fileName = $_FILES['resume']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Ensure you are only using the original file name
        $baseFileName = basename($fileName, "." . $fileExtension);
        $finalFileName = $baseFileName . "." . $fileExtension;

        // Define allowed file extensions
        $allowedExtensions = ['pdf', 'doc', 'docx'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // Define the directory to store resumes
            $uploadFileDir = '../../Resumes/';
            $dest_path = $uploadFileDir . $finalFileName;

            // Move the file to the server directory
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insert application data into the database
                $sql = "INSERT INTO applications (job_id, name, email, phone, resume) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param('issss', $job_id, $name, $email, $phone, $finalFileName);
                    
                    if ($stmt->execute()) {
                        // Redirect to thankyou.php after successful submission
                        header("Location: thankyou.php");
                        exit();
                    } else {
                        echo 'Error: Could not save application.';
                    }
                } else {
                    echo 'Error: Could not prepare statement.';
                }
            } else {
                echo 'Error: File upload failed.';
            }
        } else {
            echo 'Error: Only PDF, DOC, and DOCX files are allowed.';
        }
    } else {
        echo 'Error: No resume file uploaded.';
    }

    // Close the database connection
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
?>
