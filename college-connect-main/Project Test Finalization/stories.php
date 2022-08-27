<?php

session_start();

  include("connection.php");
  include("functions.php");

  $user_name = $_SESSION['user_name'];

  $user_query =  "select college from users where user_name = '$user_name' "; 
    $user_res = mysqli_query($con, $user_query);
    $user_res_data =mysqli_fetch_assoc($user_res);
    $user_college = $user_res_data["college"];
    $all = "All Colleges";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student part</title>
    <link rel="stylesheet" href="stories.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
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
<li><a href="user_welcome.php">Home</a></li>
<li><a href="user_share_idea.php">Share</a></li>
<li><a href="user_connect_friend.php">Connect</a></li>
<li><a href="upcomming_events.php">Events</a></li>
<li><a href="explore.php">Explore</a></li>
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
   
<!--form-->


