<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $USN = $_POST['USN'];
    $CO1 = $_POST['CO1'];
    $CO2 = $_POST['CO2'];
    $CO3 = $_POST['CO3'];
    $CO4 = $_POST['CO4'];
    $CO5 = $_POST['CO5'];
    $CO6 = $_POST['CO6'];
    // $table = $_POST['table'];

    $conn = mysqli_connect("localhost",'root','','college_database');

    if(!$conn){
        die("Connection failed :".mysqli_connect_error());
    }
    $total=$CO1+$CO2+$CO3+$CO4+$CO5+$CO6;
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
    $sql = "insert into external_table (USN,co_1,co_2,co_3,co_4,co_5,co_6,tot_co,grade)
        values('$USN',$CO1,$CO2,$CO3,$CO4,$CO5,$CO6,$total,'$grade')";

    if(mysqli_query($conn,$sql)){

        echo "<script>alert('External marks updated successfully');
        window.location.href='external_marks.html';</script>";
    }
    else{
        echo "<script>alert('Unable to Upload Quiz Marks')
        window.location.href='external_marks.html';</script>";
    }

}
?>