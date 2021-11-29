<?php
    $conn = mysqli_connect("localhost" , "Bala" , "Bala@2703" , "iot-component");
    if(!$conn){
        echo "Not connected to Database";
    }
    $sql = "SELECT * FROM list";
    // $query = mysqli_query($conn , $sql);

    if(isset($_REQUEST['update'])){
        $rollnumber = $_REQUEST["rollnumber"];
        $name = $_REQUEST["name"];
        $components =$_REQUEST["components"];
        $issuedate = $_REQUEST["issuedate"];
        $returndate = $_REQUEST['returndate'];
        $damage = $_REQUEST["damage"];
        $returnbutton = $_REQUEST["returnbutton"];
        $id = $_REQUEST['id'];

        $sql = "INSERT INTO list(rollnumber,name,components,issuedate,returndate,damage,returnbutton)
         VALUES ('$rollnumber' , '$name' , '$components','$issuedate','$returndate' , '$damage' , '$returnbutton')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close(); 
      header("Location: ./index.php");
      exit();
    }


?>