<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './phpmailer/Exception.php';
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';

// Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hr@dvsmining.org';        // SMTP username (your email)
    $mail->Password   = 'uzjasvlynsehwweh';                     // SMTP password (use app password if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
    $mail->Port       = 465;                                    // TCP port to connect to

    // Database connection and fetching the user's email
    include './dbcon.php';
    $sql = 'SELECT email FROM contact_form LIMIT 1';  // Adjust this to fetch the correct email
    $result = $conn->query($sql);  // Execute the query

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userEmail = $row['email'];  // Get the user's email from the database

        // Recipients: Send email to the user
        $mail->setFrom('hr@dvsmining.org', 'Contact Form');  // Sender's details
        $mail->addAddress($email, 'Candidate');  // Send to the user fetched from database
        $mail->addAddress('hr@dvsmining.org', 'Admin');  // Send to the admin (your email)

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Application Received Successfully';
        $mail->Body    = 'Dear Candidate, <br>Thank you for submitting your application for the open position at our organization. We are pleased to confirm that we have received your application and our team is currently reviewing your profile.<br>If your qualifications match our requirements, we will contact you for the next steps in the selection process.<br>We appreciate your interest in joining our team and wish you the best of luck!';

        $mail->send();
        echo 'Registration email has been sent to both the user and the admin.';
    } else {
        echo 'No user email found in the database.';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
