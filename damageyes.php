<?php
  

    $con=mysqli_connect("localhost","root","ManojRaj@1","component");
  
    if (isset($_GET['id'])){
  

        $course_id=$_GET['id'];
 
        $sql="UPDATE list SET 
            damage!=0 WHERE id='$course_id'";

        mysqli_query($con,$sql);
    }
  

    header('location: list.php');
?>
