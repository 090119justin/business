<?php  
session_start();
include "db_conn.php";

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$gender = $_POST['gender'];
$birthDate = $_POST['birthDate'];
$age = $_POST['age'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];


$bDay = date("Y-m-d", strtotime($birthDate) );


$sql = "SELECT * FROM users WHERE username = '$username' ";

$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);

if($num == 1)
{
	header("Location: ../pages-register.php?error=Username already taken");
}
else if ($num == 0) {
	
	$register = "INSERT INTO users(username,`password`,role) VALUES ('$username',md5('$password'),'user');";

	mysqli_query($conn,$register)or die($conn->error);

	$last_id = $conn->insert_id;
				
	$account = "INSERT INTO personal_information(firstName,middleName,lastName,gender,birthdate,age,email,userId,contactNo) VALUES
				('$firstName','$middleName','$lastName','$gender','$birthDate','$age','$email',$last_id,'$contactNo');";

	mysqli_query($conn,$account)or die($conn->error);

	
	header("location: ../pages-register.php?sucess=Registered Sucessfully");
}

else
{
	header("Location: ../pages-register.php?error=Username and password is required");
}

?>