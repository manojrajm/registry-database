<?php

$databaseHost = 'localhost';   //your db host 
$databaseName = 'iot-component';  //your db name 
$databaseUsername = 'Bala';    //your db username 
$databasePassword = 'Bala@2703';//   db password 

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
 
$sql = "SELECT * FROM list";
 
$mysqliStatus = $mysqli->query($sql);
 
$rows_count_value = mysqli_num_rows($mysqliStatus);

// echo "Total no.of entries : <br>".$rows_count_value;

 
$mysqli->close();	

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Components Entry</title>
</head>

<body>
    <!-- <div class="jumbotron" style="text-align: center; background-color:lightcyan">
        <h1 class="display-4">IoT LAB</h1>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="list.php" role="button">DETAILS</a>
        </p>
    </div> -->

    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="#">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                    <ion-icon name="list-circle-outline"></ion-icon>
                    </span>
                    <span class="title">List</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Add Component</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="title">Login</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- <div class="toggle">
    <ion-icon name="menu-outline" class="open"></ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div> -->

    <div class="entries" >
    <?php echo $rows_count_value?>
</div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        min-height:100vh;
        background: #fff;
    }
    .navigation{
         position:fixed;
         top:5px;
         left:5px;
         bottom: 5px;
         width: 50px;
         padding: 10px;
         border-radius: 10px;
         border-left: 5px solid #4d5bf9;
         background: #4d5bf9;
         box-sizing: initial;
         transition: width 0.5s;
         overflow-x: hidden;
    }
    .navigation:hover{
        width: 250px;
    }
    .navigation ul{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding-left: 5px;
        padding-top: 50px;
    }
    .navigation ul li{
        position: relative;
        list-style: none;
        width: 100%;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }
    .navigation ul li.active{
        background: #fff;
    }
    .navigation ul li a {
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: #fff;
    }
    .navigation ul li.active a {
        color: #333;
    }
    .navigation ul li a .icon {
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 75px;
        text-align: center;
    }
    .navigation ul li a .icon ion-icon{
        font-size: 1.5em;
    }
    .navigation ul li a .title{
        position: relative;
        display: block;
        padding-left:10px;
        height: 60px;
        line-height: 65px;
        white-space: normal;
    }
    .toggle{
        position: fixed;
        top: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: #4d5bf9;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .toggle.active{
        background: #ff4d89;
    }
    .toggle ion-icon{
        position: absolute;
        color: #fff;
        font-size: 34px;
        display: none;
    }
    .toggle ion-icon.open,
    .toggle.active ion-icon.close{
        display: block;
    }
    .toggle ion-icon.close,
    .toggle.active ion-icon.open{
        display: none;
    }
    .entries{
        position: fixed;
        top: 20px;
        left: 30%;
        width: 10%;
        height: 10%;
        box-shadow: 0 8px 10px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        color: black;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .entries:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);

    }
</style>

<script>

    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation')
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active');
        navigation.classList.toggle('active')
    }

    let list = document.querySelectorAll('.list');
    for(let i=0; i<list.length; i++){
        list[i].onclick = function(){
            let j = 0;
            while (j < list.length){
                list[j++].className = 'list';
            }
            list[i].className = 'list active'
        }
    }
</script>