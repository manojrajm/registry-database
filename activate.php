<?php
  

    $con=mysqli_connect("localhost","Bala","Bala@2703","iot-component");
  

    if (isset($_GET['id'])){

        $course_id=$_GET['id'];

        $sql="UPDATE list SET 
             returnbutton=0 WHERE id='$course_id'";

        mysqli_query($con,$sql);
    }
  
 
    header('location: list.php');
