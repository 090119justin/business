<?php 
include "db_conn.php";


if(isset($_POST['next1'])){
	session_start();
	$_SESSION['officeMunicipality'] = $_POST['officeMunicipality'];
	$_SESSION['paymentMode'] = $_POST['paymentMode'];
	$_SESSION['DTIregNumber'] = $_POST['DTIregNumber'];
	$_SESSION['DTIregDate'] = $_POST['DTIregDate'];
	$_SESSION['tinNumber'] = $_POST['tinNumber'];
	$_SESSION['businessType'] = $_POST['businessType'];
	$_SESSION['businessName'] = $_POST['businessName'];
	$_SESSION['tradeName'] = $_POST['tradeName'];

	$_SESSION['presidentFirstName'] = $_POST['presidentFirstName'];
	$_SESSION['presidentMiddleName'] = $_POST['presidentMiddleName'];
	$_SESSION['presidentlastName'] = $_POST['presidentlastName'];

	header("Location: ../pages-new-business-form-p2.php");
}

if(isset($_POST['next2'])){

	session_start();
	$_SESSION['ownerBldgNo'] = $_POST['ownerBldgNo'];
	$_SESSION['ownerBldgName'] = $_POST['ownerBldgName'];
	$_SESSION['ownerUnitNo'] = $_POST['ownerUnitNo'];
	$_SESSION['ownerStreet'] = $_POST['ownerStreet'];
	$_SESSION['ownerBrgy'] = $_POST['ownerBrgy'];
	$_SESSION['ownerSubdivition'] = $_POST['ownerSubdivition'];
	$_SESSION['ownerMunicipality'] = $_POST['ownerMunicipality'];
	$_SESSION['ownerProvince'] = $_POST['ownerProvince'];
	$_SESSION['ownerContactNo'] = $_POST['ownerContactNo'];
	$_SESSION['ownerEmail'] = $_POST['ownerEmail'];

	header("Location: ../pages-new-business-form-p3.php");
}

if(isset($_POST['prev2'])){

	session_start();
	$_SESSION['ownerBldgNo'] = $_POST['ownerBldgNo'];
	$_SESSION['ownerBldgName'] = $_POST['ownerBldgName'];
	$_SESSION['ownerUnitNo'] = $_POST['ownerUnitNo'];
	$_SESSION['ownerStreet'] = $_POST['ownerStreet'];
	$_SESSION['ownerBrgy'] = $_POST['ownerBrgy'];
	$_SESSION['ownerSubdivition'] = $_POST['ownerSubdivition'];
	$_SESSION['ownerMunicipality'] = $_POST['ownerMunicipality'];
	$_SESSION['ownerProvince'] = $_POST['ownerProvince'];
	$_SESSION['ownerContactNo'] = $_POST['ownerContactNo'];

	header("Location: ../pages-new-business-form.php");
}

if(isset($_POST['next3'])){

	session_start();
	$_SESSION['businessBldgNo'] = $_POST['businessBldgNo'];
	$_SESSION['businessBldgName'] = $_POST['businessBldgName'];
	$_SESSION['businessUnitNo'] = $_POST['businessUnitNo'];
	$_SESSION['businessStreet'] = $_POST['businessStreet'];
	$_SESSION['businessBrgy'] = $_POST['businessBrgy'];
	$_SESSION['businessSubdivition'] = $_POST['businessSubdivition'];
	$_SESSION['businessMunicipality'] = $_POST['businessMunicipality'];
	$_SESSION['businessProvince'] = $_POST['businessProvince'];
	$_SESSION['businessContactNo'] = $_POST['businessContactNo'];
	$_SESSION['businessEmail'] = $_POST['businessEmail'];
	$_SESSION['businessArea'] = $_POST['businessArea'];

	header("Location: ../pages-new-business-form-p4.php");
}


if(isset($_POST['prev3'])){

	session_start();
	$_SESSION['businessBldgNo'] = $_POST['businessBldgNo'];
	$_SESSION['businessBldgName'] = $_POST['businessBldgName'];
	$_SESSION['businessUnitNo'] = $_POST['businessUnitNo'];
	$_SESSION['businessStreet'] = $_POST['businessStreet'];
	$_SESSION['businessBrgy'] = $_POST['businessBrgy'];
	$_SESSION['businessSubdivition'] = $_POST['businessSubdivition'];
	$_SESSION['businessMunicipality'] = $_POST['businessMunicipality'];
	$_SESSION['businessProvince'] = $_POST['businessProvince'];
	$_SESSION['businessContactNo'] = $_POST['businessContactNo'];
	$_SESSION['businessEmail'] = $_POST['businessEmail'];
	$_SESSION['businessArea'] = $_POST['businessArea'];

	header("Location: ../pages-new-business-form-p2.php");
}

if(isset($_POST['next4'])){

	session_start();
	

	$_SESSION['maleEmployee'] = $_POST['maleEmployee'];
	$_SESSION['femaleEmployee'] = $_POST['femaleEmployee'];
	$_SESSION['lguEmployee'] = $_POST['lguEmployee'];

	$_SESSION['lessorsName'] =  $_POST['lessorsName'];
	$_SESSION['lessorsAddress'] =  $_POST['lessorsAddress'];
	$_SESSION['lessorsContactNo'] =  $_POST['lessorsContactNo'];
	$_SESSION['lessorsEmail'] =  $_POST['lessorsEmail'];
	$_SESSION['lessorsMonthlyRental'] = $_POST['lessorsMonthlyRental'];


	header("Location: ../pages-new-business-form-p5.php");
}

if(isset($_POST['prev4'])){

	session_start();
	

	$_SESSION['maleEmployee'] = $_POST['maleEmployee'];
	$_SESSION['femaleEmployee'] = $_POST['femaleEmployee'];
	$_SESSION['lguEmployee'] = $_POST['lguEmployee'];

	$_SESSION['lessorsName'] =  $_POST['lessorsName'];
	$_SESSION['lessorsAddress'] =  $_POST['lessorsAddress'];
	$_SESSION['lessorsContactNo'] =  $_POST['lessorsContactNo'];
	$_SESSION['lessorsEmail'] =  $_POST['lessorsEmail'];
	$_SESSION['lessorsMonthlyRental'] = $_POST['lessorsMonthlyRental'];


	header("Location: ../pages-new-business-form-p3.php");
}

if(isset($_POST['requirements'])){
	session_start();
	$personId = $_SESSION['personId'];

	$select = "SELECT * from business.requirements 
	where requirements.status != 'processed'
	and personId = $personId
	and type = 'new';";

	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) >= 1) {
		header("Location: ../pages-pending-request.php");
	}
	else{
		$addressOwner = "INSERT INTO requirements(personId,type) VALUES ($personId,'new');";
		$result = mysqli_query($conn, $addressOwner);
		header("Location: ../pages-pending-request.php?");
	}	
}

if(isset($_POST['renew_requirements'])){
	session_start();
	$personId = $_SESSION['personId'];
	$businessId = $_SESSION['businessId'];

	$select = "SELECT * from 
	business.renew_requirements
	inner join business.business on renew_requirements.businessId = business.id
	inner join business.requirements on renew_requirements.requirementsId = requirements.id
	where businessId = $businessId
	and requirements.status != 'processed';";


	$result = mysqli_query($conn, $select)or die($conn->error);

	if (mysqli_num_rows($result) >= 1) {
	header("Location: ../pages-pending-request-renew.php");
	
	}else{
		$requirements = "INSERT INTO requirements(type,personId) VALUES ('renew',$personId);";
		$result = mysqli_query($conn, $requirements)or die($conn->error);
		$requirementsId =  $conn->insert_id;

		$renew_requirements = "INSERT into renew_requirements(businessId,requirementsId)values
		($businessId,$requirementsId)";
		$result = mysqli_query($conn, $renew_requirements)or die($conn->error);

		header("Location: ../pages-pending-request-renew.php");
	}	
}


if(isset($_POST['save'])){
	session_start();

	$ownerBldgNo = $_SESSION['ownerBldgNo'];
	$ownerBldgName = $_SESSION['ownerBldgName'];
	$ownerUnitNo = $_SESSION['ownerUnitNo']; 
	$ownerStreet = $_SESSION['ownerStreet'];
	$ownerBrgy = $_SESSION['ownerBrgy'];
	$ownerSubdivition = $_SESSION['ownerSubdivition']; 
	$ownerMunicipality = $_SESSION['ownerMunicipality']; 
	$ownerProvince = $_SESSION['ownerProvince'];
	$personId = $_SESSION['personId'];

	$businessBldgNo = $_SESSION['businessBldgNo'];
	$businessBldgName = $_SESSION['businessBldgName'];
	$businessUnitNo = $_SESSION['businessUnitNo'];
	$businessStreet = $_SESSION['businessStreet'];
	$businessBrgy = $_SESSION['businessBrgy'];
	$businessSubdivition = $_SESSION['businessSubdivition'];
	$businessMunicipality = $_SESSION['businessMunicipality'];
	$businessProvince = $_SESSION['businessProvince'];
	$businessContactNo = $_SESSION['businessContactNo'];
	$businessEmail = $_SESSION['businessEmail'];
	$businessArea = $_SESSION['businessArea'];

	$presidentFirstName = $_SESSION['presidentFirstName'];
	$presidentMiddleName = $_SESSION['presidentMiddleName'];
	$presidentlastName = $_SESSION['presidentlastName'];

	$officeMunicipality = $_SESSION['officeMunicipality'];
	$paymentMode = $_SESSION['paymentMode'];
	$DTIregNumber = $_SESSION['DTIregNumber'];
	$DTIregDate = $_SESSION['DTIregDate'];
	$tinNumber = $_SESSION['tinNumber'];
	$businessType = $_SESSION['businessType'];
	$businessName = $_SESSION['businessName'];
	$tradeName = $_SESSION['tradeName'];

	$maleEmployee = $_SESSION['maleEmployee'];
	$femaleEmployee = $_SESSION['femaleEmployee'];
	$lguEmployee = $_SESSION['lguEmployee'];

	$lessorsName = $_SESSION['lessorsName'];
	$lessorsAddress = $_SESSION['lessorsAddress'];
	$lessorsContactNo = $_SESSION['lessorsContactNo'];
	$lessorsEmail = $_SESSION['lessorsEmail'];
	$lessorsMonthlyRental = $_SESSION['lessorsMonthlyRental'];
	




	$addressOwner = "INSERT INTO address(type,bldgNo,bldgName,unitNo,street,brgy,subdivision,municipality,province) VALUES ('owner','$ownerBldgNo','$ownerBldgName','$ownerUnitNo','$ownerStreet','$ownerBrgy','$ownerSubdivition','$ownerMunicipality','$ownerProvince');";
	$result = mysqli_query($conn, $addressOwner);
	$addressOwnerId = $conn->insert_id;

	$addressBusiness = "INSERT INTO address(type,bldgNo,bldgName,unitNo,street,brgy,subdivision,municipality,province) VALUES ('business','$businessBldgNo','$businessBldgName','$businessUnitNo','$businessStreet','$businessBrgy','$businessSubdivition','$businessMunicipality','$businessProvince');";
	$result = mysqli_query($conn, $addressBusiness);
	$addressBusinessId = $conn->insert_id;

	$owner = "INSERT INTO owner(infoId,addressId)values ($personId,$addressOwnerId);";
	$result = mysqli_query($conn, $owner);
	$ownerId = $conn->insert_id;

	$business = "INSERT INTO business(presidentFname,presidentMname,presidentLname,businessName,tradeName,DTIRegNo,DTIRegDate,type,paymentMode,
										area,officeMunicipality,maleEmployees,femaleEmployees,employeesLGU,ownerId,addressId,TINNumber,businessEmail,businessContact) values
										('$presidentFirstName','$presidentMiddleName','$presidentlastName','$businessName','$tradeName','$DTIregNumber','$DTIregDate','$businessType','$paymentMode',
										'$businessArea','$officeMunicipality',$maleEmployee,$femaleEmployee,$lguEmployee,$ownerId,$addressBusinessId,$tinNumber,'$businessEmail','$businessContactNo');";
	$result = mysqli_query($conn, $business)or die($conn->error);
	$busnessId =  $conn->insert_id;

	echo $busnessId;
	foreach ($_POST['lineOfBus'] as $key => $value) 
		{
			$lineOfBus = $_POST["lineOfBus"][$key];
			$units = $_POST["units"][$key];
			$capitalization = $_POST["capitalization"][$key];

			$sql ="insert into activity(lineOfBusiness,noOfUnits,capitalization,businessId) values ('$lineOfBus', '$units', '$capitalization',$busnessId)"; 
			$result = mysqli_query($conn, $sql)or die($conn->error);;

		}

	$mode = "INSERT into business_mode(businessId)values($busnessId);";
	$result = mysqli_query($conn, $mode)or die($conn->error);

	$lessor = "INSERT into lessor(fullName, fullAddress, contactNo, email, monthly, businessId)values('$lessorsName','$lessorsAddress', '$lessorsContactNo','$lessorsEmail',$lessorsMonthlyRental,$busnessId);";
	$lessorResult =  mysqli_query($conn, $lessor)or die($conn->error);

	$processed = "UPDATE business.requirements set status = 'processed' where personId = $personId; ";
	$result = mysqli_query($conn, $processed)or die($conn->error);
	header("Location: ../pages-new-business-confimation.php?peros=$personId");
}

if(isset($_POST['renew_business'])){
	session_start();

	$businessId = $_SESSION['businessId'];

	$sql = "SELECT b.*, o.*, i.*, ba.*
	from business.business b
	inner join business.owner o on b.ownerId = o.id
	inner join business.address ba on b.addressId = ba.id 
	inner join business.personal_information i on o.infoId = i.id
	inner join business.address oa on o.addressId = oa.id
	where b.id  = $businessId;";

	$result = mysqli_query($conn, $sql) or die($conn->error);

	if (mysqli_num_rows($result) >= 1) {
		header("Location: ../pages-renew-business-form.php?view_data=$businessId");
	}



}


?>