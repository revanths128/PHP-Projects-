<?php

include("connection.php");

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
<li><a href="admin_welcome.php">Home</a></li>
<li><a href="post_events.php">Post Event</a></li>
<li><a href="#">User Info</a></li>
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
<br>      
    <div class="content">
      <header class="space"></header>
      <div class="space text"></div> 
        <table id="table" border="1">
        <thead>
            <tr>
                <th>User Name</th>
                <th>College Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
             $query = "SELECT * FROM users u,username s where u.user_ID = s.user_ID ";
            $result = mysqli_query($con, $query);
            
            if(isset($_POST['delete'])){
            $id = $_POST['delete'];
            ?>

            <script>
            var c = confirm("DO YOU WANT TO DELETE USER");
            if(c == true)
            {
            <?php 
            $qry=("DELETE FROM users WHERE user_name='$id'");
            mysqli_query($con,$qry);
            header('Location: data_manipulation.php');
            ?>
            }
            </script>
            
            <?php
            }
            while($row = mysqli_fetch_assoc($result)): 

            ?>
            <tr>
                <td><?php echo $row['prefix'].". ".$row['first_name']." ".$row['last_name']; ?></td>
                <td><?php echo $row['college']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td>
                    <form  method="POST">
                        <input type="hidden" name="delete" value="<?php echo $row['user_name']; ?>">
                        <input type="submit" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>


        <!--

            <tr>
                <td>Ramesh</td>
                <td>BMSCE</td>
                <td>CSE</td>
                <td>3</td>
                <td><button>Delete</button></td>
            </tr>
            
            <tr>
                <td>Bheemesh</td>
                <td>RVCE</td>
                <td>CSE</td>
                <td>3</td>
                <td><button>Delete</button></td>
            </tr>
            
            <tr>
                <td>Sharmesh</td>
                <td>BMSCE</td>
                <td>CSE</td>
                <td>3</td>
                <td><button>Delete</button></td>
            </tr>
            
            <tr>
                <td>Kaamesh</td>
                <td>PESIT</td>
                <td>CSE</td>
                <td>3</td>
                <td><button>Delete</button></td>
            </tr>
            
            <tr>
                <td>Dharmesh</td>
                <td>MSRIT</td>
                <td>CSE</td>
                <td>3</td>
                <td><button>Delete</button></td>
            </tr>

        -->
        </tbody>
        </table>
        
        <script>
    
            var index, table = document.getElementById('table');
            for(var i = 0; i < table.rows.length; i++)
            {
                table.rows[i].cells[4].onclick = function()
                {
                    var c = alert("The User has been Deleted");
                    if(c === true)
                    {
                       // index = this.parentElement.rowIndex;
                       // table.deleteRow(index);
                    }
                    
                    //console.log(index);
                };
                
            }
    
        </script>
    <!--

     <script>
            var c = confirm("DO YOU WANT TO DELETE AN USER");
            if(c === true)
            {
            }
        </script>

    -->
        
    </body>
</html>









