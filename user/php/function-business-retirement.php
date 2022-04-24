<?php 
include "db_conn.php";

if(isset($_POST['retire'])){
	session_start();

	$businessId = $_POST['businessId'];

	$retire = "UPDATE business.business_mode set mode = 'retirement' where businessId = $businessId; ";
	$result = mysqli_query($conn, $retire)or die($conn->error);

	$retire = "UPDATE business.business set status = 'pending' where id = $businessId; ";
	$result = mysqli_query($conn, $retire)or die($conn->error);

	header("Location: ../pages-retirement-businesses.php");

}


 ?>