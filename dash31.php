  <?php
     session_start();
      if(!isset($_SESSION['form_user_id1'])){
          header("Location: login3.php");
          exit();
      }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Instagram Dasboard Page</title>
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
      <!-- NAVIGATION BAR START -->
        <nav class="navbar navbar-expand-sm bg-transparent navbar-dark mx-5">
              <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="instagram.jpg" style="width: 80px;" class="rounded-5"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item mt-2">
                      <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item mt-2">
                      <a class="nav-link" href="#"></a>
                    </li>
                      
                  </ul>
                  <div class="mx-auto ms-5">
                    <h1><b class="" style="font-family: 'Grand Hotel', cursive;color:white;">Welcome to Instagram</b></h1>
                  </div>
                
                </div>
                <form class="d-flex mx-auto">
                    <input class="form-control "style="border-radius: 0px;" type="text" placeholder="Search Friends"><button class="btn btn-warning"style="border-radius: 0px; " type="button">SEARCH</button> 
                    <a href="logout3.php" class="btn btn-danger ms-5">LOGOUT</a>
                </form>
                </div>
              </div>
            </nav>
    <!-- NAVIGATION BAR END -->

      <!-- GET VALUES FROM POST DATABASE START -->
          <?php
            require 'db3.php';
                $select_post_value ="SELECT * FROM post2 ORDER BY id DESC";
                $connect_q = $conn->query($select_post_value);



                $us_id = $_SESSION['form_user_id1'];
                $select ="SELECT * FROM user_reg WHERE id='$us_id'";
                $connect_q3 = $conn->query($select);
                $rowss = $connect_q3->fetch_assoc();
          ?> 



  <!-- GET VALUES FROM POST DATABASE END -->


        <div class="container-fluid bg-transparent p-2 ">
          <div class="row justify-content-end">
            <div class="col-md-5 mx-5 bg-transparent p-2">

<!-- COLLAPSE START -->
          <a href="#demo1" class="btn btn-success" data-bs-toggle="collapse">Upload Post</a>
            <div>

              <div id="demo1" class="collapse mt-2">
                  <div class="card shadow-lg bg-transparent" style="width:500px;">
                    <div class="card-body">
                        
                        <form action="post31.php" method="POST" enctype="multipart/form-data">
                           
                            <div class="mb-3">
                                <label for="ima" class="form-label text-info"><b>Select file :</b> </label>
                                <input type="file" class="form-control" id="ima" name="file_name" accept="*" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="des" class="form-label text-info"><b>Description :</b> </label>
                                <textarea class="form-control" id="des" name="des_cription" rows="4" required></textarea>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-success" name="submit_post" value="POST">
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div> 
  <!-- COLLAPSE END -->


  <!-- WHILE LOOP START -->
    <?php if ($connect_q) {
      while ($row=$connect_q->fetch_assoc()) { ?>
        <div class="card shadow-lg  bg-primary mt-4" style="width:500px; border-width: 3px; border-color: white;">
      <a class="btn btn-primary">
        <div class="d-flex">
          <img src="<?php echo $row['user_dp'] ?>" class="rounded-circle" style="width: 50px; height: 50px;" >
          <h6 class="text-info me-4 mt-3 ms-2">Posted By :</h6>
          <h6 class="card-title  me-4 mt-3" style="color:#05f719;">User ID: <span class="text-white"><?php echo $row['user_id'] ?></span> </h6><h6 class="card-title mt-3" style="color:#05f719;">User Name: <span class="text-white"><?php echo $row['user_name'] ?></span> </h6>
        </div>
        
      </a> 
            <?php
              $file_name = $row['file'];
              $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

              if ($file_extension === 'jpg' || $file_extension === 'png' || $file_extension === 'jpeg') { ?>
              <img class="card-img-top" src="<?php echo $row['file'] ?>" accept="image/*" style="width:100%">

              <?php  } elseif ($file_extension === 'mp3') { ?>
              <div class="justify-content-center">
               <audio controls style="width:100%">
                <source src="<?php echo $row['file'] ?>" accept="audio/*">
               </audio>
              </div>

              <?php   } elseif ($file_extension === 'mp4') { ?>
                <video autoplay loop controls muted style="width:100%">
                  <source src="<?php echo $row['file'] ?>" accept="video/*" >
                </video>    
              <?php   } ?>         
                                
              <div class="card-body ">
                <p class="card-text text-white"><?php echo $row['descreption']; ?></p>
                <div class="float-end">
                  <a href="postdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </div>
              </div>
            </div>

              <?php } ?>

              <?php } ?>
  <!-- WHILE LOOP END -->
            </div>

  <!-- USER CARD START -->
            <div class="col-md-3 bg-transparent p-2 me-5">
              <div class="card shadow-lg  bg-transparent rounded-5" style="width:300px">
                <a class="nav-link" href="#"><img src="<?php echo $_SESSION['user_dp']; ?>" style="width:100%; border-width: 3px; border-color: grey;"> </a>
                  <div class="card-body ">
                    <h4 class="card-title"><a class="nav-link" href="#"><h5 style="color: white;"><span style="color: #d9d932;"><b>User Name:</b></span>  <?php echo $rowss['name']; ?></h5></a></h4>
                    <h5 class="card-text"><a class="nav-link" href="#"><h5 style="color: white;"><span style="color: #d9d932;"><b> User ID:</b></span> <?php echo $rowss['id']; ?></h5></a></h5>
                    <a href="prosettings.php" class="d-grid btn btn-success">Profile Settings</a>

                  </div>
              </div>
            
            </div>
          </div>
        </div>
<!-- USER CARD END -->

  <div class="container  p-4 mt-5 text-center rounded-5" style="background-color: #123c80;">
        <div class="d-flex justify-content-center">
            <img src="meta.png" style="width: 28px;">
            <h6 class="mt-1 ms-2 text-info">Meta</h6>
        </div>
        <p class="text-white">Instagram</p>
    </div>

</body>
</html>