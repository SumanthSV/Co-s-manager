<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $evaluator =$_POST['Evaluator'];
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to check if the user exists
    $sql = "SELECT * FROM $evaluator WHERE Name='$username' AND Password='$password'";

    // Execute SQL query
    $result = mysqli_query($conn, $sql);

    // Check if user exists and login is successful
    if (mysqli_num_rows($result) > 0) {
        // User exists, login successful
       //echo '<div class="success-message">Login successful</div>';
        //header("http://localhost/CSS_E-commerce(html,css)/index.html");
        if($evaluator=="internal_evaluator"){
            header("Location:internal_home.html");
        }
        else{
            header("Location: external_home.html");
        }
    } else {
        // User does not exist or login failed
        echo "<script>alert('Username and password do not match. Please try again.');
            window.location.href='evaluator.html';</script>";
    }
  
    // Close database connection
    mysqli_close($conn);
}
?>
