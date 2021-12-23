<?php
    session_start();

$databaseHost = 'localhost';   //your db host 
$databaseName = 'iot-component';  //your db name 
$databaseUsername = 'Bala';    //your db username 
$databasePassword = 'Bala@2703'; //   db password 

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


$sql = "SELECT * FROM list";
// $table = "SELECT * FROM list LIMIT 0,10 ";
// $tableStatus = $mysqli->query($table);
$mysqliStatus = $mysqli->query($sql);

//rows count
$rows_count_value = mysqli_num_rows($mysqliStatus);

//All details
$details = mysqli_fetch_all($mysqliStatus, MYSQLI_ASSOC);

$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
     integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>IoT</title>

</head>

<body onload=display_ct();>
    <div class="container">
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
                    <a href="">
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
                    <?php if($_SESSION['name']){?>
                    <a href="./logout.php">
                        <span class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                    <?php } else echo "<a href='./login.php'>
                        <span class='icon'>
                            <i class='fas fa-sign-in-alt'></i>
                        </span>
                        <span class='title'>Login</span>
                    </a>"?>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="Toggle()"><i class="fas fa-bars"></i></div>
                <div class="login-form">
                     <?php if($_SESSION['name']){
                        ?> You've logged in <?php echo  $_SESSION["name"]; ?>
                    <?php }
                    else echo "<h2>You're not logged in</h2>"?>                     
                    </div>
                <div class="search">
                    <label >
                        <input type="text" id="gfg" placeholder="Search Here" title="Type in a name">
                        <i class="fas fa-search"></i>
                    </label>
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
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>LIST</h2>
                        <a class="btn" onclick="ExportToExcel('xlsx')">

                            <i class="fas fa-cloud-download"></i>&nbsp;
                            Download</a>
                        <!-- <a href=""  class="btn">view all</a> -->
                    </div>
                    <form method="GET">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <td>RollNumber</td>
                                    <td>Name</td>
                                    <td>Components</td>
                                    <td>Issued Date</td>
                                    <td>Return Date</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody id="geeks">
                                <?php foreach ($details as $detail) { ?>
                                    <tr>
                                        <td><?php echo $detail['rollnumber']; ?></td>
                                        <td><?php echo $detail['name']; ?></td>
                                        <td><?php echo $detail['components']; ?></td>
                                        <td><?php echo $detail['issuedate']; ?></td>
                                        <td><?php echo $detail['returndate']; ?></td>
                                        <td><?php
                                            if ($detail['returnbutton'] == "0")
                                                echo "<p class='return'>Not Yet</p>";
                                            else
                                                echo "<p class='not-return'>Returned</p>";
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>

    <script>
        function Toggle() {
            let toggle = document.querySelector('.toggle');
            toggle.classList.toggle('active');
            let navigation = document.querySelector('.navigation');
            navigation.classList.toggle('active');
            let main = document.querySelector('.main');
            main.classList.toggle('active');
        }

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('myTable');
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "sheet1"
            });
            return dl ?
                XLSX.write(wb, {
                    bookType: type,
                    bookSST: true,
                    type: 'base64'
                }) :
                XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
        }

        $(document).ready(function() {
            $("#gfg").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#geeks tr").filter(function() {
                    $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                });
            });
        });

        //Time
        function display_c() {
            var refresh = 1000;
            mytime = setTimeout('display_ct()', refresh)
        }

        function display_ct() {
            var today = new Date()
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            document.getElementById('ct').innerHTML = time;
            display_c();
        }
    </script>
</body>
</html>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
        /* font-family: poppins,sans-serif; */
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
    }

    .btn {
        position: relative;
        background: #03a9f4;
        padding: 10px 10px;
        color: #fff;
        text-decoration: none;
        border-radius: 15px;
        cursor: pointer;
    }

    .details table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .details table thead td {
        font-weight: 600;
    }

    .details .recentOrders table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .recentOrders table tbody tr:last-child {
        border-bottom: none;
    }

    .details .recentOrders table tbody tr:hover {
        background: #03a9f4;
        color: #fff;
    }

    .details .recentOrders table tr td {
        padding: 9px 5px;
    }

    .details .recentOrders table thead tr td:last-child,
    .details .recentOrders table tbody tr td:last-child {
        text-align: right;
    }

    .details .recentOrders table thead tr td:nth-child(2),
    .details .recentOrders table tbody tr td:nth-child(2) {

        text-align: left;
        padding-right: 20px;
    }

    .details .recentOrders table thead tr td:nth-child(3),
    .details .recentOrders table tbody tr td:nth-child(3) {

        text-align: center;

    }

    .details .recentOrders table thead tr td:nth-child(4),
    .details .recentOrders table tbody tr td:nth-child(4) {

        text-align: center;
    }


    /* Responsive */
    @media (max-width:992px) {
        .navigation {
            left: -250px;
        }

        .navigation.active {
            left: 0px;
            width: 250px;
        }

        .main {
            width: 100%;
            left: 0;
        }

        /* .main.active{
            width: calc(100% - 60%);
            left: 60px;
        } */
        /* .cardBox{
            grid-template-columns: repeat(2,1fr);
            grid-gap: 20px;
        } */
    }

    @media (max-width:758px) {
        .details {
            grid-template-columns: repeat(1, 1fr);
        }

        .cardHeader {
            font-weight: 600;
            font-size: 18px;
        }
    }

    @media (max-width:480px) {
        .cardBox {
            grid-template-columns: repeat(1, 1fr);
        }

        .details .recentOrders {
            overflow-x: auto;
        }

        .details .recentOrders table {
            width: 600px;
        }

        .navigation {
            width: 100%;
            left: -100%;
            z-index: 1000;
        }

        .navigation.active {
            width: 100%;
            left: 0;
        }

        .toggle {
            z-index: 10000;
        }

        .toggle::before {
            color: #fff;
        }
    }
</style>




<script>

</script>