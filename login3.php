<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Instagram Login Page</title>
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
<body>

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
    if(isset($_REQUEST['user_name'])) 
    {
      $user_email = stripslashes($_REQUEST['user_name']);    
      $user_email = mysqli_real_escape_string($conn, $user_email);

      $user_pass = stripslashes($_REQUEST['pass_word']);    
      $user_pass = mysqli_real_escape_string($conn, $user_pass);

      $select_value = "SELECT * FROM user_reg WHERE email='$user_email' AND pass='".md5($user_pass)."'";
      $connect_q = $conn->query($select_value);

      $num_of_rows = mysqli_num_rows($connect_q);

              if($num_of_rows == 1)
              {
                $fetch_rows = $connect_q->fetch_assoc();
                $_SESSION['form_user_id1'] = $fetch_rows['id'];
                $_SESSION['user_name1'] = $fetch_rows['name'];
                $_SESSION['user_email1'] = $fetch_rows['email'];
                $_SESSION['user_phone1'] = $fetch_rows['phone'];
                $_SESSION['user_dob1'] = $fetch_rows['dob'];
                $_SESSION['user_dp'] = $fetch_rows['dp'];
                $_SESSION['user_pass'] = $fetch_rows['pass'];
                header("Location: dash3.php");
              }
              else
              {
?>

                      <div class="container">
                        <div class="row justify-content-center">
                          <div class="col-lg-6">
                            <div class="card shadow-lg bg-transparent">
                              <div class="card-head text-center mt-4">
                                <h3 style="color: greenyellow;">Incorrect Username/password<hr> </h3>
                              </div>
                              <div class="card-body text-center">
                                <p class=""><b class="me-2">Click here to</b><a href='login3.php' class="btn btn-outline-warning "><b class="">Login</b></a><b class="ms-2">again.</b></p>
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
        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card  shadow-lg bg-transparent">
                    <h1 class="card-header text-center text-warning" style="font-family: 'Grand Hotel', cursive;">
                        Login
                    </h1>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label text-info"><b>Username :</b> </label>
                                <input type="text" class="form-control" id="name" name="user_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-info"><b>Password :</b> </label>
                                <input type="password" class="form-control" id="password" name="pass_word" required>
                            </div>
                            <div class="d-grid">
                            <button type="submit" class="btn btn-outline-success"><b>Login</b></button>
                            </div>

                            
                            <div class="text-center mt-4">        
                              <h6 class="link">Don't have an account? <a href="reg3.php" class="btn btn-outline-warning ">Register here</a></h6>
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
</body>
</html>