<?php

session_start();

  include("connection.php");
  include("functions.php");

  $user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Remove HTML Table Selected Row</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            td:last-child{cursor: pointer;}
        </style>

        <meta charset="utf-8">
    <title>View User Information</title>
    <link rel="stylesheet" href="data_manipulation.css">
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
<li><a href="#">Connect</a></li>
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
<br>   


    <div class="content">
      <header class="space"></header>
      <div class="space text"></div> 
        <table id="table" border="1">
        <thead>
            <tr>

                <th>Name</th>
                <th>Course</th>
                <th>College</th>
                <th>Project Title</th>
                <th>Technology Used</th>
                <th>Contact_No</th>

            </tr>
        </thead>
        <tbody>


            <?php
             $query = "

             SELECT * FROM username un,users u,project p , user_post up 
                    where (un.user_ID = u.user_ID and un.user_ID = up.user_ID) and (up.project_ID = p.project_ID) ;


             ";

            // echo $query;
             
            $result = mysqli_query($con, $query);

            while($row = mysqli_fetch_assoc($result)): 

              //  echo $query ;

            ?>
            <tr>
                <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['college']; ?></td>
                <td><?php echo $row['project_title']; ?></td>
                <td><?php echo $row['tech_used']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>

                
            <?php endwhile; ?>

        </tbody>
        </table>

        
    </body>
</html>









