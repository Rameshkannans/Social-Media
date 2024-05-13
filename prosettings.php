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

<!-- TABLE CONNECTION START-->
   <?php
   session_start();
   require 'db3.php';
 
        $us_id = $_SESSION['form_user_id1'];
          $select ="SELECT * FROM user_reg WHERE id='$us_id'";
          $connect_q3 = $conn->query($select);
          $rowss = $connect_q3->fetch_assoc();

  

    if (isset($_POST['usname'])) {

      $usname = $_POST['usname'];
      $usemail = $_POST['usemail'];
      $usph = $_POST['usph'];
      $usdob = $_POST['usdob'];
      
$sql = "UPDATE user_reg SET name='$usname', email='$usemail', phone='$usph', dob='$usdob' WHERE id='$us_id'";
      $res = $conn->query($sql);
      header("Location: dash3.php");
      
    }
   ?>

<!-- TABLE CONNECTION END-->



<!-- FORM START-->
    <div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center text-warning" ><b>PROFILE SETTINGS</b></h1>
                <form action="prosettings.php" method="post" enctype="multipart/form-data">
        
                  <div class="mb-3">
                    <label for="us" class="form-label text-info"><b>Change User name :</b></label>
                    <input type="text" id="us" name="usname" class="form-control" required value="<?php echo $rowss['name'];?>">
                  </div>

                  <div class="mb-3">
                    <label for="use" class="form-label text-info"><b>Change User Email :</b></label>
                    <input type="email" id="use" name="usemail" class="form-control" required value="<?php echo $rowss['email'];?>">
                  </div>

                  <div class="mb-3">
                    <label for="usp" class="form-label text-info"><b>Change User Phone Number :</b></label>
                    <input type="tel" id="usp" name="usph" class="form-control" required value="<?php echo $rowss['phone'];?>">
                  </div>

                  <div class="mb-3">
                    <label for="usd" class="form-label text-info"><b>Change User date of birth :</b></label>
                    <input type="date" id="usd" name="usdob" class="form-control" required value="<?php echo $rowss['dob'];?>">
                  </div>
                  
                  <div class="d-grid">
                    <button type="submit" class="btn btn-outline-success "><b> DONE</b></button>
                  </div>
                  
                  <div class="text-center mt-4">        
                    <a href="dash3.php" class="btn btn-outline-warning ">Dashboard</a>
                  </div>
                        
                  <div class="text-center mt-4">   
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- FORM END-->


</body>
</html>