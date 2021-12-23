<?php 
            $conn = mysqli_connect("localhost" , "Bala" , "Bala@2703" , "iot-component");

            if(!$conn)
            {
                echo ("Database was not connected");
            }
    $sql = "SELECT * FROM new ";

    $query = mysqli_query($conn , $sql);

    if(isset($_REQUEST["register"]))
    {
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $admin = $_REQUEST["admin"];

        $sql = "INSERT INTO new(name,email,password,admin)
                VALUES ('$name' , '$email' , '$password' , '$admin')";

        mysqli_query($conn , $sql);
        header("Location: ./signup.php?info=added");
        die;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>IoT</title>
</head>
<body>

<div class="container">
<?php
        if(isset($_REQUEST['info'])){?>
        
        <?php 
            if($_REQUEST['info'] == "added"){?>

            <div class="alert alert-success" role="alert">
                Registerd successfull
            </div>

       <?php }?>
        <?php }?>

    <div class="title">Registration</div>
    <div class="content">
      <form method="GET">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input name="name" type="text" placeholder="Enter Name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input name="email" type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input name="password" type="password" placeholder="Enter your password" required>
            <input type="text" value="0" name="admin" hidden>
          </div>
        
        </div>

        <div class="button">
          <input class="box" name="register"  type="submit" value="Register">
        </div>
        <div class="haveanacc">Already have an accout? <a href="login.php">LogIn</a></div>
      </form>
    </div>
  </div>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(to right, pink, lightblue);

}
.container{
  max-width: 420px;
  width: 100%;
  background-color: rgba(0,0,0,0.01);
  padding: 25px 50px;
  border-radius: 5px;
  border-right: 1px solid #fff;
  border-bottom: 1px solid #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,0.5);
  
}
.container .title{
  font-size: 2rem;
  font-weight: 600;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 2px;
  width: 90px;
  border-radius: 5px;
  background: black;
}
.content form .user-details{
    width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
  flex-direction: column;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: 100%;
  /* width: calc(100% / 2 - 20px); */
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 50px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }

 form .button{
   height: 45px;
   margin: 35px 0;
    margin-top: -5px;
    justify-content: center;
    align-items: center;
    text-align: center;
}

  .haveanacc{
      font-size: 1rem;
      float: right;
      margin-top: -20px;
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

.box {
	background: linear-gradient(to right, gold, darkorange);
	color: white;
	--width: 150px;
	--height: calc(var(--width) / 3);
	width: var(--width);
	height: var(--height);
	text-align: center;
	line-height: var(--height);
	font-size: calc(var(--height) / 2.5);
	font-family: Poppins,sans-serif;
	letter-spacing: 0.1em;
	border: 1px solid darkgoldenrod;
	border-radius: 2em;
	transform: perspective(500px) rotateY(-15deg);
	text-shadow: 6px 3px 2px rgba(0, 0, 0, 0.2);
	box-shadow: 2px 0 0 5px rgba(0, 0, 0, 0.2);
	transition: 0.5s;
	position: relative;
	overflow: hidden;
}

.box:hover {
	transform: perspective(500px) rotateY(15deg);
	text-shadow: -6px 3px 2px rgba(0, 0, 0, 0.2);
	box-shadow: -2px 0 0 5px rgba(0, 0, 0, 0.2);
}

.box::before {
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	background: linear-gradient(to right, transparent, white, transparent);
	left: -100%;
	transition: 0.5s;
}

.box:hover::before {
	left: 100%;
}

</style>