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



//----------------------------------------------
// Send an e-mail. Returns true if successful 
//
//   $to - destination
//   $nameto - destination name
//   $subject - e-mail subject
//   $message - HTML e-mail body
//   altmess - text alternative for HTML.
//----------------------------------------------
function sendmail($to,$nameto,$subject,$message,$altmess)  {

  $from  = "obpps1@gmail.com";
  $namefrom = "yourname";
  $mail = new PHPMailer();  
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();   // by SMTP
  $mail->SMTPAuth   = true;   // user and password
  $mail->Host       = "localhost";
  $mail->Port       = 25;
  $mail->Username   = $from;  
  $mail->Password   = "obpps12345";
  $mail->SMTPSecure = "";    // options: 'ssl', 'tls' , ''  
  $mail->setFrom($from,$namefrom);   // From (origin)
  $mail->addCC($from,$namefrom);      // There is also addBCC
  $mail->Subject  = $subject;
  $mail->AltBody  = $altmess;
  $mail->Body = $message;
  $mail->isHTML();   // Set HTML type
//$mail->addAttachment("attachment");  
  $mail->addAddress($to, $nameto);
  return $mail->send();
}

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
				status = 'paid'
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