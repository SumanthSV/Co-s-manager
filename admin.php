<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $User_name = $_POST['username'];
    $password = $_POST['password'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM admin WHERE Name='$User_name' AND Password='$password'";

    $result = mysqli_query($conn, $sql);

    // Check if user exists and login is successful
    if (mysqli_num_rows($result) > 0) {
        // User exists, login successful
       //echo '<div class="success-message">Login successful</div>';
        //header("http://localhost/CSS_E-commerce(html,css)/index.html");
        header("Location: registration.html");
        exit();
    } else {
        // User does not exist or login failed
        echo "<script>alert('Username and password do not match. Please try again.');
            window.location.href='admin.html';</script>";
        // header("Location: admin.html");
    }
  
    // Close database connection
    mysqli_close($conn);
}
?>