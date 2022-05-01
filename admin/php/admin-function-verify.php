<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


session_start();
include "db_conn.php";


$person = $_POST['person_id'];


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();                      	// Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       	// Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               	// Enable SMTP authentication 
$mail->Username = 'obpps1@gmail.com';   // SMTP username 
$mail->Password = 'obpps12345';   		// SMTP password 
$mail->SMTPSecure = 'tls';            	// Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587; 

// Sender info 
$mail->setFrom('obpps1@gmail.com', 'OBPPS'); 
 

 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Online Business Permit'; 
 
$sql = $conn->query("SELECT * FROM business.personal_information WHERE id=$person;")or die($conn->error);;
$result = mysqli_fetch_assoc($sql);

$name = $result['firstName'];
$emailAddress = $result['email'];

// Add a recipient 
$mail->addAddress($emailAddress); 



if(isset($_POST['verify'])){
	$person = $_POST['person_id'];
	$require = $_POST['req_id'];
	$DTIBus = $_POST['DTIBusName'];
	$BrgyClearance = $_POST['BrgyClearance'];
	$zoningClearance = $_POST['zoningClearance'];
	$ceo = $_POST['ceo'];
	$bfp = $_POST['bfp'];
	$cho = $_POST['cho'];
	$contractLease = $_POST['contractLease'];
	$sedula = $_POST['sedula'];
	$investedCapital = $_POST['investedCapital'];
	$picture = $_POST['picture'];
	$others = $_POST['others'];

	

	// Mail body content 
	
	 
	// Send email 
	


	if($DTIBus == 'verified' && $BrgyClearance == 'verified' && $zoningClearance == 'verified' && $ceo == 'verified' &&  $bfp == 'verified' && $cho == 'verified' && $contractLease == 'verified' && $sedula == 'verified' && $investedCapital == 'verified' && $picture == 'verified' && $others == 'verified'){


		$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
		$bodyContent .= '<p>This is to inform you that your submitted requirements has been <b>verified</b></p>'; 
		$bodyContent .= '<p>You may now proceed to the business registration form. Please click the link below, Thank you.</p>'; 
		$bodyContent .= '<a href="http://localhost/business/user/pages-pending-request.php?">http://localhost/business/user/pages-pending-request.php?</a>';
		$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

		
		$mail->Body    = $bodyContent; 
		
		$sql = "UPDATE requirements set
			status = 'in progress',
			DTIBusNameReg = '$DTIBus',
			BrgyClearance = '$BrgyClearance',
			ZoningClearance = '$zoningClearance',
			CEO = '$ceo',
			BFP = '$bfp',
			CHO = '$cho',
			ContractOflease = '$contractLease',
			InvestedCapital = '$investedCapital',
			Cedula = '$sedula',
			Picture = '$picture',
			Others = '$others'

			where personId = $person and id = $require;";

		mysqli_query($conn,$sql)or die($conn->error);

		if(!$mail->send()) { 
		    header("Location: ../administrator/pages-requirements-new.php?error=failed sending email");
		} else { 
		    header("Location: ../administrator/pages-requirements-new.php");
		} 
			
		
		
	}
	else{
		$bodyContent = '<h1>Hello, '.$name.'</h1>';
		$bodyContent .= '<p>This is to inform you that your submitted requirements are <b>Incomplete</b></p>'; 
		$bodyContent .= '<p>Please comply with the complete requirements</p>'; 
		$bodyContent .= '<a href="http://localhost/business/user/pages-pending-request.php?">http://localhost/business/user/pages-pending-request.php?</a>';
		$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

		
		$mail->Body    = $bodyContent; 
		$sql = "UPDATE requirements set
			status = 'new',
			DTIBusNameReg = '$DTIBus',
			BrgyClearance = '$BrgyClearance',
			ZoningClearance = '$zoningClearance',
			CEO = '$ceo',
			BFP = '$bfp',
			CHO = '$cho',
			ContractOflease = '$contractLease',
			InvestedCapital = '$investedCapital',
			Cedula = '$sedula',
			Picture = '$picture',
			Others = '$others'

			where personId = $person and id = $require;";

		mysqli_query($conn,$sql)or die($conn->error);
		if(!$mail->send()) { 
		    header("Location: ../administrator/pages-requirements-new.php?error=failed sending email");
		} else { 
		    header("Location: ../administrator/pages-requirements-new.php");
		} 
	}

	
}

if(isset($_POST['verifyRenew'])){
	$person = $_POST['person_id'];
	$require = $_POST['req_id'];
	$DTIBus = $_POST['DTIBusName'];
	$BrgyClearance = $_POST['BrgyClearance'];
	$zoningClearance = $_POST['zoningClearance'];
	$ceo = $_POST['ceo'];
	$bfp = $_POST['bfp'];
	$cho = $_POST['cho'];
	$contractLease = $_POST['contractLease'];
	$sedula = $_POST['sedula'];
	$investedCapital = $_POST['investedCapital'];
	$picture = $_POST['picture'];
	$others = $_POST['others'];



	if($DTIBus == 'verified' && $BrgyClearance == 'verified' && $zoningClearance == 'verified' && $ceo == 'verified' &&  $bfp == 'verified' && $cho == 'verified' && $contractLease == 'verified' && $sedula == 'verified' && $investedCapital == 'verified' && $picture == 'verified' && $others == 'verified'){

		

		$sql = "UPDATE requirements set
			status = 'in progress',
			DTIBusNameReg = '$DTIBus',
			BrgyClearance = '$BrgyClearance',
			ZoningClearance = '$zoningClearance',
			CEO = '$ceo',
			BFP = '$bfp',
			CHO = '$cho',
			ContractOflease = '$contractLease',
			InvestedCapital = '$investedCapital',
			Cedula = '$sedula',
			Picture = '$picture',
			Others = '$others'

			where personId = $person and id = $require;";

		mysqli_query($conn,$sql)or die($conn->error);
		$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
		$bodyContent .= '<p>This is to inform you that your submitted requirements has been <b>verified</b></p>'; 
		$bodyContent .= '<a href="http://localhost/business/user/pages-pending-request.php?">http://localhost/business/user/pages-pending-request.php?</a>';
		$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

		$mail->Body    = $bodyContent; 
		if(!$mail->send()) { 
		    header("Location: ../administrator/pages-requirements-renew.php?error=failed sending email");
		} else { 
		   	header("Location: ../administrator/pages-requirements-renew.php");
		} 
	}
	else{
		$sql = "UPDATE requirements set
			status = 'new',
			DTIBusNameReg = '$DTIBus',
			BrgyClearance = '$BrgyClearance',
			ZoningClearance = '$zoningClearance',
			CEO = '$ceo',
			BFP = '$bfp',
			CHO = '$cho',
			ContractOflease = '$contractLease',
			InvestedCapital = '$investedCapital',
			Cedula = '$sedula',
			Picture = '$picture',
			Others = '$others'

			where personId = $person and id = $require;";

		mysqli_query($conn,$sql)or die($conn->error);
		$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
		$bodyContent .= '<p>This is to inform you that your submitted requirements has been <b>verified</b></p>'; 
		$bodyContent .= '<a href="http://localhost/business/user/pages-pending-request.php?">http://localhost/business/user/pages-pending-request.php?</a>'; 
		$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

		$mail->Body    = $bodyContent; 
		if(!$mail->send()) { 
		    header("Location: ../administrator/pages-requirements-renew.php?error=failed sending email");
		} else { 
		   	header("Location: ../administrator/pages-requirements-renew.php");
		} 
	}

	
}


if(isset($_POST['confirm'])){
	$BrgyClearance = $_POST['BrgyClearance'];
	$ZoningClearance = $_POST['ZoningClearance'];
	$OccupancyPermit = $_POST['OccupancyPermit'];
	$AnnualInspection = $_POST['AnnualInspection'];
	$SanitaryPermit = $_POST['SanitaryPermit'];
	$FireCertificate = $_POST['FireCertificate'];
	$EnvironmentCertificate = $_POST['EnvironmentCertificate'];
	$MarketClearance = $_POST['MarketClearance'];
	$businessId = $_POST['businessId'];

	$sql = "INSERT INTO business.document_verification
	(BrgyClearance,ZoningClearance,OccupancyPermit,AnnualInspection,SanitaryPermit,FireCertificate,EnvironmentCertificate,MarketClearance,businessId)values(
	'$BrgyClearance','$ZoningClearance','$OccupancyPermit','$AnnualInspection','$SanitaryPermit','$FireCertificate','$EnvironmentCertificate','$MarketClearance',$businessId);";

	mysqli_query($conn,$sql)or die($conn->error);

	$update = "UPDATE business.business set
				status = 'unpaid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	$mayor = $_POST['mayor'];
	$garbage = $_POST['garbage'];
	$trucks = $_POST['trucks'];
	$sanitary = $_POST['sanitary'];
	$building = $_POST['building'];
	$electrical = $_POST['electrical'];
	$mechanical = $_POST['mechanical'];
	$plumbing = $_POST['plumbing'];
	$storage = $_POST['storage'];
	$others = $_POST['others'];
	$total_lgu = $_POST['total_lgu'];
	$firesafety = $_POST['firesafety'];
	$total = $_POST['total'];

	$fees = "INSERT INTO business.regulatory_fees
	(MayorsPermit,GarbageCharges,DeliveryTrucks,SanitaryInspection,BldgInspection,ElectricalInspection,MechanicalInspection,PlumbingInspection,SubstanceStorage,Others,FireSafetyFee,businessId)values
	($mayor,$garbage,$trucks,$sanitary,$building,$electrical,$mechanical,$plumbing,$storage,$others,$firesafety,$businessId)";

	mysqli_query($conn,$fees)or die($conn->error);
	$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
	$bodyContent .= '<p>This is to inform you that your registration form for your new business has been <b>verified</b></p>'; 
	$bodyContent .= '<a href="http://localhost/business/user/pages-my-businesses.php?">http://localhost/business/user/pages-pending-request.php?</a>';
	$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

	$mail->Body    = $bodyContent; 
	if(!$mail->send()) { 
	    header("Location: ../administrator/pages-applicants-new.php?error=failed sending email");
	} else { 
	   		header("Location: ../administrator/pages-applicants-new.php");

	}

}

if(isset($_POST['renew'])){
	$BrgyClearance = $_POST['BrgyClearance'];
	$ZoningClearance = $_POST['ZoningClearance'];
	$OccupancyPermit = $_POST['OccupancyPermit'];
	$AnnualInspection = $_POST['AnnualInspection'];
	$SanitaryPermit = $_POST['SanitaryPermit'];
	$FireCertificate = $_POST['FireCertificate'];
	$EnvironmentCertificate = $_POST['EnvironmentCertificate'];
	$MarketClearance = $_POST['MarketClearance'];
	$businessId = $_POST['businessId'];


	$mayor = $_POST['mayor'];
	$garbage = $_POST['garbage'];
	$trucks = $_POST['trucks'];
	$sanitary = $_POST['sanitary'];
	$building = $_POST['building'];
	$electrical = $_POST['electrical'];
	$mechanical = $_POST['mechanical'];
	$plumbing = $_POST['plumbing'];
	$storage = $_POST['storage'];
	$others = $_POST['others'];
	$total_lgu = $_POST['total_lgu'];
	$firesafety = $_POST['firesafety'];
	$total = $_POST['total'];

	$sql = "INSERT INTO business.document_verification
	(BrgyClearance,ZoningClearance,OccupancyPermit,AnnualInspection,SanitaryPermit,FireCertificate,EnvironmentCertificate,MarketClearance,businessId)values(
	'$BrgyClearance','$ZoningClearance','$OccupancyPermit','$AnnualInspection','$SanitaryPermit','$FireCertificate','$EnvironmentCertificate','$MarketClearance',$businessId);";

	mysqli_query($conn,$sql)or die($conn->error);

	$update = "UPDATE business.business set
				status = 'unpaid'
				where id = $businessId;";

	mysqli_query($conn,$update)or die($conn->error);

	$fees = "INSERT INTO business.regulatory_fees
	(MayorsPermit,GarbageCharges,DeliveryTrucks,SanitaryInspection,BldgInspection,ElectricalInspection,MechanicalInspection,PlumbingInspection,SubstanceStorage,Others,FireSafetyFee,businessId)values
	($mayor,$garbage,$trucks,$sanitary,$building,$electrical,$mechanical,$plumbing,$storage,$others,$firesafety,$businessId)";

	mysqli_query($conn,$fees)or die($conn->error);
	$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
	$bodyContent .= '<p>This is to inform you that the renewal form for your business has been <b>verified</b></p>'; 
	$bodyContent .= '<a href="http://localhost/business/user/pages-my-businesses.php?">http://localhost/business/user/pages-pending-request.php?</a>';
	$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

	$mail->Body    = $bodyContent; 
	if(!$mail->send()) { 
	    header("Location: ../administrator/pages-applicants-renew.php?error=failed sending email");
	} else { 
	  header("Location: ../administrator/pages-applicants-renew.php");
	}
}

if (isset($_POST['update_staff'])) {
	$userId = $_POST['userId'];
	$uId = $_POST['uId'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$birthDate = $_POST['birthDate'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$update = "UPDATE business.personal_information set
				firstName = '$firstName',
				middleName = '$middleName',
				lastName = '$lastName',
				birthdate = '$birthDate',
				age = $age,
				email = '$email'
				where id = $userId";

	$updateUser = "UPDATE business.users set
				username = '$username',
				password = md5('$password')
				where id = $uId";
	mysqli_query($conn,$update)or die($conn->error);
	mysqli_query($conn,$updateUser)or die($conn->error);
	mysqli_query($conn,$update)or die($conn->error);

}

if(isset($_POST['retire'])){
	session_start();

	$businessId = $_POST['businessId'];


	$retire = "UPDATE business.business set status = 'retired' where id = $businessId; ";
	$result = mysqli_query($conn, $retire)or die($conn->error);
	$bodyContent = '<h1>Hello, '.$name.'</h1>'; 
	$bodyContent .= '<p>This is to inform you that the retirement form for your business has been <b>verified</b></p>'; 
	$bodyContent .= '<a href="http://localhost/business/user/pages-my-businesses.php?">http://localhost/business/user/pages-pending-request.php?</a>';
	$bodyContent .= '<img src=https://i.ibb.co/2gLGS9W/OBPPSlogo.png">';

	$mail->Body = $bodyContent; 
	if(!$mail->send()) { 
	 	header("Location: ../administrator/pages-applicants-retirement.php");
	} else { 
		header("Location: ../administrator/pages-applicants-retirement.php");
	}


}

function sendmail($to,$nameto,$subject,$message,$altmess)  {

  $from  = "obpps1@gmail.com";
  $namefrom = "Online Business Permit Processing System";
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

?>