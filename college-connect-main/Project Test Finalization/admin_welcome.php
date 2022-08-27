<?php 
session_start();

  include("connection.php");
  include("admin_functions.php");

  $admin_data = checking_login($con);

  $_SESSION['admin'] = $admin_data['admin_name'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="admin_welcome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = ()=>{
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = ()=>{
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>
  </head>
  
  <body>
    <nav>
      <div class="menu-icon">
<span class="fas fa-bars"></span></div>
<div class="logo">College Connect</div>
<div class="nav-items">
<li><a href="#">Home</a></li>
<li><a href="post_events.php">Post Event</a></li>
<li><a href="data_manipulation.php">User Info</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</div>
<div class="search-icon">
<span class="fas fa-search"></span></div>
<div class="cancel-icon">
<span class="fas fa-times"></span></div>
<form action="#">
        <input type="search" class="search-data" placeholder="Search" required>
        <button type="submit" class="fas fa-search"></button>
      </form>
</nav>

    <div class="content">
      <header class="space">Welcome to COLLEGE CONNECT</header>
      <header class="space">Dear, <?php echo $admin_data['admin_name']; ?></header>

</div>
  </body>
</html>
