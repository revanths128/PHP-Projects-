<?php 
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);

  

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student part</title>
    <link rel="stylesheet" href="user_welcome.css">
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
<!--<div class="logo"><a href="index1.html">College Connect</a></div> -->

<div class="nav-items">
<!--<li><a href="#">Home</a></li>-->
<li><a href="user_share_idea.php">Share</a></li>
<li><a href="user_connect_friend.php">Connect</a></li>
<li><a href="upcomming_events.php">Events</a></li>
<li><a href="explore.php">Explore</a></li>
<li><a href="user_logout.php">Logout</a></li>
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
      <div class="space text">Enroll and Explore</div>
      <div class="space text">Hello, <?php echo $user_data['user_name']; ?></div>
      
</div>

<!--CHAT-BOX DESIGN-->
<!--<h3><button class="logout"><a href="index1.html">LOG-OUT</button></a></h3>  -->
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="#" class="form-container">
    <label for="msg"><b>CHAT</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
  </body>
</html>
