<?php 

  session_start();

  include("connection.php");
  include("admin_functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST"){


    if (isset($_POST['Submit'])) {


      //something was posted
      $event_id = random_num(10);
      $event_name = $_POST['event_name'];
      $venue = $_POST['venue'];
      $subject = $_POST['subject'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      //$event_image = "logo1.png";
      $send_to = $_POST['send_to'];
      $admin_name = $_SESSION['admin'];

     
    if (!empty($admin_name)) {

     //save to database
    $query = "

    insert into events (event_ID, event_name, event_venue, event_desc, event_date,event_time,event_colleges) 
      values('$event_id','$event_name','$venue', '$subject', '$date','$time','$send_to' );

    insert into admin_post (admin_name, event_ID) 
      values('$admin_name','$event_id');

      ";

    $res= mysqli_multi_query($con, $query); 

   // echo $query ;
   // header("Location: userlogin.php");
   // die;

        if($res) {
            echo "A Requested has been Submitted Successfully .";
          } else {
            printf ("Could not Submitted your form: %s\n", mysqli_error($con));
          }

}

    }

   else
    {
      echo "Please enter some valid information!";
    }

    
  }
  
?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Post Event Details</title>
    <link rel="stylesheet" href="post_events.css">
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
<li><a href="admin_welcome.php">Home</a></li>
<li><a href="#">Post Event</a></li>
<li><a href="data_manipulation.php">User Info</a></li>
<li><a href="index.php">Logout</a></li>
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


<!--form -->
   <div class="form">
  <h2>POST AN EVENT</h2>

</div>
<div class="container">
  
  <form method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname">Event Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="event_name" placeholder="Enter the Event Name.." required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="ptitle">Venue</label>
      </div>
      <div class="col-75">
        <input type="text" id="ptitle" name="venue" placeholder="Enter the Venue name.." required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="date">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="date" name="date" required>
      </div>
    </div>

    
     <div class="row">
      <div class="col-25">
        <label for="time">Time</label>
      </div>
      <div class="col-75">
        <input type="time" id="time" name="time" required>
      </div>
    </div>


   
    <div class="row">
      <div class="col-25">
        <label for="course">Send To</label>
      </div>
      <div class="col-75">
        <select id="send_to" name="send_to">
          <option value="BMSCE">BMSCE</option>
          <option value="RVCE">RVCE</option>
          <option value="PESIT">PESIT</option>
          <option value="MSRIT">MSRIT</option>
          <option value="BIT">BIT</option>
          <option value="All Colleges">ALL STUDENTS</option>
        </select>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write Description in brief.." style="height:200px" required></textarea>
      </div>
    </div>
    

    <div class="row">
      <input type="submit" name="Submit" value="Post">
    </div>

  </form>
</div>
  </body>
</html>
