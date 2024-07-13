<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $evaluator =$_POST['Evaluator'];
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to check if the user exists
    $sql = "SELECT USN,Name,Branch FROM student";

    // Execute SQL query
    $result = mysqli_query($conn, $sql);
    
    // Check if user exists and login is successful
    if (mysqli_num_rows($result) > 0) {
        // Start table and center it
        echo "<div style='text-align:center;background-color:gray;'>";
        echo "<h2 style='color:white;'>Student Information</h2>";
        echo "<table border='1' style='margin:auto;'>";
        echo "<tr><th style='padding:15px;background-color:lightgray;'>USN</th><th style='padding:15px;background-color:lightgray;'>Name</th><th style='padding:15px;background-color:lightgray;'>Branch</th></tr>";
        
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td style='padding:15px;background-color:lightgray;'>".$row['USN']."</td>";
            echo "<td style='padding:15px;background-color:lightgray;'>".$row['Name']."</td>";
            echo "<td style='padding:15px;background-color:lightgray;'>".$row['Branch']."</td>";
            echo "</tr>";
        }
        
        // Close table and center div
        echo "</table>";
        echo "</div>";
    } else {
        // User does not exist or login failed
        echo "<script>alert('Username and password do not match. Please try again.');
            window.location.href='evaluator.html';</script>";
    }
  
    // Close database connection
    mysqli_close($conn);
}
?>
