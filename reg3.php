<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Instagram Register Page</title>
  <link rel="stylesheet" type="text/css" href="pro52.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
  body {
  background-image: url('img8.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
</style>


</head>
<body class="">
<div class="container-fluid bg-transparent p-2 rounded-5 px-5 ">
        <div class="row ">
            <div class="col-6  p-2 ">
                <img src="instagram.jpg" style="width: 80px;" class="rounded-5">
            </div>
            <div class="col-6  p-2 mx-auto mt-4">
                <div class="float-end">
                    <h1><b class="text-light" style="font-family: 'Grand Hotel', cursive;">Welcome to Instagram</b></h1>
                </div>
            </div>
        </div>
    </div>



  <?php
  session_start();
  require 'db3.php';
    if(isset($_REQUEST['nam']))
    {
      $username = stripcslashes($_REQUEST['nam']);
      $username = mysqli_real_escape_string($conn, $username);

      $useremail = stripcslashes($_REQUEST['emai']);
      $useremail = mysqli_real_escape_string($conn, $useremail);

      $userphone = stripcslashes($_REQUEST['phon']);
      $userphone = mysqli_real_escape_string($conn, $userphone);

      $userdob = stripcslashes($_REQUEST['dat']);
      $userdob = mysqli_real_escape_string($conn, $userdob);

      $userpass = stripcslashes($_REQUEST['passwor']);
      $userpass = mysqli_real_escape_string($conn, $userpass);

      $userrepass = stripcslashes($_REQUEST['cpas']);
      $userrepass = mysqli_real_escape_string($conn, $userrepass);

      $dp_name = $_FILES['dpphoto']['name'];
      $dp_tmp_path = $_FILES['dpphoto']['tmp_name'];
      $dp_storage_path = "dp_upload/".$dp_name;
      move_uploaded_file($dp_tmp_path, $dp_storage_path);





      $create_datetime = date("Y-m-d H:i:s");

          if($userpass == $userrepass)
          {

            $insert_value = "INSERT INTO user_reg (name, email, phone, dob, pass, repass,dp)
            VALUES ('$username', '$useremail', '$userphone', '$userdob', '".md5($userpass)."', '".md5($userrepass)."', '$dp_storage_path')";

            $connect_q = $conn->query($insert_value);

                  if($connect_q)
                  {
?>                    

                    <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-6">
                            <div class="card shadow-lg bg-transparent">
                              <div class="card-head text-center mt-4">
                                <h3 style="color: greenyellow;">You are registered successfully<hr></h3>
                              </div>
                              <div class="card-body text-center">
                                <p class='link'><b class="me-2">Click here to</b><a href='login3.php' class="btn btn-outline-warning "><b class="">Login</b></a></p>
                              </div>
                          </div>    
                        </div>
                      </div>
                    </div>
<?php                 
                   }
                  else
                  {
?>
                     <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-6">
                            <div class="card shadow-lg bg-transparent">
                              <div class="card-head text-center mt-4">
                                <h3 style="color: greenyellow;">Required fields are missing</h3>
                              </div>
                              <div class="card-body text-center">
                                <p class='link'><b class="me-2">Click here to</b><a href='login3.php' class="btn btn-outline-warning "><b class="">registration</b></a></p>
                              </div>
                          </div>    
                        </div>
                      </div>
                    </div>
                  

<?php          
            }
          }
          else
          {
?>         

                <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-6">
                            <div class="card shadow-lg bg-transparent">
                              <div class="card-head text-center mt-4">
                                <h3 style="color: greenyellow;">Password fields are not matching</h3>
                              </div>
                              <div class="card-body text-center">
                                <p class='link'><b class="me-2">Click here to</b><a href='reg3.php' class="btn btn-outline-warning "><b class="">registration</b></a></p>
                              </div>
                          </div>    
                        </div>
                      </div>
                    </div>

          
<?php
      }
    }
    else
    {
?>
        <div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-warning" style="font-family: 'Grand Hotel', cursive;"><b>Sign Up</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
                  <div class="mb-3">
                    <label for="name" class="form-label text-info"><b>Name :</b></label>
                    <input type="text" id="name" name="nam" class="form-control" required>
                  </div>
                  <div class="mb-3"> 
                    <label for="email" class="form-label text-info"><b>Email ID :</b></label>
                    <input type="email" id="email" name="emai" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="te" class="form-label text-info"><b>Phone Number :</b></label>
                    <input type="tel" id="te" name="phon" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="da" class="form-label text-info"><b>Date of Birth :</b></label>
                    <input type="date" id="da" name="dat" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="pas" class="form-label text-info"><b>Password :</b></label>
                    <input type="password" id="pas" name="passwor" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="cp" class="form-label text-info"><b>Conform Password :</b></label>
                    <input type="password" id="cp" name="cpas" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="dp" class="form-label text-info"><b>Select Profile Photo:</b> </label>
                    <input type="file" class="form-control" id="dp" name="dpphoto" accept="image/*" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-outline-success"><b> Register</b></button>
                  </div>
                        <script>
                        function myFunction() {
                          alert("FORM SUCCESSFLLY SAVED");

                        }
                        </script> 
                        <?php
                        
                            if(isset($_GET['success']) && $_GET['success'] ==1)
                            {
                               echo "<script> myFunction(); </script>"; 
                               }          
                          ?>
                  <div class="text-center mt-4">        
                    <h6 class="link">Already have an account? <a href="login3.php" class="btn btn-outline-warning "><b>Login here</b> </a></h6>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php

    }

  ?>
  <div class="container-fluid p-5">
    
  </div>
</body>
</html>