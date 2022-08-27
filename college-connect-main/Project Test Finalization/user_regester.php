<?php 
session_start();

  include("connection.php");
  include("functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST"){

  if (isset($_POST['Submit'])) {


      //something was posted
      $user_ID = random_num(8);
      $user_name = $_POST['user_name'] ;
      $pre = $_POST['pre'] ;
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $institution=$_POST['institution'];
      $email=$_POST['email'];
      $semester=$_POST['sem'];
      $branch=$_POST['branch'];
      $mobile=$_POST['mobile'];
      $address=$_POST['address'];
      $intrest= $_POST['intrest'];
      $password = $_POST['pswd'];


/*
      echo $user_ID;
      echo $user_name ;
      echo $pre;
      echo $firstname;
      echo $lastname;
      echo $institution;
      echo $email;
      echo $semester;
      echo $branch;
      echo $mobile;
      echo $address;
      echo $intrest;
      echo $password;

*/  

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

     //save to database

    $query = "

  insert into users (user_ID,user_name,college,course,user_email,semester,contact_no,address,area_of_interest,user_password) 
      values('$user_ID','$user_name','$institution','$branch','$email','$semester','$mobile','$address','$intrest',
      '$password');

  insert into username (user_ID,prefix,first_name,last_name) 
                values('$user_ID','$pre','$firstname','$lastname');

      ";



    //mysqli_multi_query($con, $query); 
   // echo $query ;

  // header("Location: userlogin.php");
    
 // die;

     $res= mysqli_multi_query($con, $query); 

   // echo $query ;
   // header("Location: userlogin.php");
   // die;
   // echo $query ;

        if($res) {
            echo "A Requested has been Submitted Successfully .";
              header("Location: userlogin.php");
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGN_UP</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"crossorigin="anonymous"/>
    <link rel="stylesheet" href="user_regester.css" />
    <style>
    </style>
  </head>
  <body style="background-color: #ddd">
    <div class="header">
      <div
        class="navbar align-items-center pl-3 pr-3"
        style="background-color: #ddd"
      >
        <div class="col-3 pt-2">
          <img src="img/logo1.png" class="logo" width="100px" height="100px" />
        </div>
        <div class="col-6 text-center">
          <h3 class="blog-header-logo text-dark pt-2">
            REGISTRATION FORM <br> COLLEGE CONNECT
          </h3>
        </div>
        <div class="col-3 text-right">
          <a href="index.php" class="btn btn-outline-secondary pt-1">HOME</a>
        </div>
      </div>
    </div>
    <div class="container pl-3 pr-3" style="background-color: #eee">

      <form id="submission-form" method="POST">
        <h3 class="text-center author">Personal Information</h3>
        <hr />
        <br />

        <div class="form-row align-items-center">
          <div class="col-md-2">
            <label for="prefix" class="pl-2"
              >Prefix : <span class="text-danger">*</span></label
            >
            <select class="form-control" name = "pre" required id="prefix-input">
              <option value="Mr">Mr.</option>
              <option value="Ms">Ms.</option>
            </select>
          </div>

          <div class="col-md-5">
            <label for="first_name" class="pl-2"
              >First Name <span class="text-danger">*</span></label
            >
            <input
              type="text"
              class="form-control"
              id="first-name-input"
              placeholder="Enter your First Name"
              name = "first_name"
              required
              maxlength="50"
              pattern="[A-Za-z]{1,}"
            />
          </div>

          <div class="col-md-5">
            <label for="last_name" class="pl-2"
              >Last Name <span class="text-danger">*</span></label
            >
            <input
              type="text"
              class="form-control"
              name="last_name"
              id="last-name-input"
              placeholder="Enter your Last Name"
              required
              pattern="[A-Za-z]{1,}"
              maxlength="50"
            />
          </div>
        </div>
<!--
        <div class="form-row align-items-center pt-3">
          <div class="col-md-4">
            <label for="institution" class="pl-2"
              >Institution <span class="text-danger">*</span></label
            >
            <input
              type="text"
              name="institution"
              id="institution-input"
              class="form-control"
              placeholder="Enter the institution"
              required
              pattern="[A-Z a-z]{3,}"
              maxlength="80"
            />
          </div>
-->

        <div class="form-row align-items-center pt-3">
          <div class="col-md-4">
            <label for="institution" class="pl-2"
              >Institution <span class="text-danger">*</span></label
            >
            <select class="form-control" name = "institution" required id="institution-input">
              <option value="BMSCE">BMSCE</option>
              <option value="RVCE">RVCE</option>
              <option value="PESIT">PESIT</option>
              <option value="MSRIT">MSRIT</option>
              <option value="BIT">BIT</option>
              <option value="Other">Other</option>
            </select>
          </div>


            

          <div class="col-md-4">
            <label for="branch" class="pl-2">Branch</label>
            <input
              type="text"
              name="branch"
              id="Branch-input"
              class="form-control"
              placeholder="Enter the Branch name"
            />

          </div>
          <div class="col-md-4">
            <label for="sem" class="pl-2"
              >Semester : <span class="text-danger">*</span></label
            >
            <input
              type="text"
              name="sem"
              id="Semester-input"
              class="form-control"
              placeholder="Enter the Sem"
              required
              pattern="[0-9]{1,}"
              maxlength="4"
            />
          </div>
        </div>



        <div class="form-row align-items-center pt-3">
          <div class="col-md-6">
            <label for="E-mail" class="pl-2"
              >Email Address <span class="text-danger">*</span></label
            >
            <input
              type="email"
              class="form-control"
              id="email-input"
              name = "email"
              placeholder="Enter your email"
              required
              pattern="[a-z0-9.]+@[a-z0-9.-]+\.[a-z]{2,}"
              maxlength="80"
            />
          </div>

          <div class="col-md-6">
            <label for="mobile" class="pl-2"
              >Mobile No. <span class="text-danger">*</span></label
            >
            <input
              type="text"
              pattern="[0-9]{10}"
              maxlength="10"
              minlength="10"
              name="mobile"
              id="mobile-input"
              class="form-control"
              placeholder="Enter the Mobile No."
            />
          </div>




        </div>

        <div class="form-row align-items-center pt-3">
          <div class="col-md-6">
            <label for="user_name" class="pl-2"
              >User_Name <span class="text-danger">*</span></label
            >
            <input
              type="test"
              class="form-control"
              id="user_name-input"
              placeholder="Set your user_name"
              name = "user_name"
              required
              pattern="[A-Za-z0-9.]{3,}"
              maxlength="10"
            />
          </div>

          <div class="col-md-6">
            <label for="pswd" class="pl-2" 
              >Set Password. <span class="text-danger">*</span></label
            >
            <input
              type="password"
              maxlength="10"
              minlength="3"
              name="pswd"
              id="mobile-input"
              class="form-control"
              placeholder="Enter the Strong Password"
            />
          </div>

        </div>



        <div class="form-row align-items-center pt-3">
          <div class="col-md-6">
            <label for="Address" class="pl-2"
              >Address <span class="text-danger">*</span></label
            >
            <textarea
              class="form-control"
              name="address"
              id="address-input"
              required="max length exeeded"
              placeholder="Enter the Address"
              maxlength="100"
            ></textarea>
          </div>


          <div class="col-md-6">
            <label for="Co-authors" class="pl-2">Area of Intrest</label>
            <textarea
              class="form-control"
              name="intrest"
              id="co-authors-input"
              placeholder="Enter the Area of Intrest"
            ></textarea>
          </div>
        </div>


        <div class="form-group pt-5">
          <h4 class="form-group">
            Terms and conditions <span class="text-danger">*</span>
          </h4>
          <div class="form-check">
            <input
              required
              type="checkbox"
              name = "checkbox"
              class="form-check-input mt-3"
              id="terms-condition"
            />
            <label for="terms-condition" class="pl-3 pr-3 form-check-label">
              I hereby agree with the <a href="#">terms and conditions</a> layed by the organiser of college connect team, and I will follow those.
            </label>
          </div>
        </div>
        <div class="text-center col-md-12">
          <input type="submit" name="Submit" value="Submit" id="submit-btn" class="btn submit-btn btn-outline-dark">
        </div>
      </form>
      <div style="padding-bottom: 150px; margin-bottom: 50px;"></div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
  </body>
</html>