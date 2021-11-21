



<?php 
    $conn = mysqli_connect("localhost" , "Bala" , "Bala@2703" , "iot-component");
    if(!$conn) {
        echo "The database is not connected";
    }
    
    $sql = "SELECT * FROM list"; 
    // $query = mysqli_query($conn , $sql);
    if(isset($_REQUEST['submit'])){
        $rollnumber = $_REQUEST["rollnumber"];
        $name = $_REQUEST["name"];
        $components =$_REQUEST["components"] . " " . $_REQUEST["count"];
        $issuedate = $_REQUEST["issuedate"];
        $returndate = $_REQUEST["returndate"];
        $damage = $_REQUEST["damage"];
        $number = $_REQUEST["number"];
        $returnbutton = $_REQUEST["returnbutton"];

        $sql = "INSERT INTO list(rollnumber,name,components,issuedate,returndate,damage,number,returnbutton)
         VALUES ('$rollnumber' , '$name' , '$components','$issuedate','$returndate' , '$damage' ,'$number', '$returnbutton')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close(); 
      header("Location: ./addcomponent.php?info=added");
      exit();   
    
}
   


?>