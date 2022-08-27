<?php 

session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

      //read from database

      $query = "select * from users where user_name = '$user_name' limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['user_password'] === $password)
          {

            $_SESSION['user_name'] = $user_data['user_name'];

            header("Location: user_welcome.php");

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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title> 
    <link rel="stylesheet" href="userlogin.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">
Login Form</div>

<form method="POST" >
        <div class="field">
          <input type="text" name="user_name" placeholder="User_name">
          <label>User Name</label>
        </div>
<div class="field">
          <input type="password" name="password" placeholder="password">
          <label>Password</label>
        </div>
<div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link"><a href="#">Forgot password?</a></div>
</div>

<div class="field"><input type="submit" value="Login"></div>

<div class="signup-link">Not a member? <a href="user_regester.php">Signup now</a></div>

<div class="home">else get back to <a href="index.php">Home</a></div>

</form>
</div>
</body>
</html>
