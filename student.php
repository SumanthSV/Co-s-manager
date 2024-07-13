<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST['name'];
        $USN=$_POST['usn'];
        $branch= $_POST['branch'];
        $year =  $_POST['year'];

        $conn = mysqli_connect('localhost','root','','college_database');

        if(!$conn){
            die("Connection failed : ".mysqli_connect_error());
        }

        $sql="Insert into student(USN,Name,Branch,Year) values('$USN','$name', '$branch', '$year')";

        if(mysqli_query($conn,$sql)){
           echo  "<script>alert('Student record updated successfully');
            window.location.href='student.html';</script>";
        }
        else{
            echo "<script>alert('Unable to Upload student record')
            window.location.href='student.html';</script>";
        }
    }
?>