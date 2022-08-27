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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="upcomming_events.css">
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
<li><a href="#">Events</a></li>
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

<div class="form">
  <h2>UPCOMING EVENTS</h2>
  <p>Its the place were you can find the events and meeting held at various venues and dates. It will help the Students to well prepared for events by making themselves free from their hectic schedule</p>
</div>

<div class="events">
               <section class="section-features">
                
                <div class="row">

      <?php
            $query = "SELECT * FROM events; "; 
            $result = mysqli_query($con, $query);

            $mydate=getdate(date("U"));
            $date= "$mydate[year]-$mydate[mon]-$mydate[mday]";
            //echo $date."<br>";
            //echo $row['event_date']."<br>";

            $dtA = new DateTime("$date");
            //$dtB = new DateTime($row['event_date']);
            //echo $dtA < $dtB ? "A is equal or earlier" : "A is later" ;

           
            while($row = mysqli_fetch_assoc($result) ):  
              if($dtA <($dtB = new DateTime($row['event_date']))):
                if(($row['event_colleges'] == $user_college )|| ($row['event_colleges']) == $all ):

      ?>


                    <div class="col-1-of-2">
                        <div class="feature-box">
                            <h6 class="heading-tertiary u-margin-bottom-small"><?php echo $row['event_name'] ?></h6>
                            <p class="feature-box__text">
                                <td><?php echo "The Event "."<b>".$row['event_name']."</b>"." will be held on " ?></td>
                                <td><?php echo "<b>".$row['event_date']."</b>"." at "; ?></td>
                                <td><?php echo "<b>".$row['event_time']."</b>"." and the Venue of the event is ";?></td>
                                <td><?php echo "<b>".$row['event_venue']." Campus"."</b>". " All the participants are Invited !! "; ?></td>
                                <br>
                                <td><?php echo $row['event_desc']; ?></td>
                                <td> . If their are any Quies kindly write to us </td>

                            </p>
                        </div>
                    </div>

              <?php endif; endif;  endwhile;   ?>

                </div>
            </section>
        </div>

</body>
</html>
