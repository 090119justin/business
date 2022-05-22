<?php 
include "db_conn.php";
require_once('class.smtp.php');
require_once('class.phpmailer.php');

$firstName = "";
$lastName = "";
$middleName = '';
$gender = '';
$personId = '';
$email = '';
$photo = '';
$birthDate = '';
$age = '';
$contactNo = '';

$ownerBldgNo = "";
$ownerBldgName = "";
$ownerUnitNo = "";
$ownerStreet = "";
$ownerBrgy = "";
$ownerSubdivition = "";
$ownerMunicipality = "";
$ownerProvince = "";
$personId = "";

$businessBldgNo = "";
$businessBldgName = "";
$businessUnitNo = "";
$businessStreet ="";
$businessBrgy = "";
$businessSubdivition = "";
$businessMunicipality = "";
$businessProvince = "";
$businessContactNo = "";
$businessEmail = "";
$businessArea = "";

$presidentFirstName = "";
$presidentMiddleName = "";
$presidentlastName = "";

$officeMunicipality = "";
$paymentMode = "";
$DTIregNumber = "";
$DTIregDate = "";
$tinNumber = "";
$businessType = "";
$businessName = "";
$tradeName = "";

$maleEmployee = "";
$femaleEmployee = "";
$lguEmployee = "";

$lessorsName ="";
$lessorsAddress = "";
$lessorsContactNo = "";
$lessorsEmail ="";
$lessorsMonthlyRental = "";



if (isset($_GET['paid-new'])) {
	session_start();

	$businessId = $_GET['paid-new'];
	$update = "UPDATE business.business set
				status = 'paid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

		header("Location: ../administrator/pages-payments-new.php");

}

if (isset($_GET['unpaid-new'])) {
	session_start();
	
	$businessId = $_GET['unpaid-new'];
	$update = "UPDATE business.business set
				status = 'unpaid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	header("Location: ../administrator/pages-payments-new.php");

}







if (isset($_GET['paid-renew'])) {
	session_start();

	$businessId = $_GET['paid-renew'];
	$update = "UPDATE business.business set
				status = 'fully paid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

		header("Location: ../administrator/pages-payments-renew.php");

}

if (isset($_GET['unpaid-renew'])) {
	session_start();
	
	$businessId = $_GET['unpaid-renew'];
	$update = "UPDATE business.business set
				status = 'unpaid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	header("Location: ../administrator/pages-payments-renew.php");
}

if (isset($_GET['partiallyPaid-renew'])) {
	session_start();
	
	$businessId = $_GET['partiallyPaid-renew'];
	$update = "UPDATE business.business set
				status = 'partially paid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	header("Location: ../administrator/pages-payments-renew.php");

}

if (isset($_GET['paid-retire'])) {
	session_start();

	$businessId = $_GET['paid-retire'];
	$update = "UPDATE business.business set
				status = 'paid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

		header("Location: ../pages-payment-retire.php");

}

if (isset($_GET['unpaid-retire'])) {
	session_start();
	
	$businessId = $_GET['unpaid-retire'];
	$update = "UPDATE business.business set
				status = 'unpaid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	header("Location: ../pages-payment-retire.php");
}




?>