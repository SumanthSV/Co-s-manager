<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: mygaming987274@gmail.com"; // Change this to the admin's email address
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    echo "Invalid request."; 
}
?>