<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect("localhost","root","ManojRaj@1","component") or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM new WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["admin"] = $row['admin'];

        } else {
            // $message = "Invalid Username or Password!";
            echo "Invalid Username or password";
            echo "<h3> <a href='signin.php'>Back to Login<a/></h3>";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>