<?php 

   session_start();

  include("connection.php");
  include("functions.php");

 // $user_name = pass_from();

  $user_name = $_SESSION['user_name'];
 // $user_ID = $_SESSION['user_ID'];

  // echo $pass_user;


  if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['Submit'])) {


      //something was posted

    // $full_name = $_POST['full_name'];
    // $course = $_POST['course'];
    // $year = $_POST['year'];
    // $college = $_POST['college'];
    $ptitle = $_POST['ptitle'];
    $tech_used = $_POST['tech_used'];
    $subject = $_POST['subject'];
    $project_ID= random_num(10);
     
    if (!empty($user_name)) {

     //save to database

    // $user_ID = 809920;
  
    $user_query =  "select user_ID from users where user_name = '$user_name' "; 
    $user_res = mysqli_query($con, $user_query);
    $user_res_data =mysqli_fetch_assoc($user_res);
   /*
    echo "<prev>";
    print_r($user_res_data);
    echo "</pre>";
*/
    //echo $user_res_data["user_ID"];

    $user_ID = $user_res_data["user_ID"];

    //echo  $user_ID;


    $query = "

    insert into project (project_ID, project_title, project_desc, tech_used) 
      values('$project_ID','$ptitle','$subject','$tech_used');


    insert into user_post (user_ID, project_ID) 
      values('$user_ID','$project_ID');

      ";

    //  echo $query;

    $res= mysqli_multi_query($con, $query); 

   // echo $query ;
   // header("Location: userlogin.php");
   // die;
   // echo $query ;

        if($res) {
            echo "A Requested has been Submitted Successfully .";
            header("Location: user_connect_friend.php");
              die;
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
    <title>Student part</title>
    <!--<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"crossorigin="anonymous"/>
    -->
    <link rel="stylesheet" href="user_share_idea.css">
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
<li><a href="#">Share</a></li>
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


<div class="form">
  <h2>SHARE YOUR IDEAS</h2>
  <p>Its the place were you can share your thoughts and ideas to the friends through College Connect team so feel free to to express your thoughts and ideas to make friends and get them invited to your work.</p>
</div>
<div class="container">

  <form method="POST">
<!--
    <div class="row">
      <div class="col-25">
        <label for="fname">Full Name<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="full_name" placeholder="Enter Your Full Name.." required>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="course">Course<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <select id="course" name="course">
          <option value="cse">CSE</option>
          <option value="is">ISE</option>
          <option value="ec">E&C</option>
          <option value="mech">MECH</option>
          <option value="other">OTHER</option>
        </select>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="year">Year of Study<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <select id="year" name="year">
          <option value="1">1st year</option>
          <option value="2">2nd year</option>
          <option value="3">3rd year</option>
          <option value="4">4th year</option>
        </select>
      </div>
    </div>


    

    <div class="row">
      <div class="col-25">
        <label for="clg">College Name<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="clg" name="college" placeholder="Enter the College name..">
      </div>
    </div>

-->
    <div class="row">
      <div class="col-25">
        <label for="ptitle">Project Title<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="ptitle" name="ptitle" placeholder="Enter the Title name.." required>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="tech">Technology Used<span class="text-danger">*</span></label>
      </div>
      <div class="col-75">
        <input type="text" id="tech" name="tech_used" placeholder="Enter the technology used.." required>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="subject">Summary of Project<span class="text-danger"></span></label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write the Description in brief.." style="height:100px"></textarea>
      </div>
    </div>


    <br>
    <div class="btn">
    <div class="row">


      <input type="submit" name="Submit"  value="Submit">


      <?php 



        ?>

    </div>
  </div>
  </form>
</div>

  </body>
</html>
