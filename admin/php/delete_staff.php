<?php 
session_start();
include "db_conn.php";

if (isset($_GET['id'])) {
	$uId = $_GET['id'];

	$deletePerson = "DELETE from business.personal_information
				where userId = $uId";
	$deleteUser = "DELETE from business.users
				where id = $uId";
	mysqli_query($conn,$deletePerson)or die($conn->error);
	mysqli_query($conn,$deleteUser)or die($conn->error);
	header("Location: ../administrator/pages-staff.php");
}
	
?>