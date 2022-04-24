<?php 

include "db_conn.php";



if(isset($_POST['update_name'])){


	session_start();
	

	$personId = $_SESSION['personId'];

	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$businessId = $_POST['businessId'];

	// $update = "UPDATE business.personal_information set 
	// 			firstName = '$firstName',
	// 			middleName = '$middleName',
	// 			lastName = '$lastName'
	// 			where id = $personId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['firstName'] = $_POST['firstName'];
	$_SESSION['middleName'] = $_POST['middleName'];
	$_SESSION['lastName'] = $_POST['lastName'];

	header("Location: ../pages-renew-business-form.php");

}


if (isset($_POST['update_business_name'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$businessName = $_POST['businessName'];

	// $update = "UPDATE business.business set 
	// 			businessName = '$businessName'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['businessName'] = $_POST['businessName'];
	

	header("Location: ../pages-renew-business-form.php");


}

if (isset($_POST['update_trade_name'])) {

	session_start();
	$businessId = $_POST['businessId'];
	$tradeName = $_POST['tradeName'];

	// $update = "UPDATE business.business set 
	// 			tradeName = '$tradeName'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['tradeName'] = $_POST['tradeName'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_municipality'])) {
	session_start();

	$businessId = $_POST['businessId'];
	$officeMunicipality = $_POST['officeMunicipality'];

	// $update = "UPDATE business.business set 
	// 			officeMunicipality = '$officeMunicipality'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['officeMunicipality'] = $_POST['officeMunicipality'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_payment_mode'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$paymentMode = $_POST['paymentMode'];

	// $update = "UPDATE business.business set 
	// 			paymentMode = '$paymentMode'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['paymentMode'] = $_POST['paymentMode'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_tin'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$tinNumber = $_POST['tinNumber'];

	// $update = "UPDATE business.business set 
	// 			tinNumber = '$tinNumber'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['tinNumber'] = $_POST['tinNumber'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_dti_no'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$DTIRegNo = $_POST['DTIRegNo'];

	// $update = "UPDATE business.business set 
	// 			DTIRegNo = '$DTIRegNo'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['DTIRegNumber'] = $_POST['DTIRegNo'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_dti_date'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$DTIRegDate = $_POST['DTIRegDate'];

	// $update = "UPDATE business.business set 
	// 			DTIRegDate = '$DTIRegDate'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['DTIRegDate'] = $_POST['DTIRegDate'];
	

	header("Location: ../pages-renew-business-form.php");

}

if (isset($_POST['update_business_type'])) {
	session_start();
	$businessId = $_POST['businessId'];
	$business_type = $_POST['business_type'];

	// $update = "UPDATE business.business set 
	// 			type = '$business_type'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['businessType'] = $_POST['business_type'];
	

	header("Location: ../pages-renew-business-form.php");

}

if(isset($_POST['update_president'])){


	session_start();
	

	$personId = $_SESSION['personId'];

	$presidentFname = $_POST['presidentFname'];
	$presidentMname = $_POST['presidentMname'];
	$presidentLname = $_POST['presidentLname'];
	$businessId = $_POST['businessId'];

	// $update = "UPDATE business.business set 
	// 			presidentFname = '$presidentFname',
	// 			presidentMname = '$presidentMname',
	// 			presidentLname = '$presidentLname'
	// 			where id = $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['presidentFirstName'] = $_POST['presidentFname'];
	$_SESSION['presidentMiddleName'] = $_POST['presidentMname'];
	$_SESSION['presidentlastName'] = $_POST['presidentLname'];

	header("Location: ../pages-renew-business-form.php");

}

if(isset($_POST['update_building_no'])){


	session_start();
	

	$personId = $_SESSION['personId'];

	$bldgNo = $_POST['bldgNo'];
	$businessId = $_POST['businessId'];

	// $update = "UPDATE business.address 
	// 	left join owner on address.id = owner.addressId
	// 	left join business on owner.id = business.ownerId
	// 	set bldgNo = '$bldgNo'
	// 	where business.id =  $businessId;";

	// $result = mysqli_query($conn, $update)or die($conn->error);

	$_SESSION['bldgNo'] = $_POST['bldgNo'];
	
	header("Location: ../pages-renew-business-form-p2.php");

}

if(isset($_POST['update_building_name'])){

	session_start();
	$_SESSION['bldgName'] = $_POST['bldgName'];	
	header("Location: ../pages-renew-business-form-p2.php");

}


if(isset($_POST['update_unit_no'])){

	session_start();
	$_SESSION['unitNo'] = $_POST['unitNo'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_street_name'])){

	session_start();
	$_SESSION['street'] = $_POST['street'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_barangay_name'])){

	session_start();
	$_SESSION['brgy'] = $_POST['brgy'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_subdivision_name'])){

	session_start();
	$_SESSION['subdivision'] = $_POST['subdivision'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_municipality_name'])){

	session_start();
	$_SESSION['municipality'] = $_POST['municipality'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['upate_province_name'])){

	session_start();
	$_SESSION['province'] = $_POST['province'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}


if(isset($_POST['update_contact_no'])){

	session_start();
	$_SESSION['contactNo'] = $_POST['contactNo'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_email'])){

	session_start();
	$_SESSION['email'] = $_POST['email'];	
	header("Location: ../pages-renew-business-form-p2.php");
	
}

if(isset($_POST['update_business_building_no'])){

	session_start();
	$_SESSION['businessBldgNo'] = $_POST['businessBldgNo'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_building_name'])){

	session_start();
	$_SESSION['businessBldgName'] = $_POST['businessBldgName'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_unit_no'])){

	session_start();
	$_SESSION['businessUnitNo'] = $_POST['businessUnitNo'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_street_name'])){

	session_start();
	$_SESSION['businessStreet'] = $_POST['businessStreet'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_barangay_name'])){

	session_start();
	$_SESSION['businessBrgy'] = $_POST['businessBrgy'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}


if(isset($_POST['update_business_subdivision_name'])){

	session_start();
	$_SESSION['businessSubdivition'] = $_POST['businessSubdivition'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_municipality_name'])){

	session_start();
	$_SESSION['businessMunicipality'] = $_POST['businessMunicipality'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_province_name'])){

	session_start();
	$_SESSION['businessProvince'] = $_POST['businessProvince'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_area'])){

	session_start();
	$_SESSION['businessArea'] = $_POST['businessArea'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}


if(isset($_POST['update_business_contact'])){

	session_start();
	$_SESSION['businessContactNo'] = $_POST['businessContactNo'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_business_email'])){

	session_start();
	$_SESSION['businessEmail'] = $_POST['businessEmail'];	
	header("Location: ../pages-renew-business-form-p3.php");
	
}

if(isset($_POST['update_male_employees'])){

	session_start();
	$_SESSION['maleEmployee'] = $_POST['maleEmployee'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_female_employees'])){

	session_start();
	$_SESSION['femaleEmployee'] = $_POST['femaleEmployee'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lgu_employees'])){

	session_start();
	$_SESSION['lguEmployee'] = $_POST['lguEmployee'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lessors_name'])){

	session_start();
	$_SESSION['lessorsName'] = $_POST['lessorsName'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lessors_address'])){

	session_start();
	$_SESSION['lessorsAddress'] = $_POST['lessorsAddress'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lessors_contact'])){

	session_start();
	$_SESSION['lessorsContactNo'] = $_POST['lessorsContactNo'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lessors_email'])){

	session_start();
	$_SESSION['lessorsEmail'] = $_POST['lessorsEmail'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['update_lessors_monthly'])){

	session_start();
	$_SESSION['lessorsMonthlyRental'] = $_POST['lessorsMonthlyRental'];	
	header("Location: ../pages-renew-business-form-p4.php");
	
}

if(isset($_POST['save'])){
	session_start();

	$renewBusinessId = $_SESSION['businessId'];

	$ownerBldgNo = $_SESSION['bldgNo'];
	$ownerBldgName = $_SESSION['bldgName'];
	$ownerUnitNo = $_SESSION['unitNo']; 
	$ownerStreet = $_SESSION['street'];
	$ownerBrgy = $_SESSION['brgy'];
	$ownerSubdivition = $_SESSION['subdivision']; 
	$ownerMunicipality = $_SESSION['municipality']; 
	$ownerProvince = $_SESSION['province'];
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
			$essential = $_POST["essential"][$key];
			$non_essential = $_POST["non_essential"][$key];

			$sql ="insert into activity(lineOfBusiness,noOfUnits,capitalization,businessId,GrossEssential,GrossNonEssential) values ('$lineOfBus', '$units', '$capitalization',$busnessId,$essential,$non_essential)"; 
			$result = mysqli_query($conn, $sql)or die($conn->error);;

		}

	$mode = "INSERT into business_mode(businessId,mode)values($busnessId,'renew');";
	$result = mysqli_query($conn, $mode)or die($conn->error);


	$processed = "UPDATE business.requirements set status = 'processed' where personId = $personId; ";
	$result = mysqli_query($conn, $processed)or die($conn->error);

	$renew = "UPDATE business.business set status = 'renewed' where id = $renewBusinessId; ";
	$result = mysqli_query($conn, $renew)or die($conn->error);
	header("Location: ../pages-confirmation.php");
}


 ?>