<?php 

session_start();

  include("connection.php");
  include("admin_functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted

    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    if(!empty($admin_name) && !empty($admin_password) && !is_numeric($admin_name))
    {

      //read from database

      $query = "select * from admin where admin_name = '$admin_name' limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $admin_data = mysqli_fetch_assoc($result);
          
          if($admin_data['admin_password'] === $admin_password)
          {

            $_SESSION['admin_name'] = $admin_data['admin_name'];

            header("Location: admin_welcome.php");

            die;
          }
        }
      }
      
      echo "wrong username or password!";
    }else
    {
      echo "wrong username or password!";
    }
  }

?>





<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="test_admin_login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js">
 </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/bg.svg">
    </div>
    <div class="login-content">


      <form method="POST" ">
        <img src="img/avatar.svg">
        <h2 class="title">Welcome</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h4>Username</h4>
                    <input type="text" name = "admin_name" class="input">
                 </div>
              </div>

              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h4>Password</h4>
                    <input type="password" name ="admin_password"  class="input">
                 </div>
              </div>

              <input type="submit" class="btn" name = "Submit" value="Login">

              <h5>
              <a href="index.php" >Home</a>
              <a href="#">Forgot Password?</a>
            </h5>
            
            </form>


        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>



