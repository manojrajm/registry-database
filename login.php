<?php 
        $conn = mysqli_connect("localhost","root","ManojRaj@1","component");

        if(!$conn)
        {
            echo ("Database was not connected");
        }

    $email = $password = '';
    $email = $_POST['email'];
    $admin = $_POST['admin'];
    $password = $_POST['password'];

    $sql = "SELECT id, email , password , admin FROM new WHERE email = '".$email."' AND  password = '".$password."'";

    $result = mysqli_query($conn , $sql);

    if(isset($_REQUEST['login'])){
    if($result)
    {
      $user_data = mysqli_fetch_assoc($result);

        if($user_data['password'] === $password)
        {
          $sqll = "SELECT id FROM new where email = '$email'";
          $resultt = mysqli_query($conn, $sqll);
          while ($row = mysqli_fetch_array($resultt)) {
            if($user_data['admin'] === 'admin' )
            {

                header("Location: ./edit.php?id=" .$row['id']);
                die;
            }
            else{
                header("Location: ./index.php?id=" .$row['id']);
                die;
            }
          }

        }

        else{
          echo "Invaild email or password";
        }

      }

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
    <div class="title">LogIn</div>
    <div class="content">
      <form method="POST"  action="loginProcess.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input name="email" id="email" type="text" placeholder="Enter your email" required>
          </div>
      
          <div class="input-box">
            <span class="details">Password</span>
            <input name="password" id="pwd" type="password" placeholder="Enter your password" required>
          </div>
        
        </div>
        <div class="button">
          <input class="box" name="login" type="submit" value="Login">
        </div>
        <div class="register">Don't have an account? <a href="signup.php">Register</a></div>
      </form>
    </div>
  </div>
</body>
</html>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

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
  /* background: linear-gradient(to bottom,pink,lightyellow); */

}
.container{
  max-width: 420px;
  width: 100%;
  background-color:rgba(0,0,0,0.02);
  opacity: 0.8;
  padding: 25px 50px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.5 );
  border-right: 0.05px solid white;
  border-bottom: 1px solid white;
}
.container .title{
  font-size: 1.8rem;
  font-weight: 700;
  position: relative;
  font-family: Poppins,sans-serif;
  margin: 20px 0 12px 0;
  margin-top: 20px;

}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 2px;
  width: 35px;
  border-radius: 5px;
  background: black;
}
.content form .user-details{
    width: 100%;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 10px;
  /* width: calc(100% / 2); */
  width: 100%;
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  float: left;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  border-radius: 20px;

}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}

 form .button{
   height: 45px;
   margin: 35px 0;
   justify-content: center;
    align-items: center;
    text-align: center;
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
.loginbutton{
    cursor: pointer;
    background: rgba(0,0,0,0.15);
    transition: .5s;
    font-size: 24px;
    border-radius: 5px;
    font-family: "Poppins";
    height: 100%;
   width: 50%;
   border:2px solid black;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;

}

    .loginbutton:hover{
        border: none;
      color: white;
      font-size: 28px;
      transform:scale(1.1);
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
.register{
    float: right;
    font-size: 1rem;
}
</style>
