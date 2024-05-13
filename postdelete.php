  <?php
     session_start();
      if(!isset($_SESSION['form_user_id1'])){
          header("Location: login3.php");
          exit();
      }

    include_once 'db3.php';
    $id = $_GET['id'];

    $delete_query = "DELETE FROM post2 where id='$id'";

    $connect_q = $conn->query($delete_query);
    header('Location: dash3.php');




?>