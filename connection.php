



<?php 
    $conn = mysqli_connect("localhost","root","ManojRaj@1","component");
    if(!$conn) {
        echo "The database is not connected";
    }
    
    $sql = "SELECT * FROM list"; 
    // $query = mysqli_query($conn , $sql);
    if(isset($_REQUEST['submit'])){
        $rollnumber = $_REQUEST["rollnumber"];
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        // $components =$_REQUEST["components"] . " " . $_REQUEST["count"];
        $components =$_REQUEST["components"];
        $issuedate = $_REQUEST["issuedate"] . "/" . $_REQUEST["issuemonth"] . "/" . $_REQUEST["issueyear"];
        $returndate = $_REQUEST["returndate"];
        $damage = $_REQUEST["damage"];
        $number = $_REQUEST["number"];
        $returnbutton = $_REQUEST["returnbutton"];

        $sql = "INSERT INTO list(rollnumber,name,email,components,issuedate,returndate,damage,number,returnbutton)
         VALUES ('$rollnumber' , '$name' , '$email' , '$components','$issuedate','$returndate' , '$damage' ,'$number', '$returnbutton')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close(); 
      header("Location: ./add.php?info=added");
      exit();   
    
}
   


?>