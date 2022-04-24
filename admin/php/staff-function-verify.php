<?php 
session_start();
include "db_conn.php";


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
		header("Location: ../staff/pages-requirements-new.php");
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
		header("Location: ../staff/pages-requirements-new.php");
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
		header("Location: ../staff/pages-requirements-renew.php");
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
		header("Location: ../staff/pages-requirements-renew.php");
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
	$firesafety = $_POST['firesafety'];

	$fees = "INSERT INTO business.regulatory_fees
	(MayorsPermit,GarbageCharges,DeliveryTrucks,SanitaryInspection,BldgInspection,ElectricalInspection,MechanicalInspection,PlumbingInspection,SubstanceStorage,Others,FireSafetyFee,businessId)values
	($mayor,$garbage,$trucks,$sanitary,$building,$electrical,$mechanical,$plumbing,$storage,$others,
		$firesafety, $businessId)";

	mysqli_query($conn,$fees)or die($conn->error);
	
	header("Location: ../staff/pages-applicants-new.php");

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

	header("Location: ../staff/pages-applicants-renew.php");
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

	header("Location: ../staff/pages-edit-staff.php?view_data=$userId");

}

if(isset($_POST['retire'])){
	session_start();

	$businessId = $_POST['businessId'];


	$retire = "UPDATE business.business set status = 'retired' where id = $businessId; ";
	$result = mysqli_query($conn, $retire)or die($conn->error);

	header("Location: ../staff/pages-applicants-retirement.php");

}

?>