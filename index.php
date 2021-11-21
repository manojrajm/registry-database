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
         top:20px;
         left:20px;
         bottom: 20px;
         width: 17%;
         border-radius: 10px;
         border-left: 5px solid #4d5bf9;
         background: #4d5bf9;
         box-sizing: initial;
         transition: width 0.5s;
    }
    .navigation ul{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding-left: 5px;
        padding-top: 40px;
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
        line-height: 60px;
        text-align: center;
    }
    .navigation ul li a .icon ion-icon{
        font-size: 1.5em;
    }
    .navigation ul li a .title{
        position: relative;
        display: block;
        padding-left:10px;
        height: 50px;
        line-height: 50px;
        white-space: normal;
    }
</style>

<script>
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