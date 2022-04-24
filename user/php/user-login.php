<?php  
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

	if (empty($username)) {
		header("Location: ../pages-login.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ../pages-login.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' and role ='user'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['role'] == $role) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];

        		$userId = $row['id'];



        		$sql = "SELECT * FROM personal_information where userId = $userId";
       			$result = mysqli_query($conn, $sql);
        		$row = mysqli_fetch_assoc($result);

       			$_SESSION['firstName'] = $row['firstName'];
        		$_SESSION['lastName'] = $row['lastName'];
        		$_SESSION['middleName'] = $row['middleName'];
        		$_SESSION['gender'] = $row['gender'];
				$_SESSION['personId'] = $row['id'];
        		$_SESSION['email'] = $row['email'];
        		$_SESSION['photo'] = $row['photo'];
        		$_SESSION['birthDate'] = $row['birthdate'];
        		$_SESSION['age'] = $row['age'];
        		$_SESSION['contactNo'] = $row['contactNo'];

        		$_SESSION['officeMunicipality'] = "";
        		$_SESSION['paymentMode'] = "";
        		$_SESSION['DTIregNumber'] = "";
        		$_SESSION['DTIregDate'] = "";
        		$_SESSION['tinNumber'] = "";
        		$_SESSION['businessType'] = "";
        		$_SESSION['businessName'] = "";
        		$_SESSION['tradeName'] = "";

        		$_SESSION['presidentFirstName'] = "";
        		$_SESSION['presidentMiddleName'] = "";
        		$_SESSION['presidentlastName'] = "";


        		$_SESSION['businessId'] = 0;
        		$_SESSION['businessBldgNo'] = "";
        		$_SESSION['businessBldgName'] = "";
        		$_SESSION['businessUnitNo'] = "";
        		$_SESSION['businessStreet'] = "";
        		$_SESSION['businessBrgy'] = "";
        		$_SESSION['businessSubdivition'] = "";
        		$_SESSION['businessMunicipality'] = "";
        		$_SESSION['businessProvince'] = "";
        		$_SESSION['businessContactNo'] = "";
        		$_SESSION['businessEmail'] = "";
        		$_SESSION['businessArea'] = "";


        		$_SESSION['ownerBldgNo'] = "";
        		$_SESSION['ownerBldgName'] = "";
        		$_SESSION['ownerUnitNo'] = "";
        		$_SESSION['ownerStreet'] = "";
        		$_SESSION['ownerBrgy'] = "";
        		$_SESSION['ownerSubdivition'] = "";
        		$_SESSION['ownerMunicipality'] = "";
        		$_SESSION['ownerProvince'] = "";
        		$_SESSION['ownerContactNo'] = "";

        		$_SESSION['maleEmployee'] = 0;
        		$_SESSION['femaleEmployee'] = 0;
        		$_SESSION['lguEmployee'] = 0;

        		$_SESSION['lessorsName'] = "";
        		$_SESSION['lessorsAddress'] = "";
        		$_SESSION['lessorsContactNo'] = "";
        		$_SESSION['lessorsEmail'] = "";
        		$_SESSION['lessorsMonthlyRental'] = 0;

        



        		header("Location: ../index.php");

        	}else {
        		header("Location: ../pages-login.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../pages-login.php?error=Incorect User name or password");
        }

	}
	
}else {
	header("Location: ../pages-login.php");
}