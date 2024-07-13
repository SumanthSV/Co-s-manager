<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $USN = $_POST['USN'];
    $CO1 = $_POST['CO1'];
    $CO2 = $_POST['CO2'];
    $CO3 = $_POST['CO3'];
    $CO4 = $_POST['CO4'];
    $CO5 = $_POST['CO5'];
    $CO6 = $_POST['CO6'];
    $table = $_POST['table'];

    $conn = mysqli_connect("localhost",'root','','college_database');

    if(!$conn){
        die("Connection failed :".mysqli_connect_error());
    }
    $total=$CO1+$CO2+$CO3+$CO4+$CO5+$CO6;
    $sql = "insert into $table (USN,co_1,co_2,co_3,co_4,co_5,co_6,total)
        values('$USN',$CO1,$CO2,$CO3,$CO4,$CO5,$CO6,$total)";

    if(mysqli_query($conn,$sql)){
        $message = '';

        if ($table === "quiz_table") {
            $message = "Quiz";
        } elseif ($table === "assignment_table") {
            $message = "Assignment";
        } elseif ($table === "test_table") {
            $message = "Test";
        }

        echo "<script>alert('" . $message . " marks updated successfully');
        window.location.href='upload_marks.html';</script>";
    }
    else{
        echo "<script>alert(`Unable to Upload {$marks} Marks`)
        window.location.href='upload_marks.html';</script>";
    }

}
?>