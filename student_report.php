<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usn = $_POST['usn'];
    $name = $_POST['name'];
    $quiz = $_POST['quiz'];
    $assignment = $_POST['assignment'];
    $test_marks = $_POST['test'];
    $SEE = $_POST['SEE'];
    $co1 = $_POST['co1'];
    $co2 = $_POST['co2'];
    $co3 = $_POST['co3'];
    $co4 = $_POST['co4'];
    $co5 = $_POST['co5'];
    $co6 = $_POST['co6'];


    
    $conn = mysqli_connect('localhost', 'root', '', 'college_database');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $internal=$quiz+$assignment+$test_marks;
    $total = $internal+$SEE;
    $grade = '';

    if ($total >= 91) {
        $grade = "O";
    } elseif ($total >= 81) {
        $grade = "A+";
    } elseif ($total >= 71) {
        $grade = "A";
    } elseif ($total >= 61) {
        $grade = "B+";
    } elseif ($total >= 51) {
        $grade = "B";
    } elseif ($total >= 40) {
        $grade = "C";
    } else {
        $grade = "D";
    }
    
    $sql = "INSERT INTO student_report (USN, Name,Quiz,Test,Assignment,Internals,SEE,Total_marks,Grade,CO_1,CO_2,CO_3,CO_4,CO_5,CO_6) 
    VALUES ('$usn','$name',$quiz,$test_marks,$assignment,$internal,$SEE,$total,'$grade',$co1,$co2,$co3,$co4,$co5,$co6)";


    // Check if user exists and login is successful
    // 
    if (mysqli_query($conn, $sql) == TRUE) {
        // User exists, login successful
       //echo '<div class="success-message">Login successful</div>';
        //header("http://localhost/CSS_E-commerce(html,css)/index.html");
        // header("Location: student_report.html");
        // exit();
        echo "<script>alert('Marks updated successfully.');
        window.location.href='student_report.html';</script>";
    } else {
        // User does not exist or login failed
        // echo "<script>alert('Username and password do not match. Please try again.');
        //     window.location.href='admin.html';</script>";
        // header("Location: admin.html");
        echo  "Failed to add marks.";
    }
  
    // Close database connection
    mysqli_close($conn);
}
?>