<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'college_database');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Array of SQL queries
$sql_queries = array(
    "TotalStudentsWithGradeA" => "SELECT COUNT(*) AS TotalStudentsWithGradeA FROM student_report WHERE Grade = 'A'",
    "TotalStudentsWithGradeO" => "SELECT COUNT(*) AS TotalStudentsWithGradeO FROM student_report WHERE Grade = 'O'",
    "TotalStudentsWithGradeAplus" => "SELECT COUNT(*) AS TotalStudentsWithGradeAplus FROM student_report WHERE Grade = 'A+'",
    "TotalStudentsWithGradeB" => "SELECT COUNT(*) AS TotalStudentsWithGradeB FROM student_report WHERE Grade = 'B'",
    "TotalStudentsWithGradeBplus" => "SELECT COUNT(*) AS TotalStudentsWithGradeBplus FROM student_report WHERE Grade = 'B+'",
    "TotalStudentsWithGradeD" => "SELECT COUNT(*) AS TotalStudentsWithGradeD FROM student_report WHERE Grade = 'D'",
    "TotalStudentsWithGradeC" => "SELECT COUNT(*) AS TotalStudentsWithGradeC FROM student_report WHERE Grade = 'C'"
);

// Initialize an array to store results
$grade_counts = array();

// Execute SQL queries and store results
foreach ($sql_queries as $key => $sql_query) {
    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $grade_counts[$key] = $row[$key];
    } else {
        // Error in executing SQL query
        $grade_counts[$key] = "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);

// Return the JSON representation of the array
echo json_encode($grade_counts);
?>
