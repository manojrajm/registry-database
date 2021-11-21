<?php

$conn = mysqli_connect("localhost" , "Bala" , "Bala@2703" , "iot-component");
if(!$conn) {
    echo "The database is not connected";
}
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from list where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $returndate = $_POST['returndate'];
    $damage = $_POST['damage'];
	
    $edit = mysqli_query($conn,"update list set returndate='$returndate', damage='$damage' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }    	
}
?>



<h3>Update return date</h3>

<!-- <form method="POST">
    <input disabled type="text" value="<?php echo $data['rollnumber']?>">
    <input disabled type="text" value="<?php echo $data['name']?>">
    <input disabled type="text" value="<?php echo $data['components']?>">

    <input disabled type="text" value="<?php echo $data['issuedate']?>">
    <input type="date" name="returndate" value="<?php echo $data['returndate'] ?>"  Required>
  <input type="text" name="damage" value="<?php echo $data['damage'] ?>"  Required>
  <input type="submit" name="update" value="Update">
</form> -->



<div class="container">
        <form method="POST">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Roll Number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="rollnumber" value="<?php echo $data['rollnumber']?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="name" value="<?php echo $data['name']?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Number</label>
                </div>
                <div class="col-75">
                <input type="text" name="damage" value="<?php echo $data['number'] ?>" disabled>
            </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Component</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="components" value="<?php echo $data['components']?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Issue Date</label>
                </div>
                <div class="col-75">
                    <input type="date" id="lname" name="issuedate" value="<?php echo $data['issuedate']?>" disabled> 
                    <input type="text" name="returnbutton" value="0" hidden>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Return Date</label>
                </div>
                <div class="col-75">
                    <input type="date" id="lname" name="returndate" value="<?php echo $data['returndate'] ?>" required>
                </div>
            </div>


            <div class="row" hidden>
                <div class="col-25">
                    <label for="lname">Damage</label>
                </div>
                <div class="col-75">
                <input type="text" name="damage" value="<?php echo $data['damage'] ?>" Required>
            </div>
            </div>




            <br>
            <div class="row">
                <input type="submit" name="update" value="Update">
            </div>

        </form>
    </div>


    <style>
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

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>