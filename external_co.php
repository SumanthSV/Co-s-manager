<?php
// Check if the form is submittedsdsadas

// echo"hrlo:";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $co1 = $_POST['co1'];
    $co2 = $_POST['co2'];
    $co3 = $_POST['co3'];
    $co4 = $_POST['co4'];
    $co5 =$_POST['co5'];
    $co6=$_POST['co6']; 
    // $activity = $_POST['activity'];
    // Retrieve other form fields similarly

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO external_assigned_co (co_1,co_2,co_3,co_4,co_5,co_6) 
            VALUES ($co1,$co2,$co3,$co4,$co5,$co6)";


    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert(`{$activity} COs updated successfully`);
        window.location.href='external_cos.html';</script>";
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
