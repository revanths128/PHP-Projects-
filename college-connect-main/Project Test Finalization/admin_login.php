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
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Admin Login Form</title>
 <link rel="stylesheet" href="admin_login.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>

 <div class="center">
 <div class="header">Login Form</div>

<form method="POST" >

  <input type="text" name="admin_name" placeholder="Email or Username" required  >

  <i class="far fa-envelope"></i>

  <input id="pswrd" name="admin_password" type="password" placeholder="Password" required >

  <i class="fas fa-lock" onclick="show()"></i>

  <input type="submit" name = "Submit" value="Sign in">

  <a href="#">Forgot Password?</a>
  <a href="index.php" >Home</a>
 </form>

</div>

<script>
  function show(){
   var pswrd = document.getElementById('pswrd');
   var icon = document.querySelector('.fas');
   if (pswrd.type === "password") {
    pswrd.type = "text";
    pswrd.style.marginTop = "20px";
    icon.style.color = "#7f2092";
   }else{
    pswrd.type = "password";
    icon.style.color = "grey";
   }
  }
 </script>
 
</body>
</html>
