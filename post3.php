<?php
session_start();
include_once 'db3.php';
?>

<!-- IMAGE START -->
<?PHP
if(isset($_POST['submit_post']))
	{
		$user_id = $_SESSION['form_user_id1'];
		$user_name = $_SESSION['user_name1'];
		$user_dp = $_SESSION['user_dp'];
		$descreption = $_POST['des_cription'];
		$file_name = $_FILES['file_name']['name'];
		$file_tmp_path = $_FILES['file_name']['tmp_name'];
		$storage_path = "file_upload/".$file_name;

		move_uploaded_file($file_tmp_path, $storage_path);

		$insert_img_values = "INSERT INTO post2(user_id, user_name, user_dp, descreption, file) 
									VALUES ('$user_id','$user_name', '$user_dp', '$descreption', '$storage_path')";
			$connect_q1 = $conn->query($insert_img_values);
			header("Location: dash3.php");
	}
	else
	{
		header('Location: dash3.php');	
	}
?>
<!-- IMAGE START -->



