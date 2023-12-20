<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $service = $_POST['service'] ?? '';
    $dr_name = $_POST['dr_name'] ?? '';
    $date_time = $_POST['date_time'] ?? '';
   

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'srihariskinclinic@gmail.com'; // Your Gmail email address
        $mail->Password = 'qtpbnrowxcomvegm'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('srihariskinclinic@gmail.com', 'Sri Hari Skin Clinic'); // Your Gmail email and name
        $mail->addAddress('srihariskinclinic@gmail.com', 'Sri Hari Skin Clinic'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
        <h1>New Message From Sri Hari Skin Clinic</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Service:</strong> $service</p>
        <p><strong>Dr_Name:</strong> $dr_name</p>
        <p><strong>Date&Time:</strong> $date_time</p>
        ";

        $mail->send();
        echo '<SCRIPT>
        window.alert("submitted Successfully")
        window.location.href="appointment.html"</SCRIPT>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
