<?php
// Connect to database 
$con = mysqli_connect("localhost", "Bala", "Bala@2703", "iot-component");

$sql = "SELECT * FROM list";
$Sql_query = mysqli_query($con, $sql);
$All_courses = mysqli_fetch_all($Sql_query, MYSQLI_ASSOC);
?>

<?php include "update.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Components Entry</title>
</head>

<body>
    <!-- <h2>LIST</h2> -->

    <form method="GET">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Rollnumber.." title="Type in a name">
        <table border="2" id="myTable">
            <tr class="header">
                <th>s.no</th>
                <th> Roll Number</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Components</th>
                <th>IssueDate</th>
                <th>ReturnDate</th>
                <th>Damage</th>

                <th>Status</th>
            </tr>
            <?php

            foreach ($All_courses as $course) { ?>
                <tr >
                    <td><?php echo $course['id']; ?></td>
                    <td class="roll"><?php echo $course['rollnumber']; ?></td>
                    <td><?php echo $course['name']; ?></td>
                    <td><?php echo $course['number']; ?> </td>
                    <td><?php echo $course['components']; ?> </td>
                    <td><?php echo $course['issuedate']; ?></td>

                    <td><input type="date" value="<?php echo $course['returndate']; ?>" disabled>

                        <a href="edit.php?id=<?php echo $course['id']; ?>">Edit</a>

                    </td>
                    <td><?php
                        if ($course['damage'] == "0")
                            echo
                            "<a class='btn btn-danger' href=damageyes.php?id=" . $course['id'] . " class='btn red'>No</a>";
                        else
                            echo
                            "<a class='btn btn-success' href=damageno.php?id=" . $course['id'] . " class='btn green'>Yes</a>";
                        ?>
                    </td>

                    <td><?php
                        if ($course['returnbutton'] == "0")
                            echo
                            "<a class='btn btn-danger' href=deactivate.php?id=" . $course['id'] . " class='btn red'>Not Returned</a>";
                        else
                            echo
                            "<a class='btn btn-success' href=activate.php?id=" . $course['id'] . " class='btn green'>Returned</a>";
                        ?>
                    </td>

                </tr>
            <?php
            }

            ?>
        </table>
    </form>
    <div>
        <a style="display: flex; float:right; margin-top:10px;margin-right:10px" class="btn btn-primary" href="addcomponent.php">Add</a>
    </div>
</body>

</html>

<style>
    table {
        width: 100%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }

    .submit {
        color: black;
        background-color: lightblue;
        display: flex;
        float: right;
        margin-top: 10px;
        margin-right: 10px;
        padding: 8px 24px;
        border-radius: 10px;
        border: none;
    }
    #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>


<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName('roll')[0];

            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>