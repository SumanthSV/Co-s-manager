<!-- <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $User_name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $evaluator=$_POST['Evaluator'];
    // Retrieve other form fields similarly

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO $evaluator (Name, Email,phone,Password) 
            VALUES ('$User_name','$email','$phone','$password')";


    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert(`New {$evaluator} Evaluator Added Successfully`);
        window.location.href='registration.html';</script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?> -->



<!-- <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $User_name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $evaluator = $_POST['Evaluator'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO $evaluator (Name, Email, phone, Password) 
            VALUES ('$User_name', '$email', '$phone', '$password')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        // Send email to the registered email address
       // Send email to the registered email address
        $to = $email;
        $subject = "Registration Details";
        $message = "Hello $User_name,\n\nThank you for registering.\n\nYour username is: $email\nYour password is: $password\n\nRegards,\nYour College";
        $headers = "From: sumanthsv04@gmail.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "<script>alert(`New $evaluator Evaluator Added Successfully. Registration details sent to $email`);
            window.location.href='registration.html';</script>";
        } else {
            echo "<script>alert('Email sending failed');</script>";
        }

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?> -->



<?php
// Assuming user details are submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate and sanitize user input (You may need more validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate a verification token (You can use a more secure method for production)
        $verification_token = md5(uniqid(rand(), true));
        
        // Save user data and verification token to your database
        
        // Send verification email
        $to = $email;
        $subject = "Account Verification";
        $message = "Dear $username,\n\n";
        $message .= "Thank you for registering. Please click on the link below to verify your email address:\n\n";
        $message .= "http://yourwebsite.com/verify.php?email=".urlencode($email)."&token=$verification_token\n\n";
        $message .= "Best regards,\nYour Website Team";
        $headers = "From: sumanthsv04@gmail.com\r\n";
        
        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "Verification email sent successfully. Please check your email inbox.";
        } else {
            echo "Failed to send verification email. Please try again later.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>

