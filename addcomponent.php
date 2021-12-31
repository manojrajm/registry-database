<?php
session_start();
include "connection.php";
$mydate = getdate(date("U"));
$date = '' . $mydate['mday'] . '' . $mydate['month'] . '' . $mydate['year'] . '';

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
     integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>
        IoT
    </title>
</head>

<body onload=display_ct();>

    <!-- <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"></span>
                        <span class="title">
                            <h2>IoT</h2>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="./index.php">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="./list.php">
                        <span class="icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="title">List</span>
                    </a>
                </li>
                <li>
                    <a href="./addcomponent.php">
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="title">Add Component</span>
                    </a>
                </li>
                <li>
                    <?php if ($_SESSION['name']) { ?>
                        <a href="./logout.php">
                            <span class="icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                    <?php } else echo "<a href='./signin.php'>
                        <span class='icon'>
                            <i class='fas fa-sign-in-alt'></i>
                        </span>
                        <span class='title'>Login</span>
                    </a>" ?>
                </li>
            </ul>
        </div>


        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="Toggle()"><i class="fas fa-bars"></i></div>
                <div class="login-form">
                    <?php if ($_SESSION['name']) {
                    ?> You've logged in <?php echo  $_SESSION["name"]; ?>
                    <?php } else echo "<h2>You've not logged in</h2>" ?>
                </div>

                <div class="search">
                    <label>
                        <input type="text" id="gfg" placeholder="Search Here" title="Type in a name">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
            </div>
        </div>




        <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $rows_count_value ?></div>
                        <div class="cardName">Totol no.of Entries</div>
                    </div>
                    <div class="iconBox">
                        <i class="fas fa-dungeon"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <span id="ct" class="numbers"></span>
                        <div class="cardName">Time</div>
                    </div>
                    <div class="iconBox">
                        <i class="far fa-clock"></i>
                    </div>
                </div>
            </div> -->




        <div>
        <?php
        if (isset($_REQUEST['info'])) { ?>

            <?php
            if ($_REQUEST['info'] == "added") { ?>

                <div class="container" style="background-color: #90EE90;width:100%" role="alert">
                    Registerd successfull
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <div style="display: flex; flex-direction:row;justify-content:space-between">
        <a href="add.php" style="text-decoration: none;">
            <h2>Add Component</h2>
        </a>
        <div style="display: flex;">
            <a href="list.php" style="text-decoration: none;

    ">
                <h2> LIST</h2>
            </a>
        </div>
    </div>
    <div class="container">
        <form method="GET">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Roll Number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="rollnumber" placeholder="Enter Roll Number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="name" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Component</label>
                </div>
                <div class="col-75" style="justify-content: row;">
                    <input type="text" id="lname" name="components" placeholder="Enter component" required>
                </div>
            </div>
            <div  class="row">
                <div class="col-25">
                    <label for="lname">Number</label>
                </div>
                <div class="col-75">
                    <input type="number"  id="lname" name="number" placeholder="Enter Number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Issue Date</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="issuedate" value="
                    <?php
                    echo date('d/m/Y', strtotime($date));
                    ?>">
                    <input type="text" name="returnbutton" value="0" hidden>
                    <input type="text" name="damage" value="0" hidden>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Add" name="submit">

            </div>

        </form>
    </div>


</body>

</html>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }



        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
            font-weight: 550;
        }

        body {
            overflow-x: hidden;
        }

        .container {
            position: relative;
            width: 100%;
        }

        .navigation {
            position: fixed;
            width: 250px;
            height: 100%;
            background: #003147;
            transition: 0.5s;
            overflow: hidden;
        }

        .navigation.active {
            width: 60px;
        }

        .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
        }

        .navigation ul li:hover {
            background: #03a9f4;
        
        }

        .navigation ul li:nth-child(1) {
            margin-bottom: 10px;
        }

        .navigation ul li:nth-child(1):hover {
            background: transparent;
        }

        .navigation ul li a {
            position: relative;
            display: flex;
            width: 100%;
            text-decoration: none;
            color: #fff;
        }

        .navigation ul li a .icon {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
        }

        .navigation ul li a .icon .fas {
            color: #fff;
            font-size: 24px;
        }

        .navigation ul li a .title {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            white-space: nowrap;
        }



        .main {
        position: absolute;
        width: calc(100% - 250px);
        left: 250px;
        min-height: 100vh;
        background: #f5f5f5;
        transition: 0.5s;
    }

    .main.active {
        width: calc(100% - 60px);
        left: 60px;
    }

    .main .topbar {
        width: 100%;
        background: #fff;
        height: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }

    .toggle {
        position: relative;
        width: 60px;
        height: 60px;
        cursor: pointer;
    }

    .toggle::before {
        content: '\f0c9';
        position: absolute;
        font-family: FontAwesome;
        width: 100%;
        height: 100%;
        line-height: 60px;
        font-size: 24px;
    }

    .toggle .fas {
        font-size: 24px;
        line-height: 60px;
        position: absolute;
        width: 100%;
        height: 100%;
        text-align: center;
        color: #111;
    }

    .search {
        position: relative;
        width: 400px;
        margin: 0 10px;
    }

    .search label {
        position: relative;
        width: 100%;
    }

    .search label input {
        position: relative;
        width: 100%;
        height: 40px;
        border-radius: 40px;
        padding: 5px 20px;
        outline: none;
        border: 1px solid rgba(0, 0, 0, 0.2);
        padding-left: 40px;
        ;
    }

    .search label .fas {
        position: absolute;
        top: 2px;
        left: 15px;
    }





    .cardBox {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }

    .cardBox .card {
        position: relative;
        background: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
    }

    .cardBox .card .numbers {
        position: relative;
        font-size: 2em;
        font-weight: 500;
    }

    .cardBox .card .cardName {
        color: #999;
    }

    .cardBox .card .iconBox {
        font-size: 2.5em;
        color: #03a9f4;
    }

    .details {
        position: relative;
        width: 100%;
        padding: 20px;
        padding-top: 0px;
        display: grid;
        grid-template-columns: 2fr, 1fr;
    }

    .details .recentOrders {
        position: relative;
        display: grid;
        min-height: 130px;
        background: #fff;
        padding: 20px;
    }

    .cardHeader {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .cardHeader h2 {
        font-weight: 600;
    } */


    </style>