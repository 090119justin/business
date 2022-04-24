<?php  
session_start();
include "db_conn.php";

	if (isset($_POST['password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$password = test_input($_POST['password']);
	$newPassword = test_input($_POST['new_password']);
	$confirmPassword = test_input($_POST['confirm_password']);
	$userId = $_SESSION['id'];

	$password = md5($password);
	$sql = "SELECT * FROM users WHERE id=$userId AND password='$password' and role ='user'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {
		if($newPassword == $confirmPassword){
			$changePass = "UPDATE business.users set password = md5('$newPassword')";
			$result = mysqli_query($conn, $changePass);

			header("Location: ../pages-profile.php?");
		}
		else{
			header("Location: ../pages-profile.php?message=Password doesn't match!");
		}
		
	}
	else{
			header("Location: ../pages-profile.php?message=Incorrect Password!");
		}
	}


?>